<?php

if (!function_exists('pxlz_edgtf_map_post_link_meta')) {
    function pxlz_edgtf_map_post_link_meta() {
        $link_post_format_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Link Post Format', 'pxlz'),
                'name' => 'post_format_link_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_link_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'pxlz'),
                'description' => esc_html__('Enter link', 'pxlz'),
                'parent' => $link_post_format_meta_box,

            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_post_link_meta', 24);
}