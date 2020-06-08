<?php

if (!function_exists('pxlz_edgtf_map_content_bottom_meta')) {
    function pxlz_edgtf_map_content_bottom_meta() {

        $content_bottom_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => apply_filters('pxlz_edgtf_set_scope_for_meta_boxes', array('page', 'post'), 'content_bottom_meta'),
                'title' => esc_html__('Content Bottom', 'pxlz'),
                'name' => 'content_bottom_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_enable_content_bottom_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Content Bottom Area', 'pxlz'),
                'description' => esc_html__('This option will enable Content Bottom area on pages', 'pxlz'),
                'parent' => $content_bottom_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#edgtf_edgtf_show_content_bottom_meta_container',
                        'no' => '#edgtf_edgtf_show_content_bottom_meta_container'
                    ),
                    'show' => array(
                        'yes' => '#edgtf_edgtf_show_content_bottom_meta_container'
                    )
                )
            )
        );

        $show_content_bottom_meta_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $content_bottom_meta_box,
                'name' => 'edgtf_show_content_bottom_meta_container',
                'hidden_property' => 'edgtf_enable_content_bottom_area_meta',
                'hidden_values' => array('', 'no')
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_content_bottom_sidebar_custom_display_meta',
                'type' => 'selectblank',
                'default_value' => '',
                'label' => esc_html__('Sidebar to Display', 'pxlz'),
                'description' => esc_html__('Choose a content bottom sidebar to display', 'pxlz'),
                'options' => pxlz_edgtf_get_custom_sidebars(),
                'parent' => $show_content_bottom_meta_container,
                'args' => array(
                    'select2' => true
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'type' => 'select',
                'name' => 'edgtf_content_bottom_in_grid_meta',
                'default_value' => '',
                'label' => esc_html__('Display in Grid', 'pxlz'),
                'description' => esc_html__('Enabling this option will place content bottom in grid', 'pxlz'),
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'parent' => $show_content_bottom_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'type' => 'color',
                'name' => 'edgtf_content_bottom_background_color_meta',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Choose a background color for content bottom area', 'pxlz'),
                'parent' => $show_content_bottom_meta_container
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_content_bottom_meta', 71);
}