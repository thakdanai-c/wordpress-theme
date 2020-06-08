<?php

if (!function_exists('pxlz_edgtf_logo_meta_box_map')) {
    function pxlz_edgtf_logo_meta_box_map() {

        $logo_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => apply_filters('pxlz_edgtf_set_scope_for_meta_boxes', array('page', 'post'), 'logo_meta'),
                'title' => esc_html__('Logo', 'pxlz'),
                'name' => 'logo_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_image_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Default', 'pxlz'),
                'description' => esc_html__('Choose a default logo image to display ', 'pxlz'),
                'parent' => $logo_meta_box
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_image_dark_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Dark', 'pxlz'),
                'description' => esc_html__('Choose a default logo image to display ', 'pxlz'),
                'parent' => $logo_meta_box
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_image_light_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Light', 'pxlz'),
                'description' => esc_html__('Choose a default logo image to display ', 'pxlz'),
                'parent' => $logo_meta_box
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_image_sticky_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Sticky', 'pxlz'),
                'description' => esc_html__('Choose a default logo image to display ', 'pxlz'),
                'parent' => $logo_meta_box
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_logo_image_mobile_meta',
                'type' => 'image',
                'label' => esc_html__('Logo Image - Mobile', 'pxlz'),
                'description' => esc_html__('Choose a default logo image to display ', 'pxlz'),
                'parent' => $logo_meta_box
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_logo_meta_box_map', 47);
}