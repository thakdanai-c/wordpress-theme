<?php
get_header();
pxlz_edgtf_get_title();
get_template_part('slider');
do_action('pxlz_edgtf_before_main_content');

if (have_posts()) : while (have_posts()) : the_post();
    //Get blog single type and load proper helper
    pxlz_edgtf_include_blog_helper_functions('singles', 'standard');

    //Action added for applying module specific filters that couldn't be applied on init
    do_action('pxlz_edgtf_blog_single_loaded');

    //Get classes for holder and holder inner
    $edgtf_holder_params = pxlz_edgtf_get_holder_params_blog();
    ?>

    <div class="<?php echo esc_attr($edgtf_holder_params['holder']); ?>">
        <?php do_action('pxlz_edgtf_after_container_open'); ?>

        <div class="<?php echo esc_attr($edgtf_holder_params['inner']); ?>">
            <?php pxlz_edgtf_get_blog_single('standard'); ?>
        </div>

        <?php do_action('pxlz_edgtf_before_container_close'); ?>
    </div>
<?php endwhile; endif;

get_footer(); ?>