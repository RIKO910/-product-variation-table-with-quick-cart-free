<?php
if ( ! defined( 'ABSPATH' ) ) exit;

register_deactivation_hook(__FILE__, "quick_variable_action_after_deactivation_plugin");
register_activation_hook(__FILE__, "quick_variable_action_after_activation_plugin");


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
