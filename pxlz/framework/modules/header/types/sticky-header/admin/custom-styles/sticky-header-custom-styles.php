<?php

if (!function_exists('pxlz_edgtf_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function pxlz_edgtf_sticky_header_styles() {
        $background_color = pxlz_edgtf_options()->getOptionValue('sticky_header_background_color');
        $background_transparency = pxlz_edgtf_options()->getOptionValue('sticky_header_transparency');
        $border_color = pxlz_edgtf_options()->getOptionValue('sticky_header_border_color');
        $header_height = pxlz_edgtf_options()->getOptionValue('sticky_header_height');

        if (!empty($background_color)) {
            $header_background_color = $background_color;
            $header_background_color_transparency = 1;

            if ($background_transparency !== '') {
                $header_background_color_transparency = $background_transparency;
            }

            echo pxlz_edgtf_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array('background-color' => pxlz_edgtf_rgba_color($header_background_color, $header_background_color_transparency)));
        }

        if (!empty($border_color)) {
            echo pxlz_edgtf_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array('border-color' => $border_color));
        }

        if (!empty($header_height)) {
            $height = pxlz_edgtf_filter_px($header_height) . 'px';

            echo pxlz_edgtf_dynamic_css('.edgtf-page-header .edgtf-sticky-header', array('height' => $height));
            echo pxlz_edgtf_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-logo-wrapper a', array('max-height' => $height));
        }

        // sticky menu style

        $menu_item_styles = pxlz_edgtf_get_typography_styles('sticky');

        $menu_item_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li > a'
        );

        echo pxlz_edgtf_dynamic_css($menu_item_selector, $menu_item_styles);


        $hover_color = pxlz_edgtf_options()->getOptionValue('sticky_hovercolor');

        $menu_item_hover_styles = array();
        if (!empty($hover_color)) {
            $menu_item_hover_styles['color'] = $hover_color;
        }

        $menu_item_hover_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li:hover > a',
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li.edgtf-active-item > a'
        );

        echo pxlz_edgtf_dynamic_css($menu_item_hover_selector, $menu_item_hover_styles);
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_sticky_header_styles');
}