<?php

if (!function_exists('pxlz_edgtf_map_post_gallery_meta')) {

    function pxlz_edgtf_map_post_gallery_meta() {
        $gallery_post_format_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Gallery Post Format', 'pxlz'),
                'name' => 'post_format_gallery_meta'
            )
        );

        pxlz_edgtf_add_multiple_images_field(
            array(
                'name' => 'edgtf_post_gallery_images_meta',
                'label' => esc_html__('Gallery Images', 'pxlz'),
                'description' => esc_html__('Choose your gallery images', 'pxlz'),
                'parent' => $gallery_post_format_meta_box,
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_post_gallery_meta', 21);
}
