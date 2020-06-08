<?php

if (!function_exists('pxlz_edgtf_register_blog_list_widget')) {
    /**
     * Function that register blog list widget
     */
    function pxlz_edgtf_register_blog_list_widget($widgets) {
        $widgets[] = 'PxlzEdgefBlogListWidget';

        return $widgets;
    }

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_blog_list_widget');
}