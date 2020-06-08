<?php

/*** Post Settings ***/

if (!function_exists('pxlz_edgtf_map_post_meta')) {
    function pxlz_edgtf_map_post_meta() {

        $post_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Post', 'pxlz'),
                'name' => 'post-meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_single_sidebar_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Sidebar Layout', 'pxlz'),
                'description' => esc_html__('Choose a sidebar layout for Blog single page', 'pxlz'),
                'default_value' => '',
                'parent' => $post_meta_box,
                'options' => pxlz_edgtf_get_custom_sidebars_options(true)
            )
        );

        $pxlz_custom_sidebars = pxlz_edgtf_get_custom_sidebars();
        if (count($pxlz_custom_sidebars) > 0) {
            pxlz_edgtf_create_meta_box_field(array(
                'name' => 'edgtf_blog_single_custom_sidebar_area_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'pxlz'),
                'description' => esc_html__('Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'pxlz'),
                'parent' => $post_meta_box,
                'options' => pxlz_edgtf_get_custom_sidebars(),
                'args' => array(
                    'select2' => true
                )
            ));
        }

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_list_featured_image_meta',
                'type' => 'image',
                'label' => esc_html__('Blog List Image', 'pxlz'),
                'description' => esc_html__('Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'pxlz'),
                'parent' => $post_meta_box
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_masonry_gallery_fixed_dimensions_meta',
                'type' => 'select',
                'label' => esc_html__('Dimensions for Fixed Proportion', 'pxlz'),
                'description' => esc_html__('Choose image layout when it appears in Masonry lists in fixed proportion', 'pxlz'),
                'default_value' => 'default',
                'parent' => $post_meta_box,
                'options' => array(
                    'default' => esc_html__('Default', 'pxlz'),
                    'large-width' => esc_html__('Large Width', 'pxlz'),
                    'large-height' => esc_html__('Large Height', 'pxlz'),
                    'large-width-height' => esc_html__('Large Width/Height', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_masonry_gallery_original_dimensions_meta',
                'type' => 'select',
                'label' => esc_html__('Dimensions for Original Proportion', 'pxlz'),
                'description' => esc_html__('Choose image layout when it appears in Masonry lists in original proportion', 'pxlz'),
                'default_value' => 'default',
                'parent' => $post_meta_box,
                'options' => array(
                    'default' => esc_html__('Default', 'pxlz'),
                    'large-width' => esc_html__('Large Width', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_blog_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'pxlz'),
                'description' => esc_html__('Enabling this option will show title area on your single post page', 'pxlz'),
                'parent' => $post_meta_box,
                'options' => pxlz_edgtf_get_yes_no_select_array()
            )
        );

        do_action('pxlz_edgtf_blog_post_meta', $post_meta_box);
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_post_meta', 20);
}
