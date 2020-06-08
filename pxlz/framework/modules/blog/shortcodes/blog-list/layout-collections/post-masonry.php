<li class="edgtf-bl-item edgtf-item-space clearfix">
    <div class="edgtf-bli-inner">
        <div class="edgtf-bli-heading">
            <?php if ($post_info_image == 'yes') {
                pxlz_edgtf_get_module_template_part('templates/parts/media', 'blog', '', $params);
            } ?>
        </div>
        <div class="edgtf-bli-content-wrapper">
            <div class="edgtf-bli-info">
                <?php
                if ($post_info_date == 'yes') {
                    pxlz_edgtf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
                }
                ?>
                <?php
                if ($post_info_category == 'yes') {
                    pxlz_edgtf_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                } ?>
            </div>
            <div class="edgtf-bli-content">
                <?php pxlz_edgtf_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
                <div class="edgtf-bli-excerpt">
                    <?php pxlz_edgtf_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
                </div>
            </div>
            <?php
            if ($post_info_read_more == 'yes') {
                pxlz_edgtf_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params);
            }
            ?>
        </div>
    </div>
</li>