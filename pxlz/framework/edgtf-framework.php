<?php

require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.kses.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.layout1.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.layout2.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.layout3.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.layout.tax.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.layout.user.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.optionsapi.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.framework.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.functions.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/lib/edgtf.icons/edgtf.icons.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/admin/options/edgtf-options-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/admin/meta-boxes/edgtf-meta-boxes-setup.php";
require_once EDGE_FRAMEWORK_ROOT_DIR . "/modules/edgtf-modules-loader.php";

if (!function_exists('pxlz_edgtf_admin_scripts_init')) {
    /**
     * Function that registers all scripts that are necessary for our back-end
     */
    function pxlz_edgtf_admin_scripts_init() {
        /**
         * @see PxlzEdgefSkinAbstract::registerScripts - hooked with 10
         * @see PxlzEdgefSkinAbstract::registerStyles - hooked with 10
         */
        do_action('pxlz_edgtf_admin_scripts_init');
    }

    add_action('admin_init', 'pxlz_edgtf_admin_scripts_init');
}

if (!function_exists('pxlz_edgtf_enqueue_admin_styles')) {
    /**
     * Function that enqueues styles for options page
     */
    function pxlz_edgtf_enqueue_admin_styles() {
        wp_enqueue_style('wp-color-picker');

        /**
         * @see PxlzEdgefSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('pxlz_edgtf_enqueue_admin_styles');
    }
}

if (!function_exists('pxlz_edgtf_enqueue_admin_scripts')) {
    /**
     * Function that enqueues styles for options page
     */
    function pxlz_edgtf_enqueue_admin_scripts() {
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
        wp_enqueue_media();
        wp_enqueue_script('edgtf-dependence', get_template_directory_uri() . '/framework/admin/assets/js/edgtf-ui/edgtf-dependence.js', array(), false, true);
        wp_enqueue_script('edgtf-twitter-connect', get_template_directory_uri() . '/framework/admin/assets/js/edgtf-twitter-connect.js', array(), false, true);

        /**
         * @see PxlzEdgefSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('pxlz_edgtf_enqueue_admin_scripts');
    }
}

if (!function_exists('pxlz_edgtf_enqueue_meta_box_styles')) {
    /**
     * Function that enqueues styles for meta boxes
     */
    function pxlz_edgtf_enqueue_meta_box_styles() {
        wp_enqueue_style('wp-color-picker');

        /**
         * @see PxlzEdgefSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('pxlz_edgtf_enqueue_meta_box_styles');
    }
}

if (!function_exists('pxlz_edgtf_enqueue_meta_box_scripts')) {
    /**
     * Function that enqueues scripts for meta boxes
     */
    function pxlz_edgtf_enqueue_meta_box_scripts() {
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
        wp_enqueue_media();
        wp_enqueue_script('edgtf-dependence');

        /**
         * @see PxlzEdgefSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('pxlz_edgtf_enqueue_meta_box_scripts');
    }
}

if (!function_exists('pxlz_edgtf_enqueue_nav_menu_script')) {
    /**
     * Function that enqueues styles and scripts necessary for menu administration page.
     * It checks $hook variable
     *
     * @param $hook string current page hook to check
     */
    function pxlz_edgtf_enqueue_nav_menu_script($hook) {
        if ($hook == 'nav-menus.php') {
            wp_enqueue_script('edgtf-nav-menu', get_template_directory_uri() . '/framework/admin/assets/js/edgtf-nav-menu.js');
            wp_enqueue_style('edgtf-nav-menu', get_template_directory_uri() . '/framework/admin/assets/css/edgtf-nav-menu.css');
        }
    }

    add_action('admin_enqueue_scripts', 'pxlz_edgtf_enqueue_nav_menu_script');
}

if (!function_exists('pxlz_edgtf_enqueue_widgets_admin_script')) {
    /**
     * Function that enqueues styles and scripts for admin widgets page.
     *
     * @param $hook string current page hook to check
     */
    function pxlz_edgtf_enqueue_widgets_admin_script($hook) {
        if ($hook == 'widgets.php') {
            wp_enqueue_script('edgtf-dependence');
            wp_enqueue_script('edgtf-widgets-dependence', get_template_directory_uri() . '/framework/admin/assets/js/edgtf-ui/edgtf-widget-dependence.js', array(), false, true);
        }
    }

    add_action('admin_enqueue_scripts', 'pxlz_edgtf_enqueue_widgets_admin_script');
}

if (!function_exists('pxlz_edgtf_enqueue_taxonomy_script')) {
    /**
     * Function that enqueues styles and scripts necessary for menu administration page.
     * It checks $hook variable
     *
     * @param $hook string current page hook to check
     */
    function pxlz_edgtf_enqueue_taxonomy_script($hook) {
        if ($hook == 'edit-tags.php' || $hook == 'term.php') {
            wp_enqueue_script('select2');
            wp_enqueue_style('select2', get_template_directory_uri() . '/framework/admin/assets/css/select2.min.css');
        }
    }

    add_action('admin_enqueue_scripts', 'pxlz_edgtf_enqueue_taxonomy_script');
}


if (!function_exists('pxlz_edgtf_init_theme_options_array')) {
    /**
     * Function that merges $pxlz_edgtf_options and default options array into one array.
     *
     * @see array_merge()
     */
    function pxlz_edgtf_init_theme_options_array() {
        global $pxlz_edgtf_options, $pxlz_edgtf_Framework;

        $db_options = get_option('edgtf_options_pxlz');

        //does edgtf_options exists in db?
        if (is_array($db_options)) {
            //merge with default options
            $pxlz_edgtf_options = array_merge($pxlz_edgtf_Framework->edgtOptions->options, get_option('edgtf_options_pxlz'));
        } else {
            //options don't exists in db, take default ones
            $pxlz_edgtf_options = $pxlz_edgtf_Framework->edgtOptions->options;
        }
    }

    add_action('pxlz_edgtf_after_options_map', 'pxlz_edgtf_init_theme_options_array', 0);
}

if (!function_exists('pxlz_edgtf_init_theme_options')) {
    /**
     * Function that sets $pxlz_edgtf_options variable if it does'nt exists
     */
    function pxlz_edgtf_init_theme_options() {
        global $pxlz_edgtf_options;
        global $pxlz_edgtf_Framework;
        if (isset($pxlz_edgtf_options['reset_to_defaults'])) {
            if ($pxlz_edgtf_options['reset_to_defaults'] == 'yes') {
                delete_option("edgtf_options_pxlz");
            }
        }

        if (!get_option("edgtf_options_pxlz")) {
            add_option("edgtf_options_pxlz", $pxlz_edgtf_Framework->edgtOptions->options);

            $pxlz_edgtf_options = $pxlz_edgtf_Framework->edgtOptions->options;
        }
    }
}

if (!function_exists('pxlz_edgtf_register_theme_settings')) {
    /**
     * Function that registers setting that will be used to store theme options
     */
    function pxlz_edgtf_register_theme_settings() {
        register_setting('pxlz_edgtf_theme_menu', 'edgtf_options');
    }

    add_action('admin_init', 'pxlz_edgtf_register_theme_settings');
}

if (!function_exists('pxlz_edgtf_get_admin_tab')) {
    /**
     * Helper function that returns current tab from url.
     * @return null
     */
    function pxlz_edgtf_get_admin_tab() {
        return isset($_GET['page']) ? pxlz_edgtf_strafter($_GET['page'], 'tab') : null;
    }
}

if (!function_exists('pxlz_edgtf_strafter')) {
    /**
     * Function that returns string that comes after found string
     *
     * @param $string string where to search
     * @param $substring string what to search for
     *
     * @return null|string string that comes after found string
     */
    function pxlz_edgtf_strafter($string, $substring) {
        $pos = strpos($string, $substring);
        if ($pos === false) {
            return null;
        }

        return (substr($string, $pos + strlen($substring)));
    }
}

if (!function_exists('pxlz_edgtf_save_options')) {
    /**
     * Function that saves theme options to db.
     */
    function pxlz_edgtf_save_options() {
        global $pxlz_edgtf_options;

        if (current_user_can('administrator')) {
            $_REQUEST = stripslashes_deep($_REQUEST);

            unset($_REQUEST['action']);

            check_ajax_referer('edgtf_ajax_save_nonce', 'edgtf_ajax_save_nonce');

            $pxlz_edgtf_options = array_merge($pxlz_edgtf_options, $_REQUEST);

            update_option('edgtf_options_pxlz', $pxlz_edgtf_options);

            do_action('pxlz_edgtf_after_theme_option_save');
            echo esc_html__('Saved', 'pxlz');

            die();
        }
    }

    add_action('wp_ajax_pxlz_edgtf_save_options', 'pxlz_edgtf_save_options');
}

if (!function_exists('pxlz_edgtf_meta_box_add')) {
    /**
     * Function that adds all defined meta boxes.
     * It loops through array of created meta boxes and adds them
     */
    function pxlz_edgtf_meta_box_add() {
        global $pxlz_edgtf_Framework;

        foreach ($pxlz_edgtf_Framework->edgtMetaBoxes->metaBoxes as $key => $box) {
            $hidden = false;
            if (!empty($box->hidden_property)) {
                foreach ($box->hidden_values as $value) {
                    if (pxlz_edgtf_option_get_value($box->hidden_property) == $value) {
                        $hidden = true;
                    }
                }
            }

            if (is_string($box->scope)) {
                $box->scope = array($box->scope);
            }

            if (is_array($box->scope) && count($box->scope)) {
                foreach ($box->scope as $screen) {
                    pxlz_edgtf_create_meta_box_handler( $box, $key, $screen );

                    if ($hidden) {
                        add_filter('postbox_classes_' . $screen . '_edgtf-meta-box-' . $key, 'pxlz_edgtf_meta_box_add_hidden_class');
                    }
                }
            }
        }

        if ( pxlz_edgtf_is_plugin_installed( 'gutenberg-editor' ) || pxlz_edgtf_is_plugin_installed( 'gutenberg-plugin' ) ) {
            pxlz_edgtf_enqueue_meta_box_styles();
            pxlz_edgtf_enqueue_meta_box_scripts();
        } else {
            add_action( 'admin_enqueue_scripts', 'pxlz_edgtf_enqueue_meta_box_styles' );
            add_action( 'admin_enqueue_scripts', 'pxlz_edgtf_enqueue_meta_box_scripts' );
        }
    }
}

if (!function_exists('pxlz_edgtf_meta_box_save')) {
    /**
     * Function that saves meta box to postmeta table
     *
     * @param $post_id int id of post that meta box is being saved
     * @param $post WP_Post current post object
     */
    function pxlz_edgtf_meta_box_save($post_id, $post) {
        global $pxlz_edgtf_Framework;

        $nonces_array = array();
        $meta_boxes = pxlz_edgtf_framework()->edgtMetaBoxes->getMetaBoxesByScope($post->post_type);

        if (is_array($meta_boxes) && count($meta_boxes)) {
            foreach ($meta_boxes as $meta_box) {
                $nonces_array[] = 'pxlz_edgtf_meta_box_' . $meta_box->name . '_save';
            }
        }

        if (is_array($nonces_array) && count($nonces_array)) {
            foreach ($nonces_array as $nonce) {
                if (!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $nonce)) {
                    return;
                }
            }
        }

        $postTypes = apply_filters('pxlz_edgtf_meta_box_post_types_save', array('post', 'page'));

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!isset($_POST['_wpnonce'])) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (!in_array($post->post_type, $postTypes)) {
            return;
        }

        foreach ($pxlz_edgtf_Framework->edgtMetaBoxes->options as $key => $box) {

            if (isset($_POST[$key]) && trim($_POST[$key] !== '')) {

                $value = $_POST[$key];

                update_post_meta($post_id, $key, $value);
            } else {
                delete_post_meta($post_id, $key);
            }
        }

        $portfolios = false;
        if (isset($_POST['optionLabel'])) {
            foreach ($_POST['optionLabel'] as $key => $value) {
                $portfolios_val[$key] = array('optionLabel' => $value, 'optionValue' => $_POST['optionValue'][$key], 'optionUrl' => $_POST['optionUrl'][$key], 'optionlabelordernumber' => $_POST['optionlabelordernumber'][$key]);
                $portfolios = true;

            }
        }

        if ($portfolios) {
            update_post_meta($post_id, 'edgtf_portfolios', $portfolios_val);
        } else {
            delete_post_meta($post_id, 'edgtf_portfolios');
        }

        $portfolio_images = false;
        if (isset($_POST['portfolioimg'])) {
            foreach ($_POST['portfolioimg'] as $key => $value) {
                $portfolio_images_val[$key] = array('portfolioimg' => $_POST['portfolioimg'][$key], 'portfoliotitle' => $_POST['portfoliotitle'][$key], 'portfolioimgordernumber' => $_POST['portfolioimgordernumber'][$key], 'portfoliovideotype' => $_POST['portfoliovideotype'][$key], 'portfoliovideoid' => $_POST['portfoliovideoid'][$key], 'portfoliovideoimage' => $_POST['portfoliovideoimage'][$key], 'portfoliovideowebm' => $_POST['portfoliovideowebm'][$key], 'portfoliovideomp4' => $_POST['portfoliovideomp4'][$key], 'portfoliovideoogv' => $_POST['portfoliovideoogv'][$key], 'portfolioimgtype' => $_POST['portfolioimgtype'][$key]);
                $portfolio_images = true;
            }
        }

        if ($portfolio_images) {
            update_post_meta($post_id, 'edgtf_portfolio_images', $portfolio_images_val);
        } else {
            delete_post_meta($post_id, 'edgtf_portfolio_images');
        }
    }

    add_action('save_post', 'pxlz_edgtf_meta_box_save', 1, 2);
}

if (!function_exists('pxlz_edgtf_render_meta_box')) {
    /**
     * Function that renders meta box
     *
     * @param $post WP_Post post object
     * @param $metabox array array of current meta box parameters
     */
    function pxlz_edgtf_render_meta_box($post, $metabox) { ?>
        <div class="edgtf-meta-box edgtf-page">
            <div class="edgtf-meta-box-holder">
                <?php $metabox['args']['box']->render(); ?>
                <?php wp_nonce_field('pxlz_edgtf_meta_box_' . $metabox['args']['box']->name . '_save', 'pxlz_edgtf_meta_box_' . $metabox['args']['box']->name . '_save'); ?>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('pxlz_edgtf_meta_box_add_hidden_class')) {
    /**
     * Function that adds class that will initially hide meta box
     *
     * @param array $classes array of classes
     *
     * @return array modified array of classes
     */
    function pxlz_edgtf_meta_box_add_hidden_class($classes = array()) {
        if (!in_array('edgtf-meta-box-hidden', $classes)) {
            $classes[] = 'edgtf-meta-box-hidden';
        }

        return $classes;
    }
}

if (!function_exists('pxlz_edgtf_remove_default_custom_fields')) {
    /**
     * Function that removes default WordPress custom fields interface
     */
    function pxlz_edgtf_remove_default_custom_fields() {
        foreach (array('normal', 'advanced', 'side') as $context) {
            foreach (apply_filters('pxlz_edgtf_meta_box_post_types_remove', array('post', 'page')) as $postType) {
                remove_meta_box('postcustom', $postType, $context);
            }
        }
    }

    add_action('do_meta_boxes', 'pxlz_edgtf_remove_default_custom_fields');
}

if (!function_exists('pxlz_edgtf_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     */
    function pxlz_edgtf_generate_icon_pack_options() {
		check_ajax_referer( 'update-nav_menu', 'update_nav_menu_nonce' );

        global $pxlz_edgtf_IconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $pxlz_edgtf_IconCollections->getIconCollection($icon_pack);

        if ($collections_object) {
            $icons = $collections_object->getIconsArray();
            if (is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="' . esc_attr($key) . '">' . esc_html($key) . '</option>';
                }
            }
        }

        echo wp_kses($html, array('option' => array('value' => true)));
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'pxlz_edgtf_generate_icon_pack_options');
}

if (!function_exists('pxlz_edgtf_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function pxlz_edgtf_save_dismisable_notice() {
        if (is_admin() && !empty($_GET['edgtf_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['edgtf_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_' . $notice_id, 1);
        }
    }

    add_action('admin_init', 'pxlz_edgtf_save_dismisable_notice');
}

if (!function_exists('pxlz_edgtf_ajax_status')) {
    /**
     * Function that return status from ajax functions
     */
    function pxlz_edgtf_ajax_status($status, $message, $data = null) {
        $response = array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        );

        $output = json_encode($response);

        exit($output);
    }
}

if (!function_exists('pxlz_edgtf_hook_twitter_request_ajax')) {
    /**
     * Wrapper function for obtaining twitter request token.
     *
     * @see EdgeTwitterApi::obtainRequestToken()
     */
    function pxlz_edgtf_hook_twitter_request_ajax() {
		check_ajax_referer( 'edgtf_twitter_connect_nonce', 'twitter_connect_nonce' );
		
        EdgefTwitterApi::getInstance()->obtainRequestToken();
    }

    add_action('wp_ajax_edgtf_twitter_obtain_request_token', 'pxlz_edgtf_hook_twitter_request_ajax');
}

if (!function_exists('pxlz_edgtf_comment')) {
    /**
     * Function which modify default wordpress comments
     *
     * @return comments html
     */
    function pxlz_edgtf_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;

        global $post;

        $is_pingback_comment = $comment->comment_type == 'pingback';
        $is_author_comment = $post->post_author == $comment->user_id;

        $comment_class = 'edgtf-comment clearfix';

        if ($is_author_comment) {
            $comment_class .= ' edgtf-post-author-comment';
        }

        if ($is_pingback_comment) {
            $comment_class .= ' edgtf-pingback-comment';
        }
        ?>

        <li>
        <div class="<?php echo esc_attr($comment_class); ?>">
            <?php if (!$is_pingback_comment) { ?>
                <div class="edgtf-comment-image"> <?php echo pxlz_edgtf_kses_img(get_avatar($comment, 67)); ?> </div>
            <?php } ?>
            <div class="edgtf-comment-text">


                <div class="edgtf-comment-info">
                    <h4 class="edgtf-comment-name vcard">
                        <?php if ($is_pingback_comment) {
                            esc_html_e('Pingback:', 'pxlz');
                        } ?>
                        <?php echo wp_kses_post(get_comment_author_link()); ?>
                    </h4>
                    <div class="edgtf-comment-date"><?php comment_time(get_option('date_format')); ?></div>
                </div>

                <div class="edgtf-reply-link-holder">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'reply_text' => esc_html__('Reply', 'pxlz'),
                        'depth' => $depth,
                        'max_depth' => $args['max_depth']
                    )));
                    edit_comment_link(esc_html__('Edit', 'pxlz'));
                    ?>
                </div>

                <?php if (!$is_pingback_comment) { ?>
                    <div class="edgtf-text-holder" id="comment-<?php echo comment_ID(); ?>">
                        <?php comment_text(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php //li tag will be closed by WordPress after looping through child elements ?>
        <?php
    }
}

/* Taxonomy custom fields functions - START */

if (!function_exists('pxlz_edgtf_init_custom_taxonomy_fields')) {
    function pxlz_edgtf_init_custom_taxonomy_fields() {
        do_action('pxlz_edgtf_custom_taxonomy_fields');
    }

    add_action('after_setup_theme', 'pxlz_edgtf_init_custom_taxonomy_fields');
}

if (!function_exists('pxlz_edgtf_taxonomy_fields_add')) {
    function pxlz_edgtf_taxonomy_fields_add() {
        global $pxlz_edgtf_Framework;

        foreach ($pxlz_edgtf_Framework->edgtTaxonomyOptions->taxonomyOptions as $key => $fields) {
            add_action($fields->scope . '_add_form_fields', 'pxlz_edgtf_taxonomy_fields_display_add', 10, 2);
        }
    }

    add_action('after_setup_theme', 'pxlz_edgtf_taxonomy_fields_add', 11);
}

if (!function_exists('pxlz_edgtf_taxonomy_fields_edit')) {
    function pxlz_edgtf_taxonomy_fields_edit() {
        global $pxlz_edgtf_Framework;

        foreach ($pxlz_edgtf_Framework->edgtTaxonomyOptions->taxonomyOptions as $key => $fields) {
            add_action($fields->scope . '_edit_form_fields', 'pxlz_edgtf_taxonomy_fields_display_edit', 10, 2);
        }
    }

    add_action('after_setup_theme', 'pxlz_edgtf_taxonomy_fields_edit', 11);
}

if (!function_exists('pxlz_edgtf_taxonomy_fields_display_add')) {
    function pxlz_edgtf_taxonomy_fields_display_add($taxonomy) {
        global $pxlz_edgtf_Framework;

        foreach ($pxlz_edgtf_Framework->edgtTaxonomyOptions->taxonomyOptions as $key => $fields) {
            if ($taxonomy == $fields->scope) {
                $fields->render();
            }
        }
    }
}

if (!function_exists('pxlz_edgtf_taxonomy_fields_display_edit')) {
    function pxlz_edgtf_taxonomy_fields_display_edit($term, $taxonomy) {
        global $pxlz_edgtf_Framework;

        foreach ($pxlz_edgtf_Framework->edgtTaxonomyOptions->taxonomyOptions as $key => $fields) {
            if ($taxonomy == $fields->scope) {
                $fields->render();
            }
        }
    }
}

if (!function_exists('pxlz_edgtf_save_taxonomy_custom_fields')) {
    function pxlz_edgtf_save_taxonomy_custom_fields($term_id) {
        $fields = apply_filters('pxlz_edgtf_taxonomy_fields', array());

        foreach ($fields as $value) {
            if (isset($_POST[$value]) && '' !== $_POST[$value]) {
                add_term_meta($term_id, $value, $_POST[$value]);
            }
        }
    }

    add_action('created_term', 'pxlz_edgtf_save_taxonomy_custom_fields', 10, 2);
}

if (!function_exists('pxlz_edgtf_update_taxonomy_custom_fields')) {
    function pxlz_edgtf_update_taxonomy_custom_fields($term_id) {
        $fields = apply_filters('pxlz_edgtf_taxonomy_fields', array());

        foreach ($fields as $value) {
            if (isset($_POST[$value]) && '' !== $_POST[$value]) {
                update_term_meta($term_id, $value, $_POST[$value]);
            } else {
                update_term_meta($term_id, $value, '');
            }
        }
    }

    add_action('edited_term', 'pxlz_edgtf_update_taxonomy_custom_fields', 10, 2);
}

if (!function_exists('pxlz_edgtf_tax_add_script')) {
    function pxlz_edgtf_tax_add_script() {
        wp_enqueue_media();
        wp_enqueue_script('edgtf-tax-js', EDGE_FRAMEWORK_ROOT . '/admin/assets/js/edgtf-tax-custom-fields.js');
    }

    add_action('admin_enqueue_scripts', 'pxlz_edgtf_tax_add_script');
}

/** Taxonomy Delete Image **/
if (!function_exists('pxlz_edgtf_tax_del_image')) {
    function pxlz_edgtf_tax_del_image() {
		check_ajax_referer( 'edgtf_tax_del_image_nonce', 'tax_del_image_nonce' );
		
        /** If we don't have a term_id, bail out **/
        if (!isset($_GET['term_id'])) {
            esc_html_e('Not Set or Empty', 'pxlz');
            exit;
        }

        $field_name = $_GET['field_name'];
        $term_id = $_GET['term_id'];
        $imageID = get_term_meta($term_id, $field_name, true);  // Get our attachment ID

        if (is_numeric($imageID)) {                              // Verify that the attachment ID is indeed a number
            wp_delete_attachment($imageID);                       // Delete our image
            delete_term_meta($term_id, $field_name);// Delete our image meta
            exit;
        }

        esc_html_e('Contact Administrator', 'pxlz'); // If we've reached this point, something went wrong - enable debugging
        exit;
    }

    add_action('wp_ajax_pxlz_edgtf_tax_del_image', 'pxlz_edgtf_tax_del_image');
}

/* Taxonomy custom fields functions - END */

/* User custom fields functions - START */

if (!function_exists('pxlz_edgtf_init_custom_user_fields')) {
    function pxlz_edgtf_init_custom_user_fields() {
        do_action('pxlz_edgtf_custom_user_fields');
    }

    add_action('after_setup_theme', 'pxlz_edgtf_init_custom_user_fields');
}

if (!function_exists('pxlz_edgtf_user_fields_edit')) {
    function pxlz_edgtf_user_fields_edit($user) {
        global $pxlz_edgtf_Framework;

        foreach ($pxlz_edgtf_Framework->edgtUserOptions->userOptions as $key => $fields) {

            $display_fields = false;
            foreach ($user->roles as $role) {
                if (in_array($role, $fields->scope)) {
                    $display_fields = true;
                    break;
                }
            }
            if ($display_fields) {
                $fields->render();
            }
        }
    }

    add_action('show_user_profile', 'pxlz_edgtf_user_fields_edit');
    add_action('edit_user_profile', 'pxlz_edgtf_user_fields_edit');
}

if (!function_exists('pxlz_edgtf_save_user_fields')) {
    function pxlz_edgtf_save_user_fields($user_id) {

        $fields = apply_filters('pxlz_edgtf_user_fields', array());

        foreach ($fields as $value) {
            if (isset($_POST[$value]) && '' !== $_POST[$value]) {
                update_user_meta($user_id, $value, $_POST[$value]);
            }
        }
    }

    add_action('personal_options_update', 'pxlz_edgtf_save_user_fields');
    add_action('edit_user_profile_update', 'pxlz_edgtf_save_user_fields');
}
/* User custom fields functions - END */
?>