<?php

if (!function_exists('pxlz_edgtf_get_hide_dep_for_header_logo_area_meta_boxes')) {
    function pxlz_edgtf_get_hide_dep_for_header_logo_area_meta_boxes() {
        $hide_dep_options = apply_filters('pxlz_edgtf_header_logo_area_hide_meta_boxes', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('pxlz_edgtf_header_logo_area_meta_options_map')) {
    function pxlz_edgtf_header_logo_area_meta_options_map($header_meta_box) {
        $hide_dep_options = pxlz_edgtf_get_hide_dep_for_header_logo_area_meta_boxes();

        $logo_area_container = pxlz_edgtf_add_admin_container_no_style(
            array(
                'type' => 'container',
                'name' => 'logo_area_container',
                'parent' => $header_meta_box,
                'hidden_property' => 'edgtf_header_type_meta',
                'hidden_values' => $hide_dep_options
            )
        );

        pxlz_edgtf_add_admin_section_title(
            array(
                'parent' => $logo_area_container,
                'name' => 'logo_area_style',
                'title' => esc_html__('Logo Area Style', 'pxlz')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_header_widget_logo_area_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Header Logo Area Widget', 'pxlz'),
                'description' => esc_html__('Enabling this option will hide widget area from the logo area', 'pxlz'),
                'parent' => $logo_area_container
            )
        );

        $pxlz_custom_sidebars = pxlz_edgtf_get_custom_sidebars();
        if (count($pxlz_custom_sidebars) > 0) {
            pxlz_edgtf_create_meta_box_field(
                array(
                    'name' => 'edgtf_custom_logo_area_sidebar_meta',
                    'type' => 'selectblank',
                    'label' => esc_html__('Choose Custom Widget Area for Logo Area', 'pxlz'),
                    'description' => esc_html__('Choose custom widget area to display in header logo area"', 'pxlz'),
                    'parent' => $logo_area_container,
                    'options' => $pxlz_custom_sidebars
                )
            );
        }

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_in_grid_meta',
                'type' => 'select',
                'label' => esc_html__('Logo Area In Grid', 'pxlz'),
                'description' => esc_html__('Set menu area content to be in grid', 'pxlz'),
                'parent' => $logo_area_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_logo_area_in_grid_container',
                        'no' => '#edgtf_logo_area_in_grid_container',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_logo_area_in_grid_container'
                    )
                )
            )
        );

        $logo_area_in_grid_container = pxlz_edgtf_add_admin_container(
            array(
                'type' => 'container',
                'name' => 'logo_area_in_grid_container',
                'parent' => $logo_area_container,
                'hidden_property' => 'edgtf_logo_area_in_grid_meta',
                'hidden_value' => 'no',
                'hidden_values' => array('', 'no')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_grid_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Grid Background Color', 'pxlz'),
                'description' => esc_html__('Set grid background color for logo area', 'pxlz'),
                'parent' => $logo_area_in_grid_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_grid_background_transparency_meta',
                'type' => 'text',
                'label' => esc_html__('Grid Background Transparency', 'pxlz'),
                'description' => esc_html__('Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'pxlz'),
                'parent' => $logo_area_in_grid_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_in_grid_border_meta',
                'type' => 'select',
                'label' => esc_html__('Grid Area Border', 'pxlz'),
                'description' => esc_html__('Set border on grid logo area', 'pxlz'),
                'parent' => $logo_area_in_grid_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_logo_area_in_grid_border_container',
                        'no' => '#edgtf_logo_area_in_grid_border_container',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_logo_area_in_grid_border_container'
                    )
                )
            )
        );

        $logo_area_in_grid_border_container = pxlz_edgtf_add_admin_container(
            array(
                'type' => 'container',
                'name' => 'logo_area_in_grid_border_container',
                'parent' => $logo_area_in_grid_container,
                'hidden_property' => 'edgtf_logo_area_in_grid_border_meta',
                'hidden_value' => 'no',
                'hidden_values' => array('', 'no')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_in_grid_border_color_meta',
                'type' => 'color',
                'label' => esc_html__('Border Color', 'pxlz'),
                'description' => esc_html__('Set border color for grid area', 'pxlz'),
                'parent' => $logo_area_in_grid_border_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Choose a background color for logo area', 'pxlz'),
                'parent' => $logo_area_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_background_transparency_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'pxlz'),
                'description' => esc_html__('Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'pxlz'),
                'parent' => $logo_area_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_border_meta',
                'type' => 'select',
                'label' => esc_html__('Logo Area Border', 'pxlz'),
                'description' => esc_html__('Set border on logo area', 'pxlz'),
                'parent' => $logo_area_container,
                'default_value' => '',
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_logo_area_border_bottom_color_container',
                        'no' => '#edgtf_logo_area_border_bottom_color_container',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '',
                        'no' => '',
                        'yes' => '#edgtf_logo_area_border_bottom_color_container'
                    )
                )
            )
        );

        $logo_area_border_bottom_color_container = pxlz_edgtf_add_admin_container(
            array(
                'type' => 'container',
                'name' => 'logo_area_border_bottom_color_container',
                'parent' => $logo_area_container,
                'hidden_property' => 'edgtf_logo_area_border_meta',
                'hidden_value' => 'no',
                'hidden_values' => array('', 'no')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_area_border_color_meta',
                'type' => 'color',
                'label' => esc_html__('Border Color', 'pxlz'),
                'description' => esc_html__('Choose color of header bottom border', 'pxlz'),
                'parent' => $logo_area_border_bottom_color_container
            )
        );

        do_action('pxlz_edgtf_header_logo_area_additional_meta_boxes_map', $logo_area_container);
    }

    add_action('pxlz_edgtf_header_logo_area_meta_boxes_map', 'pxlz_edgtf_header_logo_area_meta_options_map', 10, 1);
}