<?php

if ( ! function_exists( 'pxlz_edgtf_register_widgets' ) ) {
    function pxlz_edgtf_register_widgets() {
        $widgets = apply_filters( 'pxlz_edgtf_register_widgets', $widgets = array() );

        if(pxlz_edgtf_core_plugin_installed()) {
            foreach ($widgets as $widget) {
                pxlz_edgtf_create_wp_widget($widget);
            }
        }
    }

    add_action( 'widgets_init', 'pxlz_edgtf_register_widgets' );
}