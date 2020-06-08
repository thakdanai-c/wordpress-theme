<?php

if (!function_exists('pxlz_edgtf_register_blog_standard_template_file')) {
    /**
     * Function that register blog standard template
     */
    function pxlz_edgtf_register_blog_standard_template_file($templates) {
        $templates['blog-standard'] = esc_html__('Blog: Standard', 'pxlz');

        return $templates;
    }

    add_filter('pxlz_edgtf_register_blog_templates', 'pxlz_edgtf_register_blog_standard_template_file');
}

if (!function_exists('pxlz_edgtf_set_blog_standard_type_global_option')) {
    /**
     * Function that set blog list type value for global blog option map
     */
    function pxlz_edgtf_set_blog_standard_type_global_option($options) {
        $options['standard'] = esc_html__('Blog: Standard', 'pxlz');

        return $options;
    }

    add_filter('pxlz_edgtf_blog_list_type_global_option', 'pxlz_edgtf_set_blog_standard_type_global_option');
}