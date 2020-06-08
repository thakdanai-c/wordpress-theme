<?php

if (!function_exists('pxlz_edgtf_woocommerce_options_map')) {

    /**
     * Add Woocommerce options page
     */
    function pxlz_edgtf_woocommerce_options_map() {

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '_woocommerce_page',
                'title' => esc_html__('Woocommerce', 'pxlz'),
                'icon' => 'fa fa-shopping-cart'
            )
        );

        /**
         * Product List Settings
         */
        $panel_product_list = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_product_list',
                'title' => esc_html__('Product List', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'edgtf_woo_product_list_columns',
                'label' => esc_html__('Product List Columns', 'pxlz'),
                'default_value' => 'edgtf-woocommerce-columns-3',
                'description' => esc_html__('Choose number of columns for product listing and related products on single product', 'pxlz'),
                'options' => array(
                    'edgtf-woocommerce-columns-3' => esc_html__('3 Columns', 'pxlz'),
                    'edgtf-woocommerce-columns-4' => esc_html__('4 Columns', 'pxlz')
                ),
                'parent' => $panel_product_list,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'edgtf_woo_product_list_columns_space',
                'label' => esc_html__('Space Between Items', 'pxlz'),
                'description' => esc_html__('Select space between items for product listing and related products on single product', 'pxlz'),
                'default_value' => 'normal',
                'options' => pxlz_edgtf_get_space_between_items_array(),
                'parent' => $panel_product_list,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'edgtf_woo_product_list_info_position',
                'label' => esc_html__('Product Info Position', 'pxlz'),
                'default_value' => 'info_below_image',
                'description' => esc_html__('Select product info position for product listing and related products on single product', 'pxlz'),
                'options' => array(
                    'info_below_image' => esc_html__('Info Below Image', 'pxlz'),
                    'info_on_image_hover' => esc_html__('Info On Image Hover', 'pxlz')
                ),
                'parent' => $panel_product_list,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'edgtf_woo_products_per_page',
                'label' => esc_html__('Number of products per page', 'pxlz'),
                'description' => esc_html__('Set number of products on shop page', 'pxlz'),
                'parent' => $panel_product_list,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'edgtf_products_list_title_tag',
                'label' => esc_html__('Products Title Tag', 'pxlz'),
                'default_value' => 'h4',
                'options' => pxlz_edgtf_get_title_tag(),
                'parent' => $panel_product_list,
            )
        );

        /**
         * Single Product Settings
         */
        $panel_single_product = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_single_product',
                'title' => esc_html__('Single Product', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'show_title_area_woo',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'pxlz'),
                'description' => esc_html__('Enabling this option will show title area on single post pages', 'pxlz'),
                'parent' => $panel_single_product,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'edgtf_single_product_title_tag',
                'default_value' => 'h3',
                'label' => esc_html__('Single Product Title Tag', 'pxlz'),
                'options' => pxlz_edgtf_get_title_tag(),
                'parent' => $panel_single_product,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'woo_number_of_thumb_images',
                'default_value' => '4',
                'label' => esc_html__('Number of Thumbnail Images per Row', 'pxlz'),
                'options' => array(
                    '4' => esc_html__('Four', 'pxlz'),
                    '3' => esc_html__('Three', 'pxlz'),
                    '2' => esc_html__('Two', 'pxlz')
                ),
                'parent' => $panel_single_product
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'woo_set_thumb_images_position',
                'default_value' => 'below-image',
                'label' => esc_html__('Set Thumbnail Images Position', 'pxlz'),
                'options' => array(
                    'below-image' => esc_html__('Below Featured Image', 'pxlz'),
                    'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'pxlz')
                ),
                'parent' => $panel_single_product
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'woo_enable_single_product_zoom_image',
                'default_value' => 'no',
                'label' => esc_html__('Enable Zoom Maginfier', 'pxlz'),
                'description' => esc_html__('Enabling this option will show magnifier image on featured image hover', 'pxlz'),
                'parent' => $panel_single_product,
                'options' => pxlz_edgtf_get_yes_no_select_array(false),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'woo_set_single_images_behavior',
                'default_value' => 'pretty-photo',
                'label' => esc_html__('Set Images Behavior', 'pxlz'),
                'options' => array(
                    'pretty-photo' => esc_html__('Pretty Photo Lightbox', 'pxlz'),
                    'photo-swipe' => esc_html__('Photo Swipe Lightbox', 'pxlz')
                ),
                'parent' => $panel_single_product
            )
        );
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_woocommerce_options_map', 21);
}