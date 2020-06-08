<?php

if (!function_exists('pxlz_edgtf_get_hide_dep_for_header_vertical_area_meta_boxes')) {
    function pxlz_edgtf_get_hide_dep_for_header_vertical_area_meta_boxes() {
        $hide_dep_options = apply_filters('pxlz_edgtf_header_vertical_hide_meta_boxes', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('pxlz_edgtf_header_vertical_area_meta_options_map')) {
    function pxlz_edgtf_header_vertical_area_meta_options_map($header_meta_box) {
        $hide_dep_options = pxlz_edgtf_get_hide_dep_for_header_vertical_area_meta_boxes();

        $header_vertical_area_meta_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $header_meta_box,
                'name' => 'header_vertical_area_container',
                'hidden_property' => 'edgtf_header_type_meta',
                'hidden_values' => $hide_dep_options
            )
        );

        pxlz_edgtf_add_admin_section_title(
            array(
                'parent' => $header_vertical_area_meta_container,
                'name' => 'vertical_area_style',
                'title' => esc_html__('Vertical Area Style', 'pxlz')
            )
        );

        $pxlz_custom_sidebars = pxlz_edgtf_get_custom_sidebars();
        if (count($pxlz_custom_sidebars) > 0) {
            pxlz_edgtf_create_meta_box_field(
                array(
                    'name' => 'edgtf_custom_vertical_area_sidebar_meta',
                    'type' => 'selectblank',
                    'label' => esc_html__('Choose Custom Widget Area in Vertical area', 'pxlz'),
                    'description' => esc_html__('Choose custom widget area to display in vertical menu"', 'pxlz'),
                    'parent' => $header_vertical_area_meta_container,
                    'options' => $pxlz_custom_sidebars
                )
            );
        }

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Set background color for vertical menu', 'pxlz'),
                'parent' => $header_vertical_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_background_image_meta',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Background Image', 'pxlz'),
                'description' => esc_html__('Set background image for vertical menu', 'pxlz'),
                'parent' => $header_vertical_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_vertical_header_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Background Image', 'pxlz'),
                'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'pxlz'),
                'parent' => $header_vertical_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_shadow_meta',
                'type' => 'select',
                'label' => esc_html__('Shadow', 'pxlz'),
                'description' => esc_html__('Set shadow on vertical menu', 'pxlz'),
                'parent' => $header_vertical_area_meta_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_border_meta',
                'type' => 'select',
                'label' => esc_html__('Vertical Area Border', 'pxlz'),
                'description' => esc_html__('Set border on vertical area', 'pxlz'),
                'parent' => $header_vertical_area_meta_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_vertical_header_border_container',
                        'no' => '#edgtf_vertical_header_border_container',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_vertical_header_border_container'
                    )
                )
            )
        );

        $vertical_header_border_container = pxlz_edgtf_add_admin_container(
            array(
                'type' => 'container',
                'name' => 'vertical_header_border_container',
                'parent' => $header_vertical_area_meta_container,
                'hidden_property' => 'edgtf_vertical_header_border_meta',
                'hidden_value' => 'no',
                'hidden_values' => array('', 'no')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_border_color_meta',
                'type' => 'color',
                'label' => esc_html__('Border Color', 'pxlz'),
                'description' => esc_html__('Choose color of border', 'pxlz'),
                'parent' => $vertical_header_border_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_center_content_meta',
                'type' => 'select',
                'label' => esc_html__('Center Content', 'pxlz'),
                'description' => esc_html__('Set content in vertical center', 'pxlz'),
                'parent' => $header_vertical_area_meta_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );
    }

    add_action('pxlz_edgtf_additional_header_area_meta_boxes_map', 'pxlz_edgtf_header_vertical_area_meta_options_map', 10, 1);
}