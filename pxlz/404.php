<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * pxlz_edgtf_header_meta hook
     *
     * @see pxlz_edgtf_header_meta() - hooked with 10
     * @see pxlz_edgtf_user_scalable_meta - hooked with 10
     * @see edgtf_core_set_open_graph_meta - hooked with 10
     */
    do_action('pxlz_edgtf_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="//schema.org/WebPage">
<?php
/**
 * pxlz_edgtf_after_body_tag hook
 *
 * @see pxlz_edgtf_get_side_area() - hooked with 10
 * @see pxlz_edgtf_smooth_page_transitions() - hooked with 10
 */
do_action('pxlz_edgtf_after_body_tag'); ?>

<div class="edgtf-wrapper edgtf-404-page">
    <div class="edgtf-wrapper-inner">
        <?php
        /**
         * pxlz_edgtf_after_wrapper_inner hook
         *
         * @see pxlz_edgtf_get_header() - hooked with 10
         * @see pxlz_edgtf_get_mobile_header() - hooked with 20
         * @see pxlz_edgtf_back_to_top_button() - hooked with 30
         * @see pxlz_edgtf_get_header_minimal_full_screen_menu() - hooked with 40
         * @see pxlz_edgtf_get_header_bottom_navigation() - hooked with 40
         */
        do_action('pxlz_edgtf_after_wrapper_inner');

        do_action('pxlz_edgtf_before_main_content'); ?>

        <div class="edgtf-content" <?php pxlz_edgtf_content_elem_style_attr(); ?>>
            <div class="edgtf-content-inner">
                <div class="edgtf-page-not-found">
                    <?php
                    $edgtf_title_image_404 = pxlz_edgtf_options()->getOptionValue('404_page_title_image');
                    $edgtf_title_404 = pxlz_edgtf_options()->getOptionValue('404_title');
                    $edgtf_subtitle_404 = pxlz_edgtf_options()->getOptionValue('404_subtitle');
                    $edgtf_text_404 = pxlz_edgtf_options()->getOptionValue('404_text');
                    $edgtf_button_label = pxlz_edgtf_options()->getOptionValue('404_back_to_home');
                    $edgtf_button_style = pxlz_edgtf_options()->getOptionValue('404_button_style');
                    ?>

                    <h1 class="edgtf-404-title">
                        <?php if (!empty($edgtf_title_404)) {
                            echo esc_html($edgtf_title_404);
                        } else {
                            esc_html_e('404', 'pxlz');
                        } ?>
                    </h1>

                    <h2 class="edgtf-404-subtitle">
                        <?php if (!empty($edgtf_subtitle_404)) {
                            echo esc_html($edgtf_subtitle_404);
                        } else {
                            esc_html_e('Page can not be found.', 'pxlz');
                        } ?>
                    </h2>

                    <p class="edgtf-404-text">
                        <?php if (!empty($edgtf_text_404)) {
                            echo esc_html($edgtf_text_404);
                        } else {
                            esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'pxlz');
                        } ?>
                    </p>

                    <?php
                    $edgtf_params = array();
                    $edgtf_params['text'] = !empty($edgtf_button_label) ? $edgtf_button_label : esc_html__('Back to homepage', 'pxlz');
                    $edgtf_params['link'] = esc_url(home_url('/'));
                    $edgtf_params['target'] = '_self';
                    $edgtf_params['size'] = 'large';
                    $edgtf_params['plus_sign'] = true;
                    if (pxlz_edgtf_core_plugin_installed()) {
                        echo pxlz_edgtf_execute_shortcode('edgtf_button', $edgtf_params);
                    } else {
                        echo '<a itemprop="url" href="' . $edgtf_params['link'] . '" target="_self" class="edgtf-btn edgtf-btn-large edgtf-btn-solid edgtf-btn-plus-sign">';
                        echo '<span class="edgtf-btn-text">' . $edgtf_params['text'] . '</span>';
                        echo '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>