<?php

if (!function_exists('pxlz_edgtf_centered_title_type_options_meta_boxes')) {
    function pxlz_edgtf_centered_title_type_options_meta_boxes($show_title_area_meta_container) {

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_side_padding_meta',
                'type' => 'text',
                'label' => esc_html__('Subtitle Side Padding', 'pxlz'),
                'description' => esc_html__('Set left/right padding for subtitle area', 'pxlz'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px or %'
                )
            )
        );
    }

    add_action('pxlz_edgtf_additional_title_area_meta_boxes', 'pxlz_edgtf_centered_title_type_options_meta_boxes', 5);
}