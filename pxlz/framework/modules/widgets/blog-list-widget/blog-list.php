<?php

class PxlzEdgefBlogListWidget extends PxlzEdgefWidget
{
    public function __construct() {
        parent::__construct(
            'edgtf_blog_list_widget',
            esc_html__('Edge Blog List Widget', 'pxlz'),
            array('description' => esc_html__('Display a list of your blog posts', 'pxlz'))
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'name' => 'title',
                'title' => esc_html__('Widget Title', 'pxlz')
            ),
            array(
                'type' => 'textfield',
                'name' => 'number_of_posts',
                'title' => esc_html__('Number of Posts', 'pxlz')
            ),
            array(
                'type' => 'dropdown',
                'name' => 'post_info_date',
                'title' => esc_html__('Show Date', 'pxlz'),
                'options' => pxlz_edgtf_get_yes_no_select_array(true, true),
            ),
            array(
                'type' => 'dropdown',
                'name' => 'space_between_items',
                'title' => esc_html__('Space Between Items', 'pxlz'),
                'options' => pxlz_edgtf_get_space_between_items_array()
            ),
            array(
                'type' => 'dropdown',
                'name' => 'orderby',
                'title' => esc_html__('Order By', 'pxlz'),
                'options' => pxlz_edgtf_get_query_order_by_array()
            ),
            array(
                'type' => 'dropdown',
                'name' => 'order',
                'title' => esc_html__('Order', 'pxlz'),
                'options' => pxlz_edgtf_get_query_order_array()
            ),
            array(
                'type' => 'textfield',
                'name' => 'category',
                'title' => esc_html__('Category Slug', 'pxlz'),
                'description' => esc_html__('Leave empty for all or use comma for list', 'pxlz')
            ),
        );
    }

    public function widget($args, $instance) {
        if (!is_array($instance)) {
            $instance = array();
        }

        $instance['type'] = 'minimal';
        $instance['title_tag'] = 'span';
        $instance['number_of_columns'] = '1';
        $instance['post_info_read_more'] = 'no';

        // Filter out all empty params
        $instance = array_filter($instance, function ($array_value) {
            return trim($array_value) != '';
        });
        $instance['type'] = !empty($instance['type']) ? $instance['type'] : 'simple';

        $params = '';
        //generate shortcode params
        foreach ($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        echo '<div class="widget edgtf-blog-list-widget">';
        if (!empty($instance['title'])) {
            echo wp_kses_post($args['before_title']) . esc_html($instance['title']) . wp_kses_post($args['after_title']);
        }

        echo do_shortcode("[edgtf_blog_list $params]"); // XSS OK
        echo '</div>';
    }
}