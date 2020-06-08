<?php
$edgtf_search_holder_params = pxlz_edgtf_get_holder_params_search();
?>
<?php get_header(); ?>
<?php pxlz_edgtf_get_title(); ?>
<?php do_action('pxlz_edgtf_before_main_content'); ?>
    <div class="<?php echo esc_attr($edgtf_search_holder_params['holder']); ?>">
        <?php do_action('pxlz_edgtf_after_container_open'); ?>
        <div class="<?php echo esc_attr($edgtf_search_holder_params['inner']); ?>">
            <?php pxlz_edgtf_get_search_page(); ?>
        </div>
        <?php do_action('pxlz_edgtf_before_container_close'); ?>
    </div>
<?php get_footer(); ?>