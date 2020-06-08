<?php

if (!function_exists('pxlz_edgtf_map_post_video_meta')) {
    function pxlz_edgtf_map_post_video_meta() {
        $video_post_format_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Video Post Format', 'pxlz'),
                'name' => 'post_format_video_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_video_type_meta',
                'type' => 'select',
                'label' => esc_html__('Video Type', 'pxlz'),
                'description' => esc_html__('Choose video type', 'pxlz'),
                'parent' => $video_post_format_meta_box,
                'default_value' => 'social_networks',
                'options' => array(
                    'social_networks' => esc_html__('Video Service', 'pxlz'),
                    'self' => esc_html__('Self Hosted', 'pxlz')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'social_networks' => '#edgtf_edgtf_video_self_hosted_container',
                        'self' => '#edgtf_edgtf_video_embedded_container'
                    ),
                    'show' => array(
                        'social_networks' => '#edgtf_edgtf_video_embedded_container',
                        'self' => '#edgtf_edgtf_video_self_hosted_container'
                    )
                )
            )
        );

        $edgtf_video_embedded_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_embedded_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_value' => 'self'
            )
        );

        $edgtf_video_self_hosted_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_self_hosted_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_value' => 'social_networks'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video URL', 'pxlz'),
                'description' => esc_html__('Enter Video URL', 'pxlz'),
                'parent' => $edgtf_video_embedded_container,
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_custom_meta',
                'type' => 'text',
                'label' => esc_html__('Video MP4', 'pxlz'),
                'description' => esc_html__('Enter video URL for MP4 format', 'pxlz'),
                'parent' => $edgtf_video_self_hosted_container,
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_image_meta',
                'type' => 'image',
                'label' => esc_html__('Video Image', 'pxlz'),
                'description' => esc_html__('Enter video image', 'pxlz'),
                'parent' => $edgtf_video_self_hosted_container,
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_post_video_meta', 22);
}