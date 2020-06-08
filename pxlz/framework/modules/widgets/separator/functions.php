<?php

if (!function_exists('pxlz_edgtf_register_separator_widget')) {
    /**
     * Function that register separator widget
     */
    function pxlz_edgtf_register_separator_widget($widgets) {
        $widgets[] = 'PxlzEdgefSeparatorWidget';

        return $widgets;
    }

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_separator_widget');
}