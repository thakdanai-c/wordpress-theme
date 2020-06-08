<?php

if (!function_exists('pxlz_edgtf_register_header_standard_type')) {
    /**
     * This function is used to register header type class for header factory file
     */
    function pxlz_edgtf_register_header_standard_type($header_types) {
        $header_type = array(
            'header-standard' => 'PxlzEdgef\Modules\Header\Types\HeaderStandard'
        );

        $header_types = array_merge($header_types, $header_type);

        return $header_types;
    }
}

if (!function_exists('pxlz_edgtf_init_register_header_standard_type')) {
    /**
     * This function is used to wait header-function.php file to init header object and then to init hook registration function above
     */
    function pxlz_edgtf_init_register_header_standard_type() {
        add_filter('pxlz_edgtf_register_header_type_class', 'pxlz_edgtf_register_header_standard_type');
    }

    add_action('pxlz_edgtf_before_header_function_init', 'pxlz_edgtf_init_register_header_standard_type');
}