<?php

if (!function_exists('pxlz_edgtf_get_title_types_meta_boxes')) {
    function pxlz_edgtf_get_title_types_meta_boxes() {
        $title_type_options = apply_filters('pxlz_edgtf_title_type_meta_boxes', $title_type_options = array('' => esc_html__('Default', 'pxlz')));

        return $title_type_options;
    }
}

foreach (glob(EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php') as $meta_box_load) {
    include_once $meta_box_load;
}

if (!function_exists('pxlz_edgtf_map_title_meta')) {
    function pxlz_edgtf_map_title_meta() {
        $title_type_meta_boxes = pxlz_edgtf_get_title_types_meta_boxes();

        $title_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => apply_filters('pxlz_edgtf_set_scope_for_meta_boxes', array('page', 'post'), 'title_meta'),
                'title' => esc_html__('Title', 'pxlz'),
                'name' => 'title_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'pxlz'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'pxlz'),
                'parent' => $title_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '',
                        'no' => '#edgtf_edgtf_show_title_area_meta_container',
                        'yes' => ''
                    ),
                    'show' => array(
                        '' => '#edgtf_edgtf_show_title_area_meta_container',
                        'no' => '',
                        'yes' => '#edgtf_edgtf_show_title_area_meta_container'
                    )
                )
            )
        );

        $show_title_area_meta_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'edgtf_show_title_area_meta_container',
                'hidden_property' => 'edgtf_show_title_area_meta',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'pxlz'),
                'description' => esc_html__('Choose title type', 'pxlz'),
                'parent' => $show_title_area_meta_container,
                'options' => $title_type_meta_boxes
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area In Grid', 'pxlz'),
                'description' => esc_html__('Set title area content to be in grid', 'pxlz'),
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'parent' => $show_title_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_height_meta',
                'type' => 'text',
                'label' => esc_html__('Height', 'pxlz'),
                'description' => esc_html__('Set a height for Title Area', 'pxlz'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Choose a background color for title area', 'pxlz'),
                'parent' => $show_title_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'pxlz'),
                'description' => esc_html__('Choose an Image for title area', 'pxlz'),
                'parent' => $show_title_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_behavior_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image Behavior', 'pxlz'),
                'description' => esc_html__('Choose title area background image behavior', 'pxlz'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'hide' => esc_html__('Hide Image', 'pxlz'),
                    'responsive' => esc_html__('Enable Responsive Image', 'pxlz'),
                    'responsive-disabled' => esc_html__('Disable Responsive Image', 'pxlz'),
                    'parallax' => esc_html__('Enable Parallax Image', 'pxlz'),
                    'parallax-zoom-out' => esc_html__('Enable Parallax With Zoom Out Image', 'pxlz'),
                    'parallax-disabled' => esc_html__('Disable Parallax Image', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_vertical_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'pxlz'),
                'description' => esc_html__('Specify title area content vertical alignment', 'pxlz'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'header_bottom' => esc_html__('From Bottom of Header', 'pxlz'),
                    'window_top' => esc_html__('From Window Top', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_title_tag_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Tag', 'pxlz'),
                'options' => pxlz_edgtf_get_title_tag(true),
                'parent' => $show_title_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'pxlz'),
                'description' => esc_html__('Choose a color for title text', 'pxlz'),
                'parent' => $show_title_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_subtitle_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Subtitle Text', 'pxlz'),
                'description' => esc_html__('Enter your subtitle text', 'pxlz'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    'col_width' => 6
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_subtitle_tag_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Subtitle Tag', 'pxlz'),
                'options' => pxlz_edgtf_get_title_tag(true, array('p' => 'p')),
                'parent' => $show_title_area_meta_container
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'pxlz'),
                'description' => esc_html__('Choose a color for subtitle text', 'pxlz'),
                'parent' => $show_title_area_meta_container
            )
        );

        /***************** Additional Title Area Layout - start *****************/

        do_action('pxlz_edgtf_additional_title_area_meta_boxes', $show_title_area_meta_container);

        /***************** Additional Title Area Layout - end *****************/

    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_title_meta', 60);
}