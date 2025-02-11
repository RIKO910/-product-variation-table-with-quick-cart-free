<?php
/**
 * Plugin Name:       Product Variation Table With Quick Cart
 * Plugin URI:        https://www.wooxperto.com/
 * Description:       Enhance WooCommerce by adding quick cart functionality and a detailed variations table directly on product pages.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            WooXperto
 * Author URI:        https://github.com/woo-xperto
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       product-variation-table-with-quick-cart
 * Requires Plugins:  woocommerce
 */


/**
 * Check if the free version of the plugin is active and deactivate it if necessary.
 *
 * @since 1.0.0
 * @return bool Returns true if the free version was active and has been deactivated, false otherwise.
 */


// Exit if accessed directly.
if (!defined("ABSPATH")) {
    exit();
}

// Include Files.
$plugin_path = plugin_dir_path(__FILE__);
require_once $plugin_path . "/Inc/Assets.php";
require_once $plugin_path . "/Admin/Admin.php";
require_once $plugin_path . "/Admin/Admin-ajax.php";
require_once $plugin_path . "/Inc/Variable.php";
require_once $plugin_path . "/Inc/Frontend-ajax.php";
require_once $plugin_path . "/Inc/License/License.php";
require_once $plugin_path . "/Inc/Dynamic-style/Dynamic-css.php";

/**
 * The main class for the Quick Cart & Product Variations Table (Pro).
 *
 * @since 1.0.0
 */
final class QuickVariablePro
{
    /**
     * Construct the plugin instance and initialize it.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->init();

        add_action("wp_head",[$this,"custom_css_for_oceanwp"]);
    }

    /**
     * Initializes the plugin's functionalities.
     *
     * @since 1.0.0
     */
    private function init()
    {
        new Quickassets();

        if (is_admin()) {
            new QUICK_admin();
        }

        if (!is_admin()) {
            new Quickvariables();
            new QuickDynamicStyle();
        }
    }

    /*Compatible With themes*/

    public function custom_css_for_oceanwp(){
        if( wp_get_theme()->get('Name') === 'OceanWP' || wp_get_theme()->get('Name') === 'Kadence' ) {
            $custom_css = "
            body.archive.woocommerce ul.products .product {
                overflow: unset;
            }";

            wp_add_inline_style('woocommerce-general', $custom_css);
        }
    }

    /*Compatible With themes end*/
}

$instance = new QuickVariablePro();
