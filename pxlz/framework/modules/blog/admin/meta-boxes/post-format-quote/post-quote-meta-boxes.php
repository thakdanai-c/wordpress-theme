<?php

if (!function_exists('pxlz_edgtf_map_post_quote_meta')) {
    function pxlz_edgtf_map_post_quote_meta() {
        $quote_post_format_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Quote Post Format', 'pxlz'),
                'name' => 'post_format_quote_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_quote_text_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Text', 'pxlz'),
                'description' => esc_html__('Enter Quote text', 'pxlz'),
                'parent' => $quote_post_format_meta_box,

            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_quote_author_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Author', 'pxlz'),
                'description' => esc_html__('Enter Quote author', 'pxlz'),
                'parent' => $quote_post_format_meta_box,
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_post_quote_meta', 25);
}