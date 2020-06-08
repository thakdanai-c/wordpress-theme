<?php

if (!function_exists('pxlz_edgtf_reset_options_map')) {
    /**
     * Reset options panel
     */
    function pxlz_edgtf_reset_options_map() {

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '_reset_page',
                'title' => esc_html__('Reset', 'pxlz'),
                'icon' => 'fa fa-retweet'
            )
        );

        $panel_reset = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '_reset_page',
                'name' => 'panel_reset',
                'title' => esc_html__('Reset', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'reset_to_defaults',
                'default_value' => 'no',
                'label' => esc_html__('Reset to Defaults', 'pxlz'),
                'description' => esc_html__('This option will reset all Select Options values to defaults', 'pxlz'),
                'parent' => $panel_reset
            )
        );
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_reset_options_map', 100);
}