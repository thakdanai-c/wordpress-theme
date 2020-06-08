<?php if ($max_num_pages > 1) { ?>
    <div class="edgtf-blog-pag-loading">
        <div class="edgtf-blog-pag-bounce1"></div>
        <div class="edgtf-blog-pag-bounce2"></div>
        <div class="edgtf-blog-pag-bounce3"></div>
    </div>
    <div class="edgtf-blog-pag-load-more">
        <?php
        if (pxlz_edgtf_core_plugin_installed()) {
            echo pxlz_edgtf_get_button_html(
                apply_filters(
                    'pxlz_edgtf_blog_template_load_more_button',
                    array(
                        'link' => 'javascript: void(0)',
                        'size' => 'small',
                        'text' => esc_html__('Load more', 'pxlz'),
                        'plus_sign' => true,
                    )
                )
            );
        } else { ?>
            <a itemprop="url" href="javascript:void(0)" target="_self" class="edgtf-btn edgtf-btn-small edgtf-btn-solid edgtf-btn-plus-sign">
                <span class="edgtf-btn-text">
                    <?php echo esc_html__('Load more', 'pxlz'); ?>
                </span>
            </a>
        <?php } ?>
    </div>
<?php
	$unique_id = rand( 1000, 9999 );
	wp_nonce_field( 'edgtf_blog_load_more_nonce_' . $unique_id, 'edgtf_blog_load_more_nonce_' . $unique_id );
}