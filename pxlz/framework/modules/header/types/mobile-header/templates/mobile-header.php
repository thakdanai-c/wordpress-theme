<?php do_action('pxlz_edgtf_before_mobile_header'); ?>

    <header class="edgtf-mobile-header">
        <?php do_action('pxlz_edgtf_after_mobile_header_html_open'); ?>

        <div class="edgtf-mobile-header-inner">
            <div class="edgtf-mobile-header-holder">
                <div class="edgtf-grid">
                    <div class="edgtf-vertical-align-containers">
                        <div class="edgtf-vertical-align-containers">
                            <?php if ($show_navigation_opener) : ?>
                                <div class="edgtf-mobile-menu-opener">
                                    <a href="javascript:void(0)">
									<span class="edgtf-mobile-menu-icon">
										<?php echo pxlz_edgtf_icon_collections()->renderIcon('icon_menu', 'font_elegant'); ?>
									</span>
                                        <?php if (!empty($mobile_menu_title)) { ?>
                                            <h5 class="edgtf-mobile-menu-text"><?php echo esc_attr($mobile_menu_title); ?></h5>
                                        <?php } ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="edgtf-position-center">
                                <div class="edgtf-position-center-inner">
                                    <?php pxlz_edgtf_get_mobile_logo(); ?>
                                </div>
                            </div>
                            <div class="edgtf-position-right">
                                <div class="edgtf-position-right-inner">
                                    <?php if (is_active_sidebar('edgtf-right-from-mobile-logo')) {
                                        dynamic_sidebar('edgtf-right-from-mobile-logo');
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php pxlz_edgtf_get_mobile_nav(); ?>
        </div>

        <?php do_action('pxlz_edgtf_before_mobile_header_html_close'); ?>
    </header>

<?php do_action('pxlz_edgtf_after_mobile_header'); ?>