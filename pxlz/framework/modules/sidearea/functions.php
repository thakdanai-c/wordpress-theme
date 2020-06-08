<?php
if (!function_exists('pxlz_edgtf_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function pxlz_edgtf_register_side_area_sidebar() {
        register_sidebar(
            array(
                'id' => 'sidearea',
                'name' => esc_html__('Side Area', 'pxlz'),
                'description' => esc_html__('Side Area', 'pxlz'),
                'before_widget' => '<div id="%1$s" class="widget edgtf-sidearea %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="edgtf-widget-title-holder"><h5 class="edgtf-widget-title">',
                'after_title' => '</h5></div>'
            )
        );
    }

    add_action('widgets_init', 'pxlz_edgtf_register_side_area_sidebar');
}

if (!function_exists('pxlz_edgtf_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function pxlz_edgtf_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            $classes[] = 'edgtf-side-menu-slide-from-right';
        }

        return $classes;
    }

    add_filter('body_class', 'pxlz_edgtf_side_menu_body_class');
}

if (!function_exists('pxlz_edgtf_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function pxlz_edgtf_get_side_area() {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            pxlz_edgtf_get_module_template_part('templates/sidearea', 'sidearea');
        }
    }

    add_action('pxlz_edgtf_after_body_tag', 'pxlz_edgtf_get_side_area', 10);
}