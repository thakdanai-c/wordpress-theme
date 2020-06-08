<?php

if (!function_exists('pxlz_edgtf_disable_wpml_css')) {
    function pxlz_edgtf_disable_wpml_css() {
        define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
    }

    add_action('after_setup_theme', 'pxlz_edgtf_disable_wpml_css');
}