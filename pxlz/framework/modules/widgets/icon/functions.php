<?php

if (!function_exists('pxlz_edgtf_register_icon_widget')) {
    /**
     * Function that register icon widget
     */
    function pxlz_edgtf_register_icon_widget($widgets) {
        $widgets[] = 'PxlzEdgefIconWidget';

        return $widgets;
    }

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_icon_widget');
}