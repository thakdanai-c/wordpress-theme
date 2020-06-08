<?php

if (!function_exists('pxlz_edgtf_design_styles')) {
    /**
     * Generates general custom styles
     */
    function pxlz_edgtf_design_styles() {
        $font_family = pxlz_edgtf_options()->getOptionValue('google_fonts');
        if (!empty($font_family) && pxlz_edgtf_is_font_option_valid($font_family)) {
            $font_family_selector = array(
                'body'
            );
            echo pxlz_edgtf_dynamic_css($font_family_selector, array('font-family' => pxlz_edgtf_get_font_option_val($font_family)));
        }

        $first_main_color = pxlz_edgtf_options()->getOptionValue('first_color');
        if (!empty($first_main_color)) {

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a:hover',
                '.edgtf-comment-holder .edgtf-comment-text .edgtf-reply-link-holder .comment-edit-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .edgtf-reply-link-holder .comment-reply-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .edgtf-reply-link-holder .replay:hover',
                '.edgtf-comment-holder .edgtf-comment-text .edgtf-comment-date',
                '.edgtf-comment-holder .edgtf-comment-text #cancel-comment-reply-link',
                '.edgtf-owl-slider .owl-nav .owl-next:hover',
                '.edgtf-owl-slider .owl-nav .owl-prev:hover',
                '.edgtf-404-page .edgtf-page-not-found .edgtf-404-title',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-standard li .edgtf-twitter-icon i',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-twitter-icon i',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text a',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget.edgtf-twitter-slider li .edgtf-tweet-text span',
                'footer .widget #wp-calendar td#today',
                '.edgtf-side-menu .widget #wp-calendar td a:hover',
                '.edgtf-side-menu .widget #wp-calendar th a:hover',
                '.edgtf-side-menu .widget #wp-calendar td#today',
                '.edgtf-side-menu .widget #wp-calendar tfoot a:hover',
                '.edgtf-side-menu .widget.widget_search .input-holder button:hover',
                '.wpb_widgetised_column .widget #wp-calendar td a:hover',
                '.wpb_widgetised_column .widget #wp-calendar th a:hover',
                'aside.edgtf-sidebar .widget #wp-calendar td a:hover',
                'aside.edgtf-sidebar .widget #wp-calendar th a:hover',
                '.wpb_widgetised_column .widget #wp-calendar td#today',
                'aside.edgtf-sidebar .widget #wp-calendar td#today',
                '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
                'aside.edgtf-sidebar .widget #wp-calendar tfoot a:hover',
                '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
                'aside.edgtf-sidebar .widget.widget_search .input-holder button:hover',
                '.edgtf-blog-holder article.sticky .edgtf-post-title a',
                '.edgtf-blog-holder.edgtf-blog-masonry article .edgtf-post-info-date a',
                '.edgtf-blog-holder.edgtf-blog-metro article .edgtf-post-info .edgtf-post-info-inner>div a:hover',
                '.edgtf-blog-holder.edgtf-blog-metro article.format-quote .edgtf-post-title a:hover',
                '.edgtf-blog-holder.edgtf-blog-metro article.format-quote .edgtf-post-info-inner>div a:hover',
                '.edgtf-blog-holder.edgtf-blog-metro article.format-link .edgtf-post-title a:hover',
                '.edgtf-blog-holder.edgtf-blog-metro article.format-link .edgtf-post-info-inner>div a:hover',
                '.edgtf-blog-holder.edgtf-blog-metro article.edgtf-post-no-media .edgtf-post-title a:hover',
                '.edgtf-blog-holder.edgtf-blog-metro article.edgtf-post-no-media .edgtf-post-info-inner>div a:hover',
                '.edgtf-blog-holder.edgtf-blog-standard article .edgtf-post-info-list>div a',
                '.edgtf-blog-holder.edgtf-blog-standard article .edgtf-post-info-date a',
                '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-name a:hover',
                '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-social-icons a:hover',
                '.edgtf-blog-single-navigation .edgtf-blog-single-next .edgtf-blog-single-nav-label:hover',
                '.edgtf-blog-single-navigation .edgtf-blog-single-prev .edgtf-blog-single-nav-label:hover',
                '.edgtf-blog-holder.edgtf-blog-single article .edgtf-post-info-date a',
                '.edgtf-blog-holder.edgtf-blog-single article .edgtf-post-info-single .edgtf-post-info-single-left>div',
                '.edgtf-blog-holder.edgtf-blog-single article .edgtf-post-info-single .edgtf-post-info-single-left>div a',
                '.edgtf-main-menu ul li a:hover',
                '.edgtf-main-menu>ul>li.edgtf-active-item>a',
                '.edgtf-drop-down .second .inner ul li a:hover',
                '.edgtf-drop-down .second .inner ul li.current-menu-ancestor>a',
                '.edgtf-drop-down .second .inner ul li.current-menu-item>a',
                '.edgtf-drop-down .wide .second .inner ul li ul li a:hover',
                '.edgtf-drop-down .wide .second .inner ul li ul li.current-menu-item a',
                '.edgtf-drop-down .wide .second .inner>ul>li>a',
                '.edgtf-fullscreen-menu-opener.edgtf-fm-opened',
                'nav.edgtf-fullscreen-menu ul li a:hover',
                'nav.edgtf-fullscreen-menu ul li.current-menu-item>a nav.edgtf-fullscreen-menu ul li.current-menu-ancestor>a',
                'nav.edgtf-fullscreen-menu ul li.current_page_item>a',
                'nav.edgtf-fullscreen-menu ul li.edgtf-active-item>a',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li.current-menu-item>a .edgtf-header-vertical .edgtf-vertical-menu ul li.current-menu-ancestor>a',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li.current_page_item>a',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li.edgtf-active-item>a',
                '.edgtf-mobile-header .edgtf-mobile-menu-opener.edgtf-mobile-menu-opened a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li a:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li h6:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>h6',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>h6',
                '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid>ul>li.edgtf-active-item>a',
                '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid>ul>li.edgtf-active-item>h6',
                '.edgtf-search-page-holder .edgtf-search-page-form .edgtf-form-holder .edgtf-search-submit:hover',
                '.edgtf-search-page-holder article.sticky .edgtf-post-title a',
                '.edgtf-side-menu-button-opener.opened',
                '.edgtf-side-menu-button-opener:hover',
                '.edgtf-masonry-gallery-holder .edgtf-mg-item.edgtf-mg-simple .edgtf-mg-item-title span',
                '.edgtf-pl-filter-holder ul li.edgtf-pl-current h5',
                '.edgtf-pl-filter-holder ul li:hover h5',
                '.edgtf-portfolio-list-holder article .edgtf-pli-text .edgtf-pli-category-holder a:hover',
                '.edgtf-portfolio-list-holder.edgtf-pl-gallery-overlay article .edgtf-pli-text .edgtf-pli-category-holder a:hover',
                '.edgtf-portfolio-single-holder .edgtf-ps-info-holder .edgtf-ps-info-item a:hover',
                '.edgtf-ps-navigation .edgtf-ps-next a .edgtf-portfolio-single-nav-label:hover',
                '.edgtf-ps-navigation .edgtf-ps-prev a .edgtf-portfolio-single-nav-label:hover',
                '.edgtf-testimonials-holder .edgtf-testimonial-author',
                '.edgtf-banner-holder .edgtf-banner .edgtf-banner-title em',
                '.edgtf-btn:not(.edgtf-btn-minimal).edgtf-btn-simple',
                '.edgtf-btn:not(.edgtf-btn-minimal).edgtf-btn-outline',
                '.edgtf-counter-holder .edgtf-counter',
                '.edgtf-counter-holder div.edgtf-counter-title a:hover',
                '.edgtf-full-screen-sections .edgtf-fss-nav-holder a:hover',
                '.edgtf-iwt div.edgtf-iwt-title a:hover',
                '.edgtf-price-table .edgtf-pt-inner ul li.edgtf-pt-price-holder .edgtf-pt-price-value-holder',
                '.edgtf-social-share-holder.edgtf-list .edgtf-social-title',
                '.edgtf-social-share-holder.edgtf-list li a:hover',
                '.edgtf-social-share-holder.edgtf-dropdown .edgtf-social-share-dropdown-opener:hover',
                '.edgtf-video-button-holder',
                '.edgtf-twitter-list-holder .edgtf-twitter-icon',
                '.edgtf-twitter-list-holder .edgtf-tweet-text a:hover',
                '.edgtf-twitter-list-holder .edgtf-twitter-profile a:hover',
            );

            $woo_color_selector = array();
            if (pxlz_edgtf_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
                    '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
                    'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
                    'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
                    '.edgtf-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
                    'ul.products>.product .price',
                    '.edgtf-woo-single-page .edgtf-single-product-summary .price',
                    '.edgtf-woo-single-page .edgtf-single-product-summary .product_meta>span a:hover',
                    '.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .remove:hover',
                    '.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .amount',
                    '.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .edgtf-subtotal-holder .edgtf-total-amount',
                    '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content .amount',
                    '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content .quantity',
                    '.widget.woocommerce.widget_products ul li .amount',
                    '.widget.woocommerce.widget_recent_reviews ul li .amount',
                    '.widget.woocommerce.widget_recently_viewed_products ul li .amount',
                    '.widget.woocommerce.widget_top_rated_products ul li .amount',
                    '.widget.woocommerce.widget_product_search .input-holder button:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-price',
                    '.edgtf-plc-holder.edgtf-standard-layout .edgtf-plc-item .edgtf-plc-price',
                    '.edgtf-pl-holder .edgtf-pli .edgtf-pli-price',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-price',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $color_important_selector = array(
                '.edgtf-blog-list-widget .edgtf-blog-list-holder.edgtf-bl-minimal .edgtf-post-info-date a',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget li .edgtf-tweet-text a:not(.edgtf-tweet-time)',
                'footer .edgtf-single-line-form input[type=submit]:hover',
                '.edgtf-side-menu .widget ul li a:hover',
                '.edgtf-side-menu .widget.widget_tag_cloud a:hover',
                '.edgtf-side-menu .widget.widget_nav_menu ul li a:hover',
                '.edgtf-side-menu .widget.widget_nav_menu ul li.current_page_item a',
                '.wpb_widgetised_column .widget ul li a:hover',
                'aside.edgtf-sidebar .widget ul li a:hover',
                '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
                'aside.edgtf-sidebar .widget.widget_tag_cloud a:hover',
                '.edgtf-blog-holder article.format-audio .edgtf-post-info-list>div a',
                '.edgtf-blog-holder article.format-video .edgtf-post-info-list>div a',
                '.edgtf-blog-holder.edgtf-blog-masonry article .edgtf-post-info-list>div a',
                '.edgtf-blog-holder.edgtf-blog-single article.format-audio .edgtf-post-info-category a',
                '.edgtf-blog-holder.edgtf-blog-single article.format-video .edgtf-post-info-category a',
                '.edgtf-blog-list-holder .edgtf-bli-info>div a',
                '.edgtf-blog-slider-holder .edgtf-bli-info>div a',
            );

            $woo_color_important_selector = array();
            if (pxlz_edgtf_is_woocommerce_installed()) {
                $woo_color_important_selector = array(
                    '.widget.woocommerce.widget_products ul li a .product-title:hover',
                    '.widget.woocommerce.widget_recent_reviews a:hover',
                    '.widget.woocommerce.widget_recent_reviews ul li a .product-title:hover',
                    '.widget.woocommerce.widget_recently_viewed_products ul li a .product-title:hover',
                    '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:hover:not(.remove)',
                    '.widget.woocommerce.widget_top_rated_products ul li a .product-title:hover',
                    '.widget.woocommerce.widget_product_tag_cloud a:hover',
                );
            }

            $color_important_selector = array_merge($color_important_selector, $woo_color_important_selector);

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $background_color_selector = array(
                '.edgtf-st-loader .pulse',
                '.edgtf-st-loader .double_pulse .double-bounce1',
                '.edgtf-st-loader .double_pulse .double-bounce2',
                '.edgtf-st-loader .cube',
                '.edgtf-st-loader .rotating_cubes .cube1',
                '.edgtf-st-loader .rotating_cubes .cube2',
                '.edgtf-st-loader .stripes>div',
                '.edgtf-st-loader .wave>div',
                '.edgtf-st-loader .two_rotating_circles .dot1',
                '.edgtf-st-loader .two_rotating_circles .dot2',
                '.edgtf-st-loader .five_rotating_circles .container1>div',
                '.edgtf-st-loader .five_rotating_circles .container2>div',
                '.edgtf-st-loader .five_rotating_circles .container3>div',
                '.edgtf-st-loader .atom .ball-1:before',
                '.edgtf-st-loader .atom .ball-2:before',
                '.edgtf-st-loader .atom .ball-3:before',
                '.edgtf-st-loader .atom .ball-4:before',
                '.edgtf-st-loader .clock .ball:before',
                '.edgtf-st-loader .mitosis .ball',
                '.edgtf-st-loader .lines .line1',
                '.edgtf-st-loader .lines .line2',
                '.edgtf-st-loader .lines .line3',
                '.edgtf-st-loader .lines .line4',
                '.edgtf-st-loader .fussion .ball',
                '.edgtf-st-loader .fussion .ball-1',
                '.edgtf-st-loader .fussion .ball-2',
                '.edgtf-st-loader .fussion .ball-3',
                '.edgtf-st-loader .fussion .ball-4',
                '.edgtf-st-loader .wave_circles .ball',
                '.edgtf-st-loader .pulse_circles .ball',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '#edgtf-back-to-top>span',
                '.edgtf-owl-slider .owl-dots .owl-dot.active span',
                '.edgtf-owl-slider .owl-dots .owl-dot:hover span',
                '.edgtf-blog-holder article .edgtf-post-heading .edgtf-post-info-category a',
                '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.edgtf-blog-holder.edgtf-blog-metro article .edgtf-post-info .edgtf-post-info-category a',
                '.edgtf-blog-holder.edgtf-blog-standard article.format-link.edgtf-post-no-media',
                '.edgtf-blog-holder.edgtf-blog-standard article.format-quote.edgtf-post-no-media',
                '.edgtf-blog-holder.edgtf-blog-single article.format-link .edgtf-article-inner',
                '.edgtf-blog-holder.edgtf-blog-single article.format-quote .edgtf-article-inner',
                '.edgtf-blog-list-holder .edgtf-bli-heading .edgtf-post-info-category a',
                '.edgtf-blog-slider-holder .edgtf-bli-heading .edgtf-post-info-category a',
                '.edgtf-masonry-gallery-holder .edgtf-mg-item.edgtf-mg-standard .edgtf-mg-item-inner:after',
                '.edgtf-ps-navigation .edgtf-ps-back-btn a span',
                '.edgtf-accordion-holder .ui-state-active .edgtf-accordion-title',
                '.edgtf-accordion-holder .ui-state-hover .edgtf-accordion-title',
                '.edgtf-btn:not(.edgtf-btn-minimal).edgtf-btn-solid',
                '#fp-nav ul li a.active',
                '#fp-nav ul li a:hover',
                '.edgtf-icon-shortcode.edgtf-circle',
                '.edgtf-icon-shortcode.edgtf-dropcaps.edgtf-circle',
                '.edgtf-icon-shortcode.edgtf-square',
                '.edgtf-image-with-text-holder.edgtf-text-on-image:after',
                '.edgtf-price-table.edgtf-featured .edgtf-pt-inner ul',
                '.edgtf-progress-bar .edgtf-pb-content-holder .edgtf-pb-content',
                '.edgtf-tabs .edgtf-tabs-nav>li a:hover',
                '.edgtf-tabs .edgtf-tabs-nav>li.active a',
                '.edgtf-tabs .edgtf-tabs-nav>li.ui-state-active a',
            );

            $woo_background_color_selector = array();
            if (pxlz_edgtf_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .edgtf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce-page .edgtf-content a.added_to_cart',
                    '.woocommerce-page .edgtf-content a.button',
                    '.woocommerce-page .edgtf-content button[type=submit]:not(.edgtf-search-submit)',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]:not(.edgtf-search-submit)',
                    '.woocommerce-page .edgtf-content input[type=submit]',
                    'div.woocommerce input[type=submit]',
                    '.woocommerce-page .select2-container .select2-selection--multiple .select2-selection__rendered .select2-selection__choice',
                    'div.woocommerce .select2-container .select2-selection--multiple .select2-selection__rendered .select2-selection__choice',
                    '.edgtf-woo-single-page .woocommerce-tabs ul.tabs>li a:hover',
                    '.edgtf-woo-single-page .woocommerce-tabs ul.tabs>li.active a',
                    '.edgtf-woo-single-page .woocommerce-tabs ul.tabs>li.ui-state-active a',
                    '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .added_to_cart',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .button',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .added_to_cart:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .button:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .added_to_cart:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .button:hover',
                    '.edgtf-plc-holder.edgtf-standard-layout .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .added_to_cart',
                    '.edgtf-plc-holder.edgtf-standard-layout .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .button',
                    '.edgtf-plc-holder.edgtf-standard-layout .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .added_to_cart:hover',
                    '.edgtf-plc-holder.edgtf-standard-layout .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .button:hover',
                    '.edgtf-plc-holder.edgtf-standard-layout .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .added_to_cart:hover',
                    '.edgtf-plc-holder.edgtf-standard-layout .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .button:hover',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-default-skin .added_to_cart',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-default-skin .button',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-light-skin .added_to_cart:not(.edgtf-btn-with-cover-fx):hover',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-light-skin .button:not(.edgtf-btn-with-cover-fx):hover',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-dark-skin .added_to_cart:not(.edgtf-btn-with-cover-fx):hover',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-dark-skin .button:not(.edgtf-btn-with-cover-fx):hover',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $background_color_important_selector = array(
                '.edgtf-btn:not(.edgtf-btn-minimal).edgtf-btn-outline:not(.edgtf-btn-with-cover-fx):not(.edgtf-btn-custom-hover-bg):hover',
            );


            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $border_color_selector = array(
                '.edgtf-st-loader .pulse_circles .ball',
                '.edgtf-btn:not(.edgtf-btn-minimal).edgtf-btn-outline',
            );

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $border_color_important_selector = array(
                '.edgtf-btn:not(.edgtf-btn-minimal).edgtf-btn-outline:not(.edgtf-btn-with-cover-fx):not(.edgtf-btn-custom-border-hover):hover',
            );

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $border_bottom_color_selector = array(
                'footer .widget.widget_search .input-holder',
                'footer .edgtf-single-line-form',
                '.edgtf-side-menu .widget.widget_search .input-holder',
                '.wpb_widgetised_column .widget.widget_search .input-holder,aside.edgtf-sidebar .widget.widget_search .input-holder',
                '.edgtf-search-page-holder .edgtf-search-page-form .edgtf-form-holder',
            );

            $woo_border_bottom_color_selector = array();
            if (pxlz_edgtf_is_woocommerce_installed()) {
                $woo_border_bottom_color_selector = array(
                    '.select2-container--default .select2-search--dropdown .select2-search__field',
                    '.widget.woocommerce.widget_product_search .input-holder',
                );
            }

            $border_bottom_color_selector = array_merge($border_bottom_color_selector, $woo_border_bottom_color_selector);

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////

            echo pxlz_edgtf_dynamic_css($color_selector, array('color' => $first_main_color));
            echo pxlz_edgtf_dynamic_css($color_important_selector, array('color' => $first_main_color . '!important'));
            echo pxlz_edgtf_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
            echo pxlz_edgtf_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color . '!important'));
            echo pxlz_edgtf_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
            echo pxlz_edgtf_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color . '!important'));
            echo pxlz_edgtf_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => $first_main_color));
        }

        $page_background_color = pxlz_edgtf_options()->getOptionValue('page_background_color');
        if (!empty($page_background_color)) {
            $background_color_selector = array(
                'body',
                '.edgtf-content',
                '.edgtf-container'
            );
            echo pxlz_edgtf_dynamic_css($background_color_selector, array('background-color' => $page_background_color));
        }

        $selection_color = pxlz_edgtf_options()->getOptionValue('selection_color');
        if (!empty($selection_color)) {
            echo pxlz_edgtf_dynamic_css('::selection', array('background' => $selection_color));
            echo pxlz_edgtf_dynamic_css('::-moz-selection', array('background' => $selection_color));
        }

        $preload_background_styles = array();

        if (pxlz_edgtf_options()->getOptionValue('preload_pattern_image') !== "") {
            $preload_background_styles['background-image'] = 'url(' . pxlz_edgtf_options()->getOptionValue('preload_pattern_image') . ') !important';
        }

        echo pxlz_edgtf_dynamic_css('.edgtf-preload-background', $preload_background_styles);
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_design_styles');
}

if (!function_exists('pxlz_edgtf_content_styles')) {
    function pxlz_edgtf_content_styles() {
        $content_style = array();

        $padding_top = pxlz_edgtf_options()->getOptionValue('content_top_padding');
        if ($padding_top !== '') {
            $content_style['padding-top'] = pxlz_edgtf_filter_px($padding_top) . 'px';
        }

        $content_selector = array(
            '.edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
        );

        echo pxlz_edgtf_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();

        $padding_top_in_grid = pxlz_edgtf_options()->getOptionValue('content_top_padding_in_grid');
        if ($padding_top_in_grid !== '') {
            $content_style_in_grid['padding-top'] = pxlz_edgtf_filter_px($padding_top_in_grid) . 'px';
        }

        $content_selector_in_grid = array(
            '.edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
        );

        echo pxlz_edgtf_dynamic_css($content_selector_in_grid, $content_style_in_grid);
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_content_styles');
}

if (!function_exists('pxlz_edgtf_h1_styles')) {
    function pxlz_edgtf_h1_styles() {
        $margin_top = pxlz_edgtf_options()->getOptionValue('h1_margin_top');
        $margin_bottom = pxlz_edgtf_options()->getOptionValue('h1_margin_bottom');

        $item_styles = pxlz_edgtf_get_typography_styles('h1');

        if ($margin_top !== '') {
            $item_styles['margin-top'] = pxlz_edgtf_filter_px($margin_top) . 'px';
        }
        if ($margin_bottom !== '') {
            $item_styles['margin-bottom'] = pxlz_edgtf_filter_px($margin_bottom) . 'px';
        }

        $item_selector = array(
            'h1'
        );

        if (!empty($item_styles)) {
            echo pxlz_edgtf_dynamic_css($item_selector, $item_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_h1_styles');
}

if (!function_exists('pxlz_edgtf_h2_styles')) {
    function pxlz_edgtf_h2_styles() {
        $margin_top = pxlz_edgtf_options()->getOptionValue('h2_margin_top');
        $margin_bottom = pxlz_edgtf_options()->getOptionValue('h2_margin_bottom');

        $item_styles = pxlz_edgtf_get_typography_styles('h2');

        if ($margin_top !== '') {
            $item_styles['margin-top'] = pxlz_edgtf_filter_px($margin_top) . 'px';
        }
        if ($margin_bottom !== '') {
            $item_styles['margin-bottom'] = pxlz_edgtf_filter_px($margin_bottom) . 'px';
        }

        $item_selector = array(
            'h2'
        );

        if (!empty($item_styles)) {
            echo pxlz_edgtf_dynamic_css($item_selector, $item_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_h2_styles');
}

if (!function_exists('pxlz_edgtf_h3_styles')) {
    function pxlz_edgtf_h3_styles() {
        $margin_top = pxlz_edgtf_options()->getOptionValue('h3_margin_top');
        $margin_bottom = pxlz_edgtf_options()->getOptionValue('h3_margin_bottom');

        $item_styles = pxlz_edgtf_get_typography_styles('h3');

        if ($margin_top !== '') {
            $item_styles['margin-top'] = pxlz_edgtf_filter_px($margin_top) . 'px';
        }
        if ($margin_bottom !== '') {
            $item_styles['margin-bottom'] = pxlz_edgtf_filter_px($margin_bottom) . 'px';
        }

        $item_selector = array(
            'h3'
        );

        if (!empty($item_styles)) {
            echo pxlz_edgtf_dynamic_css($item_selector, $item_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_h3_styles');
}

if (!function_exists('pxlz_edgtf_h4_styles')) {
    function pxlz_edgtf_h4_styles() {
        $margin_top = pxlz_edgtf_options()->getOptionValue('h4_margin_top');
        $margin_bottom = pxlz_edgtf_options()->getOptionValue('h4_margin_bottom');

        $item_styles = pxlz_edgtf_get_typography_styles('h4');

        if ($margin_top !== '') {
            $item_styles['margin-top'] = pxlz_edgtf_filter_px($margin_top) . 'px';
        }
        if ($margin_bottom !== '') {
            $item_styles['margin-bottom'] = pxlz_edgtf_filter_px($margin_bottom) . 'px';
        }

        $item_selector = array(
            'h4'
        );

        if (!empty($item_styles)) {
            echo pxlz_edgtf_dynamic_css($item_selector, $item_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_h4_styles');
}

if (!function_exists('pxlz_edgtf_h5_styles')) {
    function pxlz_edgtf_h5_styles() {
        $margin_top = pxlz_edgtf_options()->getOptionValue('h5_margin_top');
        $margin_bottom = pxlz_edgtf_options()->getOptionValue('h5_margin_bottom');

        $item_styles = pxlz_edgtf_get_typography_styles('h5');

        if ($margin_top !== '') {
            $item_styles['margin-top'] = pxlz_edgtf_filter_px($margin_top) . 'px';
        }
        if ($margin_bottom !== '') {
            $item_styles['margin-bottom'] = pxlz_edgtf_filter_px($margin_bottom) . 'px';
        }

        $item_selector = array(
            'h5'
        );

        if (!empty($item_styles)) {
            echo pxlz_edgtf_dynamic_css($item_selector, $item_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_h5_styles');
}

if (!function_exists('pxlz_edgtf_h6_styles')) {
    function pxlz_edgtf_h6_styles() {
        $margin_top = pxlz_edgtf_options()->getOptionValue('h6_margin_top');
        $margin_bottom = pxlz_edgtf_options()->getOptionValue('h6_margin_bottom');

        $item_styles = pxlz_edgtf_get_typography_styles('h6');

        if ($margin_top !== '') {
            $item_styles['margin-top'] = pxlz_edgtf_filter_px($margin_top) . 'px';
        }
        if ($margin_bottom !== '') {
            $item_styles['margin-bottom'] = pxlz_edgtf_filter_px($margin_bottom) . 'px';
        }

        $item_selector = array(
            'h6'
        );

        if (!empty($item_styles)) {
            echo pxlz_edgtf_dynamic_css($item_selector, $item_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_h6_styles');
}

if (!function_exists('pxlz_edgtf_text_styles')) {
    function pxlz_edgtf_text_styles() {
        $item_styles = pxlz_edgtf_get_typography_styles('text');

        $item_selector = array(
            'p'
        );

        if (!empty($item_styles)) {
            echo pxlz_edgtf_dynamic_css($item_selector, $item_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_text_styles');
}

if (!function_exists('pxlz_edgtf_link_styles')) {
    function pxlz_edgtf_link_styles() {
        $link_styles = array();
        $link_color = pxlz_edgtf_options()->getOptionValue('link_color');
        $link_font_style = pxlz_edgtf_options()->getOptionValue('link_fontstyle');
        $link_font_weight = pxlz_edgtf_options()->getOptionValue('link_fontweight');
        $link_decoration = pxlz_edgtf_options()->getOptionValue('link_fontdecoration');

        if (!empty($link_color)) {
            $link_styles['color'] = $link_color;
        }
        if (!empty($link_font_style)) {
            $link_styles['font-style'] = $link_font_style;
        }
        if (!empty($link_font_weight)) {
            $link_styles['font-weight'] = $link_font_weight;
        }
        if (!empty($link_decoration)) {
            $link_styles['text-decoration'] = $link_decoration;
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo pxlz_edgtf_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_link_styles');
}

if (!function_exists('pxlz_edgtf_link_hover_styles')) {
    function pxlz_edgtf_link_hover_styles() {
        $link_hover_styles = array();
        $link_hover_color = pxlz_edgtf_options()->getOptionValue('link_hovercolor');
        $link_hover_decoration = pxlz_edgtf_options()->getOptionValue('link_hover_fontdecoration');

        if (!empty($link_hover_color)) {
            $link_hover_styles['color'] = $link_hover_color;
        }
        if (!empty($link_hover_decoration)) {
            $link_hover_styles['text-decoration'] = $link_hover_decoration;
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo pxlz_edgtf_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if (!empty($link_hover_color)) {
            $link_heading_hover_styles['color'] = $link_hover_color;
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo pxlz_edgtf_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('pxlz_edgtf_style_dynamic', 'pxlz_edgtf_link_hover_styles');
}

if (!function_exists('pxlz_edgtf_smooth_page_transition_styles')) {
    function pxlz_edgtf_smooth_page_transition_styles($style) {
        $id = pxlz_edgtf_get_page_id();
        $loader_style = array();
        $current_style = '';

        $background_color = pxlz_edgtf_get_meta_field_intersect('smooth_pt_bgnd_color', $id);
        if (!empty($background_color)) {
            $loader_style['background-color'] = $background_color;
        }

        $loader_selector = array(
            '.edgtf-smooth-transition-loader'
        );

        if (!empty($loader_style)) {
            $current_style .= pxlz_edgtf_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();
        $spinner_color = pxlz_edgtf_get_meta_field_intersect('smooth_pt_spinner_color', $id);
        if (!empty($spinner_color)) {
            $spinner_style['background-color'] = $spinner_color;
        }

        $spinner_selectors = array(
            '.edgtf-st-loader .edgtf-rotate-circles > div',
            '.edgtf-pxlz-holder .edgtf-pxlz:before',
            '.edgtf-st-loader .pulse',
            '.edgtf-st-loader .double_pulse .double-bounce1',
            '.edgtf-st-loader .double_pulse .double-bounce2',
            '.edgtf-st-loader .cube',
            '.edgtf-st-loader .rotating_cubes .cube1',
            '.edgtf-st-loader .rotating_cubes .cube2',
            '.edgtf-st-loader .stripes > div',
            '.edgtf-st-loader .wave > div',
            '.edgtf-st-loader .two_rotating_circles .dot1',
            '.edgtf-st-loader .two_rotating_circles .dot2',
            '.edgtf-st-loader .five_rotating_circles .container1 > div',
            '.edgtf-st-loader .five_rotating_circles .container2 > div',
            '.edgtf-st-loader .five_rotating_circles .container3 > div',
            '.edgtf-st-loader .atom .ball-1:before',
            '.edgtf-st-loader .atom .ball-2:before',
            '.edgtf-st-loader .atom .ball-3:before',
            '.edgtf-st-loader .atom .ball-4:before',
            '.edgtf-st-loader .clock .ball:before',
            '.edgtf-st-loader .mitosis .ball',
            '.edgtf-st-loader .lines .line1',
            '.edgtf-st-loader .lines .line2',
            '.edgtf-st-loader .lines .line3',
            '.edgtf-st-loader .lines .line4',
            '.edgtf-st-loader .fussion .ball',
            '.edgtf-st-loader .fussion .ball-1',
            '.edgtf-st-loader .fussion .ball-2',
            '.edgtf-st-loader .fussion .ball-3',
            '.edgtf-st-loader .fussion .ball-4',
            '.edgtf-st-loader .wave_circles .ball',
            '.edgtf-st-loader .pulse_circles .ball'
        );

        if (!empty($spinner_style)) {
            $current_style .= pxlz_edgtf_dynamic_css($spinner_selectors, $spinner_style);
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('pxlz_edgtf_add_page_custom_style', 'pxlz_edgtf_smooth_page_transition_styles');
}