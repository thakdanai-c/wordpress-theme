<?php

if (!function_exists('pxlz_edgtf_get_hide_dep_for_top_header_area_meta_boxes')) {
    function pxlz_edgtf_get_hide_dep_for_top_header_area_meta_boxes() {
        $hide_dep_options = apply_filters('pxlz_edgtf_top_header_hide_meta_boxes', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('pxlz_edgtf_header_top_area_meta_options_map')) {
    function pxlz_edgtf_header_top_area_meta_options_map($header_meta_box) {
        $hide_dep_options = pxlz_edgtf_get_hide_dep_for_top_header_area_meta_boxes();

        $top_header_container = pxlz_edgtf_add_admin_container_no_style(
            array(
                'type' => 'container',
                'name' => 'top_header_container',
                'parent' => $header_meta_box,
                'hidden_property' => 'edgtf_header_type_meta',
                'hidden_values' => $hide_dep_options
            )
        );

        pxlz_edgtf_add_admin_section_title(
            array(
                'parent' => $top_header_container,
                'name' => 'top_area_style',
                'title' => esc_html__('Top Area', 'pxlz')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_top_bar_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header Top Bar', 'pxlz'),
                'description' => esc_html__('Enabling this option will show header top bar area', 'pxlz'),
                'parent' => $top_header_container,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_top_bar_container_no_style',
                        'no' => '#edgtf_top_bar_container_no_style',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_top_bar_container_no_style'
                    )
                )
            )
        );

        $top_bar_container = pxlz_edgtf_add_admin_container_no_style(
            array(
                'name' => 'top_bar_container_no_style',
                'parent' => $top_header_container,
                'hidden_property' => 'edgtf_top_bar_meta',
                'hidden_value' => 'no',
                'hidden_values' => array('', 'no')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_top_bar_in_grid_meta',
                'type' => 'select',
                'label' => esc_html__('Top Bar In Grid', 'pxlz'),
                'description' => esc_html__('Set top bar content to be in grid', 'pxlz'),
                'parent' => $top_bar_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_top_bar_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Top Bar Background Color', 'pxlz'),
                'parent' => $top_bar_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_top_bar_background_transparency_meta',
                'type' => 'text',
                'label' => esc_html__('Top Bar Background Color Transparency', 'pxlz'),
                'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'pxlz'),
                'parent' => $top_bar_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_top_bar_border_meta',
                'type' => 'select',
                'label' => esc_html__('Top Bar Border', 'pxlz'),
                'description' => esc_html__('Set border on top bar', 'pxlz'),
                'parent' => $top_bar_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_top_bar_border_container',
                        'no' => '#edgtf_top_bar_border_container',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_top_bar_border_container'
                    )
                )
            )
        );

        $top_bar_border_container = pxlz_edgtf_add_admin_container(
            array(
                'type' => 'container',
                'name' => 'top_bar_border_container',
                'parent' => $top_bar_container,
                'hidden_property' => 'edgtf_top_bar_border_meta',
                'hidden_value' => 'no',
                'hidden_values' => array('', 'no')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_top_bar_border_color_meta',
                'type' => 'color',
                'label' => esc_html__('Border Color', 'pxlz'),
                'description' => esc_html__('Choose color for top bar border', 'pxlz'),
                'parent' => $top_bar_border_container
            )
        );
    }

    add_action('pxlz_edgtf_additional_header_area_meta_boxes_map', 'pxlz_edgtf_header_top_area_meta_options_map', 10, 1);
}