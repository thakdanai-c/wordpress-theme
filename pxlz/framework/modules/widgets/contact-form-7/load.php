<?php

if (pxlz_edgtf_contact_form_7_installed()) {
    include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_cf7_widget');
}

if (!function_exists('pxlz_edgtf_register_cf7_widget')) {
    /**
     * Function that register cf7 widget
     */
    function pxlz_edgtf_register_cf7_widget($widgets) {
        $widgets[] = 'PxlzEdgefContactForm7Widget';

        return $widgets;
    }
}