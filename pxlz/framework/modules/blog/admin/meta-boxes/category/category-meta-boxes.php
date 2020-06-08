<?php

if (!function_exists('pxlz_edgtf_custom_category_fields')) {
    function pxlz_edgtf_custom_category_fields() {

        $category_color = pxlz_edgtf_add_taxonomy_fields(
            array(
                'scope' => 'category',
                'name' => 'category_custom'
            )
        );

        pxlz_edgtf_add_taxonomy_field(
            array(
                'name' => 'category_color',
                'type' => 'color',
                'label' => esc_html__('Category Color', 'pxlz'),
                'description' => '',
                'parent' => $category_color
            )
        );

        pxlz_edgtf_add_taxonomy_field(
            array(
                'name' => 'category_background_color',
                'type' => 'color',
                'label' => esc_html__('Category Background Color', 'pxlz'),
                'description' => '',
                'parent' => $category_color
            )
        );
    }

    add_action('pxlz_edgtf_custom_taxonomy_fields', 'pxlz_edgtf_custom_category_fields');
}