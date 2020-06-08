<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <?php pxlz_edgtf_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
    <div class="edgtf-post-content">
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
                <div class="edgtf-post-text-main">
                    <div class="edgtf-post-mark">
                        <span class="icon-basic-link edgtf-link-mark"></span>
                    </div>
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="edgtf-post-info-list">
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>