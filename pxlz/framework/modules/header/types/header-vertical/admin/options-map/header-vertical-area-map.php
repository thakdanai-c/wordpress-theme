<?php

if (!function_exists('pxlz_edgtf_get_hide_dep_for_header_vertical_area_options')) {
    function pxlz_edgtf_get_hide_dep_for_header_vertical_area_options() {
        $hide_dep_options = apply_filters('pxlz_edgtf_header_vertical_hide_global_option', $hide_dep_options = array());

        return $hide_dep_options;
    }
}

if (!function_exists('pxlz_edgtf_header_vertical_options_map')) {
    function pxlz_edgtf_header_vertical_options_map($panel_header) {
        $hide_dep_options = pxlz_edgtf_get_hide_dep_for_header_vertical_area_options();

        $vertical_area_container = pxlz_edgtf_add_admin_container_no_style(
            array(
                'parent' => $panel_header,
                'name' => 'header_vertical_area_container',
                'hidden_property' => 'header_type',
                'hidden_values' => $hide_dep_options
            )
        );

        pxlz_edgtf_add_admin_section_title(
            array(
                'parent' => $vertical_area_container,
                'name' => 'menu_area_style',
                'title' => esc_html__('Vertical Area Style', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Set background color for vertical menu', 'pxlz'),
                'parent' => $vertical_area_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'vertical_header_background_image',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Background Image', 'pxlz'),
                'description' => esc_html__('Set background image for vertical menu', 'pxlz'),
                'parent' => $vertical_area_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $vertical_area_container,
                'type' => 'yesno',
                'name' => 'vertical_header_shadow',
                'default_value' => 'no',
                'label' => esc_html__('Shadow', 'pxlz'),
                'description' => esc_html__('Set shadow on vertical header', 'pxlz'),
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $vertical_area_container,
                'type' => 'yesno',
                'name' => 'vertical_header_border',
                'default_value' => 'no',
                'label' => esc_html__('Vertical Area Border', 'pxlz'),
                'description' => esc_html__('Set border on vertical area', 'pxlz'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgtf_vertical_header_shadow_border_container'
                )
            )
        );

        $vertical_header_shadow_border_container = pxlz_edgtf_add_admin_container(
            array(
                'parent' => $vertical_area_container,
                'name' => 'vertical_header_shadow_border_container',
                'hidden_property' => 'vertical_header_border',
                'hidden_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $vertical_header_shadow_border_container,
                'type' => 'color',
                'name' => 'vertical_header_border_color',
                'default_value' => '',
                'label' => esc_html__('Border Color', 'pxlz'),
                'description' => esc_html__('Set border color for vertical area', 'pxlz'),
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $vertical_area_container,
                'type' => 'yesno',
                'name' => 'vertical_header_center_content',
                'default_value' => 'no',
                'label' => esc_html__('Center Content', 'pxlz'),
                'description' => esc_html__('Set content in vertical center', 'pxlz'),
            )
        );

        do_action('pxlz_edgtf_header_vertical_area_additional_options', $panel_header);
    }

    add_action('pxlz_edgtf_additional_header_menu_area_options_map', 'pxlz_edgtf_header_vertical_options_map');
}