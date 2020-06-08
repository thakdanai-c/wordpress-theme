<?php

if (!function_exists('pxlz_edgtf_map_sidebar_meta')) {
    function pxlz_edgtf_map_sidebar_meta() {
        $edgtf_sidebar_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => apply_filters('pxlz_edgtf_set_scope_for_meta_boxes', array('page'), 'sidebar_meta'),
                'title' => esc_html__('Sidebar', 'pxlz'),
                'name' => 'sidebar_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_sidebar_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Sidebar Layout', 'pxlz'),
                'description' => esc_html__('Choose the sidebar layout', 'pxlz'),
                'parent' => $edgtf_sidebar_meta_box,
                'options' => pxlz_edgtf_get_custom_sidebars_options(true)
            )
        );

        $edgtf_custom_sidebars = pxlz_edgtf_get_custom_sidebars();
        if (count($edgtf_custom_sidebars) > 0) {
            pxlz_edgtf_create_meta_box_field(
                array(
                    'name' => 'edgtf_custom_sidebar_area_meta',
                    'type' => 'selectblank',
                    'label' => esc_html__('Choose Widget Area in Sidebar', 'pxlz'),
                    'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'pxlz'),
                    'parent' => $edgtf_sidebar_meta_box,
                    'options' => $edgtf_custom_sidebars,
                    'args' => array(
                        'select2' => true
                    )
                )
            );
        }
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_sidebar_meta', 31);
}