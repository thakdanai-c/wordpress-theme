<?php

if (!function_exists('pxlz_edgtf_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function pxlz_edgtf_footer_top_general_styles() {
        $item_styles = array();
        $background_color = pxlz_edgtf_options()->getOptionValue('footer_top_background_color');

        if (!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        echo pxlz_edgtf_dynamic_css('.edgtf-page-footer .edgtf-footer-top-holder', $item_styles);
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_footer_top_general_styles');
}

if (!function_exists('pxlz_edgtf_footer_bottom_general_styles')) {
    /**
     * Generates general custom styles for footer bottom area
     */
    function pxlz_edgtf_footer_bottom_general_styles() {
        $item_styles = array();
        $background_color = pxlz_edgtf_options()->getOptionValue('footer_bottom_background_color');

        if (!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        echo pxlz_edgtf_dynamic_css('.edgtf-page-footer .edgtf-footer-bottom-holder', $item_styles);
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_footer_bottom_general_styles');
}