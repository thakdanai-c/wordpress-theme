<form action="<?php echo esc_url(home_url('/')); ?>" class="edgtf-search-page-form" method="get">
    <h3 class="edgtf-search-title"><?php esc_html_e('New search:', 'pxlz'); ?></h3>
    <div class="edgtf-form-holder">
        <div class="edgtf-column-left">
            <input type="text" name="s" class="edgtf-search-field" autocomplete="off" value="" placeholder="<?php esc_attr_e('Type here', 'pxlz'); ?>"/>
        </div>
        <div class="edgtf-column-right">
            <button type="submit" class="edgtf-search-submit"><span class="fa fa-search"></span></button>
        </div>
    </div>
    <div class="edgtf-search-label">
        <?php esc_html_e('If you are not happy with the results below please do another search', 'pxlz'); ?>
    </div>
</form>