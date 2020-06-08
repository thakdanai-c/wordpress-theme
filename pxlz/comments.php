<?php
if (post_password_required()) {
    return;
}

if (comments_open() || get_comments_number()) { ?>
    <div class="edgtf-comment-holder clearfix" id="comments">
        <?php if (have_comments()) { ?>
            <div class="edgtf-comment-holder-inner">
                <div class="edgtf-comments-title">
                    <h4><?php esc_html_e('Comments', 'pxlz'); ?></h4>
                </div>
                <div class="edgtf-comments">
                    <ul class="edgtf-comment-list">
                        <?php wp_list_comments(array_unique(array_merge(array('callback' => 'pxlz_edgtf_comment'), apply_filters('pxlz_edgtf_comments_callback', array())))); ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) { ?>
            <p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'pxlz'); ?></p>
        <?php } ?>
    </div>
    <?php
    $edgtf_commenter = wp_get_current_commenter();
    $edgtf_req = get_option('require_name_email');
    $edgtf_aria_req = ($edgtf_req ? " aria-required='true'" : '');

    $edgtf_consent  = empty( $edgtf_commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    $edgtf_args = array(
        'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"><span class="edgtf-btn-text">%4$s</span></button>',
        'class_submit' => 'submit edgtf-btn edgtf-btn-small edgtf-btn-solid edgtf-btn-plus-sign',
        'id_form' => 'commentform',
        'id_submit' => 'submit_comment',
        'title_reply' => esc_html__('Post a Comment', 'pxlz'),
        'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
        'title_reply_after' => '</h4>',
        'title_reply_to' => esc_html__('Post a Reply to %s', 'pxlz'),
        'cancel_reply_link' => esc_html__('Cancel Reply', 'pxlz'),
        'label_submit' => esc_html__('Submit', 'pxlz'),
        'comment_field' => apply_filters('pxlz_edgtf_comment_form_textarea_field', '<textarea id="comment" placeholder="' . esc_attr__('Comment', 'pxlz') . '" name="comment" cols="45" rows="6" aria-required="true"></textarea>'),
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'fields' => apply_filters('pxlz_edgtf_comment_form_default_fields', array(
            'author' => '<input id="author" name="author" placeholder="' . esc_attr__('Name *', 'pxlz') . '" type="text" value="' . esc_attr($edgtf_commenter['comment_author']) . '"' . $edgtf_aria_req . ' />',
            'email' => '<input id="email" name="email" placeholder="' . esc_attr__('Email *', 'pxlz') . '" type="text" value="' . esc_attr($edgtf_commenter['comment_author_email']) . '"' . $edgtf_aria_req . ' />',
            'url' => '<input id="url" name="url" placeholder="' . esc_attr__('Website', 'pxlz') . '" type="text" value="' . esc_attr($edgtf_commenter['comment_author_url']) . '" size="30" maxlength="200" />',
            'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $edgtf_consent . ' />' .
                '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'pxlz' ) . '</label></p>',
        ))
    );

    if (get_comment_pages_count() > 1) { ?>
        <div class="edgtf-comment-pager">
            <p><?php paginate_comments_links(); ?></p>
        </div>
    <?php } ?>

    <?php
    $edgtf_show_comment_form = apply_filters('pxlz_edgtf_show_comment_form_filter', true);
    if ($edgtf_show_comment_form) {
        ?>
        <div class="edgtf-comment-form">
            <div class="edgtf-comment-form-inner">
                <?php comment_form($edgtf_args); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>	