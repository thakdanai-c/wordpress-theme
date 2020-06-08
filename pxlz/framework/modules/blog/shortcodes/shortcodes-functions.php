<?php

if (!function_exists('pxlz_edgtf_include_blog_shortcodes')) {
    function pxlz_edgtf_include_blog_shortcodes() {
        include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
        include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-slider/blog-slider.php';
    }

    if (pxlz_edgtf_core_plugin_installed()) {
        add_action('edgtf_core_action_include_shortcodes_file', 'pxlz_edgtf_include_blog_shortcodes');
    }
}

if (!function_exists('pxlz_edgtf_add_blog_shortcodes')) {
    function pxlz_edgtf_add_blog_shortcodes($shortcodes_class_name) {
        $shortcodes = array(
            'EdgeCore\CPT\Shortcodes\BlogList\BlogList',
            'EdgeCore\CPT\Shortcodes\BlogSlider\BlogSlider'
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    if (pxlz_edgtf_core_plugin_installed()) {
        add_filter('edgtf_core_filter_add_vc_shortcode', 'pxlz_edgtf_add_blog_shortcodes');
    }
}

if (!function_exists('pxlz_edgtf_set_blog_list_icon_class_name_for_vc_shortcodes')) {
    /**
     * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
     */
    function pxlz_edgtf_set_blog_list_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
        $shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
        $shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';

        return $shortcodes_icon_class_array;
    }

    if (pxlz_edgtf_core_plugin_installed()) {
        add_filter('edgtf_core_filter_add_vc_shortcodes_custom_icon_class', 'pxlz_edgtf_set_blog_list_icon_class_name_for_vc_shortcodes');
    }
}