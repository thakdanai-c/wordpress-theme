<?php

if (!function_exists('pxlz_edgtf_get_search_types_options')) {
    function pxlz_edgtf_get_search_types_options() {
        $search_type_options = apply_filters('pxlz_edgtf_search_type_global_option', $search_type_options = array());

        return $search_type_options;
    }
}

if (!function_exists('pxlz_edgtf_search_options_map')) {
    function pxlz_edgtf_search_options_map() {

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '_search_page',
                'title' => esc_html__('Search', 'pxlz'),
                'icon' => 'fa fa-search'
            )
        );

        $search_page_panel = pxlz_edgtf_add_admin_panel(
            array(
                'title' => esc_html__('Search Page', 'pxlz'),
                'name' => 'search_template',
                'page' => '_search_page'
            )
        );

        pxlz_edgtf_add_admin_field(array(
            'name' => 'search_page_layout',
            'type' => 'select',
            'label' => esc_html__('Layout', 'pxlz'),
            'default_value' => 'in-grid',
            'description' => esc_html__('Set layout. Default is in grid.', 'pxlz'),
            'parent' => $search_page_panel,
            'options' => array(
                'in-grid' => esc_html__('In Grid', 'pxlz'),
                'full-width' => esc_html__('Full Width', 'pxlz')
            )
        ));

        pxlz_edgtf_add_admin_field(array(
            'name' => 'search_page_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Sidebar Layout', 'pxlz'),
            'description' => esc_html__("Choose a sidebar layout for search page", 'pxlz'),
            'default_value' => 'no-sidebar',
            'options' => pxlz_edgtf_get_custom_sidebars_options(),
            'parent' => $search_page_panel
        ));

        $pxlz_custom_sidebars = pxlz_edgtf_get_custom_sidebars();
        if (count($pxlz_custom_sidebars) > 0) {
            pxlz_edgtf_add_admin_field(array(
                'name' => 'search_custom_sidebar_area',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'pxlz'),
                'description' => esc_html__('Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'pxlz'),
                'parent' => $search_page_panel,
                'options' => $pxlz_custom_sidebars,
                'args' => array(
                    'select2' => true
                )
            ));
        }
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_search_options_map', 16);
}