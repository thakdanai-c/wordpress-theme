<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-heading">
            <?php pxlz_edgtf_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
                <div class="edgtf-post-text-main">
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php the_content(); ?>
                    <?php do_action('pxlz_edgtf_single_link_pages'); ?>
                </div>
                <div class="edgtf-post-info-single clearfix">
                    <div class="edgtf-post-info-single-left">
                        <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    </div>
                    <div class="edgtf-post-info-single-right">
                        <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>