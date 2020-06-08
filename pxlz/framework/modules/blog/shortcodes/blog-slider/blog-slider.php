<?php
namespace EdgeCore\CPT\Shortcodes\BlogSlider;

use EdgeCore\Lib;

class BlogSlider implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'edgtf_blog_slider';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Category filter
        add_filter('vc_autocomplete_edgtf_blog_slider_category_callback', array(&$this, 'blogListCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Category render
        add_filter('vc_autocomplete_edgtf_blog_slider_category_render', array(&$this, 'blogListCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(
            array(
                'name' => esc_html__('Edge Blog Slider', 'pxlz'),
                'base' => $this->base,
                'icon' => 'icon-wpb-blog-slider extended-custom-icon',
                'category' => esc_html__('by EDGE', 'pxlz'),
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'number_of_posts',
                        'heading' => esc_html__('Number of Posts', 'pxlz')
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
                        'type' => 'dropdown',
                        'param_name' => 'post_info_image',
                        'heading' => esc_html__('Enable Post Info Image', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
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
                        'dependency' => Array('element' => 'post_info_image', 'value' => array('yes')),
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
                        'type' => 'textfield',
                        'param_name' => 'excerpt_length',
                        'heading' => esc_html__('Text Length', 'pxlz'),
                        'description' => esc_html__('Number of characters', 'pxlz'),
                        'dependency' => Array('element' => 'type', 'value' => array('standard', 'masonry', 'simple')),
                        'group' => esc_html__('Post Info', 'pxlz')
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'post_info_date',
                        'heading' => esc_html__('Enable Post Info Date', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                        'save_always' => true,
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
                        'param_name' => 'post_info_category',
                        'heading' => esc_html__('Enable Post Info Category', 'pxlz'),
                        'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                        'save_always' => true,
                        'group' => esc_html__('Post Info', 'pxlz')
                    ),

                )
            )
        );
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'slider_type' => 'carousel',
            'number_of_posts' => '-1',
            'orderby' => 'title',
            'order' => 'ASC',
            'category' => '',
            'image_size' => 'full',
            'title_tag' => 'h4',
            'excerpt_length' => '10',
            'post_info_date' => '',
            'post_info_category' => '',
            'post_info_image' => '',
            'post_info_read_more' => 'no',
        );
        $params = shortcode_atts($default_atts, $atts);

        $queryArray = $this->generateBlogQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $params['slider_type'] = !empty($params['slider_type']) ? $params['slider_type'] : $default_atts['slider_type'];
        $params['slider_classes'] = $this->getSliderClasses($params);
        $params['slider_data'] = $this->getSliderData();

        ob_start();

        pxlz_edgtf_get_module_template_part('shortcodes/blog-slider/holder', 'blog', '', $params);

        $html = ob_get_contents();

        ob_end_clean();

        return $html;
    }

    public function generateBlogQueryArray($params) {
        $queryArray = array(
            'post_status' => 'publish',
            'post_type' => 'post',
            'orderby' => $params['orderby'],
            'order' => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'post__not_in' => get_option('sticky_posts')
        );

        if (!empty($params['category'])) {
            $queryArray['category_name'] = $params['category'];
        }

        return $queryArray;
    }

    public function getSliderClasses($params) {
        $holderClasses = array();

        $holderClasses[] = 'edgtf-bs-' . $params['slider_type'];

        if ($params['post_info_image'] == 'yes') {
            $holderClasses[] = 'edgtf-bs-standard-image';
        }

        return implode(' ', $holderClasses);
    }

    private function getSliderData() {
        $slider_data = array();

        $slider_data['data-number-of-items'] = '2';
        $slider_data['data-slider-margin'] = '80';
        $slider_data['data-slider-padding'] = 'no';
        $slider_data['data-enable-navigation'] = 'no';

        return $slider_data;
    }

    /**
     * Filter categories
     *
     * @param $query
     *
     * @return array
     */
    public function blogListCategoryAutocompleteSuggester($query) {
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
     * Find categories by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function blogListCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get category
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
