<?php

if (!function_exists('pxlz_edgtf_register_blog_metro_template_file')) {
    /**
     * Function that register blog metro template
     */
    function pxlz_edgtf_register_blog_metro_template_file($templates) {
        $templates['blog-metro'] = esc_html__('Blog: Metro', 'pxlz');

        return $templates;
    }

    add_filter('pxlz_edgtf_register_blog_templates', 'pxlz_edgtf_register_blog_metro_template_file');
}

if (!function_exists('pxlz_edgtf_set_blog_metro_type_global_option')) {
    /**
     * Function that set blog list type value for global blog option map
     */
    function pxlz_edgtf_set_blog_metro_type_global_option($options) {
        $options['metro'] = esc_html__('Blog: Metro', 'pxlz');

        return $options;
    }

    add_filter('pxlz_edgtf_blog_list_type_global_option', 'pxlz_edgtf_set_blog_metro_type_global_option');
}