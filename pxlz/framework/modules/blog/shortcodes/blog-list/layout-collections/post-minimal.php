<li class="edgtf-bl-item edgtf-item-space clearfix">
    <div class="edgtf-bli-inner">
        <div class="edgtf-bli-content">
            <?php pxlz_edgtf_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
            <?php
            if ($post_info_date == 'yes') {
                pxlz_edgtf_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
            } ?>
        </div>
        <?php
        if ($post_info_read_more == 'yes') {
            pxlz_edgtf_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params);
        }
        ?>
    </div>
</li>