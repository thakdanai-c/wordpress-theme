<?php

namespace EdgeCore\CPT\Shortcodes\ProductListCarousel;

use EdgeCore\Lib;

class ProductListCarousel implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'edgtf_product_list_carousel';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Edge Product List - Carousel', 'pxlz'),
                    'base' => $this->base,
                    'icon' => 'icon-wpb-product-list-carousel extended-custom-icon',
                    'category' => esc_html__('by EDGE', 'pxlz'),
                    'allowed_container_element' => 'vc_row',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'type',
                            'heading' => esc_html__('Type', 'pxlz'),
                            'value' => array(
                                esc_html__('Standard', 'pxlz') => 'standard',
                                esc_html__('Simple', 'pxlz') => 'simple'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'number_of_posts',
                            'heading' => esc_html__('Number of Products', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'space_between_items',
                            'heading' => esc_html__('Space Between Items', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_space_between_items_array()),
                            'save_always' => true,
                            'dependency' => array('element' => 'type', 'value' => array('standard'))
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
                            'type' => 'dropdown',
                            'param_name' => 'taxonomy_to_display',
                            'heading' => esc_html__('Choose Sorting Taxonomy', 'pxlz'),
                            'value' => array(
                                esc_html__('Category', 'pxlz') => 'category',
                                esc_html__('Tag', 'pxlz') => 'tag',
                                esc_html__('Id', 'pxlz') => 'id'
                            ),
                            'save_always' => true,
                            'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'pxlz')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'taxonomy_values',
                            'heading' => esc_html__('Enter Taxonomy Values', 'pxlz'),
                            'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Image Proportions', 'pxlz'),
                            'param_name' => 'image_size',
                            'value' => array(
                                esc_html__('Default', 'pxlz') => '',
                                esc_html__('Original', 'pxlz') => 'full',
                                esc_html__('Square', 'pxlz') => 'square',
                                esc_html__('Landscape', 'pxlz') => 'landscape',
                                esc_html__('Portrait', 'pxlz') => 'portrait',
                                esc_html__('Medium', 'pxlz') => 'medium',
                                esc_html__('Large', 'pxlz') => 'large',
                                esc_html__('Shop Catalog', 'pxlz') => 'shop_catalog',
                                esc_html__('Shop Single', 'pxlz') => 'shop_single',
                                esc_html__('Shop Thumbnail', 'pxlz') => 'shop_thumbnail'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'number_of_visible_items',
                            'heading' => esc_html__('Number Of Visible Items', 'pxlz'),
                            'value' => array(
                                esc_html__('One', 'pxlz') => '1',
                                esc_html__('Two', 'pxlz') => '2',
                                esc_html__('Three', 'pxlz') => '3',
                                esc_html__('Four', 'pxlz') => '4',
                                esc_html__('Five', 'pxlz') => '5',
                                esc_html__('Six', 'pxlz') => '6'
                            ),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_loop',
                            'heading' => esc_html__('Enable Slider Loop', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_autoplay',
                            'heading' => esc_html__('Enable Slider Autoplay', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'slider_speed',
                            'heading' => esc_html__('Slide Duration', 'pxlz'),
                            'description' => esc_html__('Default value is 5000 (ms)', 'pxlz'),
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'slider_speed_animation',
                            'heading' => esc_html__('Slide Animation Duration', 'pxlz'),
                            'description' => esc_html__('Speed of slide animation in milliseconds. Default value is 600.', 'pxlz'),
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_navigation',
                            'heading' => esc_html__('Enable Slider Navigation Arrows', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_navigation_skin',
                            'heading' => esc_html__('Slider Navigation Skin', 'pxlz'),
                            'value' => array(
                                esc_html__('Default', 'pxlz') => 'default',
                                esc_html__('Light', 'pxlz') => 'light'
                            ),
                            'dependency' => array('element' => 'slider_navigation', 'value' => array('yes')),
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_pagination',
                            'heading' => esc_html__('Enable Slider Pagination', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_pagination_skin',
                            'heading' => esc_html__('Slider Pagination Skin', 'pxlz'),
                            'value' => array(
                                esc_html__('Default', 'pxlz') => 'default',
                                esc_html__('Light', 'pxlz') => 'light'
                            ),
                            'dependency' => array('element' => 'slider_pagination', 'value' => array('yes')),
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_pagination_pos',
                            'heading' => esc_html__('Slider Pagination Position', 'pxlz'),
                            'value' => array(
                                esc_html__('Below Carousel', 'pxlz') => 'bellow-slider',
                                esc_html__('Inside Carousel', 'pxlz') => 'inside-slider'
                            ),
                            'dependency' => array('element' => 'slider_pagination', 'value' => array('yes')),
                            'group' => esc_html__('Slider Settings', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_title',
                            'heading' => esc_html__('Display Title', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'group' => esc_html__('Product Info', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'title_tag',
                            'heading' => esc_html__('Title Tag', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_title_tag(true)),
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group' => esc_html__('Product Info Style', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_category',
                            'heading' => esc_html__('Display Category', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false)),
                            'group' => esc_html__('Product Info', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_excerpt',
                            'heading' => esc_html__('Display Excerpt', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false)),
                            'group' => esc_html__('Product Info', 'pxlz')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'excerpt_length',
                            'heading' => esc_html__('Excerpt Length', 'pxlz'),
                            'description' => esc_html__('Number of characters', 'pxlz'),
                            'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                            'group' => esc_html__('Product Info Style', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_rating',
                            'heading' => esc_html__('Display Rating', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'group' => esc_html__('Product Info', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_price',
                            'heading' => esc_html__('Display Price', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'group' => esc_html__('Product Info', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'display_button',
                            'heading' => esc_html__('Display Button', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, true)),
                            'group' => esc_html__('Product Info', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'button_skin',
                            'heading' => esc_html__('Button Skin', 'pxlz'),
                            'value' => array(
                                esc_html__('Default', 'pxlz') => 'default',
                                esc_html__('Light', 'pxlz') => 'light',
                                esc_html__('Dark', 'pxlz') => 'dark',
                                esc_html__('Custom', 'pxlz') => 'custom',
                            ),
                            'dependency' => array('element' => 'display_button', 'value' => array('yes')),
                            'group' => esc_html__('Product Info Style', 'pxlz')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'param_name' => 'button_color',
                            'heading' => esc_html__('Button Color', 'pxlz'),
                            'group' => esc_html__('Product Info Style', 'pxlz'),
                            'dependency' => array(
                                'element' => 'button_skin',
                                'value' => 'custom',
                            ),
                        ),
                        array(
                            'type' => 'colorpicker',
                            'param_name' => 'button_background_color',
                            'heading' => esc_html__('Button Background Color', 'pxlz'),
                            'group' => esc_html__('Product Info Style', 'pxlz'),
                            'dependency' => array(
                                'element' => 'button_skin',
                                'value' => 'custom',
                            ),
                        ),
                        array(
                            'type' => 'colorpicker',
                            'param_name' => 'shader_background_color',
                            'heading' => esc_html__('Shader Background Color', 'pxlz'),
                            'group' => esc_html__('Product Info Style', 'pxlz')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'info_bottom_text_align',
                            'heading' => esc_html__('Product Info Text Alignment', 'pxlz'),
                            'value' => array(
                                esc_html__('Default', 'pxlz') => '',
                                esc_html__('Left', 'pxlz') => 'left',
                                esc_html__('Center', 'pxlz') => 'center',
                                esc_html__('Right', 'pxlz') => 'right'
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-below-image')),
                            'group' => esc_html__('Product Info Style', 'pxlz')
                        ),
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type' => 'standard',
            'number_of_posts' => '8',
            'space_between_items' => 'normal',
            'orderby' => 'date',
            'order' => 'ASC',
            'taxonomy_to_display' => 'category',
            'taxonomy_values' => '',
            'image_size' => 'full',
            'number_of_visible_items' => '1',
            'slider_loop' => 'yes',
            'slider_autoplay' => 'yes',
            'slider_speed' => '5000',
            'slider_speed_animation' => '600',
            'slider_navigation' => 'yes',
            'slider_navigation_skin' => 'default',
            'slider_pagination' => 'yes',
            'slider_pagination_skin' => 'default',
            'slider_pagination_pos' => 'bellow-slider',
            'display_title' => 'yes',
            'title_tag' => 'h4',
            'display_category' => 'no',
            'display_excerpt' => 'no',
            'excerpt_length' => '20',
            'display_rating' => 'yes',
            'display_price' => 'yes',
            'display_button' => 'yes',
            'button_skin' => 'default',
            'button_color' => '',
            'button_background_color' => '',
            'shader_background_color' => '',
            'info_bottom_text_align' => '',
        );
        $params = shortcode_atts($default_atts, $atts);

        $params['class_name'] = 'plc';
        $params['type'] = !empty($params['type']) ? $params['type'] : $default_atts['type'];
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];

        $additional_params = array();
        $additional_params['holder_classes'] = $this->getHolderClasses($params, $default_atts);
        $additional_params['holder_data'] = $this->getProductListCarouselDataAttributes($params);

        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $additional_params['query_result'] = $query_result;

        $params['this_object'] = $this;

        $html = pxlz_edgtf_get_woo_shortcode_module_template_part('templates/product-list', 'product-list-carousel', $params['type'], $params, $additional_params);

        return $html;
    }

    private function getHolderClasses($params, $default_atts) {
        $holderClasses = array();
        $holderClasses[] = !empty($params['type']) ? 'edgtf-' . $params['type'] . '-layout' : 'edgtf-' . $default_atts['type'] . '-layout';
        $holderClasses[] = !empty($params['space_between_items']) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = $this->getCarouselClasses($params, $default_atts);

        return implode(' ', $holderClasses);
    }

    private function getCarouselClasses($params) {
        $carouselClasses = array();
        $carouselClasses[] = !empty($params['slider_navigation_skin']) ? 'edgtf-plc-nav-' . $params['slider_navigation_skin'] . '-skin' : '';
        $carouselClasses[] = !empty($params['slider_pagination_pos']) ? 'edgtf-plc-pag-' . $params['slider_pagination_pos'] : '';
        $carouselClasses[] = !empty($params['slider_pagination_skin']) ? 'edgtf-plc-pag-' . $params['slider_pagination_skin'] . '-skin' : '';

        return implode(' ', $carouselClasses);
    }

    private function getProductListCarouselDataAttributes($params) {
        $slider_data = array();

        $slider_data['data-number-of-items'] = !empty($params['number_of_visible_items']) && $params['type'] !== 'simple' ? $params['number_of_visible_items'] : '1';
        $slider_data['data-enable-loop'] = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
        $slider_data['data-enable-autoplay'] = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
        $slider_data['data-slider-speed'] = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
        $slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
        $slider_data['data-enable-navigation'] = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
        $slider_data['data-enable-pagination'] = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';

        return $slider_data;
    }

    public function generateProductQueryArray($params) {
        $queryArray = array(
            'post_status' => 'publish',
            'post_type' => 'product',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => $params['number_of_posts'],
            'orderby' => $params['orderby'],
            'order' => $params['order']
        );

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
    }

    public function getShaderStyles($params) {
        $styles = array();

        if (!empty($params['shader_background_color'])) {
            $styles[] = 'background-color: ' . $params['shader_background_color'];
        }

        return implode(';', $styles);
    }

    public function getTextWrapperStyles($params) {
        $styles = array();

        if (!empty($params['info_bottom_text_align'])) {
            $styles[] = 'text-align: ' . $params['info_bottom_text_align'];
        }

        return implode(';', $styles);
    }

    public function getButtonStyles($params) {
        $styles = array();

        if (!empty($params['button_color'])) {
            $styles[] = 'color: ' . $params['button_color'];
        }

        if ($params['button_background_color'] !== '') {
            $styles[] = 'background-color: ' . $params['button_background_color'];
        }

        return implode(';', $styles);
    }
}