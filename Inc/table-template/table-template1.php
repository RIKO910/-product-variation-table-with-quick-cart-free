<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $product;
global $post;
if (isset($product) && $product->is_type("variable")) {
    $product_id                     = $product->get_id();
    $enable_global_stock_management = $product->get_manage_stock();
    $global_stock_quantity          = $enable_global_stock_management ? $product->get_stock_quantity() : null;
    $all_attributes                 = $product->get_attributes();
    $variableSetting                = get_option('variable_all_checked', array());
    $quickTableOnOff                = isset($variableSetting['quickTableOnOff']) ? $variableSetting['quickTableOnOff'] : '';
    $bulkSelectionHideShow          = isset($variableSetting['bulkSelectionHideShow']) ? $variableSetting['bulkSelectionHideShow'] : 'true';
    $imageHideShow                  = isset($variableSetting['imageHideShow']) ? $variableSetting['imageHideShow'] : 'true';
    $skuHideShow                    = isset($variableSetting['skuHideShow']) ? $variableSetting['skuHideShow'] : 'true';
    $allAttributeHideShow           = isset($variableSetting['allAttributeHideShow']) ? $variableSetting['allAttributeHideShow'] : 'true';
    $priceHideShow                  = isset($variableSetting['priceHideShow']) ? $variableSetting['priceHideShow'] : 'true';
    $quantityHideShow               = isset($variableSetting['quantityHideShow']) ? $variableSetting['quantityHideShow'] : 'true';
    $actionHideShow                 = isset($variableSetting['actionHideShow']) ? $variableSetting['actionHideShow'] : 'true';
    $onSaleHideShow                 = isset($variableSetting['onSaleHideShow']) ? $variableSetting['onSaleHideShow'] : 'true';
    $searchOptionHideShow           = isset($variableSetting['searchOptionHideShow']) ? $variableSetting['searchOptionHideShow'] : 'true';
    $bulkAddToCartPosition          = isset($variableSetting['bulkAddToCartPosition']) ? $variableSetting['bulkAddToCartPosition'] : 'after';
    $designSingleProductPageMobile  = isset($variableSetting['designSingleProductPageMobile']) ? $variableSetting['designSingleProductPageMobile'] : 'template_1';
    $cartButtonText                 = isset($variableSetting['cartButtonText']) ? $variableSetting['cartButtonText'] : 'Add-to-cart';
    $onSaleNameChange               = isset($variableSetting['onSaleNameChange']) ? $variableSetting['onSaleNameChange'] : 'On Sale';
    $searchOptionTextChange         = isset($variableSetting['searchOptionTextChange']) ? $variableSetting['searchOptionTextChange'] : 'Search...';
    $showPopUpImage                 = isset($variableSetting['showPopUpImage']) ? $variableSetting['showPopUpImage'] : 'true';
    $tableTemplateTwoEnable         = isset($variableSetting['tableTemplateTwoEnable']) ? $variableSetting['tableTemplateTwoEnable'] : '';
    $titleHideShow                  = isset($variableSetting['titleHideShow']) ? $variableSetting['titleHideShow'] : 'true';
    $descriptionHideShow            = isset($variableSetting['descriptionHideShow']) ? $variableSetting['descriptionHideShow'] : 'true';
    $weightDimensionsHideShow       = isset($variableSetting['weightDimensionsHideShow']) ? $variableSetting['weightDimensionsHideShow'] : 'true';
    $designAddCartTableTemplate2    = isset($variableSetting['designAddCartTableTemplate2']) ? $variableSetting['designAddCartTableTemplate2'] : 'template_1';
    $selectAllNameChange            = isset($variableSetting['selectAllNameChange']) ? $variableSetting['selectAllNameChange'] : 'Select All';
    $showDoublePrice                = isset($variableSetting['showDoublePrice']) ? $variableSetting['showDoublePrice'] : 'true';
    $stockStatusHideShow            = isset($variableSetting['stockStatusHideShow']) ? $variableSetting['stockStatusHideShow'] : 'true';
    $quickCartIcon                  = isset($variableSetting['quickCartIcon']) ? $variableSetting['quickCartIcon'] : 'fa fa-shopping-cart';
    $quickCartIconImageLink         = isset($variableSetting['quickCartIconImageLink']) ? $variableSetting['quickCartIconImageLink'] : '';
    $popUPImageShow                 = isset($variableSetting['popUPImageShow']) ? $variableSetting['popUPImageShow'] : 'thumbnail';
    $showGalleyImageIntoPopup       = isset($variableSetting['showGalleyImageIntoPopup']) ? $variableSetting['showGalleyImageIntoPopup'] : 'true';
    $tableRowPagination             = isset($variableSetting['tableRowPagination']) ? $variableSetting['tableRowPagination'] : '5';
    $metaTableTemplate2Enable       = get_post_meta($post->ID, '_table_template2_is_enabled', true);
    $metaTableTemplate2CartStyle    = get_post_meta($post->ID, '_table_template2_cart_section_style_template', true);
    $variations                     = $product->get_available_variations();
    $variation_count                = count($variations);
    ?>
    <div class="table-template-max-width">
        <div id="loading-spinner-pagination-table" style="display: none; text-align: center;">
            <i class="fa fa-spinner fa-spin "></i>
        </div>

        <table id="quick-variable-table" data-pagination-table="<?php echo esc_attr($tableRowPagination); ?>" data-Variation-count="<?php echo esc_attr($variation_count); ?>" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
            <tr>

                <?php if ($imageHideShow === "true"){
                    ?>
                    <th><?php esc_html_e('Image', 'product-variation-table-with-quick-cart'); ?></th>
                    <?php
                }?>

                <?php if ($skuHideShow === "true"){
                    ?>

                    <th>
                        <span style="display: inline-block; margin-top: 9px">
                            <?php esc_html_e('SKU', 'product-variation-table-with-quick-cart'); ?>
                        </span>
                        <span style=" float: right; display: grid;" id="sku-sort-arrows">
                            <span style="height: 10px" class="dashicons dashicons-arrow-up" id="sort-arrow-up"></span>
                            <span style="height: 10px" class="dashicons dashicons-arrow-down" id="sort-arrow-down"></span>
                        </span>
                    </th>

                    <?php
                }?>

                <?php if ($allAttributeHideShow === "true"){
                    foreach ($all_attributes as $attribute_name => $attribute) {

                        $reflection   = new ReflectionClass($attribute);
                        $dataProperty = $reflection->getProperty("data");
                        $dataProperty->setAccessible(true);
                        $data = $dataProperty->getValue($attribute);

                        if (taxonomy_exists($attribute_name) && isset($data["variation"]) && $data["variation"]) {
                            $taxonomy = get_taxonomy($attribute_name);
                            $label    = str_replace("Product ", "", $taxonomy->label);

                            ?>
                            <th >
                                <span style="display: inline-block; margin-top: 9px">
                                    <?php echo esc_html(ucfirst($label)); ?>
                                </span>
                                <span style="float: right; display: grid" class="attribute-sort-arrows" data-attribute="<?php echo esc_attr($attribute_name); ?>">
                                    <span style="height: 10px" class="dashicons dashicons-arrow-up" id="sort-toggle-<?php echo esc_attr($attribute_name); ?>"></span>
                                    <span style="height: 10px" class="dashicons dashicons-arrow-down" id="sort-toggle-<?php echo esc_attr($attribute_name); ?>"></span>
                                </span>
                            </th>
                            <?php
                        } elseif (isset($data["variation"]) && $data["variation"]) {
                            ?>
                            <th >
                                <span style="display: inline-block; margin-top: 9px">
                                    <?php echo esc_html(ucfirst($attribute_name)); ?>
                                </span>
                                <span style="float: right; display: grid" class="attribute-sort-arrows" data-attribute="<?php echo esc_attr($attribute_name); ?>">
                                    <span style="height: 10px" class="dashicons dashicons-arrow-up" id="sort-arrow-up-<?php echo esc_attr($attribute_name); ?>"></span>
                                    <span style="height: 10px" class="dashicons dashicons-arrow-down" id="sort-arrow-down-<?php echo esc_attr($attribute_name); ?>"></span>
                                </span>
                            </th>
                            <?php
                        }
                    }
                }
                ?>

                <?php if ($priceHideShow === "true"){
                    ?>
                    <th >
                        <span style="display: inline-block; margin-top: 9px">
                        <?php esc_html_e('Price', 'product-variation-table-with-quick-cart'); ?>
                        </span>
                        <span style="float: right; display: grid" id="price-sort-arrows">
                            <span style="height: 10px" class="dashicons dashicons-arrow-up" id="price-sort-arrow-up"></span>
                            <span style="height: 10px" class="dashicons dashicons-arrow-down" id="price-sort-arrow-down"></span>
                        </span>
                    </th>
                    <?php
                }?>

                <?php if ($quantityHideShow === "true"){
                    ?>
                    <th><?php esc_html_e('Quantity', 'product-variation-table-with-quick-cart'); ?></th>
                    <?php
                }?>

                <?php if ($actionHideShow === "true"){
                    ?>
                    <th><?php esc_html_e('Action', 'product-variation-table-with-quick-cart'); ?></th>
                    <?php
                }?>

            </tr>

            <?php
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
            $current_variations = array_slice($variations, 0, $tableRowPagination);

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
            ?>
        </table>

        <!-- Pagination Controls -->
        <div id="pagination">
            <button style="margin-right: 5px" id="prevPage"><?php esc_html_e('Previous', 'product-variation-table-with-quick-cart'); ?></button>
            <button id="nextPage"><?php esc_html_e('Next', 'product-variation-table-with-quick-cart'); ?></button>
        </div>
    </div>
    <?php
}
