<?php

if (!function_exists('pxlz_edgtf_get_hide_dep_for_top_header_options')) {
    function pxlz_edgtf_get_hide_dep_for_top_header_options() {
        $hide_dep_options = apply_filters('pxlz_edgtf_top_header_hide_global_option', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('pxlz_edgtf_header_top_options_map')) {
    function pxlz_edgtf_header_top_options_map($panel_header) {
        $hide_dep_options = pxlz_edgtf_get_hide_dep_for_top_header_options();

        $top_header_container = pxlz_edgtf_add_admin_container_no_style(
            array(
                'type' => 'container',
                'name' => 'top_header_container',
                'parent' => $panel_header,
                'hidden_property' => 'header_type',
                'hidden_values' => $hide_dep_options
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Top Bar', 'pxlz'),
                'description' => esc_html__('Enabling this option will show top bar area', 'pxlz'),
                'parent' => $top_header_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_top_bar_container"
                )
            )
        );

        $top_bar_container = pxlz_edgtf_add_admin_container(
            array(
                'name' => 'top_bar_container',
                'parent' => $top_header_container,
                'hidden_property' => 'top_bar',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_in_grid',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Top Bar in Grid', 'pxlz'),
                'description' => esc_html__('Set top bar content to be in grid', 'pxlz'),
                'parent' => $top_bar_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
                )
            )
        );

        $top_bar_in_grid_container = pxlz_edgtf_add_admin_container(
            array(
                'name' => 'top_bar_in_grid_container',
                'parent' => $top_bar_container,
                'hidden_property' => 'top_bar_in_grid',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_grid_background_color',
                'type' => 'color',
                'label' => esc_html__('Grid Background Color', 'pxlz'),
                'description' => esc_html__('Set grid background color for top bar', 'pxlz'),
                'parent' => $top_bar_in_grid_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_grid_background_transparency',
                'type' => 'text',
                'label' => esc_html__('Grid Background Transparency', 'pxlz'),
                'description' => esc_html__('Set grid background transparency for top bar', 'pxlz'),
                'parent' => $top_bar_in_grid_container,
                'args' => array('col_width' => 3)
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Set background color for top bar', 'pxlz'),
                'parent' => $top_bar_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_background_transparency',
                'type' => 'text',
                'label' => esc_html__('Background Transparency', 'pxlz'),
                'description' => esc_html__('Set background transparency for top bar', 'pxlz'),
                'parent' => $top_bar_container,
                'args' => array('col_width' => 3)
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_border',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Top Bar Border', 'pxlz'),
                'description' => esc_html__('Set top bar border', 'pxlz'),
                'parent' => $top_bar_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_top_bar_border_container"
                )
            )
        );

        $top_bar_border_container = pxlz_edgtf_add_admin_container(
            array(
                'name' => 'top_bar_border_container',
                'parent' => $top_bar_container,
                'hidden_property' => 'top_bar_border',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_border_color',
                'type' => 'color',
                'label' => esc_html__('Top Bar Border', 'pxlz'),
                'description' => esc_html__('Set border color for top bar', 'pxlz'),
                'parent' => $top_bar_border_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'top_bar_height',
                'type' => 'text',
                'label' => esc_html__('Top Bar Height', 'pxlz'),
                'description' => esc_html__('Enter top bar height (Default is 37px)', 'pxlz'),
                'parent' => $top_bar_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );
    }

    add_action('pxlz_edgtf_header_top_options_map', 'pxlz_edgtf_header_top_options_map', 10, 1);
}