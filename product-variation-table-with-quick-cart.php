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
final class QuickVariablePro{

    /**
     * Construct the plugin instance and initialize it.
     *
     * @since 1.0.0
     */
    public function __construct(){
        $this->init();
        add_action('admin_init', array($this,'quick_variable_plugin_redirect'));
        add_action('admin_init', array($this,'quick_variable_plugin_review'));
        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'variation_table_quick_cart_settings_link') );
        add_action("wp_head",[$this,"custom_css_for_oceanwp"]);
        add_filter('plugin_row_meta', array($this, 'quick_variable_plugin_support_link'), 10, 2);

    }

    /**
     * Initializes the plugin's functionalities.
     *
     * @return void
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

    /**
     * Redirect to settings page on activation.
     *
     * @return void
     * @since 1.0.0
     */
    public function quick_variable_plugin_redirect(){
        if (get_transient('quick_variable_plugin_activation_redirect')) {
            delete_transient('quick_variable_plugin_activation_redirect');
            wp_safe_redirect(admin_url('admin.php?page=quick-variable-setting'));
            exit;
        }
        $install_date            = get_option( 'quick_variable_activation_date' );
        $install_date_plus_7days = strtotime("+7 days", $install_date);
        $review_dismissed        = get_option( 'quick_variable_review_dismissed' );
        $now                     = strtotime( "now" );
        if ( $install_date_plus_7days <= $now && !$review_dismissed ) {
            add_action( 'admin_notices', array($this, 'quick_variable_display_admin_notice') );
        }
    }

    /**
     * Add option for notice review dismissed.
     *
     * @return void
     * @since 1.0.0
     */
    public function quick_variable_plugin_review(){

        $qvt_review_dismissed  = "";

        if ( isset( $_GET['dismiss-review'] ) ) {
            $qvt_review_dismissed = sanitize_text_field( wp_unslash($_GET['dismiss-review']) );
        }

        if ( isset($_GET['_nonce'])) {
            $_nonce = sanitize_text_field( wp_unslash( $_GET['_nonce'] ) );
            if (wp_verify_nonce( $_nonce, 'qvt_nonce' ) && intval( $qvt_review_dismissed ) === 1 ) {
                add_option( 'quick_variable_review_dismissed', true );
            }
        }
    }

    /**
     * Settings button into plugin directory.
     *
     * @return array
     * @since 1.0.0
     */
    public function variation_table_quick_cart_settings_link( $links ) {
        $action_links = array(
            'settings' => '<a href="' . admin_url( 'admin.php?page=quick-variable-setting' ) . '" aria-label="' . esc_attr__( 'View Variation Table with Quick Cart Settings', 'product-variation-table-with-quick-cart' ) . '">' . esc_html__( 'Settings', 'product-variation-table-with-quick-cart' ) . '</a>',
        );

        return array_merge( $action_links, $links );
    }

    /**
     * Add a support link to the plugin details.
     *
     * @param $links, $file
     * @since 1.0.0
     */
    function quick_variable_plugin_support_link($links, $file) {
        if ($file === plugin_basename(__FILE__)) {
            $support_link = '<a href="https://wa.me/01926167151" target="_blank" style="color: #0073aa;">' . __('Support', 'product-variation-table-with-quick-cart') . '</a>';
            $dock_link    = '<a href="https://www.wooxperto.com/woocommerce-product-variations-table-with-quick-cart-plguin/" target="_blank" style="color: #0073aa;">' . __('Docs', 'product-variation-table-with-quick-cart') . '</a>';
            $links[] = $support_link;
            $links[] = $dock_link;
        }
        return $links;
    }

    /**
     * Notice show.
     *
     * @return void
     * @since 1.0.0
     */
    public function quick_variable_display_admin_notice() {
        ?>
        <div id="qvt-review-notice" class="updated qvt_review_notices">
            <span class="logo"></span>
            <ul class="right_contes">
                <li><?php echo esc_html__('Hello! Seems like you have used Product Variation Table with Quick Cart for this website — Thanks a lot!', 'product-variation-table-with-quick-cart'); ?></li>
                <li class="button_wrap">
                    <a href="<?php echo esc_url('https://www.wooxperto.com/woocommerce-product-variations-table-with-quick-cart-plguin/'); ?>" type="button" class="qvt-dismiss-btn" target="_blank">
                        <i class="fas fa-check-circle"></i> <?php esc_html_e('Ok, you deserved it', 'product-variation-table-with-quick-cart'); ?>
                    </a>
                    <button type="button" class="qvt-dismiss-btn">
                        <i class="fas fa-thumbs-down"></i> <?php esc_html_e('No thanks', 'product-variation-table-with-quick-cart'); ?>
                    </button>
                </li>
            </ul>
        </div>
        <?php
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

/**
 * Function to execute on activation.
 *
 * @return void
 * @since 1.0.0
 */
function quick_variable_plugin_activate(){

    set_transient('quick_variable_plugin_activation_redirect', true, 30);
    $now = strtotime( "now" );
    add_option( 'quick_variable_activation_date', $now );
}

/**
 * Register activation hook.
 *
 * @return void
 * @since 1.0.0
 */
register_activation_hook(__FILE__, 'quick_variable_plugin_activate');

$instance = new QuickVariablePro();




