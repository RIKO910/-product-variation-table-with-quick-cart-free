<?php
if ( ! defined( 'ABSPATH' ) ) exit;
register_deactivation_hook(__FILE__, "quick_variable_action_after_deactivation_plugin");
register_activation_hook(__FILE__, "quick_variable_action_after_activation_plugin");

function quick_variable_remove_site_url_under_license_key_after_deactivation_plugin($license_key){
    $site_url = get_site_url();
    
    // Data to send
    $body = [
        'license_key' => $license_key,
        'added_sites' => $site_url
    ];
    
    // Make the remote post request
    $response = wp_remote_post('https://www.wooxperto.com/api/api-site-remove.php', [
        'method' => 'POST',
        'body'   => $body
    ]);
    
    // Check for errors
    if (is_wp_error($response)) {
        return $response->get_error_message();
    }
    
    return wp_remote_retrieve_body($response);
}

function quick_variable_action_after_deactivation_plugin(){
    $license_key = get_option('quick_fild_license_key');
    if ($license_key) {
        quick_variable_remove_site_url_under_license_key_after_deactivation_plugin($license_key);
    }
}

function quick_variable_action_after_activation_plugin() {
    $license_key = get_option('quick_fild_license_key');
    if ($license_key) {
        quick_variable_license_key_get($license_key);
    }
}

// AJAX process for activating the license
function quick_variable_license_key_get($key) {
    $siteUrl = get_site_url();
    
    // Data to send
    $body = [
        'license_key' => $key,
        'added_sites' => $siteUrl,
        'product_id'  => 'NDkwMA=='
    ];
    
    // Make the remote post request
    $response = wp_remote_post('https://www.wooxperto.com/api/api-active.php', [
        'method' => 'POST',
        'body' => $body
    ]);

    // Check for errors
    if (is_wp_error($response)) {
        echo wp_json_encode(['status' => 'notOk', 'message' => $response->get_error_message()]);
        wp_die();
    }
    
    $res = json_decode(wp_remote_retrieve_body($response), true);
    
    if ($res && isset($res['status']) && $res['status']) {
        if (!wp_next_scheduled('quick_variable_li_check_event')) {
            wp_schedule_event(time(), 'daily', 'quick_variable_li_check_event');
        }

        $currentDate = strtotime(gmdate('Y-m-d'));
        $exDate = $res['expiry_date'];

        update_option('quick_license_key', $key);
        update_option('quick_license_expiry_date', $exDate);
        update_option('quick_license_last_check_date', $currentDate);

        $sms = $res['error'];
        echo wp_json_encode(['status' => 'ok', 'message' => $sms]);

    } else {
        update_option('quick_license_key', '');
        update_option('quick_license_expiry_date', '');
        update_option('quick_license_last_check_date', '');

        $sms = $res['error'];

        $timestamp = wp_next_scheduled('quick_variable_li_check_event');
        if ($timestamp) {
            wp_unschedule_event($timestamp, 'quick_variable_li_check_event');
        }

        echo wp_json_encode(['status' => 'notOk', 'message' => $sms]);
    }

    wp_die();
}

function quick_variable_li_check() {
    $license_key = get_option('quick_fild_license_key');
    if ($license_key) {
        quick_variable_license_key_get($license_key);
    }
}
add_action('quick_variable_li_check_event', 'quick_variable_li_check');

// Function to check if the time difference is more than 24 hours
function quickTimeDifferenceMoreThan24Hours($timestamp1, $timestamp2) {
    $date1 = new DateTime("@$timestamp1");
    $date2 = new DateTime("@$timestamp2");
    $interval = $date1->diff($date2);
    $differenceInSeconds = ($interval->days * 24 * 60 * 60) + ($interval->h * 60 * 60) + ($interval->i * 60) + $interval->s;
    return $differenceInSeconds > 86400;
}

add_action('add_option_quick_fild_license_key', 'quick_variable_license_key_data_add', 10, 2);
add_action('update_option_quick_fild_license_key', 'quick_variable_license_key_data_update', 10, 3);

function quick_variable_license_key_data_update($oldKey, $newKey, $option){
    quick_variable_license_key_get($newKey);
}

function quick_variable_license_key_data_add($option, $newKey){
    quick_variable_license_key_get($newKey);
}

// License check and update process
add_action('init', function() {
    $exDate = get_option('quick_license_expiry_date');
    if ($exDate > 0) {
        $currentDate = strtotime(gmdate('Y-m-d'));
        $lastCheckLicense = get_option('quick_license_last_check_date');

        if (quickTimeDifferenceMoreThan24Hours($currentDate, $lastCheckLicense)) {
            update_option('quick_license_last_check_date', $currentDate);
            $license_key = $exDate > $currentDate;
        } else {
            $license_key = true;
        }
    } else {
        $license_key = false;
    }
    
    update_option('QUICK_LICENSE_OK', $license_key);
});
