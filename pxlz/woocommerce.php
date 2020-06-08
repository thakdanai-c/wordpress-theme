<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$edgtf_sidebar_layout = pxlz_edgtf_sidebar_layout();

get_header();
pxlz_edgtf_get_title();
get_template_part('slider');
do_action('pxlz_edgtf_before_main_content');

//Woocommerce content
if (!is_singular('product')) { ?>
    <div class="edgtf-container">
        <div class="edgtf-container-inner clearfix">
            <div class="edgtf-grid-row">
                <div <?php echo pxlz_edgtf_get_content_sidebar_class(); ?>>
                    <?php pxlz_edgtf_woocommerce_content(); ?>
                </div>
                <?php if ($edgtf_sidebar_layout !== 'no-sidebar') { ?>
                    <div <?php echo pxlz_edgtf_get_sidebar_holder_class(); ?>>
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="edgtf-container">
        <div class="edgtf-container-inner clearfix">
            <?php pxlz_edgtf_woocommerce_content(); ?>
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?>