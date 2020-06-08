<?php

if (!function_exists('pxlz_edgtf_sidearea_options_map')) {
    function pxlz_edgtf_sidearea_options_map() {

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '_side_area_page',
                'title' => esc_html__('Side Area', 'pxlz'),
                'icon' => 'fa fa-indent'
            )
        );

        $side_area_panel = pxlz_edgtf_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'pxlz'),
                'name' => 'side_area',
                'page' => '_side_area_page'
            )
        );

        $side_area_icon_style_group = pxlz_edgtf_add_admin_group(
            array(
                'parent' => $side_area_panel,
                'name' => 'side_area_icon_style_group',
                'title' => esc_html__('Side Area Icon Style', 'pxlz'),
                'description' => esc_html__('Define styles for Side Area icon', 'pxlz')
            )
        );

        $side_area_icon_style_row1 = pxlz_edgtf_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name' => 'side_area_icon_style_row1'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type' => 'colorsimple',
                'name' => 'side_area_icon_color',
                'label' => esc_html__('Color', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type' => 'colorsimple',
                'name' => 'side_area_icon_hover_color',
                'label' => esc_html__('Hover Color', 'pxlz')
            )
        );

        $side_area_icon_style_row2 = pxlz_edgtf_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name' => 'side_area_icon_style_row2',
                'next' => true
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type' => 'colorsimple',
                'name' => 'side_area_close_icon_color',
                'label' => esc_html__('Close Icon Color', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type' => 'colorsimple',
                'name' => 'side_area_close_icon_hover_color',
                'label' => esc_html__('Close Icon Hover Color', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'text',
                'name' => 'side_area_width',
                'default_value' => '',
                'label' => esc_html__('Side Area Width', 'pxlz'),
                'description' => esc_html__('Enter a width for Side Area', 'pxlz'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'color',
                'name' => 'side_area_background_color',
                'label' => esc_html__('Background Color', 'pxlz'),
                'description' => esc_html__('Choose a background color for Side Area', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'text',
                'name' => 'side_area_padding',
                'label' => esc_html__('Padding', 'pxlz'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'pxlz'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'parent' => $side_area_panel,
                'type' => 'selectblank',
                'name' => 'side_area_aligment',
                'default_value' => '',
                'label' => esc_html__('Text Alignment', 'pxlz'),
                'description' => esc_html__('Choose text alignment for side area', 'pxlz'),
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'left' => esc_html__('Left', 'pxlz'),
                    'center' => esc_html__('Center', 'pxlz'),
                    'right' => esc_html__('Right', 'pxlz')
                )
            )
        );
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_sidearea_options_map', 15);
}