<?php if (pxlz_edgtf_core_plugin_installed() && pxlz_edgtf_options()->getOptionValue('enable_social_share') === 'yes' && pxlz_edgtf_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <?php if (function_exists('pxlz_edgtf_get_social_share_html')) { ?>
        <div class="edgtf-blog-share">
            <?php echo pxlz_edgtf_get_social_share_html(array('type' => 'list', 'title' => esc_html('Share', 'pxlz'))); ?>
        </div>
    <?php }
} ?>