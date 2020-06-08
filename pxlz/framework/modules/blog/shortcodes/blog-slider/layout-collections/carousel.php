<li class="edgtf-bl-item">
    <div class="edgtf-bli-inner">
        <div class="edgtf-bli-heading">
            <?php if ($post_info_image == 'yes') {
                pxlz_edgtf_get_module_template_part('templates/parts/media', 'blog', '', $params);
                if ($post_info_category == 'yes') {
                    pxlz_edgtf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                }
            } ?>
        </div>
        <div class="edgtf-bli-content">
            <?php pxlz_edgtf_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
            <div class="edgtf-bli-excerpt">
                <?php pxlz_edgtf_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
            </div>
        </div>
        <div class="edgtf-bli-info">
            <?php
            if ($post_info_date == 'yes') {
                pxlz_edgtf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
            }
            ?>

            <?php if ($post_info_image == 'no') {
                if ($post_info_category == 'yes') {
                    pxlz_edgtf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                }
            } ?>
        </div>
    </div>
</li>