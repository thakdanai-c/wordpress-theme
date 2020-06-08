<?php

if (!function_exists('pxlz_edgtf_footer_options_map')) {
    function pxlz_edgtf_footer_options_map() {

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '_footer_page',
                'title' => esc_html__('Footer', 'pxlz'),
                'icon' => 'fa fa-sort-amount-asc'
            )
        );

        $footer_panel = pxlz_edgtf_add_admin_panel(
            array(
                'title' => esc_html__('Footer', 'pxlz'),
                'name' => 'footer',
                'page' => '_footer_page'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'footer_in_grid',
                'default_value' => 'yes',
                'label' => esc_html__('Footer in Grid', 'pxlz'),
                'description' => esc_html__('Enabling this option will place Footer content in grid', 'pxlz'),
                'parent' => $footer_panel,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'show_footer_top',
                'default_value' => 'yes',
                'label' => esc_html__('Show Footer Top', 'pxlz'),
                'description' => esc_html__('Enabling this option will show Footer Top area', 'pxlz'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgtf_show_footer_top_container'
                ),
                'parent' => $footer_panel,
            )
        );

        $show_footer_top_container = pxlz_edgtf_add_admin_container(
            array(
                'name' => 'show_footer_top_container',
                'hidden_property' => 'show_footer_top',
                'hidden_value' => 'no',
                'parent' => $footer_panel
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_top_columns',
                'parent' => $show_footer_top_container,
                'default_value' => '4',
                'label' => esc_html__('Footer Top Columns', 'pxlz'),
                'description' => esc_html__('Choose number of columns for Footer Top area', 'pxlz'),
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4'
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_top_columns_alignment',
                'default_value' => 'left',
                'label' => esc_html__('Footer Top Columns Alignment', 'pxlz'),
                'description' => esc_html__('Text Alignment in Footer Columns', 'pxlz'),
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'left' => esc_html__('Left', 'pxlz'),
                    'center' => esc_html__('Center', 'pxlz'),
                    'right' => esc_html__('Right', 'pxlz')
                ),
                'parent' => $show_footer_top_container,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'footer_top_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Set background color for top footer area', 'pxlz'),
                'parent' => $show_footer_top_container
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'show_footer_bottom',
                'default_value' => 'yes',
                'label' => esc_html__('Show Footer Bottom', 'pxlz'),
                'description' => esc_html__('Enabling this option will show Footer Bottom area', 'pxlz'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgtf_show_footer_bottom_container'
                ),
                'parent' => $footer_panel,
            )
        );

        $show_footer_bottom_container = pxlz_edgtf_add_admin_container(
            array(
                'name' => 'show_footer_bottom_container',
                'hidden_property' => 'show_footer_bottom',
                'hidden_value' => 'no',
                'parent' => $footer_panel
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_bottom_columns',
                'default_value' => '2',
                'label' => esc_html__('Footer Bottom Columns', 'pxlz'),
                'description' => esc_html__('Choose number of columns for Footer Bottom area', 'pxlz'),
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3'
                ),
                'parent' => $show_footer_bottom_container,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'footer_bottom_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Set background color for bottom footer area', 'pxlz'),
                'parent' => $show_footer_bottom_container
            )
        );
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_footer_options_map', 11);
}