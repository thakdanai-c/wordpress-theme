<?php

class PxlzEdgefSocialIconWidget extends PxlzEdgefWidget
{
    public function __construct() {
        parent::__construct(
            'edgtf_social_icon_widget',
            esc_html__('Edge Social Icon Widget', 'pxlz'),
            array('description' => esc_html__('Add social network icons to widget areas', 'pxlz'))
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array_merge(
            pxlz_edgtf_icon_collections()->getSocialIconWidgetParamsArray(),
            array(
                array(
                    'type' => 'textfield',
                    'name' => 'link',
                    'title' => esc_html__('Link', 'pxlz')
                ),
                array(
                    'type' => 'dropdown',
                    'name' => 'target',
                    'title' => esc_html__('Target', 'pxlz'),
                    'options' => pxlz_edgtf_get_link_target_array()
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'icon_size',
                    'title' => esc_html__('Icon Size (px)', 'pxlz')
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'color',
                    'title' => esc_html__('Color', 'pxlz')
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'hover_color',
                    'title' => esc_html__('Hover Color', 'pxlz')
                ),
                array(
                    'type' => 'textfield',
                    'name' => 'margin',
                    'title' => esc_html__('Margin', 'pxlz'),
                    'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pxlz')
                )
            )
        );
    }

    public function widget($args, $instance) {
        $icon_styles = array();

        if (!empty($instance['color'])) {
            $icon_styles[] = 'color: ' . $instance['color'] . ';';
        }

        if (!empty($instance['icon_size'])) {
            $icon_styles[] = 'font-size: ' . pxlz_edgtf_filter_px($instance['icon_size']) . 'px';
        }

        if (!empty($instance['margin'])) {
            $icon_styles[] = 'margin: ' . $instance['margin'] . ';';
        }

        $link = !empty($instance['link']) ? $instance['link'] : '#';
        $target = !empty($instance['target']) ? $instance['target'] : '_self';
        $hover_color = !empty($instance['hover_color']) ? $instance['hover_color'] : '';

        $icon_holder_html = '';
        if (!empty($instance['icon_pack'])) {
            $icon_class = array('edgtf-social-icon-widget');
            $icon_class[] = !empty($instance['fa_icon']) && $instance['icon_pack'] === 'font_awesome' ? 'fa ' . $instance['fa_icon'] : '';
            $icon_class[] = !empty($instance['fe_icon']) && $instance['icon_pack'] === 'font_elegant' ? $instance['fe_icon'] : '';
            $icon_class[] = !empty($instance['ion_icon']) && $instance['icon_pack'] === 'ion_icons' ? $instance['ion_icon'] : '';
            $icon_class[] = !empty($instance['linea_icon']) && $instance['icon_pack'] === 'linea_icons' ? $instance['linea_icon'] : '';
            $icon_class[] = !empty($instance['linear_icon']) && $instance['icon_pack'] === 'linear_icons' ? 'lnr ' . $instance['linear_icon'] : '';
            $icon_class[] = !empty($instance['simple_line_icon']) && $instance['icon_pack'] === 'simple_line_icons' ? $instance['simple_line_icon'] : '';

            $icon_class = implode(' ', $icon_class);

            $icon_holder_html = '<span class="' . $icon_class . '"></span>';
        }
        ?>

        <a class="edgtf-social-icon-widget-holder edgtf-icon-has-hover" <?php echo pxlz_edgtf_get_inline_attr($hover_color, 'data-hover-color'); ?> <?php pxlz_edgtf_inline_style($icon_styles) ?> href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
            <?php echo wp_kses_post($icon_holder_html); ?>
        </a>
        <?php
    }
}