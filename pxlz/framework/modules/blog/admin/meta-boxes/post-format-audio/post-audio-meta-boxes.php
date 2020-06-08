<?php

if (!function_exists('pxlz_edgtf_map_post_audio_meta')) {
    function pxlz_edgtf_map_post_audio_meta() {
        $audio_post_format_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Audio Post Format', 'pxlz'),
                'name' => 'post_format_audio_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_audio_type_meta',
                'type' => 'select',
                'label' => esc_html__('Audio Type', 'pxlz'),
                'description' => esc_html__('Choose audio type', 'pxlz'),
                'parent' => $audio_post_format_meta_box,
                'default_value' => 'social_networks',
                'options' => array(
                    'social_networks' => esc_html__('Audio Service', 'pxlz'),
                    'self' => esc_html__('Self Hosted', 'pxlz')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'social_networks' => '#edgtf_edgtf_audio_self_hosted_container',
                        'self' => '#edgtf_edgtf_audio_embedded_container'
                    ),
                    'show' => array(
                        'social_networks' => '#edgtf_edgtf_audio_embedded_container',
                        'self' => '#edgtf_edgtf_audio_self_hosted_container'
                    )
                )
            )
        );

        $edgtf_audio_embedded_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $audio_post_format_meta_box,
                'name' => 'edgtf_audio_embedded_container',
                'hidden_property' => 'edgtf_audio_type_meta',
                'hidden_value' => 'self'
            )
        );

        $edgtf_audio_self_hosted_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $audio_post_format_meta_box,
                'name' => 'edgtf_audio_self_hosted_container',
                'hidden_property' => 'edgtf_audio_type_meta',
                'hidden_value' => 'social_networks'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_audio_link_meta',
                'type' => 'text',
                'label' => esc_html__('Audio URL', 'pxlz'),
                'description' => esc_html__('Enter audio URL', 'pxlz'),
                'parent' => $edgtf_audio_embedded_container,
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_post_audio_custom_meta',
                'type' => 'text',
                'label' => esc_html__('Audio Link', 'pxlz'),
                'description' => esc_html__('Enter audio link', 'pxlz'),
                'parent' => $edgtf_audio_self_hosted_container,
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_post_audio_meta', 23);
}