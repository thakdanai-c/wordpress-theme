<?php

if (!function_exists('pxlz_edgtf_load_widget_class')) {
    /**
     * Loades widget class file.
     */
    function pxlz_edgtf_load_widget_class() {
        include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/lib/widget-class.php';
    }

    add_action('pxlz_edgtf_before_options_map', 'pxlz_edgtf_load_widget_class');
}

if (!function_exists('pxlz_edgtf_load_modules')) {
    /**
     * Loades all modules by going through all folders that are placed directly in modules folder
     * and loads load.php file in each. Hooks to pxlz_edgtf_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function pxlz_edgtf_load_modules() {
        foreach (glob(EDGE_FRAMEWORK_ROOT_DIR . '/modules/*/load.php') as $module_load) {
            include_once $module_load;
        }
    }

    add_action('pxlz_edgtf_before_options_map', 'pxlz_edgtf_load_modules');
}

if (!function_exists('pxlz_edgtf_load_widgets')) {
    /**
     * Loades all widgets by going through all folders that are placed directly in widgets folder
     * and loads load.php file in each. Hooks to pxlz_edgtf_after_options_map action
     */
    function pxlz_edgtf_load_widgets() {

        foreach (glob(EDGE_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php') as $widget_load) {
            include_once $widget_load;
        }

        include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/lib/widget-loader.php';
    }

    add_action('pxlz_edgtf_before_options_map', 'pxlz_edgtf_load_widgets');
}