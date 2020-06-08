<?php
$edgtf_blog_type = pxlz_edgtf_get_archive_blog_list_layout();
pxlz_edgtf_include_blog_helper_functions('lists', $edgtf_blog_type);
$edgtf_holder_params = pxlz_edgtf_get_holder_params_blog();

get_header();
pxlz_edgtf_get_title();
do_action('pxlz_edgtf_before_main_content');
?>

    <div class="<?php echo esc_attr($edgtf_holder_params['holder']); ?>">
        <?php do_action('pxlz_edgtf_after_container_open'); ?>

        <div class="<?php echo esc_attr($edgtf_holder_params['inner']); ?>">
            <?php pxlz_edgtf_get_blog($edgtf_blog_type); ?>
        </div>

        <?php do_action('pxlz_edgtf_before_container_close'); ?>
    </div>

<?php do_action('pxlz_edgtf_blog_list_additional_tags'); ?>
<?php get_footer(); ?>