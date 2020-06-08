<?php

if (!function_exists('pxlz_edgtf_register_social_icon_widget')) {
    /**
     * Function that register social icon widget
     */
    function pxlz_edgtf_register_social_icon_widget($widgets) {
        $widgets[] = 'PxlzEdgefSocialIconWidget';

        return $widgets;
    }

    add_filter('pxlz_edgtf_register_widgets', 'pxlz_edgtf_register_social_icon_widget');
}