<?php

foreach (glob(EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php') as $meta_box_load) {
    include_once $meta_box_load;
}

if (!function_exists('pxlz_edgtf_map_blog_meta')) {
    function pxlz_edgtf_map_blog_meta() {
        $edgtf_blog_categories = array();
        $categories = get_categories();
        foreach ($categories as $category) {
            $edgtf_blog_categories[$category->slug] = $category->name;
        }

        $blog_meta_box = pxlz_edgtf_create_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'pxlz'),
                'name' => 'blog_meta'
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_category_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Blog Category', 'pxlz'),
                'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'pxlz'),
                'parent' => $blog_meta_box,
                'options' => $edgtf_blog_categories
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_show_posts_per_page_meta',
                'type' => 'text',
                'label' => esc_html__('Number of Posts', 'pxlz'),
                'description' => esc_html__('Enter the number of posts to display', 'pxlz'),
                'parent' => $blog_meta_box,
                'options' => $edgtf_blog_categories,
                'args' => array("col_width" => 3)
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_masonry_layout_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Layout', 'pxlz'),
                'description' => esc_html__('Set masonry layout. Default is in grid.', 'pxlz'),
                'parent' => $blog_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'in-grid' => esc_html__('In Grid', 'pxlz'),
                    'full-width' => esc_html__('Full Width', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_masonry_number_of_columns_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Number of Columns', 'pxlz'),
                'description' => esc_html__('Set number of columns for your masonry blog lists', 'pxlz'),
                'parent' => $blog_meta_box,
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'two' => esc_html__('2 Columns', 'pxlz'),
                    'three' => esc_html__('3 Columns', 'pxlz'),
                    'four' => esc_html__('4 Columns', 'pxlz'),
                    'five' => esc_html__('5 Columns', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_masonry_space_between_items_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Space Between Items', 'pxlz'),
                'description' => esc_html__('Set space size between posts for your masonry blog lists', 'pxlz'),
                'options' => pxlz_edgtf_get_space_between_items_array(true),
                'parent' => $blog_meta_box
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_list_featured_image_proportion_meta',
                'type' => 'select',
                'label' => esc_html__('Masonry - Featured Image Proportion', 'pxlz'),
                'description' => esc_html__('Choose type of proportions you want to use for featured images on masonry blog lists', 'pxlz'),
                'parent' => $blog_meta_box,
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'fixed' => esc_html__('Fixed', 'pxlz'),
                    'original' => esc_html__('Original', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_pagination_type_meta',
                'type' => 'select',
                'label' => esc_html__('Pagination Type', 'pxlz'),
                'description' => esc_html__('Choose a pagination layout for Blog Lists', 'pxlz'),
                'parent' => $blog_meta_box,
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'pxlz'),
                    'standard' => esc_html__('Standard', 'pxlz'),
                    'load-more' => esc_html__('Load More', 'pxlz'),
                    'infinite-scroll' => esc_html__('Infinite Scroll', 'pxlz'),
                    'no-pagination' => esc_html__('No Pagination', 'pxlz')
                )
            )
        );

        pxlz_edgtf_create_meta_box_field(
            array(
                'type' => 'text',
                'name' => 'edgtf_number_of_chars_meta',
                'default_value' => '',
                'label' => esc_html__('Number of Words in Excerpt', 'pxlz'),
                'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 40', 'pxlz'),
                'parent' => $blog_meta_box,
                'args' => array(
                    'col_width' => 3
                )
            )
        );
    }

    add_action('pxlz_edgtf_meta_boxes_map', 'pxlz_edgtf_map_blog_meta', 30);
}