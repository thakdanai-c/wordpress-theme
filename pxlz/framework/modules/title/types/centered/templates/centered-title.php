<?php do_action('pxlz_edgtf_before_page_title'); ?>

<div class="edgtf-title-holder <?php echo esc_attr($holder_classes); ?>" <?php pxlz_edgtf_inline_style($holder_styles); ?> <?php echo pxlz_edgtf_get_inline_attrs($holder_data); ?>>
    <?php if (!empty($title_image)) { ?>
        <div class="edgtf-title-image">
            <img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>"/>
        </div>
    <?php } ?>
    <div class="edgtf-title-wrapper" <?php pxlz_edgtf_inline_style($wrapper_styles); ?>>
        <div class="edgtf-title-inner">
            <div class="edgtf-grid">
                <?php if (!empty($title)) { ?>
                <<?php echo esc_attr($title_tag); ?> class="edgtf-page-title entry-title" <?php pxlz_edgtf_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            <?php } ?>
            <?php if (!empty($subtitle)){ ?>
            <<?php echo esc_attr($subtitle_tag); ?> class="edgtf-page-subtitle" <?php pxlz_edgtf_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?>
        </<?php echo esc_attr($subtitle_tag); ?>>
        <?php } ?>
    </div>
</div>
</div>
</div>

<?php do_action('pxlz_edgtf_after_page_title'); ?>
