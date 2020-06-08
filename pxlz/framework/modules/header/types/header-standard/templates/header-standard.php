<?php do_action('pxlz_edgtf_before_page_header'); ?>

    <header class="edgtf-page-header">
        <?php do_action('pxlz_edgtf_after_page_header_html_open'); ?>

        <?php if ($show_fixed_wrapper) : ?>
        <div class="edgtf-fixed-wrapper">
            <?php endif; ?>

            <div class="edgtf-menu-area <?php echo esc_attr($menu_area_position_class); ?>">
                <?php do_action('pxlz_edgtf_after_header_menu_area_html_open') ?>

                <?php if ($menu_area_in_grid) : ?>
                <div class="edgtf-grid">
                    <?php endif; ?>

                    <div class="edgtf-vertical-align-containers">
                        <div class="edgtf-position-left">
                            <div class="edgtf-position-left-inner">
                                <?php if (!$hide_logo) {
                                    pxlz_edgtf_get_logo();
                                } ?>
                                <?php if ($menu_area_position === 'left') : ?>
                                    <?php pxlz_edgtf_get_main_menu(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($menu_area_position === 'center') : ?>
                            <div class="edgtf-position-center">
                                <div class="edgtf-position-center-inner">
                                    <?php pxlz_edgtf_get_main_menu(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="edgtf-position-right">
                            <div class="edgtf-position-right-inner">
                                <?php if ($menu_area_position === 'right') : ?>
                                    <?php pxlz_edgtf_get_main_menu(); ?>
                                <?php endif; ?>
                                <?php pxlz_edgtf_get_header_widget_menu_area(); ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($menu_area_in_grid) : ?>
                </div>
            <?php endif; ?>
            </div>

            <?php if ($show_fixed_wrapper) { ?>
        </div>
    <?php } ?>

        <?php if ($show_sticky) {
            pxlz_edgtf_get_sticky_header();
        } ?>

        <?php do_action('pxlz_edgtf_before_page_header_html_close'); ?>
    </header>

<?php do_action('pxlz_edgtf_after_page_header'); ?>