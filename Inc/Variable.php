<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Quickvariables
{
    /**
     * Define Constant.
     *
     * @return void
     * @since 1.0.0
     *
     */
    public function __construct(){

        add_action('wp', function() {

            $variableSetting                = get_option('variable_all_checked', array());
            $variationSelectOnOff           = isset($variableSetting['variationSelectOnOff']) ? $variableSetting['variationSelectOnOff'] : '';
            if ($variationSelectOnOff === "true" ) {
                    add_filter( 'woocommerce_dropdown_variation_attribute_options_html', [ $this, 'variation_select_options_swatches' ], 20, 2 );
            }
        });
        $variableSetting               = get_option('variable_all_checked', array());
        $quickCarouselPosition         = isset($variableSetting['quickCarouselPosition']) ? $variableSetting['quickCarouselPosition'] : 'woocommerce_after_shop_loop_item';
        $quickTablePosition            = isset($variableSetting['quickTablePosition']) ? $variableSetting['quickTablePosition'] : 'woocommerce_after_single_product_summary';


        add_action( $quickCarouselPosition, [$this,"quick_display_product_variations",]);
        add_action( $quickTablePosition, [ $this,"quick_variables_single_page",]);
    }

    /**
     * Get all variations of the variable products into shop page.
     *
     * @return void
     * @since 1.0.0
     */
    public function quick_display_product_variations()
    {
        require plugin_dir_path(__FILE__) . "/Templates/Variable-slider.php";

    }

    /**
     * Variations Table Single Product Page.
     *
     * @return void
     * @since 1.0.0
     */
    function quick_variables_single_page()
    {
        global $product;

        if (is_product() && $product->is_type('variable')) {
            $term_order = $this->get_product_term_order($product);

            // Localize the script with term order data
            wp_localize_script('frontend-js', 'productTermOrder', $term_order);

            require_once plugin_dir_path(__FILE__) . "/Templates/Variable-single-table.php";
        }
    }

    /**
     * Get the term order for product variations.
     *
     * @param WC_Product $product
     * @return array
     */
    private function get_product_term_order($product)
    {
        $term_order = [];

        $attributes = $product->get_attributes();

        foreach ($attributes as $attribute_name => $attribute) {
            if ($attribute->is_taxonomy()) {
                $terms = wc_get_product_terms($product->get_id(), $attribute_name, ['fields' => 'all']);
                foreach ($terms as $index => $term) {
                    $term_order[$attribute_name][$term->slug] = $index + 1;
                }
            }
        }
        return $term_order;
    }

    /**
     * Variations Slide Popup Product Page.
     *
     * @return void
     * @since 1.0.0
     */
    public function quickVariablePopup()
    {
        require plugin_dir_path(__FILE__) . "/Templates/Variable-popup.php";
    }

    /**
     * Replace dropdowns with buttons for product variations.
     *
     * @param string $html The default dropdown HTML.
     * @param array  $args The arguments for the dropdown.
     * @return string | void Modified HTML with buttons.
     * @since 1.0.3
     */
    public function variation_select_options_swatches( $html, $args ) {
        global $post;
        $variableSetting                 = get_option('variable_all_checked', array());
        $globallyTooltipOnOff            = isset($variableSetting['globallyTooltipOnOff']) ? $variableSetting['globallyTooltipOnOff'] : '';
        $selectVariationTooltipBgColor   = isset($variableSetting['selectVariationTooltipBgColor']) ? $variableSetting['selectVariationTooltipBgColor'] : '#000000';
        $selectVariationTooltipTextColor = isset($variableSetting['selectVariationTooltipTextColor']) ? $variableSetting['selectVariationTooltipTextColor'] : '#FFFFFF';
        $selectVariationButtonBgColor    = isset($variableSetting['selectVariationButtonBgColor']) ? $variableSetting['selectVariationButtonBgColor'] : '#0071a1';
        $selectVariationButtonTextColor  = isset($variableSetting['selectVariationButtonTextColor']) ? $variableSetting['selectVariationButtonTextColor'] : '#FFFFFF';
        $imageColorWidth                 = isset($variableSetting['imageColorWidth']) ? $variableSetting['imageColorWidth'] : '40';
        $imageColorHeight                = isset($variableSetting['imageColorHeight']) ? $variableSetting['imageColorHeight'] : '40';
        $imageColorBorderRadius          = isset($variableSetting['imageColorBorderRadius']) ? $variableSetting['imageColorBorderRadius'] : '50';

        $term_order = [];
        global $product;
        $attributes = $product->get_attributes();

        foreach ($attributes as $attribute_name => $attribute) {
            if ($attribute->is_taxonomy()) {
                // For taxonomy-based attributes
                $terms = wc_get_product_terms($product->get_id(), $attribute_name, ['fields' => 'all']);
                foreach ($terms as $index => $term) {
                    $term_order[$attribute_name][$term->slug] = $index + 1;
                }
            } else {
                // For custom attributes (non-taxonomy)
                $attribute_values = $attribute->get_options(); // Get the values of the custom attribute
                foreach ($attribute_values as $index => $value) {
                    $term_order[$attribute_name][$value] = $index + 1; // Assign an index to each custom attribute value
                }
            }
        }

        /** @var array $args */
        $args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), [
            'options'          => false,
            'attribute'        => false,
            'product'          => false,
            'selected'         => false,
            'name'             => '',
            'id'               => '',
            'class'            => '',
            'show_option_none' => __('Choose an option', 'product-variation-table-with-quick-cart'),
        ]);

        /** @var WC_Product_Variable $product */
        $options          = $args['options'];
        $product          = $args['product'];
        $attribute        = $args['attribute'];
        $name             = $args['name'] ?: 'attribute_'.sanitize_title($attribute);
        $id               = $args['id'] ?: sanitize_title($attribute);
        $class            = $args['class'];
        $show_option_none = (bool)$args['show_option_none'];



        // Inside vb_custom_variation_buttons method
        if (!empty($attribute)) {
            if ($product && taxonomy_exists($attribute)) {
                $attribute_id = null;
                // Debugging attribute data
                if ($product instanceof WC_Product_Variable) {
                    $attributes = $product->get_attributes();

                    if (isset($attributes[$attribute])) {
                        $attribute_data = $attributes[$attribute];

                        if ($attribute_data->is_taxonomy()) {
                            $attribute_id = $attribute_data->get_id();
                        }
                    }
                }

                $meta_display_type = get_post_meta($post->ID, 'variation_meta_attribute_display_type_' . $attribute_id, true);

                if (empty($meta_display_type)){
                    $display_type          = get_option( 'wc_attribute_display_type_' . $attribute_id );
                }else{
                    $display_type = $meta_display_type;
                }

                $show_option_none_text = $args['show_option_none'] ?: __('Choose an option', 'product-variation-table-with-quick-cart');

                // Get selected value.
//                if ($attribute && $product instanceof WC_Product && $args['selected'] === false) {
//                    $selected_key     = 'attribute_'.sanitize_title($attribute);
//                    $args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key]))
//                        : $product->get_variation_default_attribute($attribute);
//                }

                if (empty($options) && ! empty($product) && ! empty($attribute)) {
                    $attributes = $product->get_variation_attributes();
                    $options    = $attributes[$attribute];
                }
                if ($display_type === 'radio') {
                    $radios = '<div class="custom-wc-variations">';

                    if ( ! empty($options)) {
                        if ($product && taxonomy_exists($attribute)) {
                            $terms              = wc_get_product_terms($product->get_id(), $attribute, ['fields' => 'all']);
                            $variations_by_term = get_available_variations_by_term($product, $attribute);

                            foreach ($terms as $term) {
                                $available_variations = isset($variations_by_term[$term->slug]) ? $variations_by_term[$term->slug] : [];
                                $variations_json      = htmlspecialchars(wp_json_encode($available_variations), ENT_QUOTES, 'UTF-8');

                                if (in_array($term->slug, $options, true)) {

                                    $radios .= '<input type="radio" name="custom_'.esc_attr($name).'" 
                                    data-available-variations="' . esc_attr($variations_json) . '" 
                                    data-value="'.esc_attr($term->slug).'" id="'
                                        .esc_attr($name).'_'.esc_attr($term->slug).'" data-variation-name="'.esc_attr($name).'" '
                                        .checked(sanitize_title($args['selected']), $term->slug, false).'>';
                                    $radios .= '<label for="'.esc_attr($name).'_'.esc_attr($term->slug).'">';
                                    $radios .= esc_html(apply_filters('woocommerce_variation_option_name', $term->name));
                                    $radios .= '</label>';

                                }
                            }
                        } else {
                            foreach ($options as $option) {
                                $checked = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'],
                                    sanitize_title($option), false) : checked($args['selected'], $option, false);
                                $radios  .= '<input type="radio" name="custom_'.esc_attr($name).'"
                                data-value="'.esc_attr($option).'" id="'
                                    .esc_attr($name).'_'.esc_attr($option).'" data-variation-name="'.esc_attr($name).'" '.$checked.'>';
                                $radios  .= '<label for="'.esc_attr($name).'_'.esc_attr($option).'">';
                                $radios  .= esc_html(apply_filters('woocommerce_variation_option_name', $option));
                                $radios  .= '</label>';
                            }
                        }
                    }

                    $radios .= '</div>';

                    return $html.$radios;
                }elseif ($display_type === 'button' || $display_type === "select" || empty($display_type)) {

                    $buttons = '<div class="custom-wc-buttons">';

                    if (!empty($options)) {
                        if ($product && taxonomy_exists($attribute)) {
                            $terms              = wc_get_product_terms($product->get_id(), $attribute, ['fields' => 'all']);
                            $variations_by_term = get_available_variations_by_term($product, $attribute);

                            foreach ($terms as $term) {
                                if (in_array($term->slug, $options, true)) {
                                    $selected             = sanitize_title($args['selected']) === $term->slug ? 'selected' : '';
                                    $term_id              = $term->term_id;
                                    $check_meta_tooltip   = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $term_id . '_' . $attribute_id, true);
                                    $available_variations = isset($variations_by_term[$term->slug]) ? $variations_by_term[$term->slug] : [];
                                    $variations_json      = htmlspecialchars(wp_json_encode($available_variations), ENT_QUOTES, 'UTF-8');

                                    if (!empty($check_meta_tooltip) && $globallyTooltipOnOff === 'true') {
                                        $tooltip = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $term_id . '_' . $attribute_id, true);
                                    }else{
                                        if ($globallyTooltipOnOff === 'true'){
                                            $tooltip = get_term_meta($term_id, 'term_tooltip', true);
                                        } else {
                                            $tooltip = '';
                                        }
                                    }
                                    if (empty($tooltip) && $globallyTooltipOnOff === 'true'){
                                        $tooltip = $term->name;
                                    }

                                    $buttons .= '<button type="button" class="custom-button ' . esc_attr($selected) . '" 
                                                data-value="' . esc_attr($term->slug) . '" 
                                                data-variation-name="' . esc_attr($name) . '" 
                                                data-tooltip="' . esc_attr($tooltip) . '" 
                                                data-label-name="' . esc_attr($term->name) . '" 
                                                data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                                data-available-variations="' . esc_attr($variations_json) . '" 
                                                data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                                data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '"
                                                style=" background-color: ' . esc_attr($selectVariationButtonBgColor) . '; 
                                                color: ' . esc_attr($selectVariationButtonTextColor) . ';">';
                                    $buttons .= esc_html(apply_filters('woocommerce_variation_option_name', $term->name));
                                    $buttons .= '</button>';
                                }
                            }
                        } else {
                            foreach ($options as $option) {
                                $selected = sanitize_title($args['selected']) === $option ? 'selected' : '';
                                $buttons .= '<button type="button" class="custom-button ' . esc_attr($selected) . '" 
                                data-value="' . esc_attr($option) . '" 
                                data-variation-name="' . esc_attr($name) . '">';
                                $buttons .= esc_html(apply_filters('woocommerce_variation_option_name', $option));
                                $buttons .= '</button>';
                            }
                        }
                    }

                    $buttons .= '</div>';

                    return $html . $buttons;
                }elseif ($display_type === 'image') {
                    $images = '<div class="custom-wc-images">';

                    if (!empty($options)) {
                        if ($product && taxonomy_exists($attribute)) {
                            $terms              = wc_get_product_terms($product->get_id(), $attribute, ['fields' => 'all']);
                            $variations_by_term = get_available_variations_by_term($product, $attribute);

                            foreach ($terms as $term) {
                                if (in_array($term->slug, $options, true)) {
                                    $selected             = sanitize_title($args['selected']) === $term->slug ? 'selected' : '';
                                    $term_id              = $term->term_id;
                                    $check_meta_tooltip   = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $term_id . '_' . $attribute_id, true);
                                    $check_meta_image     = get_post_meta($post->ID, 'variation_meta_attribute_image_' . $term_id . '_' . $attribute_id, true);
                                    $available_variations = isset($variations_by_term[$term->slug]) ? $variations_by_term[$term->slug] : [];
                                    $variations_json      = htmlspecialchars(wp_json_encode($available_variations), ENT_QUOTES, 'UTF-8');

                                    if (!empty($check_meta_tooltip) && $globallyTooltipOnOff === 'true') {
                                        $tooltip = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $term_id . '_' . $attribute_id, true);
                                    }else{
                                        if ($globallyTooltipOnOff === 'true'){
                                            $tooltip = get_term_meta($term_id, 'term_tooltip', true);
                                        }else {
                                            $tooltip = '';
                                        }
                                    }

                                    if (empty($tooltip) && $globallyTooltipOnOff === 'true'){
                                        $tooltip = $term->name;
                                    }

                                    if (!empty($check_meta_image)) {
                                        $image = get_post_meta($post->ID, 'variation_meta_attribute_image_' . $term_id . '_' . $attribute_id, true);
                                    }else{
                                        $image   = get_term_meta($term_id, 'term_image', true);
                                    }

                                    $image_url = $image ? (is_numeric($image) ? wp_get_attachment_url($image) : esc_url($image)) : '';

                                    $images .= '<button type="button" class="custom-image-button ' . esc_attr($selected) . '" 
                                                data-value="' . esc_attr($term->slug) . '" 
                                                data-variation-name="' . esc_attr($name) . '"
                                                data-label-name="' . esc_attr($term->name) . '"  
                                                data-tooltip="' . esc_attr($tooltip) . '" 
                                                data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                                data-available-variations="' . esc_attr($variations_json) . '" 
                                                data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                                data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '"
                                                style=" height: ' . esc_attr($imageColorHeight) . 'px; 
                                                width: ' . esc_attr($imageColorWidth) . 'px; 
                                                border-radius: ' . esc_attr($imageColorBorderRadius) . 'px;">';

                                    if ($image_url) {
                                        $image_id = attachment_url_to_postid($image_url);
                                        if ($image_id) {
                                            $images .= wp_get_attachment_image($image_id, 'full', false, [
                                                'alt'   => esc_attr($term->name),
                                                'style' => 'height: ' . esc_attr($imageColorHeight) . 'px; 
                                                            width: ' . esc_attr($imageColorWidth) . 'px; 
                                                            border-radius: ' . esc_attr($imageColorBorderRadius) . 'px;'
                                            ]);
                                        }else{
                                            $images .= '<span class="term-name">' . esc_html($term->name) . '</span>';
                                        }
                                    } else {
                                        $images .= '<span class="term-name">' . esc_html($term->name) . '</span>';
                                    }

                                    $images .= '</button>';
                                }
                            }
                        }
                    }

                    $images .= '</div>';

                    return $html . $images;
                }elseif ($display_type === "color") {
                    $colors = '<div class="custom-wc-colors">';

                    if (!empty($options)) {
                        if ($product && taxonomy_exists($attribute)) {
                            $terms              = wc_get_product_terms($product->get_id(), $attribute, ['fields' => 'all']);
                            $variations_by_term = get_available_variations_by_term($product, $attribute);

                            foreach ($terms as $term) {
                                if (in_array($term->slug, $options, true)) {

                                    $selected                   = sanitize_title($args['selected']) === $term->slug ? 'selected' : '';
                                    $term_id                    = $term->term_id;
                                    $check_meta_tooltip         = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $term_id . '_' . $attribute_id, true);
                                    $check_meta_color           = get_post_meta($post->ID, 'variation_meta_attribute_color_' . $term_id . '_' . $attribute_id, true);
                                    $check_meta_secondary_color = get_post_meta($post->ID, 'variation_meta_attribute_secondary_color_' . $term_id . '_' . $attribute_id, true);
                                    $available_variations       = isset($variations_by_term[$term->slug]) ? $variations_by_term[$term->slug] : [];
                                    $variations_json            = htmlspecialchars(wp_json_encode($available_variations), ENT_QUOTES, 'UTF-8');

                                    if (!empty($check_meta_tooltip) && $globallyTooltipOnOff === 'true') {
                                        $tooltip = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $term_id . '_' . $attribute_id, true);
                                    }else{
                                        if ($globallyTooltipOnOff === 'true'){
                                            $tooltip = get_term_meta($term_id, 'term_tooltip', true);
                                        }else {
                                            $tooltip = '';
                                        }
                                    }

                                    if (empty($tooltip) && $globallyTooltipOnOff === 'true'){
                                        $tooltip = $term->name;
                                    }

                                    if (!empty($check_meta_color)) {
                                        $color = get_post_meta($post->ID, 'variation_meta_attribute_color_' . $term_id . '_' . $attribute_id, true);
                                    }else{
                                        $color   = get_term_meta($term_id, 'term_color', true);
                                    }

                                    if (!empty($check_meta_secondary_color)) {
                                        $secondary_color = get_post_meta($post->ID, 'variation_meta_attribute_secondary_color_' . $term_id . '_' . $attribute_id, true);
                                    }else{
                                        $secondary_color   = get_term_meta($term_id, 'term_secondary_color', true);
                                    }

                                    if (!empty($color)) {

                                        if ($secondary_color){
                                            $colors .= '<button type="button" class="custom-color-button ' . esc_attr($selected) . '" 
                                                   data-value="' . esc_attr($term->slug) . '" 
                                                   data-variation-name="' . esc_attr($name) . '" 
                                                   data-tooltip="' . esc_attr($tooltip) . '"
                                                   data-label-name="' . esc_attr($term->name) . '" 
                                                   data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                                   data-available-variations="' . esc_attr($variations_json) . '" 
                                                   data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                                   data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '" 
                                                   style="background: linear-gradient(to right, ' . esc_attr($color) . ' 50%, ' . esc_attr($secondary_color) . ' 50%); 
                                                   height: ' . esc_attr($imageColorHeight) . 'px; 
                                                   width: ' . esc_attr($imageColorWidth) . 'px; 
                                                   border-radius: ' . esc_attr($imageColorBorderRadius) . 'px; 
                                                   display: flex; 
                                                   justify-content: center; 
                                                   align-items: center;">';

                                            $colors .= '<span class="color-label">' . esc_html($term->name) . '</span>';
                                        }else{
                                            $colors .= '<button type="button" class="custom-color-button ' . esc_attr($selected) . '" 
                                                   data-value="' . esc_attr($term->slug) . '" 
                                                   data-variation-name="' . esc_attr($name) . '" 
                                                   data-tooltip="' . esc_attr($tooltip) . '"
                                                   data-label-name="' . esc_attr($term->name) . '" 
                                                   data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                                   data-available-variations="' . esc_attr($variations_json) . '" 
                                                   data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                                   data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '" 
                                                   style=" background-color: ' . esc_attr($color) . '; 
                                                   height: ' . esc_attr($imageColorHeight) . 'px; 
                                                   width: ' . esc_attr($imageColorWidth) . 'px; 
                                                   border-radius: ' . esc_attr($imageColorBorderRadius) . 'px; 
                                                   display: flex; 
                                                   justify-content: center; 
                                                   align-items: center;">';

                                            $colors .= '<span class="color-label">' . esc_html($term->name) . '</span>';
                                        }
                                    } else {

                                        $colors .= '<button type="button" class="custom-color-button ' . esc_attr($selected) . '" 
                                                   data-value="' . esc_attr($term->slug) . '" 
                                                   data-variation-name="' . esc_attr($name) . '" 
                                                   data-tooltip="' . esc_attr($tooltip) . '" 
                                                   data-label-name="' . esc_attr($term->name) . '" 
                                                   data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\' 
                                                   data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                                   data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '" 
                                                   style=" background-color: ' . esc_attr($color) . '; 
                                                   height: ' . esc_attr($imageColorHeight) . 'px; 
                                                   width: ' . esc_attr($imageColorWidth) . 'px; 
                                                   border-radius: ' . esc_attr($imageColorBorderRadius) . 'px;  
                                                   justify-content: center; align-items: center;">';

                                        $colors .= '<span class="term-name">' . esc_html($term->name) . '</span>';
                                    }
                                    $colors .= '</button>';

                                    $colors .= '</button>';
                                }
                            }
                        }
                    }

                    $colors .= '</div>';

                    return $html . $colors;
                }
            } else {
                $attribute_id = wc_attribute_taxonomy_id_by_name($attribute);
                $display_type = get_post_meta($post->ID, 'variation_meta_attribute_display_type_' . $attribute_id, true);
                $tooltip = '';

                if ($display_type === "button" || $display_type === "select" || empty($display_type)) {
                    $buttons = '<div class="custom-wc-buttons">';

                    if (!empty($options)) {
                        foreach ($options as $option) {

                            // Sanitize and match the selected value
                            $option_value = is_object($option) ? sanitize_title($option->name) : sanitize_title($option);
                            $selected = $option_value === sanitize_title($args['selected']) ? 'selected' : '';

                            $custom_value_slug = sanitize_title($option);
                            if ($globallyTooltipOnOff === 'true'){
                                $tooltip           = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $custom_value_slug . '_' . $attribute_id, true);
                            }

                            if (empty($tooltip) && $globallyTooltipOnOff === 'true'){
                                if (is_object($option)) {
                                    $tooltip = $option->name;
                                } else {
                                    $tooltip = $option;
                                }

                            }

                            $buttons .= '<button type="button" class="custom-button ' . esc_attr($selected) . '" 
                                        data-value="' . esc_attr($option) . '" 
                                        data-variation-name="' . esc_attr($name) . '"
                                        data-tooltip="' . esc_attr($tooltip) . '" 
                                        data-label-name="' . esc_attr($option) . '" 
                                        data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                        data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                        data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '"
                                        style=" background-color: ' . esc_attr($selectVariationButtonBgColor) . '; 
                                        color: ' . esc_attr($selectVariationButtonTextColor) . ';">';
                            $buttons .= esc_html(apply_filters('woocommerce_variation_option_name', $option));
                            $buttons .= '</button>';
                        }
                    }

                    $buttons .= '</div>';

                    return $html . $buttons;
                }elseif ($display_type === 'radio') {
                    $radios = '<div class="custom-wc-variations">';

                    if ( ! empty($options)) {
                        foreach ($options as $option) {
                            $checked = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'],
                                sanitize_title($option), false) : checked($args['selected'], $option, false);
                            $radios  .= '<input type="radio" name="custom_'.esc_attr($name).'" data-value="'.esc_attr($option).'" id="'
                                .esc_attr($name).'_'.esc_attr($option).'" data-variation-name="'.esc_attr($name).'" '.$checked.'>';
                            $radios  .= '<label for="'.esc_attr($name).'_'.esc_attr($option).'">';
                            $radios  .= esc_html(apply_filters('woocommerce_variation_option_name', $option));
                            $radios  .= '</label>';
                        }
                    }

                    $radios .= '</div>';

                    return $html.$radios;
                }elseif ($display_type === 'image') {
                    $images = '<div class="custom-wc-images">';

                    if (!empty($options)) {
                        foreach ($options as $option) {

                            $custom_value_slug = sanitize_title($option);
                            // Sanitize and match the selected value
                            $option_value = is_object($option) ? sanitize_title($option->name) : sanitize_title($option);
                            $selected = $option_value === sanitize_title($args['selected']) ? 'selected' : '';

                            $image             = get_post_meta($post->ID, 'variation_meta_attribute_image_' . $custom_value_slug . '_' . $attribute_id, true);
                            $image_url         = $image ? (is_numeric($image) ? wp_get_attachment_url($image) : esc_url($image)) : '';

                            if ($globallyTooltipOnOff === 'true'){
                                $tooltip           = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $custom_value_slug . '_' . $attribute_id, true);
                            }

                            if (empty($tooltip) && $globallyTooltipOnOff === 'true'){
                                if (is_object($option)) {
                                    $tooltip = $option->name;
                                } else {
                                    $tooltip = $option;
                                }
                            }

                            $images .= '<button type="button" class="custom-image-button ' . esc_attr($selected) . '" 
                                        data-value="' . esc_attr($option) . '" 
                                        data-variation-name="' . esc_attr($name) . '" 
                                        data-tooltip="' . esc_attr($tooltip) . '" 
                                        data-label-name="' . esc_attr($option) . '" 
                                        data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                        data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                        data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '"
                                        style=" height: ' . esc_attr($imageColorHeight) . 'px; 
                                        width: ' . esc_attr($imageColorWidth) . 'px; 
                                        border-radius: ' . esc_attr($imageColorBorderRadius) . 'px;">';

                            if ($image_url) {
                                $image_id = attachment_url_to_postid($image_url);
                                    if ($image_id){
                                        $images .= wp_get_attachment_image($image_id, 'full', false, [
                                            'alt'   => esc_attr($option),
                                            'style' => 'height: ' . esc_attr($imageColorHeight) . 'px; 
                                                            width: ' . esc_attr($imageColorWidth) . 'px; 
                                                            border-radius: ' . esc_attr($imageColorBorderRadius) . 'px;'
                                        ]);
                                    }else{
                                        $images .= '<span class="term-name">' . esc_html($option) . '</span>';
                                    }
                            } else {
                                $images .= '<span class="term-name">' . esc_html($option) . '</span>';
                            }

                            $images .= '</button>';
                        }
                    }

                    $images .= '</div>';

                    return $html . $images;
                }elseif ($display_type === "color") {
                    $colors = '<div class="custom-wc-colors">';

                    if (!empty($options)) {
                        foreach ($options as $option) {

                            $custom_value_slug = sanitize_title($option);
                            // Sanitize and match the selected value
                            $option_value = is_object($option) ? sanitize_title($option->name) : sanitize_title($option);
                            $selected = $option_value === sanitize_title($args['selected']) ? 'selected' : '';

                            $color             = get_post_meta($post->ID, 'variation_meta_attribute_color_' . $custom_value_slug . '_' . $attribute_id, true);

                            if ($globallyTooltipOnOff === 'true'){
                                $tooltip           = get_post_meta($post->ID, 'variation_meta_attribute_tooltip_' . $custom_value_slug . '_' . $attribute_id, true);
                            }

                            if (empty($tooltip) && $globallyTooltipOnOff === 'true'){
                                if (is_object($option)) {
                                    $tooltip = $option->name;
                                } else {
                                    $tooltip = $option;
                                }
                            }

                            if (!empty($color)) {

                                $colors .= '<button type="button" class="custom-color-button ' . esc_attr($selected) . '" 
                                               data-value="' . esc_attr($option) . '" 
                                               data-variation-name="' . esc_attr($name) . '" 
                                               data-tooltip="' . esc_attr($tooltip) . '" 
                                               data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                               data-label-name="' . esc_attr($option) . '" 
                                               data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                               data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '" 
                                               style="background-color: ' . esc_attr($color) . '; 
                                               height: ' . esc_attr($imageColorHeight) . 'px; 
                                               width: ' . esc_attr($imageColorWidth) . 'px; 
                                               border-radius: ' . esc_attr($imageColorBorderRadius) . 'px; 
                                               display: flex; 
                                               justify-content: center; 
                                               align-items: center;">';

                                $colors .= '<span class="color-label">' . esc_html($option) . '</span>';
                            } else {

                                $colors .= '<button type="button" class="custom-color-button ' . esc_attr($selected) . '" 
                                                   data-value="' . esc_attr($custom_value_slug) . '" 
                                                   data-variation-name="' . esc_attr($name) . '" 
                                                   data-tooltip="' . esc_attr($tooltip) . '"  
                                                   data-label-name="' . esc_attr($option) . '" 
                                                   data-term-order=\'' . esc_attr(wp_json_encode($term_order)) . '\'
                                                   data-tooltip-bg-color="' . esc_attr($selectVariationTooltipBgColor) . '" 
                                                   data-tooltip-text-color="' . esc_attr($selectVariationTooltipTextColor) . '" 
                                                   style=" background-color: ' . esc_attr($color) . '; 
                                                   height: ' . esc_attr($imageColorHeight) . 'px; 
                                                   width: ' . esc_attr($imageColorWidth) . 'px; 
                                                   border-radius: ' . esc_attr($imageColorBorderRadius) . 'px;  
                                                   justify-content: center; align-items: center;">';

                                $colors .= '<span class="term-name">' . esc_html($option) . '</span>';
                            }
                            $colors .= '</button>';

                            $colors .= '</button>';
                        }
                    }

                    $colors .= '</div>';

                    return $html . $colors;
                }
            }
        }
    }

}

/**
 * Get all available variations for each term.
 *
 * @param WC_Product_Variable $product The product object.
 * @param string $attribute The attribute to filter variations by.
 * @return array
 * @since 1.0.0
 */
function get_available_variations_by_term($product, $attribute) {
    $available_variations = [];

    if ($product && $product instanceof WC_Product_Variable) {
        $variations = $product->get_available_variations();
        $attribute_terms = wc_get_product_terms($product->get_id(), $attribute, ['fields' => 'all']);

        foreach ($attribute_terms as $term) {
            $term_variations = [];

            foreach ($variations as $variation) {
                $attributes = $variation['attributes'];

                // Match specific attribute or any_* attribute
                if (
                    isset($attributes['attribute_' . $attribute]) &&
                    ($attributes['attribute_' . $attribute] === $term->slug ||
                        strpos($attributes['attribute_' . $attribute], 'any') === 0)
                ) {
                    $term_variations[] = $variation;
                }
            }

            $available_variations[$term->slug] = $term_variations;
        }
    }

    return $available_variations;
}