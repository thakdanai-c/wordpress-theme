<?php

if (!function_exists('pxlz_edgtf_content_responsive_styles')) {
    /**
     * Generates content responsive custom styles
     */
    function pxlz_edgtf_content_responsive_styles() {
        $content_style = array();

        $padding_top_mobile = pxlz_edgtf_options()->getOptionValue('content_top_padding_mobile');
        if ($padding_top_mobile !== '') {
            $content_style['padding-top'] = pxlz_edgtf_filter_px($padding_top_mobile) . 'px!important';
        }

        $content_selector = array(
            '.edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
            '.edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
        );

        echo pxlz_edgtf_dynamic_css($content_selector, $content_style);
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_1024', 'pxlz_edgtf_content_responsive_styles');
}

if (!function_exists('pxlz_edgtf_h1_responsive_styles3')) {
    function pxlz_edgtf_h1_responsive_styles3() {
        $selector = array(
            'h1'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h1_responsive', '_3');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_768_1024', 'pxlz_edgtf_h1_responsive_styles3');
}

if (!function_exists('pxlz_edgtf_h2_responsive_styles3')) {
    function pxlz_edgtf_h2_responsive_styles3() {
        $selector = array(
            'h2'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h2_responsive', '_3');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_768_1024', 'pxlz_edgtf_h2_responsive_styles3');
}

if (!function_exists('pxlz_edgtf_h3_responsive_styles3')) {
    function pxlz_edgtf_h3_responsive_styles3() {
        $selector = array(
            'h3'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h3_responsive', '_3');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_768_1024', 'pxlz_edgtf_h3_responsive_styles3');
}

if (!function_exists('pxlz_edgtf_h4_responsive_styles3')) {
    function pxlz_edgtf_h4_responsive_styles3() {
        $selector = array(
            'h4'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h4_responsive', '_3');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_768_1024', 'pxlz_edgtf_h4_responsive_styles3');
}

if (!function_exists('pxlz_edgtf_h5_responsive_styles3')) {
    function pxlz_edgtf_h5_responsive_styles3() {
        $selector = array(
            'h5'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h5_responsive', '_3');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_768_1024', 'pxlz_edgtf_h5_responsive_styles3');
}

if (!function_exists('pxlz_edgtf_h6_responsive_styles3')) {
    function pxlz_edgtf_h6_responsive_styles3() {
        $selector = array(
            'h6'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h6_responsive', '_3');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_768_1024', 'pxlz_edgtf_h6_responsive_styles3');
}

if (!function_exists('pxlz_edgtf_h1_responsive_styles')) {
    function pxlz_edgtf_h1_responsive_styles() {
        $selector = array(
            'h1'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h1_responsive');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680_768', 'pxlz_edgtf_h1_responsive_styles');
}

if (!function_exists('pxlz_edgtf_h2_responsive_styles')) {
    function pxlz_edgtf_h2_responsive_styles() {
        $selector = array(
            'h2'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h2_responsive');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680_768', 'pxlz_edgtf_h2_responsive_styles');
}

if (!function_exists('pxlz_edgtf_h3_responsive_styles')) {
    function pxlz_edgtf_h3_responsive_styles() {
        $selector = array(
            'h3'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h3_responsive');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680_768', 'pxlz_edgtf_h3_responsive_styles');
}

if (!function_exists('pxlz_edgtf_h4_responsive_styles')) {
    function pxlz_edgtf_h4_responsive_styles() {
        $selector = array(
            'h4'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h4_responsive');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680_768', 'pxlz_edgtf_h4_responsive_styles');
}

if (!function_exists('pxlz_edgtf_h5_responsive_styles')) {
    function pxlz_edgtf_h5_responsive_styles() {
        $selector = array(
            'h5'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h5_responsive');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680_768', 'pxlz_edgtf_h5_responsive_styles');
}

if (!function_exists('pxlz_edgtf_h6_responsive_styles')) {
    function pxlz_edgtf_h6_responsive_styles() {
        $selector = array(
            'h6'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h6_responsive');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680_768', 'pxlz_edgtf_h6_responsive_styles');
}

if (!function_exists('pxlz_edgtf_text_responsive_styles')) {
    function pxlz_edgtf_text_responsive_styles() {
        $selector = array(
            'body',
            'p'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('text', '_res1');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680_768', 'pxlz_edgtf_text_responsive_styles');
}

if (!function_exists('pxlz_edgtf_h1_responsive_styles2')) {
    function pxlz_edgtf_h1_responsive_styles2() {
        $selector = array(
            'h1'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h1_responsive', '_2');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680', 'pxlz_edgtf_h1_responsive_styles2');
}

if (!function_exists('pxlz_edgtf_h2_responsive_styles2')) {
    function pxlz_edgtf_h2_responsive_styles2() {
        $selector = array(
            'h2'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h2_responsive', '_2');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680', 'pxlz_edgtf_h2_responsive_styles2');
}

if (!function_exists('pxlz_edgtf_h3_responsive_styles2')) {
    function pxlz_edgtf_h3_responsive_styles2() {
        $selector = array(
            'h3'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h3_responsive', '_2');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680', 'pxlz_edgtf_h3_responsive_styles2');
}

if (!function_exists('pxlz_edgtf_h4_responsive_styles2')) {
    function pxlz_edgtf_h4_responsive_styles2() {
        $selector = array(
            'h4'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h4_responsive', '_2');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680', 'pxlz_edgtf_h4_responsive_styles2');
}

if (!function_exists('pxlz_edgtf_h5_responsive_styles2')) {
    function pxlz_edgtf_h5_responsive_styles2() {
        $selector = array(
            'h5'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h5_responsive', '_2');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680', 'pxlz_edgtf_h5_responsive_styles2');
}

if (!function_exists('pxlz_edgtf_h6_responsive_styles2')) {
    function pxlz_edgtf_h6_responsive_styles2() {
        $selector = array(
            'h6'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('h6_responsive', '_2');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680', 'pxlz_edgtf_h6_responsive_styles2');
}

if (!function_exists('pxlz_edgtf_text_responsive_styles2')) {
    function pxlz_edgtf_text_responsive_styles2() {
        $selector = array(
            'body',
            'p'
        );

        $styles = pxlz_edgtf_get_responsive_typography_styles('text', '_res2');

        if (!empty($styles)) {
            echo pxlz_edgtf_dynamic_css($selector, $styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic_responsive_680', 'pxlz_edgtf_text_responsive_styles2');
}