<?php

if (!function_exists('pxlz_edgtf_register_sidearea_opener_widget')) {
    /**
     * Function that register sidearea opener widget
     */
    function pxlz_edgtf_register_sidearea_opener_widget($widgets) {
        $widgets[] = 'PxlzEdgefSideAreaOpener';

        return $widgets;
    }

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_sidearea_opener_widget');
}