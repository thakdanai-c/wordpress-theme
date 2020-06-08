<?php
$blog_single_navigation = pxlz_edgtf_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = pxlz_edgtf_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if ($blog_single_navigation) { ?>
    <div class="edgtf-blog-single-navigation">
        <div class="edgtf-blog-single-navigation-inner clearfix">
            <?php
            /* Single navigation section - SETTING PARAMS */
            $post_navigation = array(
                'prev' => array(
                    'label' => '<span class="edgtf-blog-single-nav-label">' . esc_html__('Previous post', 'pxlz') . '</span>',
                    'background_label' => '<span class="edgtf-blog-single-nav-background-label">' . esc_html__('Prev', 'pxlz') . '</span>'
                ),
                'next' => array(
                    'label' => '<span class="edgtf-blog-single-nav-label">' . esc_html__('Next post', 'pxlz') . '</span>',
                    'background_label' => '<span class="edgtf-blog-single-nav-background-label">' . esc_html__('Next', 'pxlz') . '</span>'
                )
            );

            if ($blog_navigation_through_same_category) {
                if (get_previous_post(true) !== "") {
                    $post_navigation['prev']['post'] = get_previous_post(true);
                }
                if (get_next_post(true) !== "") {
                    $post_navigation['next']['post'] = get_next_post(true);
                }
            } else {
                if (get_previous_post() !== "") {
                    $post_navigation['prev']['post'] = get_previous_post();
                }
                if (get_next_post() !== "") {
                    $post_navigation['next']['post'] = get_next_post();
                }
            }

            /* Single navigation section - RENDERING */
            foreach (array('prev', 'next') as $nav_type) {
                if (isset($post_navigation[$nav_type]['post'])) { ?>
                    <a itemprop="url" class="edgtf-blog-single-<?php echo esc_attr($nav_type); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
                        <?php echo wp_kses($post_navigation[$nav_type]['background_label'], array('span' => array('class' => true))); ?>
                        <?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
                    </a>
                <?php }
            }
            ?>
        </div>
    </div>
<?php } ?>