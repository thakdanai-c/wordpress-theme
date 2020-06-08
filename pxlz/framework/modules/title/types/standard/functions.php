<?php

if (!function_exists('pxlz_edgtf_set_title_standard_type_for_options')) {
    /**
     * This function set standard title type value for title options map and meta boxes
     */
    function pxlz_edgtf_set_title_standard_type_for_options($type) {
        $type['standard'] = esc_html__('Standard', 'pxlz');

        return $type;
    }

    add_filter('pxlz_edgtf_title_type_global_option', 'pxlz_edgtf_set_title_standard_type_for_options');
    add_filter('pxlz_edgtf_title_type_meta_boxes', 'pxlz_edgtf_set_title_standard_type_for_options');
}

if (!function_exists('pxlz_edgtf_set_title_standard_type_as_default_options')) {
    /**
     * This function set default title type value for global title option map
     */
    function pxlz_edgtf_set_title_standard_type_as_default_options($type) {
        $type = 'standard';

        return $type;
    }

    add_filter('pxlz_edgtf_default_title_type_global_option', 'pxlz_edgtf_set_title_standard_type_as_default_options');
}