<?php

if (!function_exists('pxlz_edgtf_map_woocommerce_meta')) {
    function pxlz_edgtf_map_woocommerce_meta() {
        $woocommerce_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'pxlz'),
                'name' => 'woo_product_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(array(
            'name' => 'edgtf_product_featured_image_size',
            'type' => 'select',
            'label' => esc_html__('Dimensions for Product List Shortcode', 'pxlz'),
            'description' => esc_html__('Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'pxlz'),
            'parent' => $woocommerce_meta_box,
            'options' => array(
                'edgtf-woo-image-small-square' => esc_html__('Small Square', 'pxlz'),
                'edgtf-woo-image-big-square' => esc_html__('Big Square', 'pxlz'),
                'edgtf-woo-image-portrait' => esc_html__('Portrait', 'pxlz'),
                'edgtf-woo-image-landscape' => esc_html__('Landscape', 'pxlz'),
            )
        ));

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_woo_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'pxlz'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'pxlz'),
                'parent' => $woocommerce_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_woocommerce_meta', 99);
}