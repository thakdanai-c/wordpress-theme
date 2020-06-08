<aside class="edgtf-sidebar">
    <?php
    $edgtf_sidebar = pxlz_edgtf_get_sidebar();

    if (is_active_sidebar($edgtf_sidebar)) {
        dynamic_sidebar($edgtf_sidebar);
    }
    ?>
</aside>