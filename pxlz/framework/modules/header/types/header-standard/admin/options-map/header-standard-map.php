<?php

if (!function_exists('pxlz_edgtf_get_hide_dep_for_header_standard_options')) {
    function pxlz_edgtf_get_hide_dep_for_header_standard_options() {
        $hide_dep_options = apply_filters('pxlz_edgtf_header_standard_hide_global_option', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('pxlz_edgtf_header_standard_map')) {
    function pxlz_edgtf_header_standard_map($parent) {
        $hide_dep_options = pxlz_edgtf_get_hide_dep_for_header_standard_options();

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $parent,
                'type' => 'select',
                'name' => 'set_menu_area_position',
                'default_value' => 'right',
                'label' => esc_html__('Choose Menu Area Position', 'pxlz'),
                'description' => esc_html__('Select menu area position in your header', 'pxlz'),
                'options' => array(
                    'right' => esc_html__('Right', 'pxlz'),
                    'left' => esc_html__('Left', 'pxlz'),
                    'center' => esc_html__('Center', 'pxlz')
                ),
                'hidden_property' => 'header_type',
                'hidden_values' => $hide_dep_options
            )
        );
    }

    add_action('pxlz_edgtf_additional_header_menu_area_options_map', 'pxlz_edgtf_header_standard_map');
}