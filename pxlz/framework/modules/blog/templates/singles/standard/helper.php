<?php

if (!function_exists('pxlz_edgtf_get_blog_holder_params')) {
    /**
     * Function that generates params for holders on blog templates
     */
    function pxlz_edgtf_get_blog_holder_params($params) {
        $params_list = array();

        $params_list['holder'] = 'edgtf-container';
        $params_list['inner'] = 'edgtf-container-inner clearfix';

        return $params_list;
    }

    add_filter('pxlz_edgtf_blog_holder_params', 'pxlz_edgtf_get_blog_holder_params');
}

if (!function_exists('pxlz_edgtf_get_blog_single_holder_classes')) {
    /**
     * Function that generates blog holder classes for single blog page
     */
    function pxlz_edgtf_get_blog_single_holder_classes($classes) {
        $sidebar_classes = array();
        $sidebar_classes[] = 'edgtf-grid-large-gutter';

        $classes = $classes . ' ' . implode(' ', $sidebar_classes);

        return $classes;
    }

    add_filter('pxlz_edgtf_blog_single_holder_classes', 'pxlz_edgtf_get_blog_single_holder_classes');
}

if (!function_exists('pxlz_edgtf_blog_part_params')) {
    function pxlz_edgtf_blog_part_params($params) {

        $part_params = array();
        $part_params['title_tag'] = 'h2';
        $part_params['link_tag'] = 'h2';
        $part_params['quote_tag'] = 'h2';

        return array_merge($params, $part_params);
    }

    add_filter('pxlz_edgtf_blog_part_params', 'pxlz_edgtf_blog_part_params');
}