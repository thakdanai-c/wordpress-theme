<?php
do_action('pxlz_edgtf_before_slider_action');

$edgtf_slider_shortcode = get_post_meta(pxlz_edgtf_get_page_id(), 'edgtf_page_slider_meta', true);

if (!empty($edgtf_slider_shortcode)) { ?>
    <div class="edgtf-slider">
        <div class="edgtf-slider-inner">
            <?php echo do_shortcode(wp_kses_post($edgtf_slider_shortcode)); // XSS OK ?>
        </div>
    </div>
<?php }

do_action('pxlz_edgtf_after_slider_action');
?>