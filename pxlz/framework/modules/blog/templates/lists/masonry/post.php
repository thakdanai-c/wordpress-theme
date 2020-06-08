<?php $post_classes[] = 'edgtf-item-space'; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edgtf-post-heading">
        <?php pxlz_edgtf_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
    </div>
    <div class="edgtf-post-content">
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
                <div class="edgtf-post-text-main">
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('pxlz_edgtf_single_link_pages'); ?>
                </div>
            </div>
        </div>
        <div class="edgtf-post-info-list">
            <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
            <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>