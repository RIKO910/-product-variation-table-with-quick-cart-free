<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$variableSetting                       = get_option('variable_all_checked', array());
$variableHoverClick                    = isset($variableSetting['hoverClickValue'][0]) ? $variableSetting['hoverClickValue'][0] : '';
$showAttributeSwatchesArchive          = isset($variableSetting['showAttributeSwatchesArchive'][0]) ? $variableSetting['showAttributeSwatchesArchive'][0] : '';
$variableTooltipPosition               = isset($variableSetting['boxPositionValue'][0]) ? $variableSetting['boxPositionValue'][0] : '';
$variableDetailsTitle                  = isset($variableSetting['variableDetailsTitle'][0]) ? $variableSetting['variableDetailsTitle'][0] : '';
$variableDetailsImage                  = isset($variableSetting['variableDetailsImage'][0]) ? $variableSetting['variableDetailsImage'][0] : '';
$variableDetailsExcerpt                = isset($variableSetting['variableDetailsExcerpt'][0]) ? $variableSetting['variableDetailsExcerpt'][0] : '';
$variableDetailsSKU                    = isset($variableSetting['variableDetailsSKU'][0]) ? $variableSetting['variableDetailsSKU'][0] : '';
$variableDetailsPrice                  = isset($variableSetting['variableDetailsPrice'][0]) ? $variableSetting['variableDetailsPrice'][0] : '';
$variableDetailsAttribute              = isset($variableSetting['variableDetailsAttribute'][0]) ? $variableSetting['variableDetailsAttribute'][0] : '';
$quickCartIcon                         = isset($variableSetting['quickCartIcon']) ? $variableSetting['quickCartIcon'] : 'fa fa-shopping-cart';
$quickCartIconImageLink                = isset($variableSetting['quickCartIconImageLink']) ? $variableSetting['quickCartIconImageLink'] : '';
$cartButtonText                        = isset($variableSetting['cartButtonText']) ? $variableSetting['cartButtonText'] : 'Add-to-cart';
$cartButtonBg                          = isset($variableSetting['cartButtonBg']) ? $variableSetting['cartButtonBg'] : '#007cba';
$cartButtonTextColor                   = isset($variableSetting['cartButtonTextColor']) ? $variableSetting['cartButtonTextColor'] : '#fff';
$cartButtonTextHoverColor              = isset($variableSetting['cartButtonTextHoverColor']) ? $variableSetting['cartButtonTextHoverColor'] : '#000000';
$tooltipBgColor                        = isset($variableSetting['tooltipBg']) ? $variableSetting['tooltipBg'] : '#000';
$tooltipTextColor                      = isset($variableSetting['tooltipTextColor']) ? $variableSetting['tooltipTextColor'] : '#fff';
$addToCartSuccessColor                 = isset($variableSetting['addToCartSuccessColor']) ? $variableSetting['addToCartSuccessColor'] : '#fff';
$addToCartErrorColor                   = isset($variableSetting['addToCartErrorColor']) ? $variableSetting['addToCartErrorColor'] : '#FF0000';
$quantityBg                            = isset($variableSetting['quantityBg']) ? $variableSetting['quantityBg'] : '#007bff';
$quantityBorderColor                   = isset($variableSetting['quantityBorderColor']) ? $variableSetting['quantityBorderColor'] : '#ccc';
$quantityTextColor                     = isset($variableSetting['quantityTextColor']) ? $variableSetting['quantityTextColor'] : '#fff';
$quantityTextHoverColor                = isset($variableSetting['quantityTextHoverColor']) ? $variableSetting['quantityTextHoverColor'] : '#000000';
$quickCarouselAutoplay                 = isset($variableSetting['quickCarouselAutoplay']) ? $variableSetting['quickCarouselAutoplay'] : 'true';
$showDoublePrice                       = isset($variableSetting['showDoublePrice']) ? $variableSetting['showDoublePrice'] : 'true';
$nameImageRedirect                     = isset($variableSetting['nameImageRedirect']) ? $variableSetting['nameImageRedirect'] : 'true';
$carouselButtonBgColor                 = isset($variableSetting['CarouselButtonBg']) ? $variableSetting['CarouselButtonBg'] : '#000';
$carouselButtonIconColor               = isset($variableSetting['CarouselButtonIconColor']) ? $variableSetting['CarouselButtonIconColor'] : '#fff';
$galleryNavigationButtonIconColor      = isset($variableSetting['galleryNavigationButtonIconColor']) ? $variableSetting['galleryNavigationButtonIconColor'] : '#fff';
$galleryNavigationButtonIconHoverColor = isset($variableSetting['galleryNavigationButtonIconHoverColor']) ? $variableSetting['galleryNavigationButtonIconHoverColor'] : '#D0D0D0';
$galleryNavigationButtonBgColor        = isset($variableSetting['galleryNavigationButtonBgColor']) ? $variableSetting['galleryNavigationButtonBgColor'] : '#808080';
$galleryNavigationButtonBgHoverColor   = isset($variableSetting['galleryNavigationButtonBgHoverColor']) ? $variableSetting['galleryNavigationButtonBgHoverColor'] : '##2F3031';
$paginationButtonBgColor               = isset($variableSetting['paginationButtonBgColor']) ? $variableSetting['paginationButtonBgColor'] : '#007cba';
$paginationButtonHoverBgColor          = isset($variableSetting['paginationButtonHoverBgColor']) ? $variableSetting['paginationButtonHoverBgColor'] : '#045CB4';
$paginationButtonTextColor             = isset($variableSetting['paginationButtonTextColor']) ? $variableSetting['paginationButtonTextColor'] : '#ffffff';
$paginationButtonTextHoverColor        = isset($variableSetting['paginationButtonTextHoverColor']) ? $variableSetting['paginationButtonTextHoverColor'] : '#000000';
$tableHeadBgColor                      = isset($variableSetting['tableHeadBgColor']) ? $variableSetting['tableHeadBgColor'] : '#007cba';
$template2TableBgColor                 = isset($variableSetting['template2TableBgColor']) ? $variableSetting['template2TableBgColor'] : '#000000';
$template2DetailsSectionBgColor        = isset($variableSetting['template2DetailsSectionBgColor']) ? $variableSetting['template2DetailsSectionBgColor'] : '#FFFFFF';
$template2CartSectionBgColor           = isset($variableSetting['template2CartSectionBgColor']) ? $variableSetting['template2CartSectionBgColor'] : '#FBFBFB';
$bulkAddCartBgColor                    = isset($variableSetting['bulkAddCartBgColor']) ? $variableSetting['bulkAddCartBgColor'] : '#007cba';
$bulkAddCartTextColor                  = isset($variableSetting['bulkAddCartTextColor']) ? $variableSetting['bulkAddCartTextColor'] : '#FFFFFF';
$bulkAddCartHoverBgColor               = isset($variableSetting['bulkAddCartHoverBgColor']) ? $variableSetting['bulkAddCartHoverBgColor'] : '#007cba';
$bulkAddCartHoverTextColor             = isset($variableSetting['bulkAddCartHoverTextColor']) ? $variableSetting['bulkAddCartHoverTextColor'] : '#000000';
$tableHeadTextColor                    = isset($variableSetting['tableHeadTextColor']) ? $variableSetting['tableHeadTextColor'] : '#fff';
$tableVariableTitleColor               = isset($variableSetting['tableVariableTitleColor']) ? $variableSetting['tableVariableTitleColor'] : '#111111';
$quickTableBorder                      = isset($variableSetting['quickTableBorder']) ? $variableSetting['quickTableBorder'] : '0';
$showPopUpImage                        = isset($variableSetting['showPopUpImage']) ? $variableSetting['showPopUpImage'] : 'true';
$showGalleyImageIntoPopup              = isset($variableSetting['showGalleyImageIntoPopup']) ? $variableSetting['showGalleyImageIntoPopup'] : 'true';
$tableBorderColor                      = isset($variableSetting['tableBorderColor']) ? $variableSetting['tableBorderColor'] : '#e1e8ed';
$tableBgColorOdd                       = isset($variableSetting['tableBgColorOdd']) ? $variableSetting['tableBgColorOdd'] : 'transparent';
$tableBgColorEven                      = isset($variableSetting['tableBgColorEven']) ? $variableSetting['tableBgColorEven'] : '#f2f2f2';
$tableBgColorHover                     = isset($variableSetting['tableBgColorHover']) ? $variableSetting['tableBgColorHover'] : '#ddd';
$onSaleNameChange                      = isset($variableSetting['onSaleNameChange']) ? $variableSetting['onSaleNameChange'] : 'On Sale';
$selectAllNameChange                   = isset($variableSetting['selectAllNameChange']) ? $variableSetting['selectAllNameChange'] : 'Select All';
$tableRowPagination                    = isset($variableSetting['tableRowPagination']) ? $variableSetting['tableRowPagination'] : '5';
$listPagination                        = isset($variableSetting['listPagination']) ? $variableSetting['listPagination'] : '3';
$searchOptionTextChange                = isset($variableSetting['searchOptionTextChange']) ? $variableSetting['searchOptionTextChange'] : 'Search...';
$addToCartSuccessMessage               = isset($variableSetting['addToCartSuccessMessage']) ? $variableSetting['addToCartSuccessMessage'] : 'Successfully added to cart.';
$cartButtonBgHover                     = isset($variableSetting['cartButtonBgHover']) ? $variableSetting['cartButtonBgHover'] : '#045cb4';
$plusMinusBgColorHover                 = isset($variableSetting['quantityBgColorHover']) ? $variableSetting['quantityBgColorHover'] : '#0056b3';
$quickCarouselOnOff                    = isset($variableSetting['quickCarouselOnOff']) ? $variableSetting['quickCarouselOnOff'] : '';
$quickTableOnOff                       = isset($variableSetting['quickTableOnOff']) ? $variableSetting['quickTableOnOff'] : '';
$bulkSelectionHideShow                 = isset($variableSetting['bulkSelectionHideShow']) ? $variableSetting['bulkSelectionHideShow'] : '';
$imageHideShow                         = isset($variableSetting['imageHideShow']) ? $variableSetting['imageHideShow'] : 'true';
$skuHideShow                           = isset($variableSetting['skuHideShow']) ? $variableSetting['skuHideShow'] : 'true';
$titleHideShow                         = isset($variableSetting['titleHideShow']) ? $variableSetting['titleHideShow'] : 'true';
$descriptionHideShow                   = isset($variableSetting['descriptionHideShow']) ? $variableSetting['descriptionHideShow'] : 'true';
$weightDimensionsHideShow              = isset($variableSetting['weightDimensionsHideShow']) ? $variableSetting['weightDimensionsHideShow'] : 'true';
$allAttributeHideShow                  = isset($variableSetting['allAttributeHideShow']) ? $variableSetting['allAttributeHideShow'] : 'true';
$priceHideShow                         = isset($variableSetting['priceHideShow']) ? $variableSetting['priceHideShow'] : 'true';
$quantityHideShow                      = isset($variableSetting['quantityHideShow']) ? $variableSetting['quantityHideShow'] : 'true';
$stockStatusHideShow                   = isset($variableSetting['stockStatusHideShow']) ? $variableSetting['stockStatusHideShow'] : 'true';
$actionHideShow                        = isset($variableSetting['actionHideShow']) ? $variableSetting['actionHideShow'] : 'true';
$onSaleHideShow                        = isset($variableSetting['onSaleHideShow']) ? $variableSetting['onSaleHideShow'] : 'true';
$searchOptionHideShow                  = isset($variableSetting['searchOptionHideShow']) ? $variableSetting['searchOptionHideShow'] : 'true';
$bulkAddToCartPosition                 = isset($variableSetting['bulkAddToCartPosition']) ? $variableSetting['bulkAddToCartPosition'] : 'after';
$variationGalleryOnOff                 = isset($variableSetting['variationGalleryOnOff']) ? $variableSetting['variationGalleryOnOff'] : '';
$attributeGalleryOnOff                 = isset($variableSetting['attributeGalleryOnOff']) ? $variableSetting['attributeGalleryOnOff'] : '';
$designSingleProductPageMobile         = isset($variableSetting['designSingleProductPageMobile']) ? $variableSetting['designSingleProductPageMobile'] : 'template_1';
$variationTableTemplate                = isset($variableSetting['variationTableTemplate']) ? $variableSetting['variationTableTemplate'] : 'template_1';
$designAddCartTableTemplate2           = isset($variableSetting['designAddCartTableTemplate2']) ? $variableSetting['designAddCartTableTemplate2'] : 'template_1';
$quickCarouselPosition                 = isset($variableSetting['quickCarouselPosition']) ? $variableSetting['quickCarouselPosition'] : 'woocommerce_after_shop_loop_item';
$quickTablePosition                    = isset($variableSetting['quickTablePosition']) ? $variableSetting['quickTablePosition'] : 'woocommerce_after_single_product_summary';
$popUPImageShow                        = isset($variableSetting['popUPImageShow']) ? $variableSetting['popUPImageShow'] : 'thumbnail';
$galleryImageShow                      = isset($variableSetting['galleryImageShow']) ? $variableSetting['galleryImageShow'] : 'large';
$attributeGalleryImageShow             = isset($variableSetting['attributeGalleryImageShow']) ? $variableSetting['attributeGalleryImageShow'] : 'large';
$carouselImageSize                     = isset($variableSetting['carouselImageSize']) ? $variableSetting['carouselImageSize'] : 'thumbnail';
$listImageShow                         = isset($variableSetting['listImageShow']) ? $variableSetting['listImageShow'] : 'thumbnail';
$globallyTooltipOnOff                  = isset($variableSetting['globallyTooltipOnOff']) ? $variableSetting['globallyTooltipOnOff'] : '';
$variationSelectOnOff                  = isset($variableSetting['variationSelectOnOff']) ? $variableSetting['variationSelectOnOff'] : '';
$selectVariationTooltipBgColor         = isset($variableSetting['selectVariationTooltipBgColor']) ? $variableSetting['selectVariationTooltipBgColor'] : '#000000';
$selectVariationTooltipTextColor       = isset($variableSetting['selectVariationTooltipTextColor']) ? $variableSetting['selectVariationTooltipTextColor'] : '#FFFFFF';
$selectVariationButtonBgColor          = isset($variableSetting['selectVariationButtonBgColor']) ? $variableSetting['selectVariationButtonBgColor'] : '#0071a1';
$selectVariationButtonTextColor        = isset($variableSetting['selectVariationButtonTextColor']) ? $variableSetting['selectVariationButtonTextColor'] : '#FFFFFF';
$imageColorWidth                       = isset($variableSetting['imageColorWidth']) ? $variableSetting['imageColorWidth'] : '40';
$imageColorHeight                      = isset($variableSetting['imageColorHeight']) ? $variableSetting['imageColorHeight'] : '40';
$imageColorBorderRadius                = isset($variableSetting['imageColorBorderRadius']) ? $variableSetting['imageColorBorderRadius'] : '50';
$swatchesButtonBorderColor             = isset($variableSetting['swatchesButtonBorderColor']) ? $variableSetting['swatchesButtonBorderColor'] : '#000000';
$selectedVariationButtonBorderColor    = isset($variableSetting['selectedVariationButtonBorderColor']) ? $variableSetting['selectedVariationButtonBorderColor'] : '#0071a1';
$buttonWidth                           = isset($variableSetting['buttonWidth']) ? $variableSetting['buttonWidth'] : ' ';
$buttonHeight                          = isset($variableSetting['buttonHeight']) ? $variableSetting['buttonHeight'] : ' ';
$buttonBorderRadius                    = isset($variableSetting['buttonBorderRadius']) ? $variableSetting['buttonBorderRadius'] : '5';
$selectVariationTemplateOnOff          = isset($variableSetting['selectVariationTemplateOnOff']) ? $variableSetting['selectVariationTemplateOnOff'] : '';
$listLabelOnOff                        = isset($variableSetting['listLabelOnOff']) ? $variableSetting['listLabelOnOff'] : '';
$listSkuOnOff                          = isset($variableSetting['listSkuOnOff']) ? $variableSetting['listSkuOnOff'] : '';
$listPriceOnOff                        = isset($variableSetting['listPriceOnOff']) ? $variableSetting['listPriceOnOff'] : '';
$listQuantityOnOff                     = isset($variableSetting['listQuantityOnOff']) ? $variableSetting['listQuantityOnOff'] : '';
$listAttributeShow                     = isset($variableSetting['listAttributeShow']) ? $variableSetting['listAttributeShow'] : '';
$listTitleShow                         = isset($variableSetting['listTitleShow']) ? $variableSetting['listTitleShow'] : '';
$listBadgeShowOnOff                    = isset($variableSetting['listBadgeShowOnOff']) ? $variableSetting['listBadgeShowOnOff'] : '';
$listBadgeShowRight                    = isset($variableSetting['listBadgeShowRight']) ? $variableSetting['listBadgeShowRight'] : '';
$listBadgeDiscountFlatPrice            = isset($variableSetting['listBadgeDiscountFlatPrice']) ? $variableSetting['listBadgeDiscountFlatPrice'] : '';
$listBadgeBgColor                      = isset($variableSetting['listBadgeBgColor']) ? $variableSetting['listBadgeBgColor'] : '#FF5733';
$listBadgeTextColor                    = isset($variableSetting['listBadgeTextColor']) ? $variableSetting['listBadgeTextColor'] : '#ffffff';
$listBadgeHeight                       = isset($variableSetting['listBadgeHeight']) ? $variableSetting['listBadgeHeight'] : ' ';
$listBadgeWidth                        = isset($variableSetting['listBadgeWidth']) ? $variableSetting['listBadgeWidth'] : ' ';
$listForPercent                        = isset($variableSetting['listForPercent']) ? $variableSetting['listForPercent'] : '% OFF';
$listForFlat                           = isset($variableSetting['listForFlat']) ? $variableSetting['listForFlat'] : 'OFF';
$variationListTemplate                 = isset($variableSetting['variationListTemplate']) ? $variableSetting['variationListTemplate'] : 'template_1';

?>

<div class="quick-variable-dashboard">
    <div class="alert adminAlert quick-hidden">
    </div>

    <div class="tab">
        <button style="padding: 10px" class="tablinks active" onclick="openCity(event, 'general')"> <?php echo wp_kses('General Setting ','product-variation-table-with-quick-cart'); ?></button>
        <button style="padding: 10px" class="tablinks" onclick="openCity(event, 'carousel')"><?php echo wp_kses('Carousel Settings','product-variation-table-with-quick-cart'); ?></button>
        <button style="padding: 10px" class="tablinks" onclick="openCity(event, 'table')"> <?php echo wp_kses('Table Setting ','product-variation-table-with-quick-cart'); ?></button>
        <button style="padding: 10px" class="tablinks" onclick="openCity(event, 'select-variation')"><?php echo wp_kses('Variation Swatches','product-variation-table-with-quick-cart'); ?></button>
        <button style="padding: 10px" class="tablinks" onclick="openCity(event, 'select-variation-ul-li')">
            <?php echo wp_kses('Variation List ','product-variation-table-with-quick-cart'); ?>
            <span style="color: red;">★</span>
        </button>
        <button style="padding: 10px" class="tablinks" onclick="openCity(event, 'variation-gallery')">
            <?php echo wp_kses('Variation Gallery','product-variation-table-with-quick-cart'); ?>
            <span style="color: red;">★</span>
        </button>
        <button style="padding: 10px" class="tablinks" onclick="openCity(event, 'attribute-gallery')">
            <?php echo wp_kses('Attribute Gallery','product-variation-table-with-quick-cart'); ?>
            <span style="color: red;">★</span>
        </button>
        <button style="padding: 10px" class="tablinks" onclick="openCity(event, 'support')"><?php echo wp_kses('Support','product-variation-table-with-quick-cart'); ?></button>
    </div>

    <div id="general" class="tabcontent" style="display: block;">
        <div id="quickSwitchesWrapper">
            <h2><?php echo esc_html('Carousel and Table General Setting','product-variation-table-with-quick-cart'); ?></h2>

            <div class="quick-selections" style="display: flex; gap: 21.2%; align-items: center;">
                <h4><?php echo wp_kses('Show Sell Price If Available: ','product-variation-table-with-quick-cart'); ?></h4>
                <div class="quick-selectors-wrapper">
                    <div class="show-double-price">
                        <label class="switch">
                            <input type="checkbox" name="show-double-price" <?php if( $showDoublePrice == "true" ): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="quick-selections" style="display: flex; gap: 10.2%; align-items: center;">
                <h4><?php echo wp_kses('Add to Cart Icon (Font Awesome 5): ','product-variation-table-with-quick-cart-pro');?></h4>
                <div class="quick-selectors-wrapper">
                    <div class="icon-design" style="display: flex; gap: 10px; align-items: center;">

                        <?php
                        $variation_quick_cart_icon = [
                            'fa fa-shopping-cart',
                            'fa fa-cart-arrow-down',
                            'fa fa-cart-plus',
                            'fa none'
                        ];

                        $variation_quick_cart_icon_final = apply_filters('variation_quick_cart_icon', $variation_quick_cart_icon);

                        foreach ($variation_quick_cart_icon_final as $quick_cart_icon_final) {

                            ?>
                            <label style="display: flex; align-items: center; gap: 5px;">
                                <input type="radio" class="quick-cart-icon" name="quick_cart_icon" value="<?php echo esc_attr($quick_cart_icon_final); ?>"
                                    <?php echo ($quickCartIcon === $quick_cart_icon_final) ? 'checked' : ''; ?> />
                                <?php if ($quick_cart_icon_final === 'fa none') { ?>
                                    <span style="font-size: 16px; color: black">None</span>
                                <?php } else { ?>
                                    <i class="<?php echo esc_attr($quick_cart_icon_final); ?>" style="font-size: 20px;"></i>
                                <?php } ?>
                            </label>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="quick-add-to-cart-text"><strong><?php echo esc_html('Add to Cart Button Text:','product-variation-table-with-quick-cart'); ?></strong></label>
                    <input id="quick-add-to-cart-text" type="text" class="quick-add-to-cart-text" value="<?php echo  esc_attr($cartButtonText); ?>">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="add-to-cart-bg"><strong><?php echo esc_html('Add to Cart Button Background Color:','product-variation-table-with-quick-cart'); ?></strong></label>
                    <input id="add-to-cart-bg" name="add-to-cart-bg" value="<?php echo esc_attr($cartButtonBg); ?>" data-jscolor="{}">
                </div>
            </div>


            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="add-to-cart-bg-hover"><strong><?php echo wp_kses('Add to Cart Button Background Hover Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="add-to-cart-bg-hover" name="add-to-cart-bg-hover" value="<?php echo esc_attr($cartButtonBgHover); ?>" data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="add-to-cart-text"><strong><?php echo wp_kses('Add to Cart Button Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="add-to-cart-text" name="add-to-cart-text" value="<?php echo esc_attr($cartButtonTextColor); ?>" data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="add-to-cart-text-hover-color"><strong><?php echo wp_kses('Add to Cart Button Text Hover Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="add-to-cart-text-hover-color" name="add-to-cart-text-hover-color" value="<?php echo esc_attr($cartButtonTextHoverColor); ?>" data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="quantity-bg-color"><strong><?php echo esc_html('Quantity Plus Minus Button Background Color:','product-variation-table-with-quick-cart'); ?></strong></label>
                    <input id="quantity-bg-color" name="quantity-bg-color" value="<?php echo esc_attr($quantityBg); ?>" data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="quantity-bg-color-hover"><strong><?php echo wp_kses('Quantity Plus Minus Button Background Hover Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="quantity-bg-color-hover" name="quantity-bg-color-hover" value="<?php echo esc_attr($plusMinusBgColorHover); ?>" data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="quantity-text-color"><strong> <?php echo wp_kses('Quantity Plus Minus Button Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="quantity-text-color" name="quantity-text-color" value="<?php echo esc_attr($quantityTextColor); ?>"  data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="quantity-text-hover-color"><strong> <?php echo wp_kses('Quantity Plus Minus Button Text Hover Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="quantity-text-hover-color" name="quantity-text-hover-color" value="<?php echo esc_attr($quantityTextHoverColor); ?>"  data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="quantity-border-color"><strong> <?php echo wp_kses('Quantity Border Color:','product-variation-table-with-quick-cart'); ?></strong></label>
                    <input id="quantity-border-color" name="quantity-border-color" value="<?php echo esc_attr( $quantityBorderColor ); ?>"  data-jscolor="{}">
                </div>
            </div>

        </div>

    </div>

    <div id="carousel" class="tabcontent">
        <div id="quickSwitchesWrapper">
            <h2><?php echo esc_html('Variation Quick Cart Carousel Setting','product-variation-table-with-quick-cart'); ?></h2>

            <div class="quick-selections" style="display: flex; gap: 17.7%; align-items: center;">
                <h4><?php echo wp_kses('Variation Quick Cart Carousel On:', 'product-variation-table-with-quick-cart'); ?></h4>
                <div class="quick-selectors-wrapper">
                    <div class="quick-carousel-on-off">
                        <label class="switch">
                            <input type="checkbox" value="quick-carousel-on-off" <?php if($quickCarouselOnOff == "true"): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Variable Carousel Position Select -->
            <div class="quick-selections quick-selections-style" >
                <h4 ><?php echo wp_kses('Variation Quick Cart Carousel Position: ','product-variation-table-with-quick-cart');?></h4>
                <div style="display: flex; gap: 17%;">
                    <select class="quick-carousel-position">

                        <?php
                        $variable_quick_cart_hook = [
                            'woocommerce_before_shop_loop_item',
                            'woocommerce_after_shop_loop_item',
                            'woocommerce_before_shop_loop_item_title',
                            'woocommerce_after_shop_loop_item_title'
                        ];

                        $variable_quick_cart_hook_final = apply_filters('variable_quick_cart_carousel_position', $variable_quick_cart_hook);

                        foreach ($variable_quick_cart_hook_final as $quick_cart_hook_final) {

                            $formatted_hook_name = ucwords(str_replace('_', ' ', str_replace('woocommerce_', '', $quick_cart_hook_final)));

                            ?>
                            <option value="<?php echo esc_attr($quick_cart_hook_final); ?>" <?php selected($quickCarouselPosition, $quick_cart_hook_final); ?>>
                                <?php echo esc_html($formatted_hook_name); ?>
                            </option>
                            <?php
                        }
                        ?>

                    </select>

                    <!-- Help Start -->
                    <button class="help-button-carousel variation-cart-carousel-setting-help">?</button>

                    <!-- Popup Structure -->
                    <div value="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/help-quick-cart.png'); ?>" id="popup-container" style="display: none;">


                        <div class="popup-content-carousel">
                            <span class="close">&times;</span>
                            <div class="help-image"></div>
                        </div>
                    </div>
                    <!-- Help End -->
                </div>
            </div>


            <!-- Carousel Image Size -->
            <div class="quick-selections quick-selections-style">
                <h4><?php echo wp_kses('Carousel Image Size : ','product-variation-table-with-quick-cart');?></h4>

                <div style="display: flex; gap: 80px;">
                    <select id="carousel-image-size" class="carousel-image-size">


                        <?php
                        $carousel_image_size_hook = [
                            'thumbnail',
                            'medium',
                            'medium_large',
                            'large',
                            'woocommerce_thumbnail',
                            'woocommerce_single',
                            'woocommerce_gallery_thumbnail'
                        ];

                        $carousel_image_size_final_hook = apply_filters('variable_quick_cart_carousel_size_hook', $carousel_image_size_hook);

                        foreach ($carousel_image_size_final_hook as $carousel_image_final_hook) {

                            $formatted_image_size_hook_name = ucwords(str_replace('_', ' ', $carousel_image_final_hook));

                            ?>
                            <option value="<?php echo esc_attr($carousel_image_final_hook); ?>" <?php selected($carouselImageSize, $carousel_image_final_hook); ?>>
                                <?php echo esc_html($formatted_image_size_hook_name); ?>
                            </option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
            </div>


            <div class="quick-selections" style="display: flex; gap: 21.5%; align-items: center;">
                <h4><?php echo wp_kses('Carousel Autoplay On: ','product-variation-table-with-quick-cart');

                    if(empty($license_active)){
                        echo "(Pro)";
                    }

                    ?></h4>
                <div class="quick-selectors-wrapper">
                    <div class="quick-carousel-autoplay">
                        <label class="switch">
                            <input type="checkbox" name="quick-carousel-autoplay" <?php if( $quickCarouselAutoplay == "true" ): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="quick-selections" style="display: flex; gap: 14.9%; align-items: center;">
                <h4><?php echo wp_kses('Redirect to Single Product Page: ','product-variation-table-with-quick-cart');

                    if(empty($license_active)){
                        echo "(Pro)";
                    }

                    ?>
                    <span class="redirect-single-page-help" data-tooltip="When click on image or title in popup">?</span>
                </h4>
                <div class="quick-selectors-wrapper">
                    <div class="name-image-redirect">
                        <label class="switch">
                            <input type="checkbox" name="name-image-redirect" <?php if( $nameImageRedirect == "true" ): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper" >
                    <label for="quick-carousel-button-bg-color"><strong> <?php echo esc_html('Carousel Nav Background Color:','product-variation-table-with-quick-cart'); ?></strong></label>
                    <input id="quick-carousel-button-bg-color" name="quick-carousel-button-bg-color" value="<?php echo esc_attr( $carouselButtonBgColor ); ?>"  data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="quick-carousel-button-icon-color"><strong> <?php echo wp_kses('Carousel Navigation Button Icon Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="quick-carousel-button-icon-color" name="quick-carousel-button-icon-color" value="<?php echo esc_attr( $carouselButtonIconColor ); ?>"  data-jscolor="{}">
                </div>
            </div>
            <!-- Variable Details Box Show Checkboxes -->
            <div class="quick-selections quick-selections-style">
                <h4><?php echo esc_html('Popup Show:','product-variation-table-with-quick-cart'); ?></h4>
                <div class="quick-selectors-wrapper">
                    <div class="quick-hover-click">
                        <label class="switch">
                            <input type="checkbox" value="variable-hover" <?php if($variableHoverClick == "variable-hover"): echo esc_attr("checked"); endif; ?>>

                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('On Hover','product-variation-table-with-quick-cart'); ?></span>
                    </div>
                    <div class="quick-hover-click">
                        <label class="switch">
                            <input type="checkbox" value="variable-click" <?php if($variableHoverClick== "variable-click"): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('On Click ','product-variation-table-with-quick-cart');

                            if(empty($license_active)){
                                echo "(Pro)";
                            }

                            ?></span>
                    </div>
                </div>
            </div>
            <!-- Variable Details Box Position Checkboxes -->
            <div class="quick-selections quick-selections-style">
                <h4><?php echo esc_html('Popup Position:','product-variation-table-with-quick-cart'); ?></h4>
                <div class="quick-selectors-wrapper">
                    <div class="quick-box-position-click">
                        <label class="switch">
                            <input type="checkbox" value="quick-tooltip-position-center" <?php if($variableTooltipPosition == "quick-tooltip-position-center" || $variableTooltipPosition == "" || empty($variableSetting)): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('Center','product-variation-table-with-quick-cart'); ?></span>
                    </div>

                    <div class="quick-box-position-click">
                        <label class="switch">
                            <input type="checkbox" value="quick-tooltip-position-left" <?php if($variableTooltipPosition == "quick-tooltip-position-left"): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('Left ','product-variation-table-with-quick-cart');?></span>
                    </div>

                    <div class="quick-box-position-click">
                        <label class="switch">
                            <input type="checkbox" value="quick-tooltip-position-right"  <?php if($variableTooltipPosition == "quick-tooltip-position-right"): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('Right ','product-variation-table-with-quick-cart');?></span>
                    </div>
                </div>
            </div>
            <div class="quick-selections quick-selections-style">
                <h4><?php echo esc_html('Popup Contents:','product-variation-table-with-quick-cart'); ?></h4>
                <div class="quick-selectors-wrapper">

                    <div class="quick-box-content-click">
                        <label class="switch">
                            <input type="checkbox" value="variable-title-in-box" <?php if( !empty($variableDetailsTitle) || empty($variableSetting) ): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('Title','product-variation-table-with-quick-cart'); ?></span>
                    </div>

                    <div class="quick-box-content-click">
                        <label class="switch">
                            <input type="checkbox" value="variable-image-in-box" <?php if( !empty($variableDetailsImage) || empty($variableSetting) ): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('Image','product-variation-table-with-quick-cart'); ?></span>
                    </div>

                    <div class="quick-box-content-click">
                        <label class="switch">
                            <input type="checkbox" value="variable-excerpt-in-box" <?php if( !empty($variableDetailsExcerpt) ): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('Excerpt ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></span> <span class="quickPro">(Pro)</span>
                    </div>


                    <div class="quick-box-content-click">
                        <label class="switch">
                            <input type="checkbox" value="variable-sku-in-box" <?php if( !empty($variableDetailsSKU) ): echo esc_attr("checked"); endif; ?>>
                            <span class="slider round"></span>
                        </label>
                        <span><?php echo esc_html('SKU','product-variation-table-with-quick-cart'); ?></span>
                    </div>
                </div>
            </div>
            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="tooltip-bg"><strong><?php echo esc_html('Popup Background Color:','product-variation-table-with-quick-cart'); ?></strong></label>
                    <input id="tooltip-bg" name="tooltip-bg" value="<?php echo esc_attr($tooltipBgColor); ?>" data-jscolor="{}">
                </div>
            </div>
            <!-- Quantity Button -->
            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="tooltip-text"><strong><?php echo wp_kses('Popup Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="tooltip-text" name="tooltip-text" value="<?php echo esc_attr($tooltipTextColor); ?>" data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper">
                    <label for="add-to-cart-success-message"><strong> <?php echo wp_kses('Add to Cart Success Message: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="add-to-cart-success-message" class="add-to-cart-success-message" type="text" name="add-to-cart-success-message" value="<?php echo esc_attr( $addToCartSuccessMessage ); ?>"  >
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="add-to-cart-success-color"><strong><?php echo wp_kses('Add to Cart Success Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="add-to-cart-success-color" name="add-to-cart-success-color" value="<?php echo esc_attr($addToCartSuccessColor); ?>" data-jscolor="{}">
                </div>
            </div>

            <div class="quick-selections">
                <div class="quick-selectors-wrapper m-top">
                    <label for="add-to-cart-error-color"><strong><?php echo wp_kses('Add to Cart Failed Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                    <input id="add-to-cart-error-color" name="add-to-cart-error-color" value="<?php echo esc_attr($addToCartErrorColor); ?>" data-jscolor="{}">
                </div>
            </div>

        </div>
    </div>

    <div id="table" class="tabcontent" style="">

        <div id="quickAuthenticateWrapper">
            <h2><?php echo esc_html('Variation Table Setting','product-variation-table-with-quick-cart'); ?></h2>

            <div style="display: flex; gap: 30%">
                <div>
                    <div class="quick-selections" style="display: flex; gap: 47% ; align-items: center">
                        <h4><?php echo wp_kses('Variation Table On: ','product-variation-table-with-quick-cart'); ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="quick-table-on-off">
                                <label class="switch">
                                    <input type="checkbox" name="quick-table-on-off" <?php if( $quickTableOnOff == "true" ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Variation Table Images -->
                    <div class="quick-selections quick-selections-style">
                        <h4><?php echo wp_kses('Table Image Size: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>

                        <div style="display: flex; gap: 80px;">
                            <select id="pop-up-image-show" class="pop-up-image-show">


                                <?php
                                $table_popup_image_size_hook = [
                                    'thumbnail',
                                    'medium',
                                    'medium_large',
                                    'large',
                                    'woocommerce_thumbnail',
                                    'woocommerce_single',
                                    'woocommerce_gallery_thumbnail'
                                ];

                                $table_popup_image_size_final_hook = apply_filters('variable_quick_cart_carousel_size_hook', $table_popup_image_size_hook);

                                foreach ($table_popup_image_size_final_hook as $table_popup_image_final_hook) {

                                    $formatted_table_popup_image_size_hook_name = ucwords(str_replace('_', ' ', $table_popup_image_final_hook));

                                    ?>
                                    <option value="<?php echo esc_attr($table_popup_image_final_hook); ?>" <?php selected($popUPImageShow, $table_popup_image_final_hook); ?>>
                                        <?php echo esc_html($formatted_table_popup_image_size_hook_name); ?>
                                    </option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="quick-selections quick-selections-style" style="display: flex; gap: 50%">
                        <div>
                            <h4><?php echo wp_kses('Variation Table Template: ','product-variation-table-with-quick-cart');
                                if(empty($license_active)){
                                    echo "(Pro)";
                                }
                                ?></h4>

                            <div>
                                <select id="select-design-variation-table-template" class="variation-table-template" style="outline: none">
                                    <option value="template_1" <?php selected($variationTableTemplate, 'template_1'); ?>><?php echo wp_kses('Template 1','product-variation-table-with-quick-cart');?></option>
                                    <option value="template_2" <?php selected($variationTableTemplate, 'template_2'); ?>><?php echo wp_kses('Template 2','product-variation-table-with-quick-cart');?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--Variation Table Template 2 All Option-->

                    <!--Variation Table Template 1 All options-->
                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper m-top">
                                <label for="table-row-pagination"><strong> <?php echo wp_kses('Table Row Pagination: ','product-variation-table-with-quick-cart');?></strong></label>
                                <input id="table-row-pagination" class="table-row-pagination" type="number" min="1" name="table-row-pagination" value="<?php echo esc_attr( $tableRowPagination ); ?>"  >
                            </div>
                        </div>

                        <div class="quick-selections" style="display: flex; gap: 28%; align-items: center">
                            <h4><?php echo wp_kses('Variation Table Border Show: ','product-variation-table-with-quick-cart');?></h4>
                            <div class="quick-selectors-wrapper">
                                <div class="quick-table-border">
                                    <label class="switch">
                                        <input type="checkbox" name="quick-table-border" <?php if( $quickTableBorder == "true" ): echo esc_attr("checked"); endif; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="pagination-button-bg-color"><strong> <?php echo wp_kses('Pagination Button Background Color: ','product-variation-table-with-quick-cart');?></strong></label>
                            <input id="pagination-button-bg-color" name="pagination-button-bg-color" value="<?php echo esc_attr( $paginationButtonBgColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="pagination-button-hover-bg-color"><strong> <?php echo wp_kses('Pagination Button Hover Background Color: ','product-variation-table-with-quick-cart');?></strong></label>
                            <input id="pagination-button-hover-bg-color" name="pagination-button-hover-bg-color" value="<?php echo esc_attr( $paginationButtonHoverBgColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="pagination-button-text-color"><strong> <?php echo wp_kses('Pagination Button Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                            <input id="pagination-button-text-color" name="pagination-button-text-color" value="<?php echo esc_attr( $paginationButtonTextColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="pagination-button-text-hover-color"><strong> <?php echo wp_kses('Pagination Button Text Hover Color: ','product-variation-table-with-quick-cart');?></strong></label>
                            <input id="pagination-button-text-hover-color" name="pagination-button-text-hover-color" value="<?php echo esc_attr( $paginationButtonTextHoverColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>

                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper">
                                <label for="quick-table-head-bg-color"><strong> <?php echo wp_kses('Table Head Background Color: ','product-variation-table-with-quick-cart');?></strong></label>
                                <input id="quick-table-head-bg-color" name="quick-table-head-bg-color" value="<?php echo esc_attr( $tableHeadBgColor ); ?>"  data-jscolor="{}">
                            </div>
                        </div>

                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper m-top" >
                                <label for="quick-table-head-text-color"><strong> <?php echo wp_kses('Table Head Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                                <input id="quick-table-head-text-color" name="quick-table-head-text-color" value="<?php echo esc_attr( $tableHeadTextColor ); ?>"  data-jscolor="{}">
                            </div>
                        </div>

                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper m-top">
                                <label for="quick-table-border-color"><strong> <?php echo wp_kses('Table Border Color: ','product-variation-table-with-quick-cart');?></strong></label>
                                <input id="quick-table-border-color" name="quick-table-border-color" value="<?php echo esc_attr( $tableBorderColor ); ?>"  data-jscolor="{}">
                            </div>
                        </div>

                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper m-top">
                                <label for="quick-table-variable-title-color"><strong> <?php echo wp_kses('Variation Table Title Color: ','product-variation-table-with-quick-cart');?></strong></label>
                                <input id="quick-table-variable-title-color" name="quick-table-variable-title-color" value="<?php echo esc_attr( $tableVariableTitleColor ); ?>"  data-jscolor="{}">
                            </div>
                        </div>

                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper m-top">
                                <label for="quick-table-variable-bg-color-odd"><strong> <?php echo wp_kses('Variation Table Background Color(Odd): ','product-variation-table-with-quick-cart'); ?></strong></label>
                                <input id="quick-table-variable-bg-color-odd" name="quick-table-variable-bg-color-odd" value="<?php echo esc_attr( $tableBgColorOdd ); ?>"  data-jscolor="{}">
                            </div>
                        </div>

                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper m-top">
                                <label for="quick-table-variable-bg-color-even"><strong> <?php echo wp_kses('Variation Table Background Color(Even): ','product-variation-table-with-quick-cart');?></strong></label>
                                <input id="quick-table-variable-bg-color-even" name="quick-table-variable-bg-color-even" value="<?php echo esc_attr( $tableBgColorEven ); ?>"  data-jscolor="{}">
                            </div>
                        </div>

                        <div class="quick-selections">
                            <div class="quick-selectors-wrapper m-top">
                                <label for="quick-table-variable-hover-color"><strong> <?php echo wp_kses('Variation Table Background Color Hover: ','product-variation-table-with-quick-cart');?></strong></label>
                                <input style="outline: none !important;" id="quick-table-variable-hover-color" name="quick-table-variable-hover-color" value="<?php echo esc_attr( $tableBgColorHover ); ?>"  data-jscolor="{}">
                            </div>
                        </div>

                    <!-- Variation Table Position Select -->
                    <div class="quick-selections quick-selections-style">
                        <h4><?php echo wp_kses('Variation Table Position: ','product-variation-table-with-quick-cart');?></h4>

                        <div style="display: flex; gap: 30px;">
                            <select id="table-position" class="quick-table-position">

                                <?php
                                $variation_table_position = [
                                    'woocommerce_before_single_product_summary',
                                    'woocommerce_after_single_product_summary',
                                    'woocommerce_after_single_product',
                                ];

                                $variation_table_position_hook_final = apply_filters('variation_table_position', $variation_table_position);

                                foreach ($variation_table_position_hook_final as $table_position_hook_final) {

                                    $formatted_table_hook_name = ucwords(str_replace('_', ' ', str_replace('woocommerce_', '', $table_position_hook_final)));

                                    ?>
                                    <option value="<?php echo esc_attr($table_position_hook_final); ?>" <?php selected($quickTablePosition, $table_position_hook_final); ?>>
                                        <?php echo esc_html($formatted_table_hook_name); ?>
                                    </option>
                                    <?php
                                }
                                ?>

                            </select>

                            <!-- Help Start -->
                            <a href="https://www.wooxperto.com/woocommerce-single-product-page-all-hook/"
                               class="help-button variation-cart-carousel-setting-help"
                               target="_blank"
                               rel="noopener noreferrer"
                               style="text-decoration: none; color: white;"
                               onmouseover="this.style.color='wheat';"
                               onmouseout="this.style.color='white';">
                                ?
                            </a>

                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="bulk-add-cart-bg-color"><strong> <?php echo wp_kses('Bulk Add to Cart Background Color: ','product-variation-table-with-quick-cart');
                                    if(empty($license_active)){
                                        echo "(Pro)";
                                    }
                                    ?></strong></label>
                            <input id="bulk-add-cart-bg-color" name="bulk-add-cart-bg-color" value="<?php echo esc_attr( $bulkAddCartBgColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="bulk-add-cart-text-color"><strong> <?php echo wp_kses('Bulk Add to Cart Text Color: ','product-variation-table-with-quick-cart');
                                    if(empty($license_active)){
                                        echo "(Pro)";
                                    }
                                    ?></strong></label>
                            <input id="bulk-add-cart-text-color" name="bulk-add-cart-text-color" value="<?php echo esc_attr( $bulkAddCartTextColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="bulk-add-cart-hover-bg-color"><strong> <?php echo wp_kses('Bulk Add to Cart Hover Background Color: ','product-variation-table-with-quick-cart');
                                    if(empty($license_active)){
                                        echo "(Pro)";
                                    }
                                    ?></strong></label>
                            <input id="bulk-add-cart-hover-bg-color" name="bulk-add-cart-hover-bg-color" value="<?php echo esc_attr( $bulkAddCartHoverBgColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper">
                            <label for="bulk-add-cart-hover-text-color"><strong> <?php echo wp_kses('Bulk Add to Cart Hover Text Color: ','product-variation-table-with-quick-cart');
                                    if(empty($license_active)){
                                        echo "(Pro)";
                                    }
                                    ?></strong></label>
                            <input id="bulk-add-cart-hover-text-color" name="bulk-add-cart-hover-text-color" value="<?php echo esc_attr( $bulkAddCartHoverTextColor ); ?>"  data-jscolor="{}">
                        </div>
                    </div>


                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper m-top">
                            <label for="on-sale-name-change"><strong> <?php echo wp_kses('On Sale Name Change: ','product-variation-table-with-quick-cart');
                                    if(empty($license_active)){
                                        echo "(Pro)";
                                    }
                                    ?></strong></label>
                            <input id="on-sale-name-change" class="on-sale-name-change" type="text" name="on-sale-name-change" value="<?php echo esc_attr( $onSaleNameChange ); ?>"  >
                        </div>
                    </div>

                    <div class="quick-selections">
                        <div class="quick-selectors-wrapper m-top">
                            <label for="search-option-text-change"><strong> <?php echo wp_kses('Search Option Text Change: ','product-variation-table-with-quick-cart');
                                    if(empty($license_active)){
                                        echo "(Pro)";
                                    }
                                    ?></strong></label>
                            <input id="search-option-text-change" class="search-option-text-change" type="text" name="search-option-text-change" value="<?php echo esc_attr( $searchOptionTextChange ); ?>"  >
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 30.2%; align-items: center">
                        <h4><?php echo wp_kses('Show Popup Image: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="show-popup-image">
                                <label class="switch">
                                    <input type="checkbox" name="show-popup-image" <?php if( $showPopUpImage == "true" ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="show-gallery-image-into-popup" class="quick-selections" style="display: flex; gap: 5%; align-items: center">
                        <h4><?php echo wp_kses('Show Gallery Image into Popup: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="show-gallery-image-into-popup">
                                <label class="switch">
                                    <input type="checkbox" name="show-gallery-image-into-popup" <?php if( $showGalleyImageIntoPopup == "true" ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="quick-selections" style="display: flex; gap: 28.3%; align-items: center">
                        <h4><?php echo wp_kses('Show Bulk Selection: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="bulk-selection-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="bulk-selection-hide-show" <?php if( $bulkSelectionHideShow == "true" ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 56%; align-items: center">
                        <h4><?php echo wp_kses('Show Image: ','product-variation-table-with-quick-cart');?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="image-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="image-hide-show" <?php if( $imageHideShow == "true" || empty($imageHideShow)): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 61%; align-items: center">
                        <h4><?php echo wp_kses('Show SKU: ','product-variation-table-with-quick-cart');?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="sku-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="sku-hide-show" <?php if( $skuHideShow == "true" || empty($skuHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 49.5%; align-items: center">
                        <h4><?php echo wp_kses('Show Title: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="title-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="title-hide-show" <?php if( $titleHideShow == "true" || empty($titleHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 34%; align-items: center">
                        <h4><?php echo wp_kses('Show Description: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="description-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="description-hide-show" <?php if( $descriptionHideShow == "true" || empty($descriptionHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 13.5%; align-items: center">
                        <h4><?php echo wp_kses('Show Weight & Dimensions: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="weight-dimension-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="weight-dimension-hide-show" <?php if( $weightDimensionsHideShow == "true" || empty($weightDimensionsHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 51.5%; align-items: center">
                        <h4><?php echo wp_kses('Show Attribute: ','product-variation-table-with-quick-cart');?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="all-attribute-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="all-attribute-hide-show" <?php if( $allAttributeHideShow == "true" || empty($allAttributeHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 60.3%; align-items: center">
                        <h4><?php echo wp_kses('Show Price: ','product-variation-table-with-quick-cart');?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="price-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="price-hide-show" <?php if( $priceHideShow == "true" || empty($priceHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="quick-selections" style="display: flex; gap: 52.9%; align-items: center">
                        <h4><?php echo wp_kses('Show Quantity: ','product-variation-table-with-quick-cart');?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="quantity-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="quantity-hide-show" <?php if( $quantityHideShow == "true" || empty($quantityHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 34.2%; align-items: center">
                        <h4><?php echo wp_kses('Show Stock Status: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="stock-status-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="stock-status-hide-show" <?php if( $stockStatusHideShow == "true" || empty($stockStatusHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 58%; align-items: center">
                        <h4><?php echo wp_kses('Show Action: ','product-variation-table-with-quick-cart');?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="action-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="action-hide-show" <?php if( $actionHideShow == "true" || empty($actionHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 31%; align-items: center">
                        <h4><?php echo wp_kses('Show Search Option: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="search-option-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="search-option-hide-show" <?php if( $searchOptionHideShow == "true" || empty($searchOptionHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections" style="display: flex; gap: 29%; align-items: center">
                        <h4><?php echo wp_kses('Show On Sale Option: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>
                        <div class="quick-selectors-wrapper">
                            <div class="on-sale-hide-show">
                                <label class="switch">
                                    <input type="checkbox" name="on-sale-hide-show" <?php if( $onSaleHideShow == "true" || empty($onSaleHideShow) ): echo esc_attr("checked"); endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="quick-selections quick-selections-style">
                        <h4><?php echo wp_kses('Bulk Add to Cart Position: ','product-variation-table-with-quick-cart');
                            if(empty($license_active)){
                                echo "(Pro)";
                            }
                            ?></h4>

                        <div >
                            <select id="table-position" class="bulk-add-to-cart-position">
                                <option value="before" <?php selected($bulkAddToCartPosition, 'before'); ?>>Before Table</option>
                                <option value="after" <?php selected($bulkAddToCartPosition, 'after'); ?>>After Table</option>
                                <option value="both" <?php selected($bulkAddToCartPosition, 'both'); ?>>Both</option>
                            </select>

                        </div>
                    </div>

                    <div class="quick-selections quick-selections-style" style="display: flex; gap: 50%">

                        <div>
                            <h4><?php echo wp_kses('Design for Mobile Single Product Page: ','product-variation-table-with-quick-cart');
                                if(empty($license_active)){
                                    echo "(Pro)";
                                }
                                ?></h4>

                            <div >
                                <select id="select-design" class="design-single-product-page-mobile" style="outline: none">
                                    <option value="template_1" <?php selected($designSingleProductPageMobile, 'template_1'); ?>><?php echo wp_kses('Template 1','product-variation-table-with-quick-cart');?></option>
                                    <option value="template_2" <?php selected($designSingleProductPageMobile, 'template_2'); ?>><?php echo wp_kses('Template 2','product-variation-table-with-quick-cart');?></option>
                                    <option value="template_3" <?php selected($designSingleProductPageMobile, 'template_3'); ?>><?php echo wp_kses('Template 3','product-variation-table-with-quick-cart');?></option>
                                    <option value="template_4" <?php selected($designSingleProductPageMobile, 'template_4'); ?>><?php echo wp_kses('Template 4','product-variation-table-with-quick-cart');?></option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: flex; align-items: end">
                    <div data-image-template1="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/template_1.png'); ?>"
                         data-image-template2="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/template_2.png'); ?>"
                         data-image-template3="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/template_3.png'); ?>"
                         data-image-template4="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/template_4.png'); ?>"
                         id="show-template-image"></div>
                </div>
            </div>

        </div>
    </div>

    <div id="select-variation" class="tabcontent" style="">

        <div id="quickAuthenticateWrapper">
            <h2><?php echo esc_html('Variation Swatches for Single Product and Archive Page','product-variation-table-with-quick-cart'); ?></h2>

                <div class="quick-selections" style="display: flex; gap: 11%; align-items: center">
                    <h4><?php echo wp_kses('Variation Swatches Enable: ','product-variation-table-with-quick-cart');?></h4>
                    <div class="quick-selectors-wrapper">
                        <div class="variation-select-on-off">
                            <label class="switch">
                                <input type="checkbox" name="variation-select-on-off" <?php if( $variationSelectOnOff == "true" ): echo esc_attr("checked"); endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quick-selections quick-selections-style">
                    <div id="archive-page-option-section"
                         data-image="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/archive-page-option-section-dashboard.png'); ?>">

                    </div>
                </div>

                <div class="quick-selections" style="display: flex; gap: 19.4%; align-items: center">
                    <h4><?php echo wp_kses('Tooltip On: ','product-variation-table-with-quick-cart');?></h4>
                    <div class="quick-selectors-wrapper">
                        <div class="globally-tooltip-on-off">
                            <label class="switch">
                                <input type="checkbox" name="globally-tooltip-on-off" <?php if( $globallyTooltipOnOff == "true" ): echo esc_attr("checked"); endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper">
                        <label for="select-variation-tooltip-bg-color"><strong> <?php echo wp_kses('Tooltip Background Color: ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="select-variation-tooltip-bg-color" name="select-variation-tooltip-bg-color" value="<?php echo esc_attr( $selectVariationTooltipBgColor ); ?>"  data-jscolor="{}">
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper">
                        <label for="select-variation-tooltip-text-color"><strong> <?php echo wp_kses('Tooltip Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="select-variation-tooltip-text-color" name="select-variation-tooltip-text-color" value="<?php echo esc_attr( $selectVariationTooltipTextColor ); ?>"  data-jscolor="{}">
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper">
                        <label for="select-variation-button-bg-color"><strong> <?php echo wp_kses('Button Background Color: ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="select-variation-button-bg-color" name="select-variation-button-bg-color" value="<?php echo esc_attr( $selectVariationButtonBgColor ); ?>"  data-jscolor="{}">
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper">
                        <label for="select-variation-button-text-color"><strong> <?php echo wp_kses('Button Text Color: ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="select-variation-button-text-color" name="select-variation-button-text-color" value="<?php echo esc_attr( $selectVariationButtonTextColor ); ?>"  data-jscolor="{}">
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper m-top">
                        <label for="image-color-height"><strong> <?php echo wp_kses('Image & Color Height (px): ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="image-color-height" class="image-color-height" type="text" name="image-color-height" value="<?php echo esc_attr( $imageColorHeight ); ?>"  >
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper m-top">
                        <label for="image-color-width"><strong> <?php echo wp_kses('Image & Color Width (px): ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="image-color-width" class="image-color-width" type="text" name="image-color-width" value="<?php echo esc_attr( $imageColorWidth ); ?>"  >
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper m-top">
                        <label for="image-color-border-radius"><strong> <?php echo wp_kses('Image & Color Border Radius (px): ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="image-color-border-radius" class="image-color-border-radius" type="text" name="image-color-border-radius" value="<?php echo esc_attr( $imageColorBorderRadius ); ?>"  >
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper">
                        <label for="swatches-button-border-color"><strong> <?php echo wp_kses('Button Border Color: ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="swatches-button-border-color" name="swatches-button-border-color" value="<?php echo esc_attr( $swatchesButtonBorderColor ); ?>"  data-jscolor="{}">
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper">
                        <label for="selected-variation-button-border-color"><strong> <?php echo wp_kses(' Selected Button Border Color: ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="selected-variation-button-border-color" name="selected-variation-button-border-color" value="<?php echo esc_attr( $selectedVariationButtonBorderColor ); ?>"  data-jscolor="{}">
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper m-top">
                        <label for="button-height"><strong> <?php echo wp_kses('Button Height (px): ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="button-height" class="button-height" type="text" name="button-height" value="<?php echo esc_attr( $buttonHeight ); ?>"  >
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper m-top">
                        <label for="button-width"><strong> <?php echo wp_kses('Button Width (px): ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="button-width" class="button-width" type="text" name="button-width" value="<?php echo esc_attr( $buttonWidth ); ?>"  >
                    </div>
                </div>

                <div class="quick-selections">
                    <div class="quick-selectors-wrapper m-top">
                        <label for="button-border-radius"><strong> <?php echo wp_kses('Button Border Radius (px): ','product-variation-table-with-quick-cart');?></strong></label>
                        <input id="button-border-radius" class="button-border-radius" type="text" name="button-border-radius" value="<?php echo esc_attr( $buttonBorderRadius ); ?>"  >
                    </div>
                </div>

        </div>
    </div>

    <div id="select-variation-ul-li" class="tabcontent">
        <h2><?php echo esc_html('Select Variation List (This Feature Available for Pro Version)','product-variation-table-with-quick-cart'); ?></h2>

        <div class="variation-list-image-above-pro">
            <div id="variation-list-dashboard-first-image"
                 data-image="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/list-template-dashboard.jpg'); ?>">
            </div>
        </div>

    </div>

    <div id="variation-gallery" class="tabcontent" style="">
        <div id="quickAuthenticateWrapper">
            <h2><?php echo esc_html('Variation Gallery Setting (This Feature Available for Pro Version)','product-variation-table-with-quick-cart'); ?></h2>

            <div id="variation-gallery-dashboard"
                 data-image="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/variation-gallery-dashboard.jpg'); ?>">
            </div>

        </div>
    </div>

    <div id="attribute-gallery" class="tabcontent" style="">
        <div id="quickAuthenticateWrapper">
            <h2><?php echo esc_html('Attribute Gallery Setting (This Feature Available for Pro Version)','product-variation-table-with-quick-cart'); ?></h2>

            <div id="attribute-gallery-dashboard"
                 data-image="<?php echo esc_url(plugin_dir_url(__DIR__) . 'Assets/images/attribute-gallery-dashboard.jpg'); ?>">
            </div>

        </div>
    </div>

    <div id="support" class="tabcontent">
        <div id="quickAuthenticateWrapper">

            <div class="container-for-support">
                <div class="grid-support">
                    <div class="support-item">
                        <strong><i class="fas fa-globe"></i> <?php echo esc_html('Website:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://www.wooxperto.com/" target="_blank"><?php echo esc_html('wooxperto.com','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Visit our official website for live chat and more information, tutorials, and resources.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fas fa-gem"></i> <?php echo esc_html('Premium Plugin:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://www.wooxperto.com/woocommerce-product-variations-table-with-quick-cart-plguin" target="_blank"><?php echo esc_html('Upgrade to Pro','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Unlock more advanced features and capabilities with our premium plugin version.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fab fa-facebook-f"></i> <?php echo esc_html('Facebook:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://www.facebook.com/wooxpertollc" target="_blank"><?php echo esc_html('Follow us','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Join our community on Facebook for support, updates, and discussions.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fab fa-whatsapp"></i> <?php echo esc_html('WhatsApp:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://wa.me/01926167151" target="_blank"><?php echo esc_html('Chat Now ','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Get instant support by chatting with us on WhatsApp. We’re here to help!','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fas fa-envelope"></i> <?php echo esc_html('Email:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="mailto:support@wooxperto.com"><?php echo esc_html('support@wooxperto.com','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Feel free to reach out to us via email for any inquiries or support requests.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fab fa-linkedin-in"></i> <?php echo esc_html('LinkedIn:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://www.linkedin.com/company/wooxpertollc/" target="_blank"><?php echo esc_html('Connect on LinkedIn','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Let’s connect on LinkedIn for networking, updates, and professional support.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fab fa-twitter"></i> <?php echo esc_html('Twitter:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://x.com/wooxpertollc" target="_blank"><?php echo esc_html('Follow us','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Stay updated with the latest news and announcements by following us on Twitter.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fab fa-youtube"></i> <?php echo esc_html('YouTube:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://www.youtube.com/@wooxpertollc" target="_blank"><?php echo esc_html('Subscribe','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('Check out our YouTube channel for video tutorials and product showcases.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                    <div class="support-item">
                        <strong><i class="fab fa-instagram"></i> <?php echo esc_html('Instagram:','product-variation-table-with-quick-cart'); ?></strong>
                        <a href="https://www.instagram.com/wooxpertollc" target="_blank"><?php echo esc_html('Follow us','product-variation-table-with-quick-cart'); ?></a>
                        <p><?php echo esc_html('See behind-the-scenes content and our latest updates on Instagram.','product-variation-table-with-quick-cart'); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php wp_nonce_field( 'quick_admin_nonce_action', 'quick_admin_nonce' ); ?>
  <!-- save Button -->
    <button style="position: fixed; bottom: 20px; right: 20px; display: flex; justify-content: center; align-items: center; padding: 10px 20px; background-color: #6033E7; color: white; border: none; border-radius: 5px; cursor: pointer; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);" class="buttonload">
        <?php echo esc_html('Save', 'product-variation-table-with-quick-cart'); ?>
    </button>

</div>
