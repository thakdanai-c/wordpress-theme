<?php

if (!function_exists('pxlz_edgtf_sidebar_options_map')) {
    function pxlz_edgtf_sidebar_options_map() {

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '_sidebar_page',
                'title' => esc_html__('Sidebar Area', 'pxlz'),
                'icon' => 'fa fa-indent'
            )
        );

        $sidebar_panel = pxlz_edgtf_add_admin_panel(
            array(
                'title' => esc_html__('Sidebar Area', 'pxlz'),
                'name' => 'sidebar',
                'page' => '_sidebar_page'
            )
        );

        pxlz_edgtf_add_admin_field(array(
            'name' => 'sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Sidebar Layout', 'pxlz'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'pxlz'),
            'parent' => $sidebar_panel,
            'default_value' => 'no-sidebar',
            'options' => pxlz_edgtf_get_custom_sidebars_options()
        ));

        $pxlz_custom_sidebars = pxlz_edgtf_get_custom_sidebars();
        if (count($pxlz_custom_sidebars) > 0) {
            pxlz_edgtf_add_admin_field(array(
                'name' => 'custom_sidebar_area',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'pxlz'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'pxlz'),
                'parent' => $sidebar_panel,
                'options' => $pxlz_custom_sidebars,
                'args' => array(
                    'select2' => true
                )
            ));
        }
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_sidebar_options_map', 9);
}