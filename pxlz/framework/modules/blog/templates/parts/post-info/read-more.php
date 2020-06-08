<?php if (!pxlz_edgtf_post_has_read_more() && !post_password_required()) { ?>
    <div class="edgtf-post-read-more-button">
        <?php
        if (pxlz_edgtf_core_plugin_installed()) {
            echo pxlz_edgtf_get_button_html(
                apply_filters(
                    'pxlz_edgtf_blog_template_read_more_button',
                    array(
                        'type' => 'simple',
                        'size' => 'medium',
                        'link' => get_the_permalink(),
                        'text' => esc_html__('Read More', 'pxlz'),
                        'plus_sign' => true,
                        'custom_class' => 'edgtf-blog-list-button'
                    )
                )
            );
        } else { ?>
            <a itemprop="url" href="<?php echo esc_url(get_the_permalink()); ?>" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-simple edgtf-blog-list-button">
                <span class="edgtf-btn-text"><?php echo esc_html__('Read More', 'pxlz'); ?></span>
            </a>
        <?php } ?>
    </div>
<?php } ?>