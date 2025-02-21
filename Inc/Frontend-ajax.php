<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart_handler');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart_handler');

add_action('wp_ajax_load_more_variations', 'load_more_variations');
add_action('wp_ajax_nopriv_load_more_variations', 'load_more_variations');

/**
 * Next Previous click ajax request for variation table
 *
 * @since 1.0.0
 * @return void
 */
function load_more_variations() {

    if (!isset($_POST['pagination_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['pagination_nonce'])), 'woocommerce_ajax_add_to_cart')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    global $post;
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $page       = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $product    = wc_get_product($product_id);
    if (!$product || !$product->is_type('variable')) {
        wp_send_json_error('Invalid product');
    }

    $enable_global_stock_management = $product->get_manage_stock();
    $global_stock_quantity          = $enable_global_stock_management ? $product->get_stock_quantity() : null;
    $all_attributes                 = $product->get_attributes();
    $variableSetting                = get_option('variable_all_checked', array());
    $imageHideShow                  = isset($variableSetting['imageHideShow']) ? $variableSetting['imageHideShow'] : 'true';
    $skuHideShow                    = isset($variableSetting['skuHideShow']) ? $variableSetting['skuHideShow'] : 'true';
    $allAttributeHideShow           = isset($variableSetting['allAttributeHideShow']) ? $variableSetting['allAttributeHideShow'] : 'true';
    $priceHideShow                  = isset($variableSetting['priceHideShow']) ? $variableSetting['priceHideShow'] : 'true';
    $quantityHideShow               = isset($variableSetting['quantityHideShow']) ? $variableSetting['quantityHideShow'] : 'true';
    $actionHideShow                 = isset($variableSetting['actionHideShow']) ? $variableSetting['actionHideShow'] : 'true';
    $cartButtonText                 = isset($variableSetting['cartButtonText']) ? $variableSetting['cartButtonText'] : 'Add-to-cart';
    $showDoublePrice                = isset($variableSetting['showDoublePrice']) ? $variableSetting['showDoublePrice'] : 'true';
    $quickCartIcon                  = isset($variableSetting['quickCartIcon']) ? $variableSetting['quickCartIcon'] : 'fa fa-shopping-cart';
    $popUPImageShow                 = isset($variableSetting['popUPImageShow']) ? $variableSetting['popUPImageShow'] : 'thumbnail';
    $showGalleyImageIntoPopup       = isset($variableSetting['showGalleyImageIntoPopup']) ? $variableSetting['showGalleyImageIntoPopup'] : 'true';
    $per_page                       = isset($variableSetting['tableRowPagination']) ? $variableSetting['tableRowPagination'] : '5';
    $variations                     = $product->get_available_variations();
    $total_variations               = count($variations);
    $total_pages                    = ceil($total_variations / $per_page);
    $offset                         = ($page - 1) * $per_page;
    $current_variations             = array_slice($variations, $offset, $per_page);

    ob_start();

    $variations = $product->get_available_variations();

    usort($variations, function($a, $b) {
        $skuA = $a['sku'];
        $skuB = $b['sku'];
        return strcmp($skuA, $skuB);
    });

    usort($variations, function($a, $b) {

        $variationA = new WC_Product_Variation($a['variation_id']);
        $variationB = new WC_Product_Variation($b['variation_id']);
        $priceA     = $variationA->get_price();
        $priceB     = $variationB->get_price();

        if ($priceA === false || $priceB === false) {
            return 0;
        }
        return $priceA - $priceB;
    });

    foreach ($all_attributes as $attribute_name => $attribute) {
        usort($variations, function($a, $b) use ($attribute_name) {

            $attrA = $a['attributes'][$attribute_name] ?? '';
            $attrB = $b['attributes'][$attribute_name] ?? '';

            return strcmp($attrA, $attrB);
        });
    }
    foreach ($current_variations as $var) {
        $variation_id             = $var['variation_id'];
        $variation                = new WC_Product_Variation($variation_id);
        $variation_stock_quantity = $variation->get_manage_stock() ? $variation->get_stock_quantity() : null;
        $gallery_images           = get_post_meta($variation_id, '_variation_gallery_images', true);
        $image_ids                = $gallery_images ? explode(',', $gallery_images) : [];
        $thumbnail_id             = $variation->get_image_id();
        $thumbnail_url            = $thumbnail_id ? wp_get_attachment_image_url($thumbnail_id, "thumbnail") : '';
        $stock_status             = $variation->is_on_sale();
        ?>
        <tr class="variation-row" data-variation-id="<?php echo esc_attr($variation_id); ?>" data-stock-status="<?php echo esc_attr($stock_status); ?>" data-gallery-images="<?php echo esc_attr(wp_json_encode($image_ids)); ?>">

            <?php if ($imageHideShow === "true") { ?>
                <td class="table_image">
                    <?php
                    echo wp_get_attachment_image(
                        $thumbnail_id,
                        esc_attr($popUPImageShow),
                        false,
                        array(
                            'alt' => esc_attr($variation->get_name()),
                            'class' => 'gallery-trigger',
                            'style' => 'cursor: pointer; ',
                            'data-gallery-onoff' => esc_attr($showGalleyImageIntoPopup),
                            'data-gallery' => esc_attr(wp_json_encode(array_map(function ($image_id) use ($popUPImageShow) {
                                $image_size = in_array($popUPImageShow, ['thumbnail', 'medium', 'large', 'full']) ? $popUPImageShow : 'thumbnail';
                                return wp_get_attachment_image_src($image_id, $image_size)[0] ?? '';
                            }, $image_ids))),

                        )
                    );
                    ?>
                </td>

                <?php
            }?>

            <?php if ($skuHideShow === "true"){
                ?>
                <td style="padding: 20px; text-align: center" class="quick-variable-title variable-sku"><?php echo esc_html($variation->get_sku()); ?></td>
                <?php
            }?>


            <?php if ($allAttributeHideShow === "true"){
                foreach ($all_attributes as $attribute_name => $attribute) {
                    $attribute_value = $variation->get_attribute($attribute_name);

                    if (empty($attribute_value)) {

                        echo "<td><select class='quick-attribute-select' name='attribute_" . esc_attr($attribute_name) . "' data-attribute-name='" . esc_attr($attribute_name) . "'>";

                        if ($attribute->is_taxonomy()) {
                            $options = wc_get_product_terms($product->get_id(), $attribute_name, ['fields' => 'names']);
                        } else {
                            $options = $attribute->get_options();
                        }

                        foreach ($options as $option) {
                            echo "<option value='" . esc_attr($option) . "'>" . esc_html($option) . "</option>";
                        }

                        echo "</select></td>";
                    } else {

                        echo "<td  class='quick-variable-title quick-attribute-text'  data-attribute-name='" . esc_attr($attribute_name) . "' name='attribute_" . esc_attr($attribute_name) . "'>" . esc_html($attribute_value) . "</td>";
                    }
                }
            }
            ?>

            <?php if ($priceHideShow === "true"){
                ?>
                <td class='variable-price quick-variable-title'><?php
                    if ($showDoublePrice === 'true'){
                        ?> <span><?php echo wp_kses_post($variation->get_price_html()); ?> </span> <?php
                    }else{
                        $sale_price = $variation->get_sale_price();
                        if($sale_price) {
                            ?> <span><?php echo wp_kses_post(wc_price($sale_price)); ?> </span> <?php
                        } else {
                            ?> <span><?php echo wp_kses_post(wc_price($variation->get_regular_price()));?> </span> <?php
                        }
                    } ?></td>
                <?php
            }?>

            <?php if ($quantityHideShow === "true"){
                ?>
                <td>
                    <div class="quick-quantity-container" style="margin-bottom: 10px">
                        <button class="quick-quantity-decrease" id="decrease">-</button>
                        <input  type="text" id="quantity" autocomplete="off" class="quick-quantity-input" value="1" data-max="<?php echo esc_attr($variation_stock_quantity ?: $global_stock_quantity ?: 99); ?>">
                        <button class="quick-quantity-increase" id="increase">+</button>
                    </div>
                    <div class="quick-cart-notification quick-hidden"></div>
                </td>
                <?php
            }?>

            <?php if ($actionHideShow === "true"){
                ?>
                <td class="stock-notification" style="padding: 20px; text-align: center ; justify-items: center">
                    <?php if (0 === ($variation_stock_quantity) || $variation->get_stock_status() === "outofstock") : ?>
                        <p><?php esc_html_e('Out Of Stock', 'product-variation-table-with-quick-cart'); ?></p>
                    <?php else : ?>
                        <button style="width: 100%; text-align: center" class="quick-add-to-cart" data-productId="<?php echo esc_attr($product->get_id()); ?>" data-variationId="<?php echo esc_attr($variation_id); ?>">
                            <i class="<?php echo esc_attr($quickCartIcon); ?> cart-icon-remove" aria-hidden="true"></i>

                            <span style="margin-left: 3px"><?php echo esc_html($cartButtonText); ?></span>
                        </button>
                    <?php endif; ?>
                </td>
                <?php
            }?>

        </tr>
        <?php
    }
    $html = ob_get_clean();

    wp_send_json_success([
        'html' => $html,
        'total_pages' => $total_pages,
        'current_page' => $page,
    ]);
}


/**
 * Add to cart handel by ajax. It includes frontend-script.js
 *
 * @since 1.0.0
 * @return void
 * @throws Exception
 */
function woocommerce_ajax_add_to_cart_handler() {

    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'woocommerce_ajax_add_to_cart')) {
        wp_send_json_error(['message' => 'Nonce expired, please reload the page.']);
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