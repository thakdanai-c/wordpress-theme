<?php

if (!function_exists('pxlz_edgtf_header_minimal_full_screen_menu_body_class')) {
    /**
     * Function that adds body classes for different full screen menu types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function pxlz_edgtf_header_minimal_full_screen_menu_body_class($classes) {
        $classes[] = 'edgtf-' . pxlz_edgtf_options()->getOptionValue('fullscreen_menu_animation_style');

        return $classes;
    }

    if (pxlz_edgtf_check_is_header_type_enabled('header-minimal', pxlz_edgtf_get_page_id())) {
        add_filter('body_class', 'pxlz_edgtf_header_minimal_full_screen_menu_body_class');
    }
}

if (!function_exists('pxlz_edgtf_get_header_minimal_full_screen_menu')) {
    /**
     * Loads fullscreen menu HTML template
     */
    function pxlz_edgtf_get_header_minimal_full_screen_menu() {
        $parameters = array(
            'fullscreen_menu_in_grid' => pxlz_edgtf_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false
        );

        pxlz_edgtf_get_module_template_part('templates/full-screen-menu', 'header/types/header-minimal', '', $parameters);
    }

    if (pxlz_edgtf_check_is_header_type_enabled('header-minimal', pxlz_edgtf_get_page_id())) {
        add_action('pxlz_edgtf_after_wrapper_inner', 'pxlz_edgtf_get_header_minimal_full_screen_menu', 40);
    }
}

if (!function_exists('pxlz_edgtf_header_minimal_mobile_menu_module')) {
    /**
     * Function that edits module for mobile menu
     *
     * @param $module - default module value
     *
     * @return string name of module
     */
    function pxlz_edgtf_header_minimal_mobile_menu_module($module) {
        return 'header/types/header-minimal';
    }

    if (pxlz_edgtf_check_is_header_type_enabled('header-minimal', pxlz_edgtf_get_page_id())) {
        add_filter('pxlz_edgtf_mobile_menu_module', 'pxlz_edgtf_header_minimal_mobile_menu_module');
    }
}

if (!function_exists('pxlz_edgtf_header_minimal_mobile_menu_slug')) {
    /**
     * Function that edits slug for mobile menu
     *
     * @param $slug - default slug value
     *
     * @return string name of slug
     */
    function pxlz_edgtf_header_minimal_mobile_menu_slug($slug) {
        return 'minimal';
    }

    if (pxlz_edgtf_check_is_header_type_enabled('header-minimal', pxlz_edgtf_get_page_id())) {
        add_filter('pxlz_edgtf_mobile_menu_slug', 'pxlz_edgtf_header_minimal_mobile_menu_slug');
    }
}