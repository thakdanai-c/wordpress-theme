<?php

if (!function_exists('pxlz_edgtf_get_hide_dep_for_header_standard_meta_boxes')) {
    function pxlz_edgtf_get_hide_dep_for_header_standard_meta_boxes() {
        $hide_dep_options = apply_filters('pxlz_edgtf_header_standard_hide_meta_boxes', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('pxlz_edgtf_header_standard_meta_map')) {
    function pxlz_edgtf_header_standard_meta_map($parent) {
        $hide_dep_options = pxlz_edgtf_get_hide_dep_for_header_standard_meta_boxes();

        pxlz_edgtf_create_meta_box_field(
            array(
                'parent' => $parent,
                'type' => 'select',
                'name' => 'edgtf_set_menu_area_position_meta',
                'default_value' => '',
                'label' => esc_html__('Choose Menu Area Position', 'pxlz'),
                'description' => esc_html__('Select menu area position in your header', 'pxlz'),
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'left' => esc_html__('Left', 'pxlz'),
                    'right' => esc_html__('Right', 'pxlz'),
                    'center' => esc_html__('Center', 'pxlz')
                ),
                'hidden_property' => 'edgtf_header_type_meta',
                'hidden_values' => $hide_dep_options
            )
        );
    }

    add_action('pxlz_edgtf_additional_header_area_meta_boxes_map', 'pxlz_edgtf_header_standard_meta_map');
}