<?php

if (!function_exists('pxlz_edgtf_add_product_list_carousel_shortcode')) {
    function pxlz_edgtf_add_product_list_carousel_shortcode($shortcodes_class_name) {
        $shortcodes = array(
            'EdgeCore\CPT\Shortcodes\ProductListCarousel\ProductListCarousel',
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    if (pxlz_edgtf_core_plugin_installed()) {
        add_filter('edgtf_core_filter_add_vc_shortcode', 'pxlz_edgtf_add_product_list_carousel_shortcode');
    }
}

if (!function_exists('pxlz_edgtf_add_product_list_carousel_into_shortcodes_list')) {
    function pxlz_edgtf_add_product_list_carousel_into_shortcodes_list($woocommerce_shortcodes) {
        $woocommerce_shortcodes[] = 'edgtf_product_list_carousel';

        return $woocommerce_shortcodes;
    }

    add_filter('pxlz_edgtf_woocommerce_shortcodes_list', 'pxlz_edgtf_add_product_list_carousel_into_shortcodes_list');
}