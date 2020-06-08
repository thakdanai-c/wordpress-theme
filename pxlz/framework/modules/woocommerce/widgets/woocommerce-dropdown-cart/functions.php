<?php

if (!function_exists('pxlz_edgtf_register_woocommerce_dropdown_cart_widget')) {
    /**
     * Function that register image gallery widget
     */
    function pxlz_edgtf_register_woocommerce_dropdown_cart_widget($widgets) {
        $widgets[] = 'PxlzEdgefWoocommerceDropdownCart';

        return $widgets;
    }

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_woocommerce_dropdown_cart_widget');
}