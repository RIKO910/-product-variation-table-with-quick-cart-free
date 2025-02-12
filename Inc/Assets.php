<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Quickassets{

    /**
     * Define Constant.
     *
     * @return void
     * @since 1.0.0
     *
     */
    function __construct(){

        $version = '1.0.1';

        wp_enqueue_style('main-css', plugin_dir_url(dirname(__FILE__)) . 'Assets/CSS/style.css', array(), $version);
        wp_enqueue_style('all-min-font-awesome', plugin_dir_url(dirname(__FILE__)) . 'Assets/CSS/all.min.css', array(), '5.15.4');
        wp_enqueue_style('main-font-awesome-css', plugin_dir_url(dirname(__FILE__)) . 'Assets/CSS/fontawesome.min.css', array(), '5.15.4');
        wp_enqueue_style('main-font-awesome-css', plugin_dir_url(dirname(__FILE__)) . 'Assets/webfonts', array(), '5.15.4');

        wp_enqueue_script('jquery');
        wp_enqueue_script('main-js', plugin_dir_url(dirname(__FILE__)) . 'Assets/JS/scripts.js',array(), $version, true );
        wp_enqueue_script('frontend-js', plugin_dir_url(dirname(__FILE__)) . 'Assets/JS/frontend-script.js',array(), $version, true );
        wp_enqueue_script('jsColor', plugin_dir_url(dirname(__FILE__)) . 'Assets/JS/jscolor.min.js',array(), $version, true );
        wp_localize_script('main-js', 'quick_ajax_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'pro_key' => get_option('QUICK_LICENSE_OK')
        ));

        add_action('wp_enqueue_scripts', array($this,'qctv_enqueue_frontend_scripts'));

    }

    /**
     * Ajax call for frontend add to cart in archive page and single product page.
     *
     * @return void
     * @since 1.0.0
     *
     */
    function qctv_enqueue_frontend_scripts(){
        wp_localize_script('frontend-js', 'quick_front_ajax_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'siteUrl' => get_site_url(), // Get the cart URL dynamically.
            'nonce'    => wp_create_nonce('woocommerce_ajax_add_to_cart'), // Create a nonce

        ));
    }
}
