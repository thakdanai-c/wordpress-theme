<?php

if (!function_exists('pxlz_edgtf_map_footer_meta')) {
    function pxlz_edgtf_map_footer_meta() {

        $footer_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => apply_filters('pxlz_edgtf_set_scope_for_meta_boxes', array('page', 'post'), 'footer_meta'),
                'title' => esc_html__('Footer', 'pxlz'),
                'name' => 'footer_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_footer_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Footer for this Page', 'pxlz'),
                'description' => esc_html__('Enabling this option will hide footer on this page', 'pxlz'),
                'parent' => $footer_meta_box
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_footer_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Footer in Grid', 'pxlz'),
                'description' => esc_html__('Enabling this option will place Footer content in grid', 'pxlz'),
                'parent' => $footer_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_show_footer_top_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Footer Top', 'pxlz'),
                'description' => esc_html__('Enabling this option will show Footer Top area', 'pxlz'),
                'parent' => $footer_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_show_footer_bottom_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Footer Bottom', 'pxlz'),
                'description' => esc_html__('Enabling this option will show Footer Bottom area', 'pxlz'),
                'parent' => $footer_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_footer_meta', 70);
}