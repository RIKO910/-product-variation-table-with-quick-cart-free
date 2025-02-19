<?php
if ( ! defined( 'ABSPATH' ) ) exit;if ( ! defined( 'ABSPATH' ) ) exit;
class QuickDynamicStyle{

    /**
     * Define Constant.
     *
     * @return void
     * @since 1.0.0
     *
     */
    public function __construct(){
        add_action('wp_enqueue_scripts', [$this,'quick_dynamic_styles']);
    }
    /**
     * Dynamic style.
     *
     * @return void
     * @since 1.0.0
     *
     */
    function quick_dynamic_styles() {
        $variableSetting                       = get_option('variable_all_checked', array());
        $variableAddToCartIcon                 = isset($variableSetting['variableAddToCartIcon']) ? $variableSetting['variableAddToCartIcon'] : 'inline-block';
        $cartButtonBg                          = isset($variableSetting['cartButtonBg']) ? $variableSetting['cartButtonBg'] : '#007cba';
        $cartButtonTextColor                   = isset($variableSetting['cartButtonTextColor']) ? $variableSetting['cartButtonTextColor'] : '#fff';
        $tooltipBgColor                        = isset($variableSetting['tooltipBg']) ? $variableSetting['tooltipBg'] : '#000';
        $tooltipTextColor                      = isset($variableSetting['tooltipTextColor']) ? $variableSetting['tooltipTextColor'] : '#fff';
        $quantityBg                            = isset($variableSetting['quantityBg']) ? $variableSetting['quantityBg'] : '#007bff';
        $quantityBorderColor                   = isset($variableSetting['quantityBorderColor']) ? $variableSetting['quantityBorderColor'] : '#ccc';
        $quantityTextColor                     = isset($variableSetting['quantityTextColor']) ? $variableSetting['quantityTextColor'] : '#fff';
        $carouselButtonBgColor                 = isset($variableSetting['CarouselButtonBg']) ? $variableSetting['CarouselButtonBg'] : '#000';
        $carouselButtonIconColor               = isset($variableSetting['CarouselButtonIconColor']) ? $variableSetting['CarouselButtonIconColor'] : '#fff';
        $tableHeadBgColor                      = isset($variableSetting['tableHeadBgColor']) ? $variableSetting['tableHeadBgColor'] : '#007cba';
        $tableHeadTextColor                    = isset($variableSetting['tableHeadTextColor']) ? $variableSetting['tableHeadTextColor'] : '#fff';
        $tableVariableTitleColor               = isset($variableSetting['tableVariableTitleColor']) ? $variableSetting['tableVariableTitleColor'] : '#000';
        $quickTableBorder                      = isset($variableSetting['quickTableBorder']) ? $variableSetting['quickTableBorder'] : '0';
        $tableBorderColor                      = isset($variableSetting['tableBorderColor']) ? $variableSetting['tableBorderColor'] : '#e1e8ed';
        $tableBgColorOdd                       = isset($variableSetting['tableBgColorOdd']) ? $variableSetting['tableBgColorOdd'] : 'transparent';
        $tableBgColorEven                      = isset($variableSetting['tableBgColorEven']) ? $variableSetting['tableBgColorEven'] : '#f2f2f2';
        $tableBgColorHover                     = isset($variableSetting['tableBgColorHover']) ? $variableSetting['tableBgColorHover'] : '#ddd';
        $cartButtonBgHover                     = isset($variableSetting['cartButtonBgHover']) ? $variableSetting['cartButtonBgHover'] : '#045cb4';
        $quantityBgColorHover                  = isset($variableSetting['quantityBgColorHover']) ? $variableSetting['quantityBgColorHover'] : '#0056b3';
        $swatchesButtonBorderColor             = isset($variableSetting['swatchesButtonBorderColor']) ? $variableSetting['swatchesButtonBorderColor'] : '#000000';
        $selectedVariationButtonBorderColor    = isset($variableSetting['selectedVariationButtonBorderColor']) ? $variableSetting['selectedVariationButtonBorderColor'] : '#0071a1';
        $buttonWidth                           = isset($variableSetting['buttonWidth']) ? $variableSetting['buttonWidth'] : ' ';
        $buttonHeight                          = isset($variableSetting['buttonHeight']) ? $variableSetting['buttonHeight'] : ' ';
        $buttonBorderRadius                    = isset($variableSetting['buttonBorderRadius']) ? $variableSetting['buttonBorderRadius'] : '5';
        $variationSelectOnOff                  = isset($variableSetting['variationSelectOnOff']) ? $variableSetting['variationSelectOnOff'] : '';
        $listBadgeBgColor                      = isset($variableSetting['listBadgeBgColor']) ? $variableSetting['listBadgeBgColor'] : '#FF5733';
        $listBadgeTextColor                    = isset($variableSetting['listBadgeTextColor']) ? $variableSetting['listBadgeTextColor'] : '#ffffff';
        $listBadgeHeight                       = isset($variableSetting['listBadgeHeight']) ? $variableSetting['listBadgeHeight'] : ' ';
        $listBadgeWidth                        = isset($variableSetting['listBadgeWidth']) ? $variableSetting['listBadgeWidth'] : ' ';
        $listBadgeShowRight                    = isset($variableSetting['listBadgeShowRight']) ? $variableSetting['listBadgeShowRight'] : '';
        $bulkAddCartBgColor                    = isset($variableSetting['bulkAddCartBgColor']) ? $variableSetting['bulkAddCartBgColor'] : '#007cba';
        $bulkAddCartTextColor                  = isset($variableSetting['bulkAddCartTextColor']) ? $variableSetting['bulkAddCartTextColor'] : '#FFFFFF';
        $bulkAddCartHoverBgColor               = isset($variableSetting['bulkAddCartHoverBgColor']) ? $variableSetting['bulkAddCartHoverBgColor'] : '#007cba';
        $bulkAddCartHoverTextColor             = isset($variableSetting['bulkAddCartHoverTextColor']) ? $variableSetting['bulkAddCartHoverTextColor'] : '#000000';
        $template2TableBgColor                 = isset($variableSetting['template2TableBgColor']) ? $variableSetting['template2TableBgColor'] : '#000000';
        $template2DetailsSectionBgColor        = isset($variableSetting['template2DetailsSectionBgColor']) ? $variableSetting['template2DetailsSectionBgColor'] : '#FFFFFF';
        $template2CartSectionBgColor           = isset($variableSetting['template2CartSectionBgColor']) ? $variableSetting['template2CartSectionBgColor'] : '#FBFBFB';
        $showAttributeSwatchesArchive          = isset($variableSetting['showAttributeSwatchesArchive'][0]) ? $variableSetting['showAttributeSwatchesArchive'][0] : '';
        $quantityTextHoverColor                = isset($variableSetting['quantityTextHoverColor']) ? $variableSetting['quantityTextHoverColor'] : '#000000';
        $cartButtonTextHoverColor              = isset($variableSetting['cartButtonTextHoverColor']) ? $variableSetting['cartButtonTextHoverColor'] : '#000000';
        $galleryNavigationButtonIconColor      = isset($variableSetting['galleryNavigationButtonIconColor']) ? $variableSetting['galleryNavigationButtonIconColor'] : '#fff';
        $galleryNavigationButtonIconHoverColor = isset($variableSetting['galleryNavigationButtonIconHoverColor']) ? $variableSetting['galleryNavigationButtonIconHoverColor'] : '#D0D0D0';
        $galleryNavigationButtonBgColor        = isset($variableSetting['galleryNavigationButtonBgColor']) ? $variableSetting['galleryNavigationButtonBgColor'] : '#808080';
        $galleryNavigationButtonBgHoverColor   = isset($variableSetting['galleryNavigationButtonBgHoverColor']) ? $variableSetting['galleryNavigationButtonBgHoverColor'] : '##2F3031';
        $paginationButtonBgColor               = isset($variableSetting['paginationButtonBgColor']) ? $variableSetting['paginationButtonBgColor'] : '#007cba';
        $paginationButtonHoverBgColor          = isset($variableSetting['paginationButtonHoverBgColor']) ? $variableSetting['paginationButtonHoverBgColor'] : '#045CB4';
        $paginationButtonTextColor             = isset($variableSetting['paginationButtonTextColor']) ? $variableSetting['paginationButtonTextColor'] : '#ffffff';
        $paginationButtonTextHoverColor        = isset($variableSetting['paginationButtonTextHoverColor']) ? $variableSetting['paginationButtonTextHoverColor'] : '#000000';
        $displayNoneImportant                  = '';

        if ($showAttributeSwatchesArchive === 'attribute-swatches' || $showAttributeSwatchesArchive === 'attribute-archive') {
            $variationDisplayNoneImportant = "none !important";
        }
        if ($variationSelectOnOff === "true"  ){
            $displayNoneImportant = "none !important";
        }
        if ($listBadgeShowRight === "true"){
            $displayRightBadge = "right";
        }else{
            $displayRightBadge = "left";
        }

        // Start OceanWP theme compatible
        $custom_margin_OceanWP = '';
        $quick_product_details_OceanWP_pl = '';
        $quick_product_details_OceanWP_pr = '';
        $quick_variable_tooltip_top_OceanWP = '';
        $quick_variable_tooltip_closebtn_OceanWP = '';
        $theme_select_display_OceanWP = '';
        if( wp_get_theme()->get('Name') === 'OceanWP' ) {
            $custom_margin_OceanWP = '15';
            $quick_product_details_OceanWP_pl = '10';
            $quick_product_details_OceanWP_pr = '10';
            $quick_variable_tooltip_top_OceanWP = '0';
            $quick_variable_tooltip_closebtn_OceanWP = '25';
            $theme_select_display_OceanWP = 'none !important';
        }

        // End OceanWP theme compatible

        // Prepare dynamic CSS
        ob_start();
        ?>

        #prevPage , #nextPage{
        background-color: <?php echo esc_attr($paginationButtonBgColor)?>;
        color: <?php echo esc_attr($paginationButtonTextColor)?>;
        }

        #prevPage:hover,
        #nextPage:hover {
        background-color: <?php echo esc_attr($paginationButtonHoverBgColor); ?>;
        color: <?php echo esc_attr($paginationButtonTextHoverColor); ?>;
        }

        .theme-select{
        display: <?php echo esc_attr($theme_select_display_OceanWP)?>;
        }

        .quick-variable-slide{
        margin-left:<?php echo esc_attr($custom_margin_OceanWP)?>px;
        margin-right:<?php echo esc_attr($custom_margin_OceanWP)?>px;
        }

        .quick-variable-tooltip .closebtn{
            right: <?php echo esc_attr($quick_variable_tooltip_closebtn_OceanWP)?>px;
        }

        .quick-variable-tooltip .variableThumb{
            padding-left:<?php echo esc_attr($custom_margin_OceanWP)?>px;
            padding-right:<?php echo esc_attr($custom_margin_OceanWP)?>px;
        }

        .quick-variable-tooltip{
            top: <?php echo esc_attr($quick_variable_tooltip_top_OceanWP)?>px;
        }

        .quick-variable-tooltip #quick-product-details{
            padding-left: <?php echo esc_attr($quick_product_details_OceanWP_pl)?>px;
            padding-right: <?php echo esc_attr($quick_product_details_OceanWP_pr)?>px;
        }



        .variation-gallery-slider-single-product-page button i{
        color: <?php echo esc_attr($galleryNavigationButtonIconColor)?>
        }

        .variation-gallery-slider-single-product-page button i:hover{
        color: <?php echo esc_attr($galleryNavigationButtonIconHoverColor)?>
        }

        .variation-gallery-slider-single-product-page button{
        background-color: <?php echo esc_attr($galleryNavigationButtonBgColor)?>
        }

        .variation-gallery-slider-single-product-page button:hover{
        background-color: <?php echo esc_attr($galleryNavigationButtonBgHoverColor)?>
        }

        .woocommerce .product_type_variable {
        display: <?php echo esc_attr($variationDisplayNoneImportant); ?>
        }

        .table-template2-details-section{
        background-color: <?php echo esc_attr($template2DetailsSectionBgColor); ?> !important;
        }

        .table-template2-cart-section{
        background-color: <?php echo esc_attr($template2CartSectionBgColor); ?> !important;
        }
        .table-template2{
        background-color: <?php echo esc_attr($template2TableBgColor); ?> !important;
        }

        .bulk-add-to-cart{
        background-color: <?php echo esc_attr($bulkAddCartBgColor); ?>;
        color: <?php echo esc_attr($bulkAddCartTextColor); ?>;
        }
        button.bulk-add-to-cart:hover{
        background-color: <?php echo esc_attr($bulkAddCartHoverBgColor); ?>;
        color: <?php echo esc_attr($bulkAddCartHoverTextColor); ?>;
        }

        .badge-container{
        height: <?php echo esc_attr($listBadgeHeight); ?>px;
        width: <?php echo esc_attr($listBadgeWidth); ?>px;
        <?php echo esc_attr($displayRightBadge); ?>: 5px;
        }
        .badge-container {
        background-color: <?php echo esc_attr($listBadgeBgColor); ?>;
        color: <?php echo esc_attr($listBadgeTextColor); ?>;
        }

        .variations select {
        display: <?php echo esc_attr($displayNoneImportant); ?>;
        }
        .custom-image-button{
            border-color: <?php echo esc_attr($swatchesButtonBorderColor); ?>;
        }
        .custom-button {
        border-color: <?php echo esc_attr($swatchesButtonBorderColor); ?>;
        }
        .custom-color-button {
        border-color: <?php echo esc_attr($swatchesButtonBorderColor); ?>;
        }
        .custom-image-button.selected{
            border-color: <?php echo esc_attr($selectedVariationButtonBorderColor); ?>;
        }
        .custom-button.selected {
        border-color: <?php echo esc_attr($selectedVariationButtonBorderColor); ?>;
        }
        .custom-color-button.selected {
        border-color: <?php echo esc_attr($selectedVariationButtonBorderColor); ?>;
        }

        .custom-wc-variations input[type=radio].selected {
        border-color: <?php echo esc_attr($selectedVariationButtonBorderColor); ?>;
        }

        .custom-button {
        border-radius: <?php echo esc_attr($buttonBorderRadius); ?>px;
        height: <?php echo esc_attr($buttonHeight); ?>px;
        width: <?php echo esc_attr($buttonWidth); ?>px;
        }

        .quick-variable-tooltip{
        background-color: <?php echo esc_attr($tooltipBgColor); ?>
        }
        .quick-variable-tooltip #quick-product-content,
        .quick-variable-tooltip #quick-product-content h4{
        color:<?php echo esc_attr($tooltipTextColor); ?>;
        }

        .quick-quantity-container .quick-quantity-decrease,
        .quick-quantity-container .quick-quantity-increase{
            background-color:<?php echo esc_attr($quantityBg); ?>;
            color:<?php echo esc_attr($quantityTextColor); ?>;
        }

        .quick-quantity-container .quick-quantity-increase:hover,
        .quick-quantity-container .quick-quantity-decrease:hover {
            background-color: <?php echo esc_attr($quantityBgColorHover); ?>;
            color:<?php echo esc_attr($quantityTextHoverColor); ?>;
        }

        .quick-quantity-container input.quick-quantity-input {
            border: 1px solid <?php echo esc_attr($quantityBorderColor); ?> !important;
        }
        button.quick-add-to-cart{
            background-color:<?php echo esc_attr($cartButtonBg); ?>;
            color:<?php echo esc_attr($cartButtonTextColor); ?>;
        }
        button.quick-add-to-cart-shop-page{
        background-color:<?php echo esc_attr($cartButtonBg); ?>;
        color:<?php echo esc_attr($cartButtonTextColor); ?>;
        }
        button.quick-add-to-cart:hover{
            background-color:<?php echo esc_attr($cartButtonBgHover); ?>;
            color:<?php echo esc_attr($cartButtonTextHoverColor); ?>;
        }
        button.quick-add-to-cart-shop-page:hover{
            background-color:<?php echo esc_attr($cartButtonBgHover); ?>;
            color:<?php echo esc_attr($cartButtonTextHoverColor); ?>;
        }
        button.quick-add-to-cart-shop-page i.fa{
            display:<?php echo esc_attr($variableAddToCartIcon); ?>
        }
        #quick-variable-table th {
            background-color:<?php echo esc_attr( $tableHeadBgColor); ?>;
            color:<?php echo esc_attr($tableHeadTextColor); ?>;
        }
        #quick-variable-table td.quick-variable-title{
            color:<?php echo esc_attr($tableVariableTitleColor); ?>;
        }
        .quick-variable-slide button.slick-custom-arrow.slick-next.slick-arrow,
        .quick-variable-slide button.slick-custom-arrow.slick-prev.slick-arrow {
            background-color:<?php echo esc_attr( $carouselButtonBgColor ); ?>;
            color:<?php echo esc_attr( $carouselButtonIconColor ); ?>;
        }
        #quick-variable-table,
        #quick-variable-table td,
        #quick-variable-table th {
            border: <?php echo esc_attr(($quickTableBorder == "true") ? '1' : '0'); ?>px solid <?php echo esc_attr( $tableBorderColor ); ?>;
        }
        #quick-variable-table tr:nth-child(odd) {
            background-color: <?php echo esc_attr($tableBgColorOdd); ?>;
        }
        #quick-variable-table tr:nth-child(odd) td{
        background-color: <?php echo esc_attr($tableBgColorOdd); ?>;
        }
        #quick-variable-table tr:nth-child(even) {
            background-color: <?php echo esc_attr($tableBgColorEven); ?>;
        }
        #quick-variable-table tr:nth-child(even) td{
        background-color: <?php echo esc_attr($tableBgColorEven); ?>;
        }
        #quick-variable-table tr:hover td{
            background-color: <?php echo esc_attr($tableBgColorHover); ?>;
        }

        <?php
        $dynamic_css = ob_get_clean();
        wp_add_inline_style('main-css', $dynamic_css);
    }

}