<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $product;
global $post;
$variableSetting          = get_option('variable_all_checked', array());
$quickCarouselAutoplay    = isset($variableSetting['quickCarouselAutoplay']) ? $variableSetting['quickCarouselAutoplay'] : 'true';
$quickCarouselOnOff       = isset($variableSetting['quickCarouselOnOff']) ? $variableSetting['quickCarouselOnOff'] : '';
$showDoublePrice          = isset($variableSetting['showDoublePrice']) ? $variableSetting['showDoublePrice'] : 'true';
$carouselImageSize        = isset($variableSetting['carouselImageSize']) ? $variableSetting['carouselImageSize'] : '';
$metaVariableListTemplate = get_post_meta($post->ID, '_quick_cart_carousel_meta', true);

if (isset($product) && $product->is_type("variable")) {

    $this->quickVariablePopup();
    if(!empty($quickCarouselOnOff === 'true')) {
        if ($metaVariableListTemplate === 'true' || $metaVariableListTemplate === '') {
    ?>
    <div class="quick-variable-slide" data-autoplay="<?php echo esc_attr($quickCarouselAutoplay); ?>" ><?php
        $variations                     = $product->get_available_variations();
        $enable_global_stock_management = $product->get_manage_stock();
        $global_stock_quantity          = $product->get_stock_quantity();
        $attributesName                 = $product->get_attributes();
        $variationData                  = array();

        foreach ($variations as $var) {

            $variation_id               = $var['variation_id'];
            $variation                  = wc_get_product($variation_id);
            $parentProductID            = $variation->get_parent_id();
            $parentProduct              = wc_get_product($parentProductID);
            $productSlug                = $parentProduct->get_slug();
            $baseURL                    = get_permalink($parentProductID);
            $attributes                 = $variation->get_variation_attributes();
            $queryString                = http_build_query($attributes);
            $variationURL               = $baseURL . '?' . $queryString;
            $variation                  = new WC_Product_Variation($variation_id);
            $variation_stock_quantity   = $variation->get_stock_quantity();
            $variation_stock_status     = $variation->get_stock_status();
            $variation_stock_management = $variation->get_manage_stock();
            $sku                        = $variation->get_sku();
            $attributes                 = $variation->get_attributes();
            $index                      = 0;
            $variationsList             = [];
            $options                    = "";
            $label_name                 = "";

            foreach ($attributesName as $key => $attribute) {
                $reflection      = new ReflectionClass($attribute);
                $dataProperty    = $reflection->getProperty("data");
                $dataProperty->setAccessible(true);
                $data   = $dataProperty->getValue($attribute);

                if ($attribute->is_taxonomy()) {
                    $options    = wc_get_product_terms($product->get_id(), $key, ['fields' => 'names']);
                    $label_name = wc_attribute_label($key);
                } else {
                    $options = $attribute->get_options();
                    $label_name = wc_attribute_label($key);
                }
                $variationsList[$key] = [
                        'options' => $options,
                        'label' => $label_name
                ];
            }

            if ($showDoublePrice === 'true'){
                $price_html = $variation->get_price_html();
            }else{
                $sale_price = $variation->get_sale_price();
                if($sale_price) {
                    $price_html = wc_price($sale_price);
                } else {
                    $price_html = wc_price($variation->get_regular_price());
                }
            }

            $thumbnail_id       = $variation->get_image_id();
            $thumbnail_html     = wp_get_attachment_image($thumbnail_id, esc_attr($carouselImageSize), false, [
                'alt' => esc_attr($variation->get_name()),
                'height' => '100px',
                'width' => '100px'
            ]);
            $thumbnail_url      = wp_get_attachment_image_src($thumbnail_id, "thumbnail");
            $thumbnail_url      = $thumbnail_url ? $thumbnail_url[0] : "";
            $variableSetting    = get_option("variable_all_checked", []);
            $variableHoverClick = isset($variableSetting["hoverClickValue"][0]) ? $variableSetting["hoverClickValue"][0] : "";

            $variationData      = [
                   "name"                    => $product->get_name(),
                   "sku"                     => $sku,
                   "product_id"              => $product->get_id() ,
                   "excerpt"                 => $product->get_short_description(),
                   "variableClickHover"      => $variableHoverClick,
                   "variationPrice"          => $price_html,
                   "variationId"             => $variation_id,
                   'variationURL'            => $variationURL,
                   "variationQuantity"       => $variation_stock_quantity ,
                   "variationStockStatus"    => $variation_stock_status ,
                   "variationStockManage"    => $variation_stock_management ,
                   "globalStockManagement"   => $enable_global_stock_management,
                   "globalStockQuantity"     => $global_stock_quantity,
                   "variation_set_attribute" => $attributes,
            ];
            ?>

            <div class="quick-slide-variable"
                 data-variation="<?php echo esc_attr(wp_json_encode($variationData, true)); ?>"
                 data-variationsList="<?php echo esc_attr(wp_json_encode($variationsList)); ?>">
                <?php echo wp_kses_post($thumbnail_html); ?>
            </div>

            <?php


        } ?>
    </div>
    <?php
        }
    }
}

