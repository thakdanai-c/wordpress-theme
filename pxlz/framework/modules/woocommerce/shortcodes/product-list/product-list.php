<?php

namespace EdgeCore\CPT\Shortcodes\ProductList;

use EdgeCore\Lib;

class ProductList implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'edgtf_product_list';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Edge Product List', 'pxlz'),
                    'base' => $this->base,
                    'icon' => 'icon-wpb-product-list extended-custom-icon',
                    'category' => esc_html__('by EDGE', 'pxlz'),
                    'allowed_container_element' => 'vc_row',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'type',
                            'heading' => esc_html__('Type', 'pxlz'),
                            'value' => array(
                                esc_html__('Standard', 'pxlz') => 'standard',
                                esc_html__('Masonry', 'pxlz') => 'masonry'
                            ),
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'info_position',
                            'heading' => esc_html__('Product Info Position', 'pxlz'),
                            'value' => array(
                                esc_html__('Info On Image Hover', 'pxlz') => 'info-on-image',
                                esc_html__('Info Below Image', 'pxlz') => 'info-below-image'
                            ),
                            'save_always' => true,
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'standard',
                            ),
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'number_of_posts',
                            'heading' => esc_html__('Number of Products', 'pxlz')
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
                                esc_html__('Five', 'pxlz') => '5',
                                esc_html__('Six', 'pxlz') => '6'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'space_between_items',
                            'heading' => esc_html__('Space Between Items', 'pxlz'),
                            'value' => array_flip(pxlz_edgtf_get_space_between_items_array()),
                            'save_always' => true
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
                            'param_name' => 'image_size',
                            'heading' => esc_html__('Image Proportions', 'pxlz'),
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
                            'save_always' => true,
                            'dependency' => array(
                                'element' => 'type',
                                'value' => 'standard',
                            ),
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
                            'param_name' => 'product_info_skin',
                            'heading' => esc_html__('Product Info Skin', 'pxlz'),
                            'value' => array(
                                esc_html__('Default', 'pxlz') => 'default',
                                esc_html__('Light', 'pxlz') => 'light',
                                esc_html__('Dark', 'pxlz') => 'dark'
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-on-image')),
                            'group' => esc_html__('Product Info Style', 'pxlz')
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
                            'value' => array_flip(pxlz_edgtf_get_yes_no_select_array(false, false)),
                            'group' => esc_html__('Product Info', 'pxlz'),
                            'save_always' => true,
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
                            'group' => esc_html__('Product Info Style', 'pxlz'),
                            'save_always' => true,
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
                        array(
                            'type' => 'textfield',
                            'param_name' => 'info_bottom_margin',
                            'heading' => esc_html__('Product Info Bottom Margin (px)', 'pxlz'),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-below-image')),
                            'group' => esc_html__('Product Info Style', 'pxlz')
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type' => 'standard',
            'info_position' => 'info-on-image',
            'number_of_posts' => '8',
            'number_of_columns' => '4',
            'space_between_items' => 'normal',
            'orderby' => 'date',
            'order' => 'ASC',
            'taxonomy_to_display' => 'category',
            'taxonomy_values' => '',
            'image_size' => 'full',
            'display_title' => 'yes',
            'product_info_skin' => '',
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
            'info_bottom_margin' => ''
        );
        $params = shortcode_atts($default_atts, $atts);

        $params['class_name'] = 'pli';
        $params['type'] = !empty($params['type']) ? $params['type'] : $default_atts['type'];
        $params['info_position'] = !empty($params['info_position']) ? $params['info_position'] : $default_atts['info_position'];
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];

        $additional_params = array();
        $additional_params['holder_classes'] = $this->getHolderClasses($params, $default_atts);

        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $additional_params['query_result'] = $query_result;

        $params['this_object'] = $this;

        $html = pxlz_edgtf_get_woo_shortcode_module_template_part('templates/product-list', 'product-list', $params['type'], $params, $additional_params);

        return $html;
    }

    private function getHolderClasses($params, $default_atts) {
        $holderClasses = array();
        $holderClasses[] = !empty($params['type']) ? 'edgtf-' . $params['type'] . '-layout' : 'edgtf-' . $default_atts['type'] . '-layout';
        $holderClasses[] = !empty($params['space_between_items']) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = $this->getColumnNumberClass($params);
        $holderClasses[] = !empty($params['info_position']) ? 'edgtf-' . $params['info_position'] : 'edgtf-' . $default_atts['info_position'];
        $holderClasses[] = !empty($params['product_info_skin']) ? 'edgtf-product-info-' . $params['product_info_skin'] : '';

        return implode(' ', $holderClasses);
    }

    private function getColumnNumberClass($params) {
        $columnsNumber = '';
        $columns = $params['number_of_columns'];

        switch ($columns) {
            case 1:
                $columnsNumber = 'edgtf-one-column';
                break;
            case 2:
                $columnsNumber = 'edgtf-two-columns';
                break;
            case 3:
                $columnsNumber = 'edgtf-three-columns';
                break;
            case 4:
                $columnsNumber = 'edgtf-four-columns';
                break;
            case 5:
                $columnsNumber = 'edgtf-five-columns';
                break;
            case 6:
                $columnsNumber = 'edgtf-six-columns';
                break;
            default:
                $columnsNumber = 'edgtf-four-columns';
                break;
        }

        return $columnsNumber;
    }

    private function generateProductQueryArray($params) {
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

    public function getItemClasses($params) {
        $itemClasses = array();

        $image_size_meta = get_post_meta(get_the_ID(), 'edgtf_product_featured_image_size', true);
        if (!empty($image_size_meta)) {
            $itemClasses[] = $image_size_meta;
        }

        return implode(' ', $itemClasses);
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

        if ($params['info_bottom_margin'] !== '') {
            $styles[] = 'margin-bottom: ' . pxlz_edgtf_filter_px($params['info_bottom_margin']) . 'px';
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