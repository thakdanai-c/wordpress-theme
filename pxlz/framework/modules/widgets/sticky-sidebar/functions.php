<?php

if (!function_exists('pxlz_edgtf_register_sticky_sidebar_widget')) {
    /**
     * Function that register sticky sidebar widget
     */
    function pxlz_edgtf_register_sticky_sidebar_widget($widgets) {
        $widgets[] = 'PxlzEdgefStickySidebar';

        return $widgets;
    }

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_sticky_sidebar_widget');
}