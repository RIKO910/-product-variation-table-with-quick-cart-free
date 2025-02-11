<?php

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart_handler');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart_handler');


/**
 * Add to cart handel by ajax. It includes frontend-script.js
 *
 * @since 1.0.0
 * @return void
 * @throws Exception
 */
function woocommerce_ajax_add_to_cart_handler() {

    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'woocommerce_ajax_add_to_cart')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }

    if (!isset($_POST['product_id'])) {
        wp_send_json_error(['message' => 'Invalid request. Product ID is missing.']);
    }

    if (!isset($_POST['variation_id'])) {
        wp_send_json_error(['message' => 'Invalid request. Variation ID is missing.']);
    }

    if (!isset($_POST['variation'])) {
        wp_send_json_error(['message' => 'Invalid request. Variation is missing.']);
    }

    $product_id              = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity                = empty($_POST['quantity']) ? 1 : wc_stock_amount(absint(wp_unslash($_POST['quantity'])));
    $variation_id            = absint(wp_unslash($_POST['variation_id']));
    $variation               = array_map('sanitize_text_field', wp_unslash($_POST['variation']));
    $passed_validation       = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $variableSetting         = get_option('variable_all_checked', array());
    $addToCartSuccessMessage = isset($variableSetting['addToCartSuccessMessage']) ? $variableSetting['addToCartSuccessMessage'] : 'Successfully added to cart.';
    $addToCartSuccessColor   = isset($variableSetting['addToCartSuccessColor']) ? $variableSetting['addToCartSuccessColor'] : '#fff';
    $addToCartErrorColor     = isset($variableSetting['addToCartErrorColor']) ? $variableSetting['addToCartErrorColor'] : '#FF0000';


    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation)) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);

        $response = array(
                'success' => true,
                'message' => $addToCartSuccessMessage,
                'color'   => $addToCartSuccessColor,
        );
        wp_send_json($response);
    } else {

        $product = wc_get_product($variation_id);

        if (!$product) {
            $error_message = 'The product does not exist.';
        } elseif (!$product->is_purchasable()) {
            $error_message = 'This product is not purchasable.';
        } elseif (!$product->is_in_stock()) {
            $error_message = 'This product is out of stock.';
        } else {
            $error_message = 'Could not add the product to the cart.';
        }

        $response = array(
                'error' => true,
                'message' => $error_message,
                'color' => $addToCartErrorColor,
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id),
        );
        wp_send_json($response);
    }

    wp_die();
}