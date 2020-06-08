<?php do_action('pxlz_edgtf_before_page_header'); ?>

    <aside class="edgtf-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
        <div class="edgtf-vertical-menu-area-inner">
            <div class="edgtf-vertical-area-background"></div>
            <?php if (!$hide_logo) {
                pxlz_edgtf_get_logo();
            } ?>
            <?php pxlz_edgtf_get_header_vertical_main_menu(); ?>
            <div class="edgtf-vertical-area-widget-holder">
                <?php pxlz_edgtf_get_header_vertical_widget_areas(); ?>
            </div>
        </div>
    </aside>

<?php do_action('pxlz_edgtf_after_page_header'); ?>