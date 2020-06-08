<?php

if (!function_exists('pxlz_edgtf_get_blog_list_types_options')) {
    function pxlz_edgtf_get_blog_list_types_options() {
        $blog_list_type_options = apply_filters('pxlz_edgtf_blog_list_type_global_option', $blog_list_type_options = array());

        return $blog_list_type_options;
    }
}

if (!function_exists('pxlz_edgtf_blog_options_map')) {
    function pxlz_edgtf_blog_options_map() {
        $blog_list_type_options = pxlz_edgtf_get_blog_list_types_options();

        pxlz_edgtf_add_admin_page(
            array(
                'slug' => '_blog_page',
                'title' => esc_html__('Blog', 'pxlz'),
                'icon' => 'fa fa-files-o'
            )
        );

        /**
         * Blog Lists
         */
        $panel_blog_lists = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_lists',
                'title' => esc_html__('Blog Lists', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_list_type',
                'type' => 'select',
                'label' => esc_html__('Blog Layout for Archive Pages', 'pxlz'),
                'description' => esc_html__('Choose a default blog layout for archived blog post lists', 'pxlz'),
                'default_value' => 'standard',
                'parent' => $panel_blog_lists,
                'options' => $blog_list_type_options
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'archive_sidebar_layout',
                'type' => 'select',
                'label' => esc_html__('Sidebar Layout for Archive Pages', 'pxlz'),
                'description' => esc_html__('Choose a sidebar layout for archived blog post lists', 'pxlz'),
                'default_value' => '',
                'parent' => $panel_blog_lists,
                'options' => pxlz_edgtf_get_custom_sidebars_options(),
            )
        );

        $pxlz_custom_sidebars = pxlz_edgtf_get_custom_sidebars();
        if (count($pxlz_custom_sidebars) > 0) {
            pxlz_edgtf_add_admin_field(
                array(
                    'name' => 'archive_custom_sidebar_area',
                    'type' => 'selectblank',
                    'label' => esc_html__('Sidebar to Display for Archive Pages', 'pxlz'),
                    'description' => esc_html__('Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'pxlz'),
                    'parent' => $panel_blog_lists,
                    'options' => pxlz_edgtf_get_custom_sidebars(),
                    'args' => array(
                        'select2' => true
                    )
                )
            );
        }

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_masonry_layout',
                'type' => 'select',
                'label' => esc_html__('Masonry - Layout', 'pxlz'),
                'default_value' => 'in-grid',
                'description' => esc_html__('Set masonry layout. Default is in grid.', 'pxlz'),
                'parent' => $panel_blog_lists,
                'options' => array(
                    'in-grid' => esc_html__('In Grid', 'pxlz'),
                    'full-width' => esc_html__('Full Width', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_masonry_number_of_columns',
                'type' => 'select',
                'label' => esc_html__('Masonry - Number of Columns', 'pxlz'),
                'default_value' => 'three',
                'description' => esc_html__('Set number of columns for your masonry blog lists. Default value is 4 columns', 'pxlz'),
                'parent' => $panel_blog_lists,
                'options' => array(
                    'two' => esc_html__('2 Columns', 'pxlz'),
                    'three' => esc_html__('3 Columns', 'pxlz'),
                    'four' => esc_html__('4 Columns', 'pxlz'),
                    'five' => esc_html__('5 Columns', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_masonry_space_between_items',
                'type' => 'select',
                'label' => esc_html__('Masonry - Space Between Items', 'pxlz'),
                'description' => esc_html__('Set space size between posts for your masonry blog lists. Default value is normal', 'pxlz'),
                'default_value' => 'normal',
                'options' => pxlz_edgtf_get_space_between_items_array(),
                'parent' => $panel_blog_lists
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_list_featured_image_proportion',
                'type' => 'select',
                'label' => esc_html__('Masonry - Featured Image Proportion', 'pxlz'),
                'default_value' => 'fixed',
                'description' => esc_html__('Choose type of proportions you want to use for featured images on masonry blog lists', 'pxlz'),
                'parent' => $panel_blog_lists,
                'options' => array(
                    'fixed' => esc_html__('Fixed', 'pxlz'),
                    'original' => esc_html__('Original', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_pagination_type',
                'type' => 'select',
                'label' => esc_html__('Pagination Type', 'pxlz'),
                'description' => esc_html__('Choose a pagination layout for Blog Lists', 'pxlz'),
                'parent' => $panel_blog_lists,
                'default_value' => 'standard',
                'options' => array(
                    'standard' => esc_html__('Standard', 'pxlz'),
                    'load-more' => esc_html__('Load More', 'pxlz'),
                    'infinite-scroll' => esc_html__('Infinite Scroll', 'pxlz'),
                    'no-pagination' => esc_html__('No Pagination', 'pxlz')
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'number_of_chars',
                'default_value' => '60',
                'label' => esc_html__('Number of Words in Excerpt', 'pxlz'),
                'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 60', 'pxlz'),
                'parent' => $panel_blog_lists,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        /**
         * Blog Single
         */
        $panel_blog_single = pxlz_edgtf_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_single',
                'title' => esc_html__('Blog Single', 'pxlz')
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_single_sidebar_layout',
                'type' => 'select',
                'label' => esc_html__('Sidebar Layout', 'pxlz'),
                'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'pxlz'),
                'default_value' => '',
                'parent' => $panel_blog_single,
                'options' => pxlz_edgtf_get_custom_sidebars_options()
            )
        );

        if (count($pxlz_custom_sidebars) > 0) {
            pxlz_edgtf_add_admin_field(
                array(
                    'name' => 'blog_single_custom_sidebar_area',
                    'type' => 'selectblank',
                    'label' => esc_html__('Sidebar to Display', 'pxlz'),
                    'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'pxlz'),
                    'parent' => $panel_blog_single,
                    'options' => pxlz_edgtf_get_custom_sidebars(),
                    'args' => array(
                        'select2' => true
                    )
                )
            );
        }

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'show_title_area_blog',
                'default_value' => 'no',
                'label' => esc_html__('Show Title Area', 'pxlz'),
                'description' => esc_html__('Enabling this option will show title area on single post pages', 'pxlz'),
                'parent' => $panel_blog_single,
                'options' => pxlz_edgtf_get_yes_no_select_array(),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_single_title_in_title_area',
                'type' => 'yesno',
                'label' => esc_html__('Show Post Title in Title Area', 'pxlz'),
                'description' => esc_html__('Enabling this option will show post title in title area on single post pages', 'pxlz'),
                'parent' => $panel_blog_single,
                'default_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_single_related_posts',
                'type' => 'yesno',
                'label' => esc_html__('Show Related Posts', 'pxlz'),
                'description' => esc_html__('Enabling this option will show related posts on single post pages', 'pxlz'),
                'parent' => $panel_blog_single,
                'default_value' => 'no'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'name' => 'blog_single_comments',
                'type' => 'yesno',
                'label' => esc_html__('Show Comments Form', 'pxlz'),
                'description' => esc_html__('Enabling this option will show comments form on single post pages', 'pxlz'),
                'parent' => $panel_blog_single,
                'default_value' => 'yes'
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_single_navigation',
                'default_value' => 'yes',
                'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'pxlz'),
                'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'pxlz'),
                'parent' => $panel_blog_single,
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
                )
            )
        );

        $blog_single_navigation_container = pxlz_edgtf_add_admin_container(
            array(
                'name' => 'edgtf_blog_single_navigation_container',
                'hidden_property' => 'blog_single_navigation',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_navigation_through_same_category',
                'default_value' => 'no',
                'label' => esc_html__('Enable Navigation Only in Current Category', 'pxlz'),
                'description' => esc_html__('Limit your navigation only through current category', 'pxlz'),
                'parent' => $blog_single_navigation_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_author_info',
                'default_value' => 'no',
                'label' => esc_html__('Show Author Info Box', 'pxlz'),
                'description' => esc_html__('Enabling this option will display author name and descriptions on single post pages', 'pxlz'),
                'parent' => $panel_blog_single,
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
                )
            )
        );

        $blog_single_author_info_container = pxlz_edgtf_add_admin_container(
            array(
                'name' => 'edgtf_blog_single_author_info_container',
                'hidden_property' => 'blog_author_info',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_author_info_email',
                'default_value' => 'no',
                'label' => esc_html__('Show Author Email', 'pxlz'),
                'description' => esc_html__('Enabling this option will show author email', 'pxlz'),
                'parent' => $blog_single_author_info_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        pxlz_edgtf_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_single_author_social',
                'default_value' => 'yes',
                'label' => esc_html__('Show Author Social Icons', 'pxlz'),
                'description' => esc_html__('Enabling this option will show author social icons on single post pages', 'pxlz'),
                'parent' => $blog_single_author_info_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        do_action('pxlz_edgtf_blog_single_options_map', $panel_blog_single);
    }

    add_action('pxlz_edgtf_options_map', 'pxlz_edgtf_blog_options_map', 13);
}