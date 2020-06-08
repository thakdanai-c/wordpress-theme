<?php

if (!function_exists('pxlz_edgtf_get_blog_holder_params')) {
    /**
     * Function that generates params for holders on blog templates
     */
    function pxlz_edgtf_get_blog_holder_params($params) {
        $params_list = array();

        $masonry_layout = pxlz_edgtf_get_meta_field_intersect('blog_masonry_layout');
        if ($masonry_layout === 'in-grid') {
            $params_list['holder'] = 'edgtf-container';
            $params_list['inner'] = 'edgtf-container-inner clearfix';
        } else {
            $params_list['holder'] = 'edgtf-full-width';
            $params_list['inner'] = 'edgtf-full-width-inner';
        }

        return $params_list;
    }

    add_filter('pxlz_edgtf_blog_holder_params', 'pxlz_edgtf_get_blog_holder_params');
}

if (!function_exists('pxlz_edgtf_get_blog_list_classes')) {
    /**
     * Function that generates blog list holder classes for blog list templates
     */
    function pxlz_edgtf_get_blog_list_classes($classes) {
        $list_classes = array();
        $list_classes[] = 'edgtf-blog-type-masonry';

        $number_of_columns = pxlz_edgtf_get_meta_field_intersect('blog_masonry_number_of_columns');
        if (!empty($number_of_columns)) {
            $list_classes[] = 'edgtf-blog-' . $number_of_columns . '-columns';
        }

        $list_classes[] = 'edgtf-blog-no-space';

        $masonry_layout = pxlz_edgtf_get_meta_field_intersect('blog_masonry_layout');
        $list_classes[] = 'edgtf-blog-masonry-' . $masonry_layout;

        $classes = array_merge($classes, $list_classes);

        return $classes;
    }

    add_filter('pxlz_edgtf_blog_list_classes', 'pxlz_edgtf_get_blog_list_classes');
}

if (!function_exists('pxlz_edgtf_blog_part_params')) {
    function pxlz_edgtf_blog_part_params($params) {

        $part_params = array();
        $part_params['title_tag'] = 'h3';
        $part_params['link_tag'] = 'h5';
        $part_params['quote_tag'] = 'h5';

        return array_merge($params, $part_params);
    }

    add_filter('pxlz_edgtf_blog_part_params', 'pxlz_edgtf_blog_part_params');
}