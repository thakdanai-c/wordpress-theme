<?php

if (!function_exists('pxlz_edgtf_set_title_centered_type_for_options')) {
    /**
     * This function set centered title type value for title options map and meta boxes
     */
    function pxlz_edgtf_set_title_centered_type_for_options($type) {
        $type['centered'] = esc_html__('Centered', 'pxlz');

        return $type;
    }

    add_filter('pxlz_edgtf_title_type_global_option', 'pxlz_edgtf_set_title_centered_type_for_options');
    add_filter('pxlz_edgtf_title_type_meta_boxes', 'pxlz_edgtf_set_title_centered_type_for_options');
}