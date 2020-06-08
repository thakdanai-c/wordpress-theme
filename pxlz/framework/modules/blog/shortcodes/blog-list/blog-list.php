<?php
namespace EdgeCore\CPT\Shortcodes\BlogList;

use EdgeCore\Lib;

class BlogList implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'edgtf_blog_list';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Category filter
        add_filter('vc_autocomplete_edgtf_blog_list_category_callback', array(&$this, 'blogCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Category render
        add_filter('vc_autocomplete_edgtf_blog_list_category_render', array(&$this, 'blogCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(
            array(
                'name' => esc_html__('Edge Blog List', 'pxlz'),
                'base' => $this->base,
                'icon' => 'icon-wpb-blog-list extended-custom-icon',
                'category' => esc_html__('by EDGE', 'pxlz'),
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'type',
                        'heading' => esc_html__('Type', 'pxlz'),
                        'value' => array(
                            esc_html__('Standard', 'pxlz') => 'standard',
                            esc_html__('Masonry', 'pxlz') => 'masonry',
                            esc_html__('Minimal', 'pxlz') => 'minimal'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'number_of_posts',
                        'heading' => esc_html__('Number of Posts', 'pxlz')
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'number_of_columns',
                        'heading' => esc_html__('Number of Columns', 'pxlz'),
                        'value' => array(
                            esc_html__('One', 'pxlz') => '1',
                            esc_html__('Two', 'pxlz') => '2',
                            esc_html__('Three', 'pxlz') => '3',
                            esc_html__('Four', 'pxlz') => '4',
                            esc_html__('Five', 'pxlz') => '5'
                        ),
                        'dependency' => array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'space_between_items',
                        'heading' => esc_html__('Space Between Items', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_space_between_items_array()),
                        'save_always' => true,
                        'dependency' => array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'orderby',
                        'heading' => esc_html__('Order By', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_query_order_by_array()),
                        'save_always' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'order',
                        'heading' => esc_html__('Order', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_query_order_array()),
                        'save_always' => true
                    ),
                    array(
                        'type' => 'autocomplete',
                        'param_name' => 'category',
                        'heading' => esc_html__('Category', 'pxlz'),
                        'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'pxlz')
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'excerpt_length',
                        'heading' => esc_html__('Text Length', 'pxlz'),
                        'description' => esc_html__('Number of characters', 'pxlz'),
                        'dependency' => array('element' => 'type', 'value' => array('standard', 'masonry', 'simple')),
                        'group' => esc_html__('Post Info', 'pxlz')
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'post_info_image',
                        'heading' => esc_html__('Enable Post Info Image', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                        'dependency' => array('element' => 'type', 'value' => array('standard')),
                        'group' => esc_html__('Post Info', 'pxlz'),
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'image_size',
                        'heading' => esc_html__('Image Size', 'pxlz'),
                        'value' => array(
                            esc_html__('Original', 'pxlz') => 'full',
                            esc_html__('Square', 'pxlz') => 'pxlz_edgtf_square',
                            esc_html__('Landscape', 'pxlz') => 'pxlz_edgtf_landscape',
                            esc_html__('Portrait', 'pxlz') => 'pxlz_edgtf_portrait',
                            esc_html__('Thumbnail', 'pxlz') => 'thumbnail',
                            esc_html__('Medium', 'pxlz') => 'medium',
                            esc_html__('Large', 'pxlz') => 'large'
                        ),
                        'save_always' => true,
                        'dependency' => array('element' => 'post_info_image', 'value' => array('yes')),
                        'group' => esc_html__('Post Info', 'pxlz')
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'title_tag',
                        'heading' => esc_html__('Title Tag', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_title_tag(true)),
                        'group' => esc_html__('Post Info', 'pxlz')
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'post_info_date',
                        'heading' => esc_html__('Enable Post Info Date', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                        'group' => esc_html__('Post Info', 'pxlz')
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'post_info_category',
                        'heading' => esc_html__('Enable Post Info Category', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                        'group' => esc_html__('Post Info', 'pxlz')
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'post_info_read_more',
                        'heading' => esc_html__('Enable Read More Button', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                        'group' => esc_html__('Post Info', 'pxlz'),
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'pagination_type',
                        'heading' => esc_html__('Pagination Type', 'pxlz'),
                        'value' => array(
                            esc_html__('None', 'pxlz') => 'no-pagination',
                            esc_html__('Standard', 'pxlz') => 'standard-blog-list',
                            esc_html__('Load More', 'pxlz') => 'load-more',
                            esc_html__('Infinite Scroll', 'pxlz') => 'infinite-scroll'
                        ),
                        'group' => esc_html__('Additional Features', 'pxlz')
                    )
                )
            )
        );
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type' => 'standard',
            'number_of_posts' => '-1',
            'number_of_columns' => '3',
            'space_between_items' => 'normal',
            'category' => '',
            'orderby' => 'title',
            'order' => 'ASC',
            'image_size' => 'full',
            'title_tag' => 'h4',
            'excerpt_length' => '40',
            'post_info_image' => 'yes',
            'post_info_date' => 'yes',
            'post_info_category' => 'yes',
            'post_info_read_more' => 'no',
            'pagination_type' => 'no-pagination'
        );
        $params = shortcode_atts($default_atts, $atts);

        $queryarray = $this->generateQueryarray($params);
        $query_result = new \WP_Query($queryarray);
        $params['query_result'] = $query_result;

        $params['holder_data'] = $this->getHolderData($params);
        $params['holder_classes'] = $this->getHolderClasses($params, $default_atts);
        $params['module'] = 'list';

        $params['max_num_pages'] = $query_result->max_num_pages;
        $params['paged'] = isset($query_result->query['paged']) ? $query_result->query['paged'] : 1;

        $params['this_object'] = $this;

        ob_start();

        pxlz_edgtf_get_module_template_part('shortcodes/blog-list/holder', 'blog', $params['type'], $params);

        $html = ob_get_contents();

        ob_end_clean();

        return $html;
    }

    public function getHolderClasses($params, $default_atts) {
        $holderClasses = array();

        $holderClasses[] = !empty($params['type']) ? 'edgtf-bl-' . $params['type'] : 'edgtf-bl-' . $default_atts['type'];
        $holderClasses[] = $this->getColumnNumberClass($params['number_of_columns']);
        $holderClasses[] = !empty($params['space_between_items']) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = !empty($params['pagination_type']) ? 'edgtf-bl-pag-' . $params['pagination_type'] : 'edgtf-bl-pag-' . $default_atts['pagination_type'];

        if ($params['type'] == 'standard' && $params['post_info_image'] == 'yes') {
            $holderClasses[] = 'edgtf-bl-standard-image';
        }

        return implode(' ', $holderClasses);
    }

    public function getColumnNumberClass($params) {
        switch ($params) {
            case 1:
                $classes = 'edgtf-bl-one-column';
                break;
            case 2:
                $classes = 'edgtf-bl-two-columns';
                break;
            case 3:
                $classes = 'edgtf-bl-three-columns';
                break;
            case 4:
                $classes = 'edgtf-bl-four-columns';
                break;
            case 5:
                $classes = 'edgtf-bl-five-columns';
                break;
            default:
                $classes = 'edgtf-bl-three-columns';
                break;
        }

        return $classes;
    }

    public function getHolderData($params) {
        $dataString = '';

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $query_result = $params['query_result'];

        $params['max_num_pages'] = $query_result->max_num_pages;

        if (!empty($paged)) {
            $params['next-page'] = $paged + 1;
        }

        foreach ($params as $key => $value) {
            if ($key !== 'query_result' && $value !== '') {
                $new_key = str_replace('_', '-', $key);

                $dataString .= ' data-' . $new_key . '=' . esc_attr($value);
            }
        }

        return $dataString;
    }

    public function generateQueryarray($params) {
        $queryarray = array(
            'post_status' => 'publish',
            'post_type' => 'post',
            'orderby' => $params['orderby'],
            'order' => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'post__not_in' => get_option('sticky_posts')
        );

        if (!empty($params['category'])) {
            $queryarray['category_name'] = $params['category'];
        }

        if (!empty($params['next_page'])) {
            $queryarray['paged'] = $params['next_page'];
        } else {
            $query_array['paged'] = 1;
        }

        return $queryarray;
    }

    /**
     * Filter blog categories
     *
     * @param $query
     *
     * @return array
     */
    public function blogCategoryAutocompleteSuggester($query) {
        global $wpdb;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['category_title']) > 0) ? esc_html__('Category', 'pxlz') . ': ' . $value['category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;
    }

    /**
     * Find blog category by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function blogCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get portfolio category
            $category = get_term_by('slug', $query, 'category');
            if (is_object($category)) {

                $category_slug = $category->slug;
                $category_title = $category->name;

                $category_title_display = '';
                if (!empty($category_title)) {
                    $category_title_display = esc_html__('Category', 'pxlz') . ': ' . $category_title;
                }

                $data = array();
                $data['value'] = $category_slug;
                $data['label'] = $category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}