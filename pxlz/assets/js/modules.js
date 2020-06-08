(function ($) {
    "use strict";

    window.edgtf = {};
    edgtf.modules = {};

    edgtf.scroll = 0;
    edgtf.window = $(window);
    edgtf.document = $(document);
    edgtf.windowWidth = $(window).width();
    edgtf.windowHeight = $(window).height();
    edgtf.body = $('body');
    edgtf.html = $('html, body');
    edgtf.htmlEl = $('html');
    edgtf.menuDropdownHeightSet = false;
    edgtf.defaultHeaderStyle = '';
    edgtf.minVideoWidth = 1500;
    edgtf.videoWidthOriginal = 1280;
    edgtf.videoHeightOriginal = 720;
    edgtf.videoRatio = 1.61;

    edgtf.edgtfOnDocumentReady = edgtfOnDocumentReady;
    edgtf.edgtfOnWindowLoad = edgtfOnWindowLoad;
    edgtf.edgtfOnWindowResize = edgtfOnWindowResize;
    edgtf.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtf.scroll = $(window).scrollTop();
        edgtfBrowserDetection();

        //set global variable for header style which we will use in various functions
        if (edgtf.body.hasClass('edgtf-dark-header')) {
            edgtf.defaultHeaderStyle = 'edgtf-dark-header';
        }
        if (edgtf.body.hasClass('edgtf-light-header')) {
            edgtf.defaultHeaderStyle = 'edgtf-light-header';
        }
    }

    /* 
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {

    }

    /* 
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtf.windowWidth = $(window).width();
        edgtf.windowHeight = $(window).height();
    }

    /* 
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgtfOnWindowScroll() {
        edgtf.scroll = $(window).scrollTop();
    }

    //set boxed layout width variable for various calculations

    switch (true) {
        case edgtf.body.hasClass('edgtf-grid-1300'):
            edgtf.boxedLayoutWidth = 1350;
            break;
        case edgtf.body.hasClass('edgtf-grid-1200'):
            edgtf.boxedLayoutWidth = 1250;
            break;
        case edgtf.body.hasClass('edgtf-grid-1000'):
            edgtf.boxedLayoutWidth = 1050;
            break;
        case edgtf.body.hasClass('edgtf-grid-800'):
            edgtf.boxedLayoutWidth = 850;
            break;
        default :
            edgtf.boxedLayoutWidth = 1150;
            break;
    }

    /*
    * Browser detection
    */
    function edgtfBrowserDetection() {
        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor),
            isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor),
            isIE = window.navigator.userAgent.indexOf("MSIE ");
        
        if (isChrome) {
            edgtf.body.addClass('edgtf-chrome');
        }
        if (isSafari) {
            edgtf.body.addClass('edgtf-safari');
        }
        if (isIE > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            edgtf.body.addClass('edgtf-ms-explorer');
        }
    }

})(jQuery);
(function ($) {
    "use strict";

    var common = {};
    edgtf.modules.common = common;

    common.edgtfFluidVideo = edgtfFluidVideo;
    common.edgtfEnableScroll = edgtfEnableScroll;
    common.edgtfDisableScroll = edgtfDisableScroll;
    common.edgtfOwlSlider = edgtfOwlSlider;
    common.edgtfInitParallax = edgtfInitParallax;
    common.edgtfInitSelfHostedVideoPlayer = edgtfInitSelfHostedVideoPlayer;
    common.edgtfSelfHostedVideoSize = edgtfSelfHostedVideoSize;
    common.edgtfPrettyPhoto = edgtfPrettyPhoto;
    common.edgtfStickySidebarWidget = edgtfStickySidebarWidget;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;
    common.edgtfTextBlockAnimation = edgtfTextBlockAnimation;
    common.edgtfParallaxElements = edgtfParallaxElements;

    common.edgtfOnDocumentReady = edgtfOnDocumentReady;
    common.edgtfOnWindowLoad = edgtfOnWindowLoad;
    common.edgtfOnWindowResize = edgtfOnWindowResize;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfIconWithHover().init();
        edgtfDisableSmoothScrollForMac();
        edgtfInitAnchor().init();
        edgtfInitBackToTop();
        edgtfBackButtonShowHide();
        edgtfInitSelfHostedVideoPlayer();
        edgtfSelfHostedVideoSize();
        edgtfFluidVideo();
        edgtfOwlSlider();
        edgtfPreloadBackgrounds();
        edgtfPrettyPhoto();
    }

    /* 
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitParallax();
        edgtfSmoothTransition();
        edgtfStickySidebarWidget().init();
        edgtfParallaxElements();
        edgtfTextBlockAnimation();
    }

    /* 
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtfSelfHostedVideoSize();
    }

    /*
     ** Disable smooth scroll for mac if smooth scroll is enabled
     */
    function edgtfDisableSmoothScrollForMac() {
        var os = navigator.appVersion.toLowerCase();

        if (os.indexOf('mac') > -1 && edgtf.body.hasClass('edgtf-smooth-scroll')) {
            edgtf.body.removeClass('edgtf-smooth-scroll');
        }
    }

    function edgtfDisableScroll() {
        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', edgtfWheel, false);
        }

        window.onmousewheel = document.onmousewheel = edgtfWheel;
        document.onkeydown = edgtfKeydown;
    }

    function edgtfEnableScroll() {
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', edgtfWheel, false);
        }

        window.onmousewheel = document.onmousewheel = document.onkeydown = null;
    }

    function edgtfWheel(e) {
        edgtfPreventDefaultValue(e);
    }

    function edgtfKeydown(e) {
        var keys = [37, 38, 39, 40];

        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                edgtfPreventDefaultValue(e);
                return;
            }
        }
    }

    function edgtfPreventDefaultValue(e) {
        e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.returnValue = false;
    }

    /*
     **	Anchor functionality
     */
    var edgtfInitAnchor = function () {
        /**
         * Set active state on clicked anchor
         * @param anchor, clicked anchor
         */
        var setActiveState = function (anchor) {

            $('.edgtf-main-menu .edgtf-active-item, .edgtf-mobile-nav .edgtf-active-item, .edgtf-fullscreen-menu .edgtf-active-item').removeClass('edgtf-active-item');
            anchor.parent().addClass('edgtf-active-item');

            $('.edgtf-main-menu a, .edgtf-mobile-nav a, .edgtf-fullscreen-menu a').removeClass('current');
            anchor.addClass('current');
        };

        /**
         * Check anchor active state on scroll
         */
        var checkActiveStateOnScroll = function () {
            var anchorData = $('[data-edgtf-anchor]');

            anchorData.waypoint(function (direction) {
                if (direction === 'down') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("edgtf-anchor") + "']"));
                }
            }, {offset: '50%'});

            anchorData.waypoint(function (direction) {
                if (direction === 'up') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("edgtf-anchor") + "']"));
                }
            }, {
                offset: function () {
                    return -($(this.element).outerHeight() - 150);
                }
            });

        };

        /**
         * Check anchor active state on load
         */
        var checkActiveStateOnLoad = function () {
            var hash = window.location.hash.split('#')[1];

            if (hash !== "" && $('[data-edgtf-anchor="' + hash + '"]').length > 0) {
                anchorClickOnLoad(hash);
            }
        };

        /**
         * Handle anchor on load
         */
        var anchorClickOnLoad = function ($this) {
            var scrollAmount,
                anchor = $('a'),
                hash = $this,
                anchorData = hash !== '' ? $('[data-edgtf-anchor="' + hash + '"]') : '';

            if (hash !== '' && anchorData.length > 0) {
                var anchoredElementOffset = anchorData.offset().top;
                scrollAmount = anchoredElementOffset - headerHeightToSubtract(anchoredElementOffset) - edgtfGlobalVars.vars.edgtfAddForAdminBar;

                setActiveState(anchor);

                edgtf.html.stop().animate({
                    scrollTop: Math.round(scrollAmount)
                }, 1000, function () {
                    //change hash tag in url
                    if (history.pushState) {
                        history.pushState(null, '', '#' + hash);
                    }
                });
                return false;
            }
        };

        /**
         * Calculate header height to be substract from scroll amount
         * @param anchoredElementOffset, anchorded element offset
         */
        var headerHeightToSubtract = function (anchoredElementOffset) {

            if (edgtf.modules.stickyHeader.behaviour === 'edgtf-sticky-header-on-scroll-down-up') {
                edgtf.modules.stickyHeader.isStickyVisible = (anchoredElementOffset > edgtf.modules.header.stickyAppearAmount);
            }

            if (edgtf.modules.stickyHeader.behaviour === 'edgtf-sticky-header-on-scroll-up') {
                if ((anchoredElementOffset > edgtf.scroll)) {
                    edgtf.modules.stickyHeader.isStickyVisible = false;
                }
            }

            var headerHeight = edgtf.modules.stickyHeader.isStickyVisible ? edgtfGlobalVars.vars.edgtfStickyHeaderTransparencyHeight : edgtfPerPageVars.vars.edgtfHeaderTransparencyHeight;

            if (edgtf.windowWidth < 1025) {
                headerHeight = 0;
            }

            return headerHeight;
        };

        /**
         * Handle anchor click
         */
        var anchorClick = function () {
            edgtf.document.on("click", ".edgtf-main-menu a, .edgtf-fullscreen-menu a, .edgtf-btn, .edgtf-anchor, .edgtf-mobile-nav a", function () {
                var scrollAmount,
                    anchor = $(this),
                    hash = anchor.prop("hash").split('#')[1],
                    anchorData = hash !== '' ? $('[data-edgtf-anchor="' + hash + '"]') : '';

                if (hash !== '' && anchorData.length > 0) {
                    var anchoredElementOffset = anchorData.offset().top;
                    scrollAmount = anchoredElementOffset - headerHeightToSubtract(anchoredElementOffset) - edgtfGlobalVars.vars.edgtfAddForAdminBar;

                    setActiveState(anchor);

                    edgtf.html.stop().animate({
                        scrollTop: Math.round(scrollAmount)
                    }, 1000, function () {
                        //change hash tag in url
                        if (history.pushState) {
                            history.pushState(null, '', '#' + hash);
                        }
                    });
                    return false;
                }
            });
        };

        return {
            init: function () {
                if ($('[data-edgtf-anchor]').length) {
                    anchorClick();
                    checkActiveStateOnScroll();
                    $(window).load(function () {
                        checkActiveStateOnLoad();
                    });
                }
            }
        };
    };

    function edgtfInitBackToTop() {
        var backToTopButton = $('#edgtf-back-to-top');
        backToTopButton.on('click', function (e) {
            e.preventDefault();
            edgtf.html.animate({scrollTop: 0}, edgtf.window.scrollTop() / 4, 'easeInOutExpo');
        });
    }

    function edgtfBackButtonShowHide() {
        edgtf.window.scroll(function () {
            var b = $(this).scrollTop(),
                c = $(this).height(),
                d;

            if (b > 0) {
                d = b + c / 2;
            } else {
                d = 1;
            }

            if (d < 1e3) {
                edgtfToTopButton('off');
            } else {
                edgtfToTopButton('on');
            }
        });
    }

    function edgtfToTopButton(a) {
        var b = $("#edgtf-back-to-top");
        b.removeClass('off on');
        if (a === 'on') {
            b.addClass('on');
        } else {
            b.addClass('off');
        }
    }

    function edgtfInitSelfHostedVideoPlayer() {
        var players = $('.edgtf-self-hosted-video');

        if (players.length) {
            players.mediaelementplayer({
                audioWidth: '100%'
            });
        }
    }

    function edgtfSelfHostedVideoSize() {
        var selfVideoHolder = $('.edgtf-self-hosted-video-holder .edgtf-video-wrap');

        if (selfVideoHolder.length) {
            selfVideoHolder.each(function () {
                var thisVideo = $(this),
                    videoWidth = thisVideo.closest('.edgtf-self-hosted-video-holder').outerWidth(),
                    videoHeight = videoWidth / edgtf.videoRatio;

                if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
                    thisVideo.parent().width(videoWidth);
                    thisVideo.parent().height(videoHeight);
                }

                thisVideo.width(videoWidth);
                thisVideo.height(videoHeight);

                thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
                thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
            });
        }
    }

    function edgtfFluidVideo() {
        fluidvids.init({
            selector: ['iframe'],
            players: ['www.youtube.com', 'player.vimeo.com']
        });
    }

    function edgtfSmoothTransition() {

        if (edgtf.body.hasClass('edgtf-smooth-page-transitions')) {

            //check for preload animation
            if (edgtf.body.hasClass('edgtf-smooth-page-transitions-preloader')) {
                var loader = $('body > .edgtf-smooth-transition-loader.edgtf-mimic-ajax');
                loader.fadeOut(500);

                $(window).on('bind', 'pageshow', function (event) {
                    if (event.originalEvent.persisted) {
                        loader.fadeOut(500);
                    }
                });
            }

            //check for fade out animation
            if (edgtf.body.hasClass('edgtf-smooth-page-transitions-fadeout')) {
                var linkItem = $('a');

                linkItem.on('click', function (e) {
                    var a = $(this);

                    if ((a.parents('.edgtf-shopping-cart-dropdown').length || a.parent('.product-remove').length) && a.hasClass('remove')) {
                        return;
                    }

                    if (
                        e.which === 1 && // check if the left mouse button has been pressed
                        a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
                        (typeof a.data('rel') === 'undefined') && //Not pretty photo link
                        (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                        (!a.hasClass('lightbox-active')) && //Not lightbox plugin active
                        (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                        (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                    ) {
                        e.preventDefault();
                        $('.edgtf-wrapper-inner').fadeOut(1000, function () {
                            window.location = a.attr('href');
                        });
                    }
                });
            }
        }
    }

    /*
     *	Preload background images for elements that have 'edgtf-preload-background' class
     */
    function edgtfPreloadBackgrounds() {
        var preloadBackHolder = $('.edgtf-preload-background');

        if (preloadBackHolder.length) {
            preloadBackHolder.each(function () {
                var preloadBackground = $(this);

                if (preloadBackground.css('background-image') !== '' && preloadBackground.css('background-image') !== 'none') {
                    var bgUrl = preloadBackground.attr('style');

                    bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
                    bgUrl = bgUrl ? bgUrl[1] : "";

                    if (bgUrl) {
                        var backImg = new Image();
                        backImg.src = bgUrl;
                        $(backImg).load(function () {
                            preloadBackground.removeClass('edgtf-preload-background');
                        });
                    }
                } else {
                    $(window).load(function () {
                        preloadBackground.removeClass('edgtf-preload-background');
                    }); //make sure that edgtf-preload-background class is removed from elements with forced background none in css
                }
            });
        }
    }

    function edgtfPrettyPhoto() {
        /*jshint multistr: true */
        var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            hook: 'data-rel',
            animation_speed: 'normal', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            horizontal_padding: 0,
            default_width: 960,
            default_height: 540,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            custom_markup: '',
            social_tools: false,
            markup: markupWhole
        });
    }

    /**
     * Initializes load more data params
     * @param container with defined data params
     * return array
     */
    function getLoadMoreData(container) {
        var dataList = container.data(),
            returnValue = {};

        for (var property in dataList) {
            if (dataList.hasOwnProperty(property)) {
                if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
                    returnValue[property] = dataList[property];
                }
            }
        }

        return returnValue;
    }

    /**
     * Sets load more data params for ajax function
     * @param container with defined data params
     * @param action with defined action name
     * return array
     */
    function setLoadMoreAjaxData(container, action) {
        var returnValue = {
            action: action
        };

        for (var property in container) {
            if (container.hasOwnProperty(property)) {

                if (typeof container[property] !== 'undefined' && container[property] !== false) {
                    returnValue[property] = container[property];
                }
            }
        }

        return returnValue;
    }

    /**
     * Object that represents icon with hover data
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtfIconWithHover = function () {
        //get all icons on page
        var icons = $('.edgtf-icon-has-hover');

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var hoverColor = icon.data('hover-color'),
                    originalColor = icon.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: icon, color: originalColor}, changeIconColor);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        iconHoverColor($(this));
                    });
                }
            }
        };
    };

    /*
     ** Init parallax
     */
    function edgtfInitParallax() {
        var parallaxHolder = $('.edgtf-parallax-row-holder');

        if (parallaxHolder.length) {
            parallaxHolder.each(function () {
                var parallaxElement = $(this),
                    image = parallaxElement.data('parallax-bg-image'),
                    speed = parallaxElement.data('parallax-bg-speed') * 0.4,
                    height = 0;

                if (typeof parallaxElement.data('parallax-bg-height') !== 'undefined' && parallaxElement.data('parallax-bg-height') !== false) {
                    height = parseInt(parallaxElement.data('parallax-bg-height'));
                }

                parallaxElement.css({'background-image': 'url(' + image + ')'});

                if (height > 0) {
                    parallaxElement.css({'min-height': height + 'px', 'height': height + 'px'});
                }

                parallaxElement.parallax('50%', speed);
            });
        }
    }

    /*
     **  Init sticky sidebar widget
     */
    function edgtfStickySidebarWidget() {
        var sswHolder = $('.edgtf-widget-sticky-sidebar'),
            headerHolder = $('.edgtf-page-header'),
            headerHeight = headerHolder.length ? headerHolder.outerHeight() : 0,
            widgetTopOffset = 0,
            widgetTopPosition = 0,
            sidebarHeight = 0,
            sidebarWidth = 0,
            objectsCollection = [];

        function addObjectItems() {
            if (sswHolder.length) {
                sswHolder.each(function () {
                    var thisSswHolder = $(this),
                        mainSidebarHolder = thisSswHolder.parents('aside.edgtf-sidebar'),
                        widgetiseSidebarHolder = thisSswHolder.parents('.wpb_widgetised_column'),
                        sidebarHolder = '',
                        sidebarHolderHeight = 0;

                    widgetTopOffset = thisSswHolder.offset().top;
                    widgetTopPosition = thisSswHolder.position().top;
                    sidebarHeight = 0;
                    sidebarWidth = 0;

                    if (mainSidebarHolder.length) {
                        sidebarHeight = mainSidebarHolder.outerHeight();
                        sidebarWidth = mainSidebarHolder.outerWidth();
                        sidebarHolder = mainSidebarHolder;
                        sidebarHolderHeight = mainSidebarHolder.parent().parent().outerHeight();

                        var blogHolder = mainSidebarHolder.parent().parent().find('.edgtf-blog-holder');
                        if (blogHolder.length) {
                            sidebarHolderHeight -= parseInt(blogHolder.css('marginBottom'));
                        }
                    } else if (widgetiseSidebarHolder.length) {
                        sidebarHeight = widgetiseSidebarHolder.outerHeight();
                        sidebarWidth = widgetiseSidebarHolder.outerWidth();
                        sidebarHolder = widgetiseSidebarHolder;
                        sidebarHolderHeight = widgetiseSidebarHolder.parents('.vc_row').outerHeight();
                    }

                    objectsCollection.push({
                        'object': thisSswHolder,
                        'offset': widgetTopOffset,
                        'position': widgetTopPosition,
                        'height': sidebarHeight,
                        'width': sidebarWidth,
                        'sidebarHolder': sidebarHolder,
                        'sidebarHolderHeight': sidebarHolderHeight
                    });
                });
            }
        }

        function initStickySidebarWidget() {

            if (objectsCollection.length) {
                $.each(objectsCollection, function (i) {
                    var thisSswHolder = objectsCollection[i]['object'],
                        thisWidgetTopOffset = objectsCollection[i]['offset'],
                        thisWidgetTopPosition = objectsCollection[i]['position'],
                        thisSidebarHeight = objectsCollection[i]['height'],
                        thisSidebarWidth = objectsCollection[i]['width'],
                        thisSidebarHolder = objectsCollection[i]['sidebarHolder'],
                        thisSidebarHolderHeight = objectsCollection[i]['sidebarHolderHeight'];

                    if (edgtf.body.hasClass('edgtf-fixed-on-scroll')) {
                        var fixedHeader = $('.edgtf-fixed-wrapper.fixed');

                        if (fixedHeader.length) {
                            headerHeight = fixedHeader.outerHeight() + edgtfGlobalVars.vars.edgtfAddForAdminBar;
                        }
                    } else if (edgtf.body.hasClass('edgtf-no-behavior')) {
                        headerHeight = edgtfGlobalVars.vars.edgtfAddForAdminBar;
                    }

                    if (edgtf.windowWidth > 1024 && thisSidebarHolder.length) {
                        var sidebarPosition = -(thisWidgetTopPosition - headerHeight),
                            sidebarHeight = thisSidebarHeight - thisWidgetTopPosition - 40; // 40 is bottom margin of widget holder

                        //move sidebar up when hits the end of section row
                        var rowSectionEndInViewport = thisSidebarHolderHeight + thisWidgetTopOffset - headerHeight - thisWidgetTopPosition - edgtfGlobalVars.vars.edgtfTopBarHeight;

                        if ((edgtf.scroll >= thisWidgetTopOffset - headerHeight) && thisSidebarHeight < thisSidebarHolderHeight) {
                            if (thisSidebarHolder.hasClass('edgtf-sticky-sidebar-appeared')) {
                                thisSidebarHolder.css({'top': sidebarPosition + 'px'});
                            } else {
                                thisSidebarHolder.addClass('edgtf-sticky-sidebar-appeared').css({
                                    'position': 'fixed',
                                    'top': sidebarPosition + 'px',
                                    'width': thisSidebarWidth,
                                    'margin-top': '-10px'
                                }).animate({'margin-top': '0'}, 200);
                            }

                            if (edgtf.scroll + sidebarHeight >= rowSectionEndInViewport) {
                                var absBottomPosition = thisSidebarHolderHeight - sidebarHeight + sidebarPosition - headerHeight;

                                thisSidebarHolder.css({
                                    'position': 'absolute',
                                    'top': absBottomPosition + 'px'
                                });
                            } else {
                                if (thisSidebarHolder.hasClass('edgtf-sticky-sidebar-appeared')) {
                                    thisSidebarHolder.css({
                                        'position': 'fixed',
                                        'top': sidebarPosition + 'px'
                                    });
                                }
                            }
                        } else {
                            thisSidebarHolder.removeClass('edgtf-sticky-sidebar-appeared').css({
                                'position': 'relative',
                                'top': '0',
                                'width': 'auto'
                            });
                        }
                    } else {
                        thisSidebarHolder.removeClass('edgtf-sticky-sidebar-appeared').css({
                            'position': 'relative',
                            'top': '0',
                            'width': 'auto'
                        });
                    }
                });
            }
        }

        return {
            init: function () {
                addObjectItems();

                initStickySidebarWidget();

                $(window).scroll(function () {
                    initStickySidebarWidget();
                });
            },
            reInit: initStickySidebarWidget
        };
    }

    /**
     * Init Owl Carousel
     */
    function edgtfOwlSlider() {
        var sliders = $('.edgtf-owl-slider');

        if (sliders.length) {
            sliders.each(function () {
                var slider = $(this),
                    slideItemsNumber = slider.children().length,
                    numberOfItems = 1,
                    loop = true,
                    autoplay = true,
                    autoplayHoverPause = true,
                    sliderSpeed = 5000,
                    sliderSpeedAnimation = 600,
                    margin = 0,
                    responsiveMargin = 0,
                    responsiveMargin1 = 0,
                    stagePadding = 0,
                    stagePaddingEnabled = false,
                    center = false,
                    autoWidth = false,
                    animateIn = false, // keyframe css animation
                    animateOut = false, // keyframe css animation
                    navigation = true,
                    pagination = false,
                    sliderIsPortfolio = !!slider.hasClass('edgtf-pl-is-slider'),
                    sliderDataHolder = sliderIsPortfolio ? slider.parent() : slider;  // this is condition for portfolio slider

                if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false && !sliderIsPortfolio) {
                    numberOfItems = slider.data('number-of-items');
                }
                if (typeof sliderDataHolder.data('number-of-columns') !== 'undefined' && sliderDataHolder.data('number-of-columns') !== false && sliderIsPortfolio) {
                    numberOfItems = sliderDataHolder.data('number-of-columns');
                }
                if (sliderDataHolder.data('enable-loop') === 'no') {
                    loop = false;
                }
                if (sliderDataHolder.data('enable-autoplay') === 'no') {
                    autoplay = false;
                }
                if (sliderDataHolder.data('enable-autoplay-hover-pause') === 'no') {
                    autoplayHoverPause = false;
                }
                if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
                    sliderSpeed = sliderDataHolder.data('slider-speed');
                }
                if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
                    sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
                }
                if (typeof sliderDataHolder.data('slider-margin') !== 'undefined' && sliderDataHolder.data('slider-margin') !== false) {
                    if (sliderDataHolder.data('slider-margin') === 'no') {
                        margin = 0;
                    } else {
                        margin = sliderDataHolder.data('slider-margin');
                    }
                } else {
                    if (slider.parent().hasClass('edgtf-huge-space')) {
                        margin = 60;
                    } else if (slider.parent().hasClass('edgtf-large-space')) {
                        margin = 50;
                    } else if (slider.parent().hasClass('edgtf-medium-space')) {
                        margin = 40;
                    } else if (slider.parent().hasClass('edgtf-normal-space')) {
                        margin = 30;
                    } else if (slider.parent().hasClass('edgtf-small-space')) {
                        margin = 20;
                    } else if (slider.parent().hasClass('edgtf-tiny-space')) {
                        margin = 10;
                    }
                }
                if (sliderDataHolder.data('slider-padding') === 'yes') {
                    stagePaddingEnabled = true;
                    stagePadding = parseInt(slider.outerWidth() * 0.28);
                    margin = 50;
                }
                if (sliderDataHolder.data('enable-center') === 'yes') {
                    center = true;
                }
                if (sliderDataHolder.data('enable-auto-width') === 'yes') {
                    autoWidth = true;
                }
                if (typeof sliderDataHolder.data('slider-animate-in') !== 'undefined' && sliderDataHolder.data('slider-animate-in') !== false) {
                    animateIn = sliderDataHolder.data('slider-animate-in');
                }
                if (typeof sliderDataHolder.data('slider-animate-out') !== 'undefined' && sliderDataHolder.data('slider-animate-out') !== false) {
                    animateOut = sliderDataHolder.data('slider-animate-out');
                }
                if (sliderDataHolder.data('enable-navigation') === 'no') {
                    navigation = false;
                }
                if (sliderDataHolder.data('enable-pagination') === 'yes') {
                    pagination = true;
                }

                if (navigation && pagination) {
                    slider.addClass('edgtf-slider-has-both-nav');
                }

                if (slideItemsNumber <= 1) {
                    loop = false;
                    autoplay = false;
                    navigation = false;
                    pagination = false;
                }

                var responsiveNumberOfItems1 = 1,
                    responsiveNumberOfItems2 = 2,
                    responsiveNumberOfItems3 = 3,
                    responsiveNumberOfItems4 = numberOfItems;

                if (numberOfItems < 3) {
                    responsiveNumberOfItems2 = numberOfItems;
                    responsiveNumberOfItems3 = numberOfItems;
                }

                if (numberOfItems > 4) {
                    responsiveNumberOfItems4 = 4;
                }

                if (stagePaddingEnabled || margin > 30) {
                    responsiveMargin = 20;
                    responsiveMargin1 = 30;
                }

                if (margin > 0 && margin <= 30) {
                    responsiveMargin = margin;
                    responsiveMargin1 = margin;
                }

                console.log(numberOfItems);

                slider.owlCarousel({
                    items: numberOfItems,
                    loop: loop,
                    autoplay: autoplay,
                    autoplayHoverPause: autoplayHoverPause,
                    autoplayTimeout: sliderSpeed,
                    smartSpeed: sliderSpeedAnimation,
                    margin: margin,
                    stagePadding: stagePadding,
                    center: center,
                    autoWidth: autoWidth,
                    animateIn: animateIn,
                    animateOut: animateOut,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<span class="edgtf-prev-icon arrow_left"></span>',
                        '<span class="edgtf-next-icon arrow_right"></span>'
                    ],
                    responsive: {
                        0: {
                            items: responsiveNumberOfItems1,
                            margin: responsiveMargin,
                            stagePadding: 0,
                            center: false,
                            autoWidth: false
                        },
                        681: {
                            items: responsiveNumberOfItems2,
                            margin: responsiveMargin1
                        },
                        769: {
                            items: responsiveNumberOfItems3,
                            margin: responsiveMargin1
                        },
                        1025: {
                            items: responsiveNumberOfItems4
                        },
                        1281: {
                            items: numberOfItems
                        }
                    },
                    onInitialize: function () {
                        slider.css('visibility', 'visible');
                        edgtfInitParallax();
                    },
                    onDrag: function (e) {
                        if (edgtf.body.hasClass('edgtf-smooth-page-transitions-fadeout')) {
                            var sliderIsMoving = e.isTrigger > 0;

                            if (sliderIsMoving) {
                                slider.addClass('edgtf-slider-is-moving');
                            }
                        }
                    },
                    onDragged: function () {
                        if (edgtf.body.hasClass('edgtf-smooth-page-transitions-fadeout') && slider.hasClass('edgtf-slider-is-moving')) {

                            setTimeout(function () {
                                slider.removeClass('edgtf-slider-is-moving');
                            }, 500);
                        }
                    }
                });
            });
        }
    }

    /* 
    * Appear animation effect for span HTML elements in text blocks
    */
    function edgtfTextBlockAnimation() {
        var txtBlocks = $('.edgtf-animate-text').closest('.wpb_text_column');

        if (txtBlocks.length && !edgtf.htmlEl.hasClass('touch')) {
            var delay = 250;

            txtBlocks.each(function(){
                var txtBlock = $(this),
                    txtElements = txtBlock.find('.edgtf-animate-text');

                txtElements.each(function(i){
                    var txtElement = $(this);

                    txtElement.wrap( "<span class='edgtf-animate-text-holder'></span>" );

                    txtElement.appear(function(){
                        setTimeout(function(){
                            txtElement.addClass('edgtf-appeared');
                        }, i*delay);
                    });
                });
            });
        }
    }


     /**
     * Init Parallax Items - parallax holder shortcode, background subtitle shortcode, ptf lists etc.
     */
        function edgtfParallaxElements() {
            var parallaxIntances = $('.edgtf-parallax-holder, \
                                        .edgtf-pl-has-parallax-scroll');

            if (parallaxIntances.length && !edgtf.htmlEl.hasClass('touch')) {
                ParallaxScroll.init(); //initialzation removed from plugin js file to have it run only on non-touch devices
            }
     }

})(jQuery);
(function ($) {
    "use strict";

    var blogListSC = {};
    edgtf.modules.blogListSC = blogListSC;

    blogListSC.edgtfOnDocumentReady = edgtfOnDocumentReady;
    blogListSC.edgtfOnWindowLoad = edgtfOnWindowLoad;
    blogListSC.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).scroll(edgtfOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitBlogListMasonry();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitBlogListShortcodePagination().init();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgtfOnWindowScroll() {
        edgtfInitBlogListShortcodePagination().scroll();
    }

    /**
     * Init blog list shortcode masonry layout
     */
    function edgtfInitBlogListMasonry() {
        var holder = $('.edgtf-blog-list-holder.edgtf-bl-masonry');

        if (holder.length) {
            holder.each(function () {
                var thisHolder = $(this),
                    masonry = thisHolder.find('.edgtf-blog-list');

                masonry.waitForImages(function () {
                    masonry.isotope({
                        layoutMode: 'packery',
                        itemSelector: '.edgtf-bl-item',
                        percentPosition: true,
                        packery: {
                            gutter: '.edgtf-bl-grid-gutter',
                            columnWidth: '.edgtf-bl-grid-sizer'
                        }
                    });

                    masonry.css('opacity', '1');
                });
            });
        }
    }

    /**
     * Init blog list shortcode pagination functions
     */
    function edgtfInitBlogListShortcodePagination() {
        var holder = $('.edgtf-blog-list-holder');

        var initStandardPagination = function (thisHolder) {
            var standardLink = thisHolder.find('.edgtf-bl-standard-pagination li');

            if (standardLink.length) {
                standardLink.each(function () {
                    var thisLink = $(this).children('a'),
                        pagedLink = 1;

                    thisLink.on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
                            pagedLink = thisLink.data('paged');
                        }

                        initMainPagFunctionality(thisHolder, pagedLink);
                    });
                });
            }
        };

        var initLoadMorePagination = function (thisHolder) {
            var loadMoreButton = thisHolder.find('.edgtf-blog-pag-load-more a');

            loadMoreButton.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                initMainPagFunctionality(thisHolder);
            });
        };

        var initInifiteScrollPagination = function (thisHolder) {
            var blogListHeight = thisHolder.outerHeight(),
                blogListTopOffest = thisHolder.offset().top,
                blogListPosition = blogListHeight + blogListTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;

            if (!thisHolder.hasClass('edgtf-bl-pag-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > blogListPosition) {
                initMainPagFunctionality(thisHolder);
            }
        };

        var initMainPagFunctionality = function (thisHolder, pagedLink) {
            var thisHolderInner = thisHolder.find('.edgtf-blog-list'),
                nextPage,
                maxNumPages;

            if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
                maxNumPages = thisHolder.data('max-num-pages');
            }

            if (thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
                thisHolder.data('next-page', pagedLink);
            }

            if (thisHolder.hasClass('edgtf-bl-pag-infinite-scroll')) {
                thisHolder.addClass('edgtf-bl-pag-infinite-scroll-started');
            }

            var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisHolder),
                loadingItem = thisHolder.find('.edgtf-blog-pag-loading');

            nextPage = loadMoreDatta.nextPage;

			var nonceHolder = thisHolder.find('input[name*="edgtf_blog_load_more_nonce_"]');

			loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
			loadMoreDatta.blog_load_more_nonce = nonceHolder.val();

            if (nextPage <= maxNumPages) {
                if (thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
                    loadingItem.addClass('edgtf-showing edgtf-standard-pag-trigger');
                    thisHolder.addClass('edgtf-bl-pag-standard-blog-list-animate');
                } else {
                    loadingItem.addClass('edgtf-showing');
                }

                var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'pxlz_edgtf_blog_shortcode_load_more');

                $.ajax({
                    type: 'POST',
                    data: ajaxData,
                    url: edgtfGlobalVars.vars.edgtfAjaxUrl,
                     success: function (data) {
                        if (!thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
                            nextPage++;
                        }

                        thisHolder.data('next-page', nextPage);

                        var response = $.parseJSON(data),
                            responseHtml = response.html;

                        if (thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
                            edgtfInitStandardPaginationLinkChanges(thisHolder, maxNumPages, nextPage);

                            thisHolder.waitForImages(function () {
                                if (thisHolder.hasClass('edgtf-bl-masonry')) {
                                    edgtfInitHtmlIsotopeNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
                                } else {
                                    edgtfInitHtmlGalleryNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);

                                    if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
                                        edgtf.modules.common.edgtfStickySidebarWidget().reInit();
                                    }
                                }
                            });
                        } else {
                            thisHolder.waitForImages(function () {
                                if (thisHolder.hasClass('edgtf-bl-masonry')) {
                                    edgtfInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                } else {
                                    edgtfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);

                                    if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
                                        edgtf.modules.common.edgtfStickySidebarWidget().reInit();
                                    }
                                }
                            });
                        }

                        if (thisHolder.hasClass('edgtf-bl-pag-infinite-scroll-started')) {
                            thisHolder.removeClass('edgtf-bl-pag-infinite-scroll-started');
                        }
                    }
                });
            }

            if (nextPage === maxNumPages) {
                thisHolder.find('.edgtf-blog-pag-load-more').hide();
            }
        };

        var edgtfInitStandardPaginationLinkChanges = function (thisHolder, maxNumPages, nextPage) {
            var standardPagHolder = thisHolder.find('.edgtf-bl-standard-pagination'),
                standardPagNumericItem = standardPagHolder.find('li.edgtf-bl-pag-number'),
                standardPagPrevItem = standardPagHolder.find('li.edgtf-bl-pag-prev a'),
                standardPagNextItem = standardPagHolder.find('li.edgtf-bl-pag-next a');

            standardPagNumericItem.removeClass('edgtf-bl-pag-active');
            standardPagNumericItem.eq(nextPage - 1).addClass('edgtf-bl-pag-active');

            standardPagPrevItem.data('paged', nextPage - 1);
            standardPagNextItem.data('paged', nextPage + 1);

            if (nextPage > 1) {
                standardPagPrevItem.css({'opacity': '1'});
            } else {
                standardPagPrevItem.css({'opacity': '0'});
            }

            if (nextPage === maxNumPages) {
                standardPagNextItem.css({'opacity': '0'});
            } else {
                standardPagNextItem.css({'opacity': '1'});
            }
        };

        var edgtfInitHtmlIsotopeNewContent = function (thisHolder, thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
            thisHolder.removeClass('edgtf-bl-pag-standard-blog-list-animate');

            setTimeout(function () {
                thisHolderInner.isotope('layout');

                if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
                    edgtf.modules.common.edgtfStickySidebarWidget().reInit();
                }
            }, 600);
        };

        var edgtfInitHtmlGalleryNewContent = function (thisHolder, thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
            thisHolder.removeClass('edgtf-bl-pag-standard-blog-list-animate');
            thisHolderInner.html(responseHtml);
        };

        var edgtfInitAppendIsotopeNewContent = function (thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edgtf-showing');

            setTimeout(function () {
                thisHolderInner.isotope('layout');

                if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
                    edgtf.modules.common.edgtfStickySidebarWidget().reInit();
                }
            }, 600);
        };

        var edgtfInitAppendGalleryNewContent = function (thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edgtf-showing');
            thisHolderInner.append(responseHtml);
        };

        return {
            init: function () {
                if (holder.length) {
                    holder.each(function () {
                        var thisHolder = $(this);

                        if (thisHolder.hasClass('edgtf-bl-pag-standard-blog-list')) {
                            initStandardPagination(thisHolder);
                        }

                        if (thisHolder.hasClass('edgtf-bl-pag-load-more')) {
                            initLoadMorePagination(thisHolder);
                        }

                        if (thisHolder.hasClass('edgtf-bl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            },
            scroll: function () {
                if (holder.length) {
                    holder.each(function () {
                        var thisHolder = $(this);

                        if (thisHolder.hasClass('edgtf-bl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            }
        };
    }

})(jQuery);
(function ($) {
    "use strict";

    var blogChequered = {};
    edgtf.modules.blogChequered = blogChequered;

    blogChequered.edgtfOnWindowLoad = edgtfOnWindowLoad;

    $(window).load(edgtfOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitBlogChequered();
        edgtfInitBlogChequeredLoadMore();
    }

    /**
     *  Init Blog Chequered
     */
    function edgtfInitBlogChequered() {
        var container = $('.edgtf-blog-holder.edgtf-blog-chequered');
        var masonry = container.children('.edgtf-blog-holder-inner');
        var newSize;

        if (container.length) {
            newSize = masonry.find('.edgtf-blog-masonry-grid-sizer').outerWidth();
            masonry.children('article').css({'height': (newSize) + 'px'});
            masonry.isotope('layout', function () {
                masonry.css('opacity', '1');
            });
        }
    }

    function edgtfInitBlogChequeredLoadMore() {
        $(document.body).on('blog_list_load_more_trigger', function () {
            edgtfInitBlogChequered();
        });
    }

})(jQuery);
(function ($) {
    "use strict";

    var blogMasonryGallery = {};
    edgtf.modules.blogMasonryGallery = blogMasonryGallery;

    blogMasonryGallery.edgtfOnDocumentReady = edgtfOnDocumentReady;
    blogMasonryGallery.edgtfOnWindowLoad = edgtfOnWindowLoad;
    blogMasonryGallery.edgtfOnWindowResize = edgtfOnWindowResize;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitBlogMasonryGallery();
        edgtfInitBlogMasonryGalleryAppearLoadMore();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitBlogMasonryGalleryAppear();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtfInitBlogMasonryGallery();
    }

    /**
     *  Init Blog Masonry Gallery
     *
     *  Function that sets equal height of articles on blog masonry gallery list
     */
    function edgtfInitBlogMasonryGallery() {
        var blogList = $('.edgtf-blog-holder.edgtf-blog-masonry-gallery');
        if (blogList.length) {
            blogList.each(function () {

                var container = $(this),
                    masonry = container.children('.edgtf-blog-holder-inner'),
                    article = masonry.find('article'),
                    size = masonry.find('.edgtf-blog-masonry-grid-sizer').width() * 1.25;

                article.css({'height': (size) + 'px'});

                masonry.isotope('layout', function () {
                });
                edgtfInitBlogMasonryGalleryAppear();
            });
        }
    }

    /**
     *  Animate blog masonry gallery type
     */
    function edgtfInitBlogMasonryGalleryAppear() {
        var blogList = $('.edgtf-blog-holder.edgtf-blog-masonry-gallery');
        if (blogList.length) {
            blogList.each(function () {
                var thisBlogList = $(this),
                    article = thisBlogList.find('article'),
                    pagination = thisBlogList.find('.edgtf-blog-pagination-holder'),
                    animateCycle = 7, // rewind delay
                    animateCycleCounter = 0;

                article.each(function () {
                    var thisArticle = $(this);
                    setTimeout(function () {
                        thisArticle.appear(function () {
                            animateCycleCounter++;
                            if (animateCycleCounter == animateCycle) {
                                animateCycleCounter = 0;
                            }
                            setTimeout(function () {
                                thisArticle.addClass('edgtf-appeared');
                            }, animateCycleCounter * 200);
                        }, {accX: 0, accY: 0});
                    }, 150);
                });

                pagination.appear(function () {
                    pagination.addClass('edgtf-appeared');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});

            });
        }
    }

    function edgtfInitBlogMasonryGalleryAppearLoadMore() {
        $(document.body).on('blog_list_load_more_trigger', function () {
            edgtfInitBlogMasonryGalleryAppear();
        });
    }

})(jQuery);
(function ($) {
    "use strict";

    var blogNarrow = {};
    edgtf.modules.blogNarrow = blogNarrow;

    blogNarrow.edgtfOnWindowLoad = edgtfOnWindowLoad;

    $(window).load(edgtfOnWindowLoad);


    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitBlogNarrowAppear();
        edgtfInitBlogNarrowAppearLoadMore();
    }

    /**
     *  Animate blog narrow articles on appear
     */
    function edgtfInitBlogNarrowAppear() {
        var blogList = $('.edgtf-blog-holder.edgtf-blog-narrow');
        if (blogList.length) {
            blogList.each(function () {
                var thisBlogList = $(this),
                    article = thisBlogList.find('article'),
                    pagination = thisBlogList.find('.edgtf-blog-pagination-holder');

                article.each(function () {
                    var thisArticle = $(this);
                    thisArticle.appear(function () {
                        thisArticle.addClass('edgtf-appeared');
                    }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
                });

                pagination.appear(function () {
                    pagination.addClass('edgtf-appeared');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});

            });
        }
    }

    function edgtfInitBlogNarrowAppearLoadMore() {
        $(document.body).on('blog_list_load_more_trigger', function () {
            edgtfInitBlogNarrowAppear();
        });
    }

})(jQuery);
(function ($) {
    "use strict";

    var blog = {};
    edgtf.modules.blog = blog;

    blog.edgtfOnDocumentReady = edgtfOnDocumentReady;
    blog.edgtfOnWindowLoad = edgtfOnWindowLoad;
    blog.edgtfOnWindowResize = edgtfOnWindowResize;
    blog.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitAudioPlayer();
        edgtfInitBlogMasonry();
        edgtfInitChangeBlogTags();
        edgtfCategoryFixWidth();
    }

    /* 
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitBlogPagination().init();
    }

    /* 
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtfInitBlogMasonry();
    }

    /* 
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgtfOnWindowScroll() {
        edgtfInitBlogPagination().scroll();
    }

    /**
     * Init audio player for Blog list and single pages
     */
    function edgtfInitAudioPlayer() {
        var players = $('audio.edgtf-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    /**
     * Init Resize Blog Items
     */
    function edgtfResizeBlogItems(size, container) {

        if (container.hasClass('edgtf-masonry-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.edgtf-post-size-default'),
                largeWidthMasonryItem = container.find('.edgtf-post-size-large-width'),
                largeHeightMasonryItem = container.find('.edgtf-post-size-large-height'),
                largeWidthHeightMasonryItem = container.find('.edgtf-post-size-large-width-height');

            if (edgtf.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size);
                largeHeightMasonryItem.css('height', size);
                largeWidthHeightMasonryItem.css('height', size);
                largeWidthMasonryItem.css('height', Math.round(size / 2));
            }
        }
    }

    /**
     * Init Blog Masonry Layout
     */
    function edgtfInitBlogMasonry() {
        var holder = $('.edgtf-blog-holder.edgtf-blog-type-masonry');

        if (holder.length) {
            holder.each(function () {
                var thisHolder = $(this),
                    masonry = thisHolder.children('.edgtf-blog-holder-inner'),
                    size = thisHolder.find('.edgtf-blog-masonry-grid-sizer').width();

                edgtfResizeBlogItems(size, thisHolder);

                masonry.waitForImages(function () {
                    masonry.isotope({
                        layoutMode: 'packery',
                        itemSelector: 'article',
                        percentPosition: true,
                        packery: {
                            gutter: '.edgtf-blog-masonry-grid-gutter',
                            columnWidth: '.edgtf-blog-masonry-grid-sizer'
                        }
                    });
                    masonry.css('opacity', '1');

                    setTimeout(function () {
                        masonry.isotope('layout');
                    }, 800);
                });
            });
        }
    }

    /**
     * Initializes blog pagination functions
     */
    function edgtfInitBlogPagination() {
        var holder = $('.edgtf-blog-holder');

        var initLoadMorePagination = function (thisHolder) {
            var loadMoreButton = thisHolder.find('.edgtf-blog-pag-load-more a');

            loadMoreButton.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                initMainPagFunctionality(thisHolder);
            });
        };

        var initInifiteScrollPagination = function (thisHolder) {
            var blogListHeight = thisHolder.outerHeight(),
                blogListTopOffest = thisHolder.offset().top,
                blogListPosition = blogListHeight + blogListTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;

            if (!thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > blogListPosition) {
                initMainPagFunctionality(thisHolder);
            }
        };

        var initMainPagFunctionality = function (thisHolder) {
            var thisHolderInner = thisHolder.children('.edgtf-blog-holder-inner'),
                nextPage,
                maxNumPages;

            if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
                maxNumPages = thisHolder.data('max-num-pages');
            }

            if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
                thisHolder.addClass('edgtf-blog-pagination-infinite-scroll-started');
            }

            var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisHolder),
                loadingItem = thisHolder.find('.edgtf-blog-pag-loading');

            nextPage = loadMoreDatta.nextPage;

			var nonceHolder = thisHolder.find('input[name*="edgtf_blog_load_more_nonce_"]');

			loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
			loadMoreDatta.blog_load_more_nonce = nonceHolder.val();
			
            if (nextPage <= maxNumPages) {
                loadingItem.addClass('edgtf-showing');

                var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'pxlz_edgtf_blog_load_more');

                $.ajax({
                    type: 'POST',
                    data: ajaxData,
                    url: edgtfGlobalVars.vars.edgtfAjaxUrl,
                    success: function (data) {
                        nextPage++;

                        thisHolder.data('next-page', nextPage);

                        var response = $.parseJSON(data),
                            responseHtml = response.html;

                        thisHolder.waitForImages(function () {
                            if (thisHolder.hasClass('edgtf-blog-type-masonry')) {
                                edgtfInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                edgtfResizeBlogItems(thisHolderInner.find('.edgtf-blog-masonry-grid-sizer').width(), thisHolder);
                            } else {
                                edgtfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
                            }

                            setTimeout(function () {
                                edgtfInitAudioPlayer();
                                edgtf.modules.common.edgtfOwlSlider();
                                edgtf.modules.common.edgtfFluidVideo();
                                edgtf.modules.common.edgtfInitSelfHostedVideoPlayer();
                                edgtf.modules.common.edgtfSelfHostedVideoSize();

                                if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
                                    edgtf.modules.common.edgtfStickySidebarWidget().reInit();
                                }

                                // Trigger event.
                                $(document.body).trigger('blog_list_load_more_trigger');

                            }, 400);
                        });

                        if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll-started')) {
                            thisHolder.removeClass('edgtf-blog-pagination-infinite-scroll-started');
                        }
                    }
                });
            }

            if (nextPage === maxNumPages) {
                thisHolder.find('.edgtf-blog-pag-load-more').hide();
            }
        };

        var edgtfInitAppendIsotopeNewContent = function (thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edgtf-showing');

            setTimeout(function () {
                thisHolderInner.isotope('layout');
            }, 600);
        };

        var edgtfInitAppendGalleryNewContent = function (thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edgtf-showing');
            thisHolderInner.append(responseHtml);
        };

        return {
            init: function () {
                if (holder.length) {
                    holder.each(function () {
                        var thisHolder = $(this);

                        if (thisHolder.hasClass('edgtf-blog-pagination-load-more')) {
                            initLoadMorePagination(thisHolder);
                        }

                        if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            },
            scroll: function () {
                if (holder.length) {
                    holder.each(function () {
                        var thisHolder = $(this);

                        if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            }
        };
    }

    /*
     ** change title tag for large width/height article on metro list
     */
    function edgtfInitChangeBlogTags() {
        var tags = $('.edgtf-blog-metro .edgtf-post-size-large-width-height').find('h3');

        if (tags.length) {
            tags.each(function () {
                $(this).replaceWith('<h2 itemprop="name" class="entry-title edgtf-post-title">' + $(this).html() + '</h2>');
            });
        }
    }

    

    /**
     * Sets category width to integer value
     */
    var edgtfCategoryFixWidth = function() {
        var postCategories = $('.edgtf-post-info-category > a');

        if (postCategories.length) {
            postCategories.each(function() {
                var postCategory = $(this);

                postCategory.css('width', Math.round(postCategory.outerWidth() + 1));
            });
        }
    }

})(jQuery);
(function ($) {
    "use strict";

    var headerMinimal = {};
    edgtf.modules.headerMinimal = headerMinimal;

    headerMinimal.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfFullscreenMenu();
    }

    /**
     * Init Fullscreen Menu
     */
    function edgtfFullscreenMenu() {
        var popupMenuOpener = $('a.edgtf-fullscreen-menu-opener');

        if (popupMenuOpener.length) {
            var popupMenuHolderOuter = $(".edgtf-fullscreen-menu-holder-outer"),
                cssClass,
            //Flags for type of animation
                fadeRight = false,
                fadeTop = false,
            //Widgets
                widgetAboveNav = $('.edgtf-fullscreen-above-menu-widget-holder'),
                widgetBelowNav = $('.edgtf-fullscreen-below-menu-widget-holder'),
            //Menu
                menuItems = $('.edgtf-fullscreen-menu-holder-outer nav > ul > li > a'),
                menuItemWithChild = $('.edgtf-fullscreen-menu > ul li.has_sub > a'),
                menuItemWithoutChild = $('.edgtf-fullscreen-menu ul li:not(.has_sub) a');

            //set height of popup holder and initialize nicescroll
            popupMenuHolderOuter.height(edgtf.windowHeight).niceScroll({
                scrollspeed: 30,
                mousescrollstep: 20,
                cursorwidth: 0,
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false,
                horizrailenabled: false
            }); //200 is top and bottom padding of holder

            //set height of popup holder on resize
            $(window).resize(function () {
                popupMenuHolderOuter.height(edgtf.windowHeight);
            });

            if (edgtf.body.hasClass('edgtf-fade-push-text-right')) {
                cssClass = 'edgtf-push-nav-right';
                fadeRight = true;
            } else if (edgtf.body.hasClass('edgtf-fade-push-text-top')) {
                cssClass = 'edgtf-push-text-top';
                fadeTop = true;
            }

            //Appearing animation
            if (fadeRight || fadeTop) {
                if (widgetAboveNav.length) {
                    widgetAboveNav.children().css({
                        '-webkit-animation-delay': 0 + 'ms',
                        '-moz-animation-delay': 0 + 'ms',
                        'animation-delay': 0 + 'ms'
                    });
                }
                menuItems.each(function (i) {

                    $(this).css({
                        '-webkit-animation-delay': (i + 1) * 70 + 'ms',
                        '-moz-animation-delay': (i + 1) * 70 + 'ms',
                        'animation-delay': (i + 1) * 70 + 'ms'
                    });
                });
                if (widgetBelowNav.length) {
                    widgetBelowNav.children().css({
                        '-webkit-animation-delay': (menuItems.length + 1) * 70 + 'ms',
                        '-moz-animation-delay': (menuItems.length + 1) * 70 + 'ms',
                        'animation-delay': (menuItems.length + 1) * 70 + 'ms'
                    });
                }
            }

            // Open popup menu
            popupMenuOpener.on('click', function (e) {
                e.preventDefault();

                if (!popupMenuOpener.hasClass('edgtf-fm-opened')) {
                    popupMenuOpener.addClass('edgtf-fm-opened');
                    edgtf.body.removeClass('edgtf-fullscreen-fade-out').addClass('edgtf-fullscreen-menu-opened edgtf-fullscreen-fade-in');
                    edgtf.body.removeClass(cssClass);
                    edgtf.modules.common.edgtfDisableScroll();

                    $(document).keyup(function (e) {
                        if (e.keyCode == 27) {
                            popupMenuOpener.removeClass('edgtf-fm-opened');
                            edgtf.body.removeClass('edgtf-fullscreen-menu-opened edgtf-fullscreen-fade-in').addClass('edgtf-fullscreen-fade-out');
                            edgtf.body.addClass(cssClass);
                            edgtf.modules.common.edgtfEnableScroll();

                            $("nav.edgtf-fullscreen-menu ul.sub_menu").slideUp(200, function () {
                                $('nav.popup_menu').getNiceScroll().resize();
                            });
                        }
                    });
                } else {
                    popupMenuOpener.removeClass('edgtf-fm-opened');
                    edgtf.body.removeClass('edgtf-fullscreen-menu-opened edgtf-fullscreen-fade-in').addClass('edgtf-fullscreen-fade-out');
                    edgtf.body.addClass(cssClass);
                    edgtf.modules.common.edgtfEnableScroll();

                    $("nav.edgtf-fullscreen-menu ul.sub_menu").slideUp(200, function () {
                        $('nav.popup_menu').getNiceScroll().resize();
                    });
                }
            });

            //logic for open sub menus in popup menu
            menuItemWithChild.on('tap click', function (e) {
                e.preventDefault();

                var thisItem = $(this),
                    thisItemParent = thisItem.parent();

                if (thisItemParent.hasClass('has_sub')) {
                    var submenu = thisItemParent.find('> ul.sub_menu');

                    if (submenu.is(':visible')) {
                        submenu.slideUp(450, 'easeInOutQuint', function () {
                            popupMenuHolderOuter.getNiceScroll().resize();
                        });
                        thisItemParent.removeClass('open_sub');
                    } else {
                        thisItemParent.addClass('open_sub');

                        if (menuItemWithChild.length === 1) {
                            thisItemParent.removeClass('open_sub').find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
                                popupMenuHolderOuter.getNiceScroll().resize();
                                submenu.slideDown(400, 'easeInOutQuint', function () {
                                    popupMenuHolderOuter.getNiceScroll().resize();
                                });
                            });
                        } else {
                            thisItemParent.siblings().removeClass('open_sub').find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
                                popupMenuHolderOuter.getNiceScroll().resize();
                                submenu.slideDown(400, 'easeInOutQuint', function () {
                                    popupMenuHolderOuter.getNiceScroll().resize();
                                });
                            });
                        }
                    }
                }

                return false;
            });

            //if link has no submenu and if it's not dead, than open that link
            menuItemWithoutChild.on('click', function (e) {
                if (($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")) {
                    if (e.which == 1) {
                        popupMenuOpener.removeClass('edgtf-fm-opened');
                        edgtf.body.removeClass('edgtf-fullscreen-menu-opened');
                        edgtf.body.removeClass('edgtf-fullscreen-fade-in').addClass('edgtf-fullscreen-fade-out');
                        edgtf.body.addClass(cssClass);
                        $("nav.edgtf-fullscreen-menu ul.sub_menu").slideUp(200, function () {
                            $('nav.popup_menu').getNiceScroll().resize();
                        });
                        edgtf.modules.common.edgtfEnableScroll();
                    }
                } else {
                    return false;
                }
            });
        }
    }

})(jQuery);
(function ($) {
    "use strict";

    var headerVertical = {};
    edgtf.modules.headerVertical = headerVertical;

    headerVertical.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfVerticalMenu().init();
    }

    /**
     * Function object that represents vertical menu area.
     * @returns {{init: Function}}
     */
    var edgtfVerticalMenu = function () {
        var verticalMenuObject = $('.edgtf-vertical-menu-area');

        /**
         * Resizes vertical area. Called whenever height of navigation area changes
         * It first check if vertical area is scrollable, and if it is resizes scrollable area
         */
        var resizeVerticalArea = function () {
            if (verticalAreaScrollable()) {
                verticalMenuObject.getNiceScroll().resize();
            }
        };

        /**
         * Checks if vertical area is scrollable (if it has edgtf-with-scroll class)
         *
         * @returns {bool}
         */
        var verticalAreaScrollable = function () {
            return verticalMenuObject.hasClass('edgtf-with-scroll');
        };

        /**
         * Initialzes navigation functionality. It checks navigation type data attribute and calls proper functions
         */
        var initNavigation = function () {
            var verticalNavObject = verticalMenuObject.find('.edgtf-vertical-menu');

            dropdownClickToggle();

            /**
             * Initializes click toggle navigation type. Works the same for touch and no-touch devices
             */
            function dropdownClickToggle() {
                var menuItems = verticalNavObject.find('ul li.menu-item-has-children');

                menuItems.each(function () {
                    var elementToExpand = $(this).find(' > .second, > ul');
                    var menuItem = this;
                    var dropdownOpener = $(this).find('> a');
                    var slideUpSpeed = 'fast';
                    var slideDownSpeed = 'slow';

                    dropdownOpener.on('click tap', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (elementToExpand.is(':visible')) {
                            $(menuItem).removeClass('open');
                            elementToExpand.slideUp(slideUpSpeed, function () {
                                resizeVerticalArea();
                            });
                        } else if (dropdownOpener.parent().parent().children().hasClass('open') && dropdownOpener.parent().parent().parent().hasClass('edgtf-vertical-menu')) {
                            $(this).parent().parent().children().removeClass('open');
                            $(this).parent().parent().children().find(' > .second').slideUp(slideUpSpeed);

                            $(menuItem).addClass('open');
                            elementToExpand.slideDown(slideDownSpeed, function () {
                                resizeVerticalArea();
                            });
                        } else {

                            if (!$(this).parents('li').hasClass('open')) {
                                menuItems.removeClass('open');
                                menuItems.find(' > .second, > ul').slideUp(slideUpSpeed);
                            }

                            if ($(this).parent().parent().children().hasClass('open')) {
                                $(this).parent().parent().children().removeClass('open');
                                $(this).parent().parent().children().find(' > .second, > ul').slideUp(slideUpSpeed);
                            }

                            $(menuItem).addClass('open');
                            elementToExpand.slideDown(slideDownSpeed, function () {
                                resizeVerticalArea();
                            });
                        }
                    });
                });
            }
        };

        /**
         * Initializes scrolling in vertical area. It checks if vertical area is scrollable before doing so
         */
        var initVerticalAreaScroll = function () {
            if (verticalAreaScrollable()) {
                verticalMenuObject.niceScroll({
                    scrollspeed: 60,
                    mousescrollstep: 40,
                    cursorwidth: 0,
                    cursorborder: 0,
                    cursorborderradius: 0,
                    cursorcolor: "transparent",
                    autohidemode: false,
                    horizrailenabled: false
                });
            }
        };

        var initHiddenVerticalArea = function () {
            var verticalLogo = $('.edgtf-vertical-area-bottom-logo');
            var verticalMenuOpener = verticalMenuObject.find('.edgtf-vertical-area-opener');
            var scrollPosition = 0;

            verticalMenuOpener.on('click tap', function () {
                if (isVerticalAreaOpen()) {
                    closeVerticalArea();
                } else {
                    openVerticalArea();
                }
            });

            $(window).scroll(function () {
                if (Math.abs($(window).scrollTop() - scrollPosition) > 400) {
                    closeVerticalArea();
                }
            });

            /**
             * Closes vertical menu area by removing 'active' class on that element
             */
            function closeVerticalArea() {
                verticalMenuObject.removeClass('active');

                if (verticalLogo.length) {
                    verticalLogo.removeClass('active');
                }
            }

            /**
             * Opens vertical menu area by adding 'active' class on that element
             */
            function openVerticalArea() {
                verticalMenuObject.addClass('active');

                if (verticalLogo.length) {
                    verticalLogo.addClass('active');
                }
                scrollPosition = $(window).scrollTop();
            }

            function isVerticalAreaOpen() {
                return verticalMenuObject.hasClass('active');
            }
        };

        return {
            /**
             * Calls all necessary functionality for vertical menu area if vertical area object is valid
             */
            init: function () {
                if (verticalMenuObject.length) {
                    initNavigation();
                    initVerticalAreaScroll();

                    if (edgtf.body.hasClass('edgtf-header-vertical-closed')) {
                        initHiddenVerticalArea();
                    }
                }
            }
        };
    };

})(jQuery);
(function ($) {
    "use strict";

    var mobileHeader = {};
    edgtf.modules.mobileHeader = mobileHeader;

    mobileHeader.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitMobileNavigation();
        edgtfMobileHeaderBehavior();
    }

    function edgtfInitMobileNavigation() {
        var navigationOpener = $('.edgtf-mobile-header .edgtf-mobile-menu-opener'),
            navigationHolder = $('.edgtf-mobile-header .edgtf-mobile-nav'),
            dropdownOpener = $('.edgtf-mobile-nav .mobile_arrow, .edgtf-mobile-nav h6, .edgtf-mobile-nav a.edgtf-mobile-no-link');

        //whole mobile menu opening / closing
        if (navigationOpener.length && navigationHolder.length) {
            navigationOpener.on('tap click', function (e) {
                e.stopPropagation();
                e.preventDefault();

                if (navigationHolder.is(':visible')) {
                    navigationHolder.slideUp(450, 'easeInOutQuint');
                    navigationOpener.removeClass('edgtf-mobile-menu-opened');
                } else {
                    navigationHolder.slideDown(450, 'easeInOutQuint');
                    navigationOpener.addClass('edgtf-mobile-menu-opened');
                }
            });
        }

        //dropdown opening / closing
        if (dropdownOpener.length) {
            dropdownOpener.each(function () {
                $(this).on('tap click', function (e) {
                    var thisItem = $(this),
                        thisItemParent = thisItem.parent('li');

                    if (thisItemParent.hasClass('has_sub')) {
                        var submenu = thisItemParent.find('> ul.sub_menu');

                        if (submenu.is(':visible')) {
                            submenu.slideUp(450, 'easeInOutQuint');
                            thisItemParent.removeClass('edgtf-opened');
                        } else {
                            thisItemParent.addClass('open_sub');

                            if (dropdownOpener.length === 1) {
                                thisItemParent.removeClass('edgtf-opened').find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
                                    submenu.slideDown(400, 'easeInOutQuint');
                                });
                            } else {
                                thisItemParent.siblings().removeClass('edgtf-opened').find('.sub_menu').slideUp(400, 'easeInOutQuint', function () {
                                    submenu.slideDown(400, 'easeInOutQuint');
                                });
                            }
                        }
                    }
                });
            });
        }

        $('.edgtf-mobile-nav a, .edgtf-mobile-logo-wrapper a').on('click tap', function (e) {
            if ($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
                navigationHolder.slideUp(450, 'easeInOutQuint');
                navigationOpener.removeClass("edgtf-mobile-menu-opened");
            }
        });
    }

    function edgtfMobileHeaderBehavior() {
        var mobileHeader = $('.edgtf-mobile-header'),
            mobileMenuOpener = mobileHeader.find('.edgtf-mobile-menu-opener'),
            mobileHeaderHeight = mobileHeader.length ? mobileHeader.outerHeight() : 0;

        if (edgtf.body.hasClass('edgtf-content-is-behind-header') && mobileHeaderHeight > 0 && edgtf.windowWidth <= 1024) {
            $('.edgtf-content').css('marginTop', -mobileHeaderHeight);
        }

        if (edgtf.body.hasClass('edgtf-sticky-up-mobile-header')) {
            var stickyAppearAmount,
                adminBar = $('#wpadminbar');

            var docYScroll1 = $(document).scrollTop();
            stickyAppearAmount = mobileHeaderHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar;

            $(window).scroll(function () {
                var docYScroll2 = $(document).scrollTop();

                if (docYScroll2 > stickyAppearAmount) {
                    mobileHeader.addClass('edgtf-animate-mobile-header');
                } else {
                    mobileHeader.removeClass('edgtf-animate-mobile-header');
                }

                if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount && !mobileMenuOpener.hasClass('edgtf-mobile-menu-opened')) || (docYScroll2 < stickyAppearAmount)) {
                    mobileHeader.removeClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', 0);

                    if (adminBar.length) {
                        mobileHeader.find('.edgtf-mobile-header-inner').css('top', 0);
                    }
                } else {
                    mobileHeader.addClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', stickyAppearAmount);
                }

                docYScroll1 = $(document).scrollTop();
            });
        }
    }

})(jQuery);
(function ($) {
    "use strict";

    var stickyHeader = {};
    edgtf.modules.stickyHeader = stickyHeader;

    stickyHeader.isStickyVisible = false;
    stickyHeader.stickyAppearAmount = 0;
    stickyHeader.behaviour = '';

    stickyHeader.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        if (edgtf.windowWidth > 1024) {
            edgtfHeaderBehaviour();
        }
    }

    /*
     **	Show/Hide sticky header on window scroll
     */
    function edgtfHeaderBehaviour() {
        var header = $('.edgtf-page-header'),
            stickyHeader = $('.edgtf-sticky-header'),
            fixedHeaderWrapper = $('.edgtf-fixed-wrapper'),
            fixedMenuArea = fixedHeaderWrapper.children('.edgtf-menu-area'),
            fixedMenuAreaHeight = fixedMenuArea.outerHeight(),
            sliderHolder = $('.edgtf-slider'),
            revSliderHeight = sliderHolder.length ? sliderHolder.outerHeight() : 0,
            stickyAppearAmount,
            headerAppear;

        var headerMenuAreaOffset = fixedHeaderWrapper.length ? fixedHeaderWrapper.offset().top - edgtfGlobalVars.vars.edgtfAddForAdminBar : 0;

        switch (true) {
            // sticky header that will be shown when user scrolls up
            case edgtf.body.hasClass('edgtf-sticky-header-on-scroll-up'):
                edgtf.modules.stickyHeader.behaviour = 'edgtf-sticky-header-on-scroll-up';
                var docYScroll1 = $(document).scrollTop();
                stickyAppearAmount = parseInt(edgtfGlobalVars.vars.edgtfTopBarHeight) + parseInt(edgtfGlobalVars.vars.edgtfLogoAreaHeight) + parseInt(edgtfGlobalVars.vars.edgtfMenuAreaHeight) + parseInt(edgtfGlobalVars.vars.edgtfStickyHeaderHeight);

                headerAppear = function () {
                    var docYScroll2 = $(document).scrollTop();

                    if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                        edgtf.modules.stickyHeader.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.edgtf-main-menu .second').removeClass('edgtf-drop-down-start');
                        edgtf.body.removeClass('edgtf-sticky-header-appear');
                    } else {
                        edgtf.modules.stickyHeader.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                        edgtf.body.addClass('edgtf-sticky-header-appear');
                    }

                    docYScroll1 = $(document).scrollTop();
                };
                headerAppear();

                $(window).scroll(function () {
                    headerAppear();
                });

                break;

            // sticky header that will be shown when user scrolls both up and down
            case edgtf.body.hasClass('edgtf-sticky-header-on-scroll-down-up'):
                edgtf.modules.stickyHeader.behaviour = 'edgtf-sticky-header-on-scroll-down-up';

                if (edgtfPerPageVars.vars.edgtfStickyScrollAmount !== 0) {
                    edgtf.modules.stickyHeader.stickyAppearAmount = parseInt(edgtfPerPageVars.vars.edgtfStickyScrollAmount);
                } else {
                    edgtf.modules.stickyHeader.stickyAppearAmount = parseInt(edgtfGlobalVars.vars.edgtfTopBarHeight) + parseInt(edgtfGlobalVars.vars.edgtfLogoAreaHeight) + parseInt(edgtfGlobalVars.vars.edgtfMenuAreaHeight) + parseInt(revSliderHeight);
                }

                headerAppear = function () {
                    if (edgtf.scroll < edgtf.modules.stickyHeader.stickyAppearAmount) {
                        edgtf.modules.stickyHeader.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.edgtf-main-menu .second').removeClass('edgtf-drop-down-start');
                        edgtf.body.removeClass('edgtf-sticky-header-appear');
                    } else {
                        edgtf.modules.stickyHeader.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                        edgtf.body.addClass('edgtf-sticky-header-appear');
                    }
                };

                headerAppear();

                $(window).scroll(function () {
                    headerAppear();
                });

                break;

            // on scroll down, part of header will be sticky
            case edgtf.body.hasClass('edgtf-fixed-on-scroll'):
                edgtf.modules.stickyHeader.behaviour = 'edgtf-fixed-on-scroll';
                var headerFixed = function () {

                    if (edgtf.scroll <= headerMenuAreaOffset) {
                        fixedHeaderWrapper.removeClass('fixed');
                        edgtf.body.removeClass('edgtf-fixed-header-appear');
                        fixedMenuArea.css({'height': fixedMenuAreaHeight + 'px'});
                        header.css('margin-bottom', '0');
                    } else {
                        fixedHeaderWrapper.addClass('fixed');
                        edgtf.body.addClass('edgtf-fixed-header-appear');
                        fixedMenuArea.css({'height': (fixedMenuAreaHeight - 30) + 'px'});
                        header.css('margin-bottom', (fixedMenuAreaHeight - 30) + 'px');
                    }
                };

                headerFixed();

                $(window).scroll(function () {
                    headerFixed();
                });

                break;
        }
    }

})(jQuery);
(function ($) {
    "use strict";

    var header = {};
    edgtf.modules.header = header;

    header.edgtfSetDropDownMenuPosition = edgtfSetDropDownMenuPosition;
    header.edgtfSetDropDownWideMenuPosition = edgtfSetDropDownWideMenuPosition;

    header.edgtfOnDocumentReady = edgtfOnDocumentReady;
    header.edgtfOnWindowLoad = edgtfOnWindowLoad;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfSetDropDownMenuPosition();
        edgtfDropDownMenu();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfSetDropDownWideMenuPosition();
    }

    /**
     * Set dropdown position
     */
    function edgtfSetDropDownMenuPosition() {
        var menuItems = $('.edgtf-drop-down > ul > li.narrow.menu-item-has-children');

        if (menuItems.length) {
            menuItems.each(function (i) {
                var thisItem = $(this),
                    menuItemPosition = thisItem.offset().left,
                    dropdownHolder = thisItem.find('.second'),
                    dropdownMenuItem = dropdownHolder.find('.inner ul'),
                    dropdownMenuWidth = dropdownMenuItem.outerWidth(),
                    menuItemFromLeft = edgtf.windowWidth - menuItemPosition;

                if (edgtf.body.hasClass('edgtf-boxed')) {
                    menuItemFromLeft = edgtf.boxedLayoutWidth - (menuItemPosition - (edgtf.windowWidth - edgtf.boxedLayoutWidth ) / 2);
                }

                var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

                if (thisItem.find('li.sub').length > 0) {
                    dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
                }

                dropdownHolder.removeClass('right');
                dropdownMenuItem.removeClass('right');
                if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
                    dropdownHolder.addClass('right');
                    dropdownMenuItem.addClass('right');
                }
            });
        }
    }

    /**
     * Set dropdown wide position
     */
    function edgtfSetDropDownWideMenuPosition() {
        var menuItems = $(".edgtf-drop-down > ul > li.wide");

        if (menuItems.length) {
            menuItems.each(function (i) {
                var menuItemSubMenu = $(menuItems[i]).find('.second');

                if (menuItemSubMenu.length && !menuItemSubMenu.hasClass('left_position') && !menuItemSubMenu.hasClass('right_position')) {
                    menuItemSubMenu.css('left', 0);

                    var left_position = menuItemSubMenu.offset().left;

                    if (edgtf.body.hasClass('edgtf-boxed')) {
                        var boxedWidth = $('.edgtf-boxed .edgtf-wrapper .edgtf-wrapper-inner').outerWidth();
                        left_position = left_position - (edgtf.windowWidth - boxedWidth) / 2;

                        menuItemSubMenu.css('left', -left_position);
                        menuItemSubMenu.css('width', boxedWidth);
                    } else {
                        menuItemSubMenu.css('left', -left_position);
                        menuItemSubMenu.css('width', edgtf.windowWidth);
                    }
                }
            });
        }
    }

    function edgtfDropDownMenu() {
        var menu_items = $('.edgtf-drop-down > ul > li');

        menu_items.each(function (i) {
            if ($(menu_items[i]).find('.second').length > 0) {
                var thisItem = $(menu_items[i]),
                    dropDownSecondDiv = thisItem.find('.second');

                if (thisItem.hasClass('wide')) {
                    //set columns to be same height - start
                    var tallest = 0,
                        dropDownSecondItem = $(this).find('.second > .inner > ul > li');

                    dropDownSecondItem.each(function () {
                        var thisHeight = $(this).height();
                        if (thisHeight > tallest) {
                            tallest = thisHeight;
                        }
                    });

                    dropDownSecondItem.css('height', ''); // delete old inline css - via resize
                    dropDownSecondItem.height(tallest);
                    //set columns to be same height - end
                }

                if (!edgtf.menuDropdownHeightSet) {
                    thisItem.data('original_height', dropDownSecondDiv.height() + 'px');
                    dropDownSecondDiv.height(0);
                }

                if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
                    thisItem.on("touchstart mouseenter", function () {
                        dropDownSecondDiv.css({
                            'height': thisItem.data('original_height'),
                            'overflow': 'visible',
                            'visibility': 'visible',
                            'opacity': '1'
                        });
                    }).on("mouseleave", function () {
                        dropDownSecondDiv.css({
                            'height': '0px',
                            'overflow': 'hidden',
                            'visibility': 'hidden',
                            'opacity': '0'
                        });
                    });
                } else {
                    if (edgtf.body.hasClass('edgtf-dropdown-animate-height')) {

                        var config = {
                            interval: 0,
                            over: function () {
                                setTimeout(function () {
                                    dropDownSecondDiv.css({
                                        'visibility': 'visible',
                                        'height': '0px',
                                        'opacity': '0'
                                    });
                                    dropDownSecondDiv.stop().animate({
                                        'height': thisItem.data('original_height'),
                                        opacity: 1
                                    }, 300, function () {
                                        dropDownSecondDiv.css('overflow', 'visible');
                                    });
                                }, 150);
                            },
                            timeout: 150,
                            out: function () {
                                dropDownSecondDiv.stop().animate({
                                    'height': '0px'
                                }, 150, function () {
                                    dropDownSecondDiv.css({
                                        'overflow': 'hidden',
                                        'visibility': 'hidden'
                                    });
                                });
                            }
                        };
                        thisItem.hoverIntent(config);

                    } else {
                        var config = {
                            interval: 0,
                            over: function () {
                                setTimeout(function () {
                                    dropDownSecondDiv.addClass('edgtf-drop-down-start');
                                    dropDownSecondDiv.stop().css({'height': thisItem.data('original_height')});
                                }, 150);
                            },
                            timeout: 150,
                            out: function () {
                                dropDownSecondDiv.stop().css({'height': '0px'});
                                dropDownSecondDiv.removeClass('edgtf-drop-down-start');
                            }
                        };
                        thisItem.hoverIntent(config);
                    }
                }
            }
        });

        $('.edgtf-drop-down ul li.wide ul li a').on('click', function (e) {
            if (e.which == 1) {
                var $this = $(this);
                setTimeout(function () {
                    $this.mouseleave();
                }, 500);
            }
        });

        edgtf.menuDropdownHeightSet = true;
    }

})(jQuery);
(function ($) {
    "use strict";

    var sidearea = {};
    edgtf.modules.sidearea = sidearea;

    sidearea.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfSideArea();
        edgtfSideAreaScroll();
    }

    /**
     * Show/hide side area
     */
    function edgtfSideArea() {
        var wrapper = $('.edgtf-wrapper'),
            sideMenuButtonOpen = $('a.edgtf-side-menu-button-opener'),
            cssClass = 'edgtf-right-side-menu-opened';

        wrapper.prepend('<div class="edgtf-cover"/>');

        $('a.edgtf-side-menu-button-opener, a.edgtf-close-side-menu').on('click', function (e) {
            e.preventDefault();

            if (!sideMenuButtonOpen.hasClass('opened')) {
                sideMenuButtonOpen.addClass('opened');
                edgtf.body.addClass(cssClass);

                $('.edgtf-wrapper .edgtf-cover').on('click', function () {
                    edgtf.body.removeClass('edgtf-right-side-menu-opened');
                    sideMenuButtonOpen.removeClass('opened');
                });

                var currentScroll = $(window).scrollTop();
                $(window).scroll(function () {
                    if (Math.abs(edgtf.scroll - currentScroll) > 400) {
                        edgtf.body.removeClass(cssClass);
                        sideMenuButtonOpen.removeClass('opened');
                    }
                });
            } else {
                sideMenuButtonOpen.removeClass('opened');
                edgtf.body.removeClass(cssClass);
            }
        });
    }

    /*
     **  Smooth scroll functionality for Side Area
     */
    function edgtfSideAreaScroll() {
        var sideMenu = $('.edgtf-side-menu');

        if (sideMenu.length) {
            sideMenu.niceScroll({
                scrollspeed: 60,
                mousescrollstep: 40,
                cursorwidth: 0,
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false,
                horizrailenabled: false
            });
        }
    }

})(jQuery);

(function ($) {
    "use strict";

    var title = {};
    edgtf.modules.title = title;

    title.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfParallaxTitle();
    }

    /*
     **	Title image with parallax effect
     */
    function edgtfParallaxTitle() {
        var parallaxBackground = $('.edgtf-title-holder.edgtf-bg-parallax');

        if (parallaxBackground.length > 0 && edgtf.windowWidth > 1024) {
            var parallaxBackgroundWithZoomOut = parallaxBackground.hasClass('edgtf-bg-parallax-zoom-out'),
                titleHeight = parseInt(parallaxBackground.data('height')),
                imageWidth = parseInt(parallaxBackground.data('background-width')),
                parallaxRate = titleHeight / 10000 * 7,
                parallaxYPos = -(edgtf.scroll * parallaxRate),
                adminBarHeight = edgtfGlobalVars.vars.edgtfAddForAdminBar;

            parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});

            if (parallaxBackgroundWithZoomOut) {
                parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - edgtf.scroll + 'px auto'});
            }

            //set position of background on window scroll
            $(window).scroll(function () {
                parallaxYPos = -(edgtf.scroll * parallaxRate);
                parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});

                if (parallaxBackgroundWithZoomOut) {
                    parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - edgtf.scroll + 'px auto'});
                }
            });
        }
    }

})(jQuery);

(function ($) {
    'use strict';

    var woocommerce = {};
    edgtf.modules.woocommerce = woocommerce;

    woocommerce.edgtfOnDocumentReady = edgtfOnDocumentReady;
    woocommerce.edgtfOnWindowLoad = edgtfOnWindowLoad;
    woocommerce.edgtfOnWindowResize = edgtfOnWindowResize;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitQuantityButtons();
        edgtfInitSelect2();
        edgtfInitSingleProductLightbox();
        edgtfInitChangeWooTags();
        edgtfWooBtns();
    }

    /* 
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitProductListMasonryShortcode();
    }

    /* 
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtfInitProductListMasonryShortcode();
    }

    /*
     ** Init quantity buttons to increase/decrease products for cart
     */
    function edgtfInitQuantityButtons() {
        $(document).on('click', '.edgtf-quantity-minus, .edgtf-quantity-plus', function (e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.edgtf-quantity-input'),
                step = parseFloat(inputField.data('step')),
                max = parseFloat(inputField.data('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('edgtf-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if (max === undefined) {
                    inputField.val(newInputValue);
                } else {
                    if (newInputValue >= max) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger('change');
        });
    }

    /*
     ** Init select2 script for select html dropdowns
     */
    function edgtfInitSelect2() {
        var orderByDropDown = $('.woocommerce-ordering .orderby');
        if (orderByDropDown.length) {
            orderByDropDown.select2({
                minimumResultsForSearch: Infinity
            });
        }

        var variableProducts = $('.edgtf-woocommerce-page .edgtf-content .variations td.value select');
        if (variableProducts.length) {
            variableProducts.select2();
        }

        var shippingCountryCalc = $('#calc_shipping_country');
        if (shippingCountryCalc.length) {
            shippingCountryCalc.select2();
        }

        var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
        if (shippingStateCalc.length) {
            shippingStateCalc.select2();
        }
    }

    /*
     ** Init Product Single Pretty Photo attributes
     */
    function edgtfInitSingleProductLightbox() {
        var item = $('.edgtf-woo-single-page.edgtf-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');

        if (item.length) {
            item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');

            if (typeof edgtf.modules.common.edgtfPrettyPhoto === "function") {
                edgtf.modules.common.edgtfPrettyPhoto();
            }
        }
    }

    /*
     ** Init Product List Masonry Shortcode Layout
     */
    function edgtfInitProductListMasonryShortcode() {
        var container = $('.edgtf-pl-holder.edgtf-masonry-layout .edgtf-pl-outer');

        if (container.length) {
            container.each(function () {
                var gallery = $(this),
                    gallerySizer = gallery.children('.edgtf-pl-sizer');

                resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

                gallery.waitForImages(function () {
                    gallery.animate({opacity: 1});

                    gallery.isotope({
                        layoutMode: 'packery',
                        itemSelector: '.edgtf-pli',
                        percentPosition: true,
                        //resizable: false,
                        packery: {
                            gutter: '.edgtf-pl-gutter',
                            columnWidth: '.edgtf-pl-sizer',
                        }
                    });

                    setTimeout(function () {
                        if (typeof edgtf.modules.common.edgtfInitParallax === "function") {
                            edgtf.modules.common.edgtfInitParallax();
                        }
                    }, 1000);

                    //thisContainer.isotope('layout').css('opacity', 1);

                    $(window).resize(function () {
                        resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

                        gallery.isotope('reloadItems');
                    });
                });
            });
        }
    }

    function resizeMasonryGallery(size, holder) {
        var rectangle_portrait = holder.find('.edgtf-woo-image-portrait'),
            rectangle_landscape = holder.find('.edgtf-woo-image-landscape'),
            square_big = holder.find('.edgtf-woo-image-big-square'),
            square_small = holder.find('.edgtf-woo-image-small-square'),
            margin = 0;

        if (holder.parent().hasClass('edgtf-huge-space')) {
            margin = 80;
        } else if (holder.parent().hasClass('edgtf-large-space')) {
            margin = 50;
        } else if (holder.parent().hasClass('edgtf-medium-space')) {
            margin = 40;
        } else if (holder.parent().hasClass('edgtf-normal-space')) {
            margin = 30;
        } else if (holder.parent().hasClass('edgtf-small-space')) {
            margin = 20;
        } else if (holder.parent().hasClass('edgtf-tiny-space')) {
            margin = 10;
        }

        // portrait
        rectangle_portrait.css('height', (2 * size) - margin);

        // landscape
        if (window.innerWidth <= 680) {
            rectangle_landscape.css('height', size / 2);
        } else {
            rectangle_landscape.css('height', size - margin);
        }

        // large square
        if (window.innerWidth <= 680) {
            square_big.css('height', square_big.width());
        }
        else {
            square_big.css('height', (2 * size) - margin);
        }

        // small square
        square_small.css('height', size - margin);

        console.log('final 2: ' + margin);
    }

    /*
     ** change title tag for related and upsell qproducts via js, to avoid woo template changes
     */
    function edgtfInitChangeWooTags() {
        var tags = $(
            '.related.products,' +
            '.upsells.products,' +
            '.edgtf-woocommerce-page.woocommerce-account .vc_row .woocommerce,' +
            '.edgtf-woocommerce-page .cart-collaterals .cart_totals'
        ).find('h2');

        if (tags.length) {
            tags.each(function () {
                $(this).replaceWith('<h3>' + $(this).html() + '</h3>');
            });
        }

        $('.edgtf-woocommerce-page .cart-empty').replaceWith('<h3 class="cart-empty">' + $('.edgtf-woocommerce-page .cart-empty').html() + '</h3>');
    }

    /*
     * Restructure woocommerce button html for hover effect
     */
    function edgtfWooBtns() {
        var wooBtns = $('.edgtf-pli-add-to-cart > a, \
                        .single_add_to_cart_button, \
                        .add_to_cart_button');

        if (wooBtns.length) {
            wooBtns.each(function () {
                var btn = $(this).addClass('edgtf-btn-plus-sign edgtf-btn-with-cover-fx edgtf-btn'),
                    btnText = btn.text();

                btn.html('<span class="edgtf-btn-text">' + btnText + '</span> \
                            <span class="edgtf-btn-cover"> \
                                <span class="edgtf-btn-text edgtf-btn-cover-text"><span>' + btnText + '</span></span> \
                                <span class="edgtf-btn-cover-bgrnd"></span> \
                            </span>');
            });
        }
    }
})(jQuery);
(function ($) {
    'use strict';

    var accordions = {};
    edgtf.modules.accordions = accordions;

    accordions.edgtfInitAccordions = edgtfInitAccordions;


    accordions.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitAccordions();
    }

    /**
     * Init accordions shortcode
     */
    function edgtfInitAccordions() {
        var accordion = $('.edgtf-accordion-holder');

        if (accordion.length) {
            accordion.each(function () {
                var thisAccordion = $(this);

                if (thisAccordion.hasClass('edgtf-accordion')) {
                    thisAccordion.accordion({
                        animate: "swing",
                        collapsible: true,
                        active: 0,
                        icons: "",
                        heightStyle: "content"
                    });
                }

                if (thisAccordion.hasClass('edgtf-toggle')) {
                    var toggleAccordion = $(this),
                        toggleAccordionTitle = toggleAccordion.find('.edgtf-accordion-title'),
                        toggleAccordionContent = toggleAccordionTitle.next();

                    toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
                    toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
                    toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

                    toggleAccordionTitle.each(function () {
                        var thisTitle = $(this);

                        thisTitle.on('mouseenter mouseleave',function () {
                            thisTitle.toggleClass("ui-state-hover");
                        });

                        thisTitle.on('click', function () {
                            thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
                            thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
                        });
                    });
                }
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var animationHolder = {};
    edgtf.modules.animationHolder = animationHolder;

    animationHolder.edgtfInitAnimationHolder = edgtfInitAnimationHolder;


    animationHolder.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitAnimationHolder();
    }

    /*
     *	Init animation holder shortcode
     */
    function edgtfInitAnimationHolder() {
        var elements = $('.edgtf-grow-in, .edgtf-fade-in-down, .edgtf-element-from-fade, .edgtf-element-from-left, .edgtf-element-from-right, .edgtf-element-from-top, .edgtf-element-from-bottom, .edgtf-flip-in, .edgtf-x-rotate, .edgtf-z-rotate, .edgtf-y-translate, .edgtf-fade-in, .edgtf-fade-in-left-x-rotate'),
            animationClass,
            animationData,
            animationDelay;

        if (elements.length) {
            elements.each(function () {
                var thisElement = $(this);

                thisElement.appear(function () {
                    animationData = thisElement.data('animation');
                    animationDelay = parseInt(thisElement.data('animation-delay'));

                    if (typeof animationData !== 'undefined' && animationData !== '') {
                        animationClass = animationData;
                        var newClass = animationClass + '-on';

                        setTimeout(function () {
                            thisElement.addClass(newClass);
                        }, animationDelay);
                    }
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var backgroundSubtitle = {};
    edgtf.modules.backgroundSubtitle = backgroundSubtitle;

    backgroundSubtitle.edgtfInitBackgroundSubtitle = edgtfInitBackgroundSubtitle;
    backgroundSubtitle.edgtfBackgroundSubtitleAnimation = edgtfBackgroundSubtitleAnimation;


    backgroundSubtitle.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitBackgroundSubtitle();
        edgtfBackgroundSubtitleAnimation();
    }

    function edgtfInitBackgroundSubtitle() {
        var holder = $('.edgtf-background-subtitle');

        if (holder.length) {
            holder.each(function () {
                var fontSize = '',
                    horizontalOffset = '',
                    verticalOffset = '',
                    selector = '',
                    customStyle = '',
                    style = '';

                if (typeof $(this).data('font-size') !== 'undefined') {
                    fontSize = $(this).data('font-size');
                }

                if (typeof $(this).data('horizontal-offset') !== 'undefined') {
                    horizontalOffset = $(this).data('horizontal-offset');
                }

                if (typeof $(this).data('vertical-offset') !== 'undefined') {
                    verticalOffset = $(this).data('vertical-offset');
                }

                if (fontSize.length || horizontalOffset.length || verticalOffset.length) {
                    selector = '#' + $(this).attr('id');

                    console.log(selector);

                    if (fontSize.length) {
                        customStyle += 'font-size:' + fontSize + '!important;';
                    }

                    if (horizontalOffset.length) {
                        customStyle += 'left:' + horizontalOffset + '!important;';
                    }

                    if (verticalOffset.length) {
                        customStyle += 'top:' + verticalOffset + '!important;';
                    }
                }

                if (customStyle.length) {
                    style = '<style type="text/css">@media(max-width:1280px){' + selector + '{' + customStyle + '}}</style>';
                }

                if (style.length) {
                    $('head').append(style);
                }
            });
        }
    }

    function edgtfBackgroundSubtitleAnimation() {
        var subtitles = $('.edgtf-background-subtitle.edgtf-animate');

        if (subtitles.length && !edgtf.htmlEl.hasClass('touch')) {
            subtitles.each(function () {
                var subtitle = $(this),
                    holder = subtitle.parent();

                holder.appear(function () {
                    subtitle.addClass('edgtf-appeared');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }
    };

})(jQuery);
(function ($) {
    'use strict';

    var banner = {};
    edgtf.modules.banner = banner;

    banner.edgtfInitBanner = edgtfInitBanner;


    banner.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);
    $(window).resize(edgtfOnWindowResize);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitBanner();
        edgtfInitBannerTextAnimation();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtfInitBanner();
    }

    /*
     **	Init Banner Shortcode
     */
    function edgtfInitBanner() {
        var banners = $('.edgtf-banner-holder');

        if (banners.length) {
            banners.each(function () {
                var bannerHolder = $(this),
                    banner = $(this).find('.edgtf-banner'),
                    content = $(this).find('.edgtf-banner-content'),
                    button = $(this).find('.edgtf-banner-button'),
                    margin = 0;

                // fetch height if banner content exists
                if (content.length) {
                    // if banner has class 'with image', use content and button for calculation
                    if (bannerHolder.hasClass('edgtf-with-image')) {
                        // fetch content height
                        margin += parseInt(content.innerHeight());

                        // if button exist, fetch its height as well
                        if (button.length) {
                            margin += parseInt(button.innerHeight());
                        }
                    }
                    // else use only button for calculation
                    else {
                        // fetch button height
                        if (button.length) {
                            margin += parseInt(button.innerHeight());
                        }
                    }

                    // set half of calculated height as banner bottom margin
                    banner.css('margin-bottom', margin / 2);

                    if(bannerHolder.hasClass("edgtf-enable-appear-animation")){
                        bannerHolder.addClass('edgtf-banner-appear');

                        bannerHolder.appear(function(){
                            bannerHolder.addClass('edgtf-banner-appeared');
                        });
                    }
                }
            });
        }
    }

    /*
    ** Appear animation
    */
    function edgtfInitBannerTextAnimation() {
        var banners = $('.edgtf-banner-title > em').closest('.edgtf-banner');

        if (banners.length && !edgtf.htmlEl.hasClass('touch')) {
            var delay = 250;

            banners.each(function() {
                var banner = $(this),
                    animatedTxtElements = banner.find('.edgtf-banner-title > em').addClass('edgtf-animate-text');

                animatedTxtElements.each(function(i){
                    var txtElement = $(this);

                    txtElement.wrap( "<span class='edgtf-animate-text-holder'></span>" );

                    banner.appear(function(){
                        setTimeout(function(){
                            txtElement.addClass('edgtf-appeared');
                        }, i*delay);
                    });
                });
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var button = {};
    edgtf.modules.button = button;

    button.edgtfButton = edgtfButton;


    button.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfButton().init();
    }

    /**
     * Button object that initializes whole button functionality
     * @type {Function}
     */
    var edgtfButton = function () {
        //all buttons on the page
        var buttons = $('.edgtf-btn');

        /**
         * Initializes button hover color
         * @param button current button
         */
        var buttonHoverColor = function (button) {
            if (typeof button.data('hover-color') !== 'undefined') {
                var changeButtonColor = function (event) {
                    event.data.button.css('color', event.data.color);
                };

                var originalColor = button.css('color');
                var hoverColor = button.data('hover-color');

                button.on('mouseenter', {button: button, color: hoverColor}, changeButtonColor);
                button.on('mouseleave', {button: button, color: originalColor}, changeButtonColor);
            }
        };

        /**
         * Initializes button hover background color
         * @param button current button
         */
        var buttonHoverBgColor = function (button) {
            if (typeof button.data('hover-bg-color') !== 'undefined') {
                var changeButtonBg = function (event) {
                    event.data.button.css('background-color', event.data.color);
                };

                var originalBgColor = button.css('background-color');
                var hoverBgColor = button.data('hover-bg-color');

                button.on('mouseenter', {button: button, color: hoverBgColor}, changeButtonBg);
                button.on('mouseleave', {button: button, color: originalBgColor}, changeButtonBg);
            }
        };

        /**
         * Initializes button border color
         * @param button
         */
        var buttonHoverBorderColor = function (button) {
            if (typeof button.data('hover-border-color') !== 'undefined') {
                var changeBorderColor = function (event) {
                    event.data.button.css('border-color', event.data.color);
                };

                var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
                var hoverBorderColor = button.data('hover-border-color');

                button.on('mouseenter', {button: button, color: hoverBorderColor}, changeBorderColor);
                button.on('mouseleave', {button: button, color: originalBorderColor}, changeBorderColor);
            }
        };

        /**
         * Sets button width to integer value
         * @param button
         */
        var buttonFixWidth = function(button) {
            button.css('width', Math.round(button.outerWidth() + 1));
        }

        return {
            init: function () {
                if (buttons.length) {
                    buttons.not('.edgtf-btn-with-cover-fx').each(function () {
                        buttonHoverColor($(this));
                        buttonHoverBgColor($(this));
                        buttonHoverBorderColor($(this));
                    });
                    buttons.filter('.edgtf-btn-with-cover-fx').each(function(){
                        buttonFixWidth($(this));
                    });
                }
            }
        };
    };

})(jQuery);
(function ($) {
    'use strict';

    var counter = {};
    edgtf.modules.counter = counter;

    counter.edgtfInitCounter = edgtfInitCounter;


    counter.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitCounter();
    }

    /**
     * Counter Shortcode
     */
    function edgtfInitCounter() {
        var counterHolder = $('.edgtf-counter-holder');

        if (counterHolder.length) {
            counterHolder.each(function () {
                var thisCounterHolder = $(this),
                    thisCounter = thisCounterHolder.find('.edgtf-counter');

                thisCounterHolder.appear(function () {
                    thisCounterHolder.css('opacity', '1');

                    //Counter zero type
                    if (thisCounter.hasClass('edgtf-zero-counter')) {
                        var max = parseFloat(thisCounter.text());
                        thisCounter.countTo({
                            from: 0,
                            to: max,
                            speed: 1500,
                            refreshInterval: 100
                        });
                    } else {
                        thisCounter.absoluteCounter({
                            speed: 2000,
                            fadeInDelay: 1000
                        });
                    }
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var customFont = {};
    edgtf.modules.customFont = customFont;

    customFont.edgtfCustomFontResize = edgtfCustomFontResize;
    customFont.edgtfCustomFontTypeOut = edgtfCustomFontTypeOut;


    customFont.edgtfOnDocumentReady = edgtfOnDocumentReady;
    customFont.edgtfOnWindowLoad = edgtfOnWindowLoad;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfCustomFontResize();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfCustomFontTypeOut();
    }

    /*
     **	Custom Font resizing style
     */
    function edgtfCustomFontResize() {
        var holder = $('.edgtf-custom-font-holder');

        if (holder.length) {
            holder.each(function () {
                var thisItem = $(this),
                    itemClass = '',
                    smallLaptopStyle = '',
                    ipadLandscapeStyle = '',
                    ipadPortraitStyle = '',
                    mobileLandscapeStyle = '',
                    style = '',
                    responsiveStyle = '';

                if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
                    itemClass = thisItem.data('item-class');
                }

                if (typeof thisItem.data('font-size-1280') !== 'undefined' && thisItem.data('font-size-1280') !== false) {
                    smallLaptopStyle += 'font-size: ' + thisItem.data('font-size-1280') + ' !important;';
                }
                if (typeof thisItem.data('font-size-1024') !== 'undefined' && thisItem.data('font-size-1024') !== false) {
                    ipadLandscapeStyle += 'font-size: ' + thisItem.data('font-size-1024') + ' !important;';
                }
                if (typeof thisItem.data('font-size-768') !== 'undefined' && thisItem.data('font-size-768') !== false) {
                    ipadPortraitStyle += 'font-size: ' + thisItem.data('font-size-768') + ' !important;';
                }
                if (typeof thisItem.data('font-size-680') !== 'undefined' && thisItem.data('font-size-680') !== false) {
                    mobileLandscapeStyle += 'font-size: ' + thisItem.data('font-size-680') + ' !important;';
                }

                if (typeof thisItem.data('line-height-1280') !== 'undefined' && thisItem.data('line-height-1280') !== false) {
                    smallLaptopStyle += 'line-height: ' + thisItem.data('line-height-1280') + ' !important;';
                }
                if (typeof thisItem.data('line-height-1024') !== 'undefined' && thisItem.data('line-height-1024') !== false) {
                    ipadLandscapeStyle += 'line-height: ' + thisItem.data('line-height-1024') + ' !important;';
                }
                if (typeof thisItem.data('line-height-768') !== 'undefined' && thisItem.data('line-height-768') !== false) {
                    ipadPortraitStyle += 'line-height: ' + thisItem.data('line-height-768') + ' !important;';
                }
                if (typeof thisItem.data('line-height-680') !== 'undefined' && thisItem.data('line-height-680') !== false) {
                    mobileLandscapeStyle += 'line-height: ' + thisItem.data('line-height-680') + ' !important;';
                }

                if (smallLaptopStyle.length || ipadLandscapeStyle.length || ipadPortraitStyle.length || mobileLandscapeStyle.length) {

                    if (smallLaptopStyle.length) {
                        responsiveStyle += "@media only screen and (max-width: 1280px) {.edgtf-custom-font-holder." + itemClass + " { " + smallLaptopStyle + " } }";
                    }
                    if (ipadLandscapeStyle.length) {
                        responsiveStyle += "@media only screen and (max-width: 1024px) {.edgtf-custom-font-holder." + itemClass + " { " + ipadLandscapeStyle + " } }";
                    }
                    if (ipadPortraitStyle.length) {
                        responsiveStyle += "@media only screen and (max-width: 768px) {.edgtf-custom-font-holder." + itemClass + " { " + ipadPortraitStyle + " } }";
                    }
                    if (mobileLandscapeStyle.length) {
                        responsiveStyle += "@media only screen and (max-width: 680px) {.edgtf-custom-font-holder." + itemClass + " { " + mobileLandscapeStyle + " } }";
                    }
                }

                if (responsiveStyle.length) {
                    style = '<style type="text/css">' + responsiveStyle + '</style>';
                }

                if (style.length) {
                    $('head').append(style);
                }
            });
        }
    }

    /*
     * Init Type out functionality for Custom Font shortcode
     */
    function edgtfCustomFontTypeOut() {
        var edgtfTyped = $('.edgtf-cf-typed');

        if (edgtfTyped.length) {
            edgtfTyped.each(function () {

                //vars
                var thisTyped = $(this),
                    typedWrap = thisTyped.parent('.edgtf-cf-typed-wrap'),
                    customFontHolder = typedWrap.parent('.edgtf-custom-font-holder'),
                    str = [],
                    string_1 = thisTyped.find('.edgtf-cf-typed-1').text(),
                    string_2 = thisTyped.find('.edgtf-cf-typed-2').text(),
                    string_3 = thisTyped.find('.edgtf-cf-typed-3').text(),
                    string_4 = thisTyped.find('.edgtf-cf-typed-4').text();

                if (string_1.length) {
                    str.push(string_1);
                }

                if (string_2.length) {
                    str.push(string_2);
                }

                if (string_3.length) {
                    str.push(string_3);
                }

                if (string_4.length) {
                    str.push(string_4);
                }

                customFontHolder.appear(function () {
                    thisTyped.typed({
                        strings: str,
                        typeSpeed: 90,
                        backDelay: 700,
                        loop: true,
                        contentType: 'text',
                        loopCount: false,
                        cursorChar: '_'
                    });
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var elementsHolder = {};
    edgtf.modules.elementsHolder = elementsHolder;

    elementsHolder.edgtfInitElementsHolderResponsiveStyle = edgtfInitElementsHolderResponsiveStyle;


    elementsHolder.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitElementsHolderResponsiveStyle();
    }

    /*
     **	Elements Holder responsive style
     */
    function edgtfInitElementsHolderResponsiveStyle() {
        var elementsHolder = $('.edgtf-elements-holder');

        if (elementsHolder.length) {
            elementsHolder.each(function () {
                var thisElementsHolder = $(this),
                    elementsHolderItem = thisElementsHolder.children('.edgtf-eh-item'),
                    style = '',
                    responsiveStyle = '';

                elementsHolderItem.each(function () {
                    var thisItem = $(this),
                        itemClass = '',
                        largeLaptop = '',
                        smallLaptop = '',
                        ipadLandscape = '',
                        ipadPortrait = '',
                        mobileLandscape = '',
                        mobilePortrait = '';

                    if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
                        itemClass = thisItem.data('item-class');
                    }
                    if (typeof thisItem.data('1280-1600') !== 'undefined' && thisItem.data('1280-1600') !== false) {
                        largeLaptop = thisItem.data('1280-1600');
                    }
                    if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
                        smallLaptop = thisItem.data('1024-1280');
                    }
                    if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
                        ipadLandscape = thisItem.data('768-1024');
                    }
                    if (typeof thisItem.data('680-768') !== 'undefined' && thisItem.data('680-768') !== false) {
                        ipadPortrait = thisItem.data('680-768');
                    }
                    if (typeof thisItem.data('680') !== 'undefined' && thisItem.data('680') !== false) {
                        mobileLandscape = thisItem.data('680');
                    }

                    if (largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

                        if (largeLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1281px) and (max-width: 1600px) {.edgtf-eh-item-content." + itemClass + " { padding: " + largeLaptop + " !important; } }";
                        }
                        if (smallLaptop.length) {
                            responsiveStyle += "@media only screen and (min-width: 1025px) and (max-width: 1280px) {.edgtf-eh-item-content." + itemClass + " { padding: " + smallLaptop + " !important; } }";
                        }
                        if (ipadLandscape.length) {
                            responsiveStyle += "@media only screen and (min-width: 769px) and (max-width: 1024px) {.edgtf-eh-item-content." + itemClass + " { padding: " + ipadLandscape + " !important; } }";
                        }
                        if (ipadPortrait.length) {
                            responsiveStyle += "@media only screen and (min-width: 681px) and (max-width: 768px) {.edgtf-eh-item-content." + itemClass + " { padding: " + ipadPortrait + " !important; } }";
                        }
                        if (mobileLandscape.length) {
                            responsiveStyle += "@media only screen and (max-width: 680px) {.edgtf-eh-item-content." + itemClass + " { padding: " + mobileLandscape + " !important; } }";
                        }
                    }
                });

                if (responsiveStyle.length) {
                    style = '<style type="text/css">' + responsiveStyle + '</style>';
                }

                if (style.length) {
                    $('head').append(style);
                }

                if (typeof edgtf.modules.common.edgtfOwlSlider === "function") {
                    edgtf.modules.common.edgtfOwlSlider();
                }
            });
        }
    }

})(jQuery);
(function($) {
	'use strict';
	
	var fullScreenSections = {};
	edgtf.modules.fullScreenSections = fullScreenSections;
	
	fullScreenSections.edgtfInitFullScreenSections = edgtfInitFullScreenSections;
	
	
	fullScreenSections.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitFullScreenSections();
	}
	
	/*
	 **	Init full screen sections shortcode
	 */
	function edgtfInitFullScreenSections(){
		var fullScreenSections = $('.edgtf-full-screen-sections');
		
		if(fullScreenSections.length){
			fullScreenSections.each(function() {
				var thisFullScreenSections = $(this),
					fullScreenSectionsWrapper = thisFullScreenSections.children('.edgtf-fss-wrapper'),
					fullScreenSectionsItems = fullScreenSectionsWrapper.children('.edgtf-fss-item'),
					fullScreenSectionsItemsNumber = fullScreenSectionsItems.length,
					fullScreenSectionsItemsHasHeaderStyle = fullScreenSectionsItems.hasClass('edgtf-fss-item-has-style'),
					enableContinuousVertical = false,
					enableNavigationData = '',
					enablePaginationData = '';
				
				var defaultHeaderStyle = '';
				if (edgtf.body.hasClass('edgtf-light-header')) {
					defaultHeaderStyle = 'light';
				} else if (edgtf.body.hasClass('edgtf-dark-header')) {
					defaultHeaderStyle = 'dark';
				}
				
				if (typeof thisFullScreenSections.data('enable-continuous-vertical') !== 'undefined' && thisFullScreenSections.data('enable-continuous-vertical') !== false && thisFullScreenSections.data('enable-continuous-vertical') === 'yes') {
					enableContinuousVertical = true;
				}
				if (typeof thisFullScreenSections.data('enable-navigation') !== 'undefined' && thisFullScreenSections.data('enable-navigation') !== false) {
					enableNavigationData = thisFullScreenSections.data('enable-navigation');
				}
				if (typeof thisFullScreenSections.data('enable-pagination') !== 'undefined' && thisFullScreenSections.data('enable-pagination') !== false) {
					enablePaginationData = thisFullScreenSections.data('enable-pagination');
				}
				
				var enableNavigation = enableNavigationData !== 'no',
					enablePagination = enablePaginationData !== 'no';
				
				fullScreenSectionsWrapper.fullpage({
					sectionSelector: '.edgtf-fss-item',
					scrollingSpeed: 1200,
					verticalCentered: false,
					continuousVertical: enableContinuousVertical,
					navigation: enablePagination,
					onLeave: function(index, nextIndex, direction){
						if(fullScreenSectionsItemsHasHeaderStyle) {
							checkFullScreenSectionsItemForHeaderStyle($(fullScreenSectionsItems[nextIndex - 1]).data('header-style'), defaultHeaderStyle);
						}
						
						if(enableNavigation) {
							checkActiveArrowsOnFullScrrenTemplate(thisFullScreenSections, fullScreenSectionsItemsNumber, nextIndex);
						}
					},
					afterRender: function(){
						if(fullScreenSectionsItemsHasHeaderStyle) {
							checkFullScreenSectionsItemForHeaderStyle(fullScreenSectionsItems.first().data('header-style'), defaultHeaderStyle);
						}
						
						if(enableNavigation) {
							checkActiveArrowsOnFullScrrenTemplate(thisFullScreenSections, fullScreenSectionsItemsNumber, 1);
							thisFullScreenSections.children('.edgtf-fss-nav-holder').css('visibility','visible');
						}
						
						fullScreenSectionsWrapper.css('visibility','visible');
					}
				});
				
				setResposniveData(thisFullScreenSections);
				
				if(enableNavigation) {
					thisFullScreenSections.find('#edgtf-fss-nav-up').on('click', function() {
						$.fn.fullpage.moveSectionUp();
						return false;
					});
					
					thisFullScreenSections.find('#edgtf-fss-nav-down').on('click', function() {
						$.fn.fullpage.moveSectionDown();
						return false;
					});
				}
			});
		}
	}
	
	function checkFullScreenSectionsItemForHeaderStyle(section_header_style, default_header_style) {
		if (section_header_style !== undefined && section_header_style !== '') {
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header').addClass('edgtf-' + section_header_style + '-header');
		} else if (default_header_style !== '') {
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header').addClass('edgtf-' + default_header_style + '-header');
		} else {
			edgtf.body.removeClass('edgtf-light-header edgtf-dark-header');
		}
	}
	
	function checkActiveArrowsOnFullScrrenTemplate(thisFullScreenSections, fullScreenSectionsItemsNumber, index){
		var thisHolder = thisFullScreenSections,
			thisHolderArrowsUp = thisHolder.find('#edgtf-fss-nav-up'),
			thisHolderArrowsDown = thisHolder.find('#edgtf-fss-nav-down'),
			enableContinuousVertical = false;
		
		if (typeof thisFullScreenSections.data('enable-continuous-vertical') !== 'undefined' && thisFullScreenSections.data('enable-continuous-vertical') !== false && thisFullScreenSections.data('enable-continuous-vertical') === 'yes') {
			enableContinuousVertical = true;
		}
		
		if (index === 1 && !enableContinuousVertical) {
			thisHolderArrowsUp.css({'opacity': '0', 'height': '0', 'visibility': 'hidden'});
			thisHolderArrowsDown.css({'opacity': '0', 'height': '0', 'visibility': 'hidden'});
			
			if(index !== fullScreenSectionsItemsNumber){
				thisHolderArrowsDown.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
			}
		} else if (index === fullScreenSectionsItemsNumber && !enableContinuousVertical) {
			thisHolderArrowsDown.css({'opacity': '0', 'height': '0', 'visibility': 'hidden'});
			
			if(fullScreenSectionsItemsNumber === 2){
				thisHolderArrowsUp.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
			}
		} else {
			thisHolderArrowsUp.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
			thisHolderArrowsDown.css({'opacity': '1', 'height': 'auto', 'visibility': 'visible'});
		}
	}
	
	function setResposniveData(thisFullScreenSections) {
		var fullScreenSections = thisFullScreenSections.find('.edgtf-fss-item'),
			responsiveStyle = '',
			style = '';
		
		fullScreenSections.each(function(){
			var thisSection = $(this),
				itemClass = '',
				imageLaptop = '',
				imageTablet = '',
				imagePortraitTablet = '',
				imageMobile = '';
			
			if (typeof thisSection.data('item-class') !== 'undefined' && thisSection.data('item-class') !== false) {
				itemClass = thisSection.data('item-class');
			}
			if (typeof thisSection.data('laptop-image') !== 'undefined' && thisSection.data('laptop-image') !== false) {
				imageLaptop = thisSection.data('laptop-image');
			}
			if (typeof thisSection.data('tablet-image') !== 'undefined' && thisSection.data('tablet-image') !== false) {
				imageTablet = thisSection.data('tablet-image');
			}
			if (typeof thisSection.data('tablet-portrait-image') !== 'undefined' && thisSection.data('tablet-portrait-image') !== false) {
				imagePortraitTablet = thisSection.data('tablet-portrait-image');
			}
			if (typeof thisSection.data('mobile-image') !== 'undefined' && thisSection.data('mobile-image') !== false) {
				imageMobile = thisSection.data('mobile-image');
			}
			
			if (imageLaptop.length || imageTablet.length || imagePortraitTablet.length || imageMobile.length) {
				
				if (imageLaptop.length) {
					responsiveStyle += "@media only screen and (max-width: 1280px) {.edgtf-fss-item." + itemClass + " { background-image: url(" + imageLaptop + ") !important; } }";
				}
				if (imageTablet.length) {
					responsiveStyle += "@media only screen and (max-width: 1024px) {.edgtf-fss-item." + itemClass + " { background-image: url( " + imageTablet + ") !important; } }";
				}
				if (imagePortraitTablet.length) {
					responsiveStyle += "@media only screen and (max-width: 800px) {.edgtf-fss-item." + itemClass + " { background-image: url( " + imagePortraitTablet + ") !important; } }";
				}
				if (imageMobile.length) {
					responsiveStyle += "@media only screen and (max-width: 680px) {.edgtf-fss-item." + itemClass + " { background-image: url( " + imageMobile + ") !important; } }";
				}
			}
		});
		
		if (responsiveStyle.length) {
			style = '<style type="text/css">' + responsiveStyle + '</style>';
		}
		
		if (style.length) {
			$('head').append(style);
		}
	}
	
})(jQuery);
(function ($) {
    'use strict';

    var googleMap = {};
    edgtf.modules.googleMap = googleMap;

    googleMap.edgtfShowGoogleMap = edgtfShowGoogleMap;


    googleMap.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfShowGoogleMap();
    }

    /*
     **	Show Google Map
     */
    function edgtfShowGoogleMap() {
        var googleMap = $('.edgtf-google-map');

        if (googleMap.length) {
            googleMap.each(function () {
                var element = $(this);

                var predefinedStyle = false;
                if (typeof element.data('predefined-style') !== 'undefined' && element.data('predefined-style') === 'yes') {
                    predefinedStyle = true;
                }

                var customMapStyle;
                if (typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if (typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if (typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if (typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if (typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if (typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if (typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if (typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if (typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if (typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_" + uniqueId;
                var geocoder = "geocoder_" + uniqueId;
                var holderId = "edgtf-map-" + uniqueId;

                edgtfInitializeGoogleMap(predefinedStyle, customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin, map, geocoder, addresses);
            });
        }
    }

    /*
     **	Init Google Map
     */
    function edgtfInitializeGoogleMap(predefinedStyle, customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin, map, geocoder, data) {

        if (typeof google !== 'object') {
            return;
        }

        var mapStyles = [];
        if (predefinedStyle) {
            mapStyles = [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#444444"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#26ccca"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ];
        } else {
            mapStyles = [
                {
                    stylers: [
                        {hue: color},
                        {saturation: saturation},
                        {lightness: lightness},
                        {gamma: 1}
                    ]
                }
            ];
        }

        var googleMapStyleId;

        if (predefinedStyle || customMapStyle === 'yes') {
            googleMapStyleId = 'edgtf-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        if (wheel === 'yes') {
            wheel = true;
        } else {
            wheel = false;
        }

        var qoogleMapType = new google.maps.StyledMapType(mapStyles, {name: "Edge Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)) {
            height = height + 'px';
        }

        var myOptions = {
            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'edgtf-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('edgtf-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            edgtfInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }

    /*
     **	Init Google Map Addresses
     */
    function edgtfInitializeGoogleAddress(data, pin, map, geocoder) {
        if (data === '') {
            return;
        }

        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<div id="bodyContent">' +
            '<p>' + data + '</p>' +
            '</div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        geocoder.geocode({'address': data}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: pin,
                    title: data.store_title
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });

                google.maps.event.addDomListener(window, 'resize', function () {
                    map.setCenter(results[0].geometry.location);
                });
            }
        });
    }

})(jQuery);
(function ($) {
    'use strict';

    var icon = {};
    edgtf.modules.icon = icon;

    icon.edgtfIcon = edgtfIcon;


    icon.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfIcon().init();
    }

    /**
     * Object that represents icon shortcode
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var edgtfIcon = function () {
        var icons = $('.edgtf-icon-shortcode');

        /**
         * Function that triggers icon animation and icon animation delay
         */
        var iconAnimation = function (icon) {
            if (icon.hasClass('edgtf-icon-animation')) {
                icon.appear(function () {
                    icon.parent('.edgtf-icon-animation-holder').addClass('edgtf-icon-animation-show');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            }
        };

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon.find('.edgtf-icon-element');
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        /**
         * Function that triggers icon holder background color hover functionality
         */
        var iconHolderBackgroundHover = function (icon) {
            if (typeof icon.data('hover-background-color') !== 'undefined') {
                var changeIconBgColor = function (event) {
                    event.data.icon.css('background-color', event.data.color);
                };

                var hoverBackgroundColor = icon.data('hover-background-color');
                var originalBackgroundColor = icon.css('background-color');

                if (hoverBackgroundColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
                    icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
                }
            }
        };

        /**
         * Function that initializes icon holder border hover functionality
         */
        var iconHolderBorderHover = function (icon) {
            if (typeof icon.data('hover-border-color') !== 'undefined') {
                var changeIconBorder = function (event) {
                    event.data.icon.css('border-color', event.data.color);
                };

                var hoverBorderColor = icon.data('hover-border-color');
                var originalBorderColor = icon.css('borderTopColor');

                if (hoverBorderColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
                    icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        iconAnimation($(this));
                        iconHoverColor($(this));
                        iconHolderBackgroundHover($(this));
                        iconHolderBorderHover($(this));
                    });
                }
            }
        };
    };

})(jQuery);
(function ($) {
    'use strict';

    var iconListItem = {};
    edgtf.modules.iconListItem = iconListItem;

    iconListItem.edgtfInitIconList = edgtfInitIconList;


    iconListItem.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitIconList().init();
    }

    /**
     * Button object that initializes icon list with animation
     * @type {Function}
     */
    var edgtfInitIconList = function () {
        var iconList = $('.edgtf-animate-list');

        /**
         * Initializes icon list animation
         * @param list current slider
         */
        var iconListInit = function (list) {
            setTimeout(function () {
                list.appear(function () {
                    list.addClass('edgtf-appeared');
                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            }, 30);
        };

        return {
            init: function () {
                if (iconList.length) {
                    iconList.each(function () {
                        iconListInit($(this));
                    });
                }
            }
        };
    };

})(jQuery);
(function ($) {
    'use strict';

    var iconWithText = {};
    edgtf.modules.iconWithText = iconWithText;

    iconWithText.edgtfInitIconWithText = edgtfInitIconWithText;


    iconWithText.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitIconWithText();
    }

    /*
     **	Init Icon w/ Text shortcode
     */
    function edgtfInitIconWithText() {
        var holder = $('.edgtf-iwt-svg-path');

        if (holder.length) {
            holder.each(function () {
                var type = $(this).data('animation-type'),
                    duration = $(this).data('animation-duration'),
                    durationDelay = '',
                    reverse = '',
                    strokeWidth = '',
                    strokeColor = '',
                    selector = '',
                    customStyle = '',
                    style = '';

                if (typeof $(this).data('animation-duration-delay') !== 'undefined') {
                    durationDelay = $(this).data('animation-duration-delay');
                }

                if (typeof $(this).data('animation-reverse') !== 'undefined') {
                    reverse = $(this).data('animation-reverse');
                }

                if (typeof $(this).data('stroke-width') !== 'undefined') {
                    strokeWidth = $(this).data('stroke-width');
                }

                if (typeof $(this).data('stroke-color') !== 'undefined') {
                    strokeColor = $(this).data('stroke-color');
                }

                new Vivus($(this).find('.edgtf-animated-svg').attr('id'), {
                    type: type,
                    duration: duration,
                    delay: durationDelay,
                    reverseStack: reverse,
                });

                if (strokeWidth > 0 || strokeColor.length) {
                    selector = '#' + $(this).find('.edgtf-animated-svg').attr('id') + ' path';

                    if (strokeWidth > 0) {
                        customStyle += 'stroke-width:' + strokeWidth + 'px;';
                    }

                    if (strokeColor.length) {
                        customStyle += 'stroke:' + strokeColor + ';';
                    }
                }

                if (customStyle.length) {
                    style = '<style type="text/css">' + selector + '{' + customStyle + '}</style>';
                }

                if (style.length) {
                    $('head').append(style);
                }
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var progressBar = {};
    edgtf.modules.progressBar = progressBar;

    progressBar.edgtfInitProgressBars = edgtfInitProgressBars;


    progressBar.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitProgressBars();
    }

    /*
     **	Horizontal progress bars shortcode
     */
    function edgtfInitProgressBars() {
        var progressBar = $('.edgtf-progress-bar');

        if (progressBar.length) {
            progressBar.each(function () {
                var thisBar = $(this),
                    thisBarContent = thisBar.find('.edgtf-pb-content'),
                    percentage = thisBarContent.data('percentage');

                thisBar.appear(function () {
                    edgtfInitToCounterProgressBar(thisBar, percentage);

                    thisBarContent.css('width', '0%');
                    thisBarContent.animate({'width': percentage + '%'}, 2000);
                });
            });
        }
    }

    /*
     **	Counter for horizontal progress bars percent from zero to defined percent
     */
    function edgtfInitToCounterProgressBar(progressBar, $percentage) {
        var percentage = parseFloat($percentage),
            percent = progressBar.find('.edgtf-pb-percent');

        if (percent.length) {
            percent.each(function () {
                var thisPercent = $(this);
                thisPercent.css('opacity', '1');

                thisPercent.countTo({
                    from: 0,
                    to: percentage,
                    speed: 2000,
                    refreshInterval: 50
                });
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var singleImage = {};
    edgtf.modules.singleImage = singleImage;

    singleImage.edgtfInitSingleImage = edgtfInitSingleImage;


    singleImage.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitSingleImage();
    }

    /*
     *	Init animation holder shortcode
     */
    function edgtfInitSingleImage() {
        var elements = $('.edgtf-single-image-holder.edgtf-appear-animation');

        if (elements.length) {
            elements.each(function () {
                var thisElement = $(this);

                thisElement.appear(function () {

                    thisElement.addClass('edgtf-appeared');

                }, {accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var tabs = {};
    edgtf.modules.tabs = tabs;

    tabs.edgtfInitTabs = edgtfInitTabs;


    tabs.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitTabs();
    }

    /*
     **	Init tabs shortcode
     */
    function edgtfInitTabs() {
        var tabs = $('.edgtf-tabs');

        if (tabs.length) {
            tabs.each(function () {
                var thisTabs = $(this);

                thisTabs.children('.edgtf-tab-container').each(function (index) {
                    index = index + 1;
                    var that = $(this),
                        link = that.attr('id'),
                        navItem = that.parent().find('.edgtf-tabs-nav li:nth-child(' + index + ') a'),
                        navLink = navItem.attr('href');

                    link = '#' + link;

                    if (link.indexOf(navLink) > -1) {
                        navItem.attr('href', link);
                    }
                });

                thisTabs.tabs();

                $('.edgtf-tabs a.edgtf-external-link').unbind('click');
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var masonryGallery = {};
    edgtf.modules.masonryGallery = masonryGallery;

    masonryGallery.edgtfInitMasonryGallery = edgtfInitMasonryGallery;
    masonryGallery.edgtfMasonryGalleryTextAnimation = edgtfMasonryGalleryTextAnimation;


    masonryGallery.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitMasonryGallery();
        edgtfMasonryGalleryTextAnimation();
    }

    /**
     * Masonry gallery, init masonry and resize pictures in grid
     */
    function edgtfInitMasonryGallery() {
        var galleryHolder = $('.edgtf-masonry-gallery-holder'),
            gallery = galleryHolder.children('.edgtf-mg-inner'),
            gallerySizer = gallery.children('.edgtf-mg-grid-sizer');

        resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

        if (galleryHolder.length) {
            galleryHolder.each(function () {
                var holder = $(this),
                    holderGallery = holder.children('.edgtf-mg-inner');

                holderGallery.waitForImages(function () {
                    holderGallery.animate({opacity: 1});

                    holderGallery.isotope({
                        layoutMode: 'packery',
                        itemSelector: '.edgtf-mg-item',
                        percentPosition: true,
                        packery: {
                            gutter: '.edgtf-mg-grid-gutter',
                            columnWidth: '.edgtf-mg-grid-sizer'
                        }
                    });
                });
            });

            $(window).resize(function () {
                resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

                gallery.isotope('reloadItems');
            });
        }
    }

    function resizeMasonryGallery(size, holder) {
        var rectangle_portrait = holder.find('.edgtf-mg-rectangle-portrait'),
            rectangle_landscape = holder.find('.edgtf-mg-rectangle-landscape'),
            square_big = holder.find('.edgtf-mg-square-big'),
            square_small = holder.find('.edgtf-mg-square-small'),
            margin = 0;

        if (holder.parent().hasClass('edgtf-huge-space')) {
            margin = 80;
        } else if (holder.parent().hasClass('edgtf-large-space')) {
            margin = 50;
        } else if (holder.parent().hasClass('edgtf-medium-space')) {
            margin = 40;
        } else if (holder.parent().hasClass('edgtf-normal-space')) {
            margin = 30;
        } else if (holder.parent().hasClass('edgtf-small-space')) {
            margin = 20;
        } else if (holder.parent().hasClass('edgtf-tiny-space')) {
            margin = 10;
        }

        size = size * 0.69;

        // portrait
        rectangle_portrait.css('height', (2 * size) + margin);

        // landscape
        if (window.innerWidth <= 680) {
            rectangle_landscape.css('height', size / 2);
        } else {
            rectangle_landscape.css('height', size);
        }

        // large square
        square_big.css('height', (2 * size) + margin);
        if (window.innerWidth <= 680) {
            square_big.css('height', square_big.width());
        }

        // small square
        square_small.css('height', size);
    }

    function edgtfMasonryGalleryTextAnimation() {
        var masonryArticles = $('.edgtf-mg-simple .edgtf-mg-item-title > span').closest('article');

        if (masonryArticles.length && !edgtf.htmlEl.hasClass('touch')) {
            var delay = 250;
            
            masonryArticles.each(function(){
                var masonryArticle = $(this),
                    txtElements = masonryArticles.find('span').addClass('edgtf-animate-text');

                txtElements.each(function(i){
                    var txtElement = $(this);

                    txtElement.wrap( "<span class='edgtf-animate-text-holder'></span>" );

                    txtElement.appear(function(){
                        setTimeout(function(){
                            txtElement.addClass('edgtf-appeared');
                        }, i*delay);
                    });
                });
            });
        }
    }

})(jQuery);
(function ($) {
    'use strict';

    var portfolio = {};
    edgtf.modules.portfolio = portfolio;

    portfolio.edgtfOnDocumentReady = edgtfOnDocumentReady;
    portfolio.edgtfOnWindowLoad = edgtfOnWindowLoad;
    portfolio.edgtfOnWindowResize = edgtfOnWindowResize;
    portfolio.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {

    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function edgtfOnWindowLoad() {
        edgtfInitPortfolioMasonry();
        edgtfInitPortfolioFilter();
        initPortfolioSingleMasonry();
        edgtfInitPortfolioListAnimation();
        edgtfInitPortfolioPagination().init();
        edgtfPortfolioSingleFollow().init();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function edgtfOnWindowResize() {
        edgtfInitPortfolioMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function edgtfOnWindowScroll() {
        edgtfInitPortfolioPagination().scroll();
    }

    /**
     * Initializes portfolio list article animation
     */
    function edgtfInitPortfolioListAnimation() {
        var portList = $('.edgtf-portfolio-list-holder.edgtf-pl-has-animation');

        if (portList.length) {
            portList.each(function () {
                var thisPortList = $(this).children('.edgtf-pl-inner');

                thisPortList.children('article').each(function (l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function () {
                        thisArticle.addClass('edgtf-item-show');

                        setTimeout(function () {
                            thisArticle.addClass('edgtf-item-shown');
                        }, 1000);
                    }, {accX: 0, accY: 0});
                });
            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function edgtfInitPortfolioMasonry() {
        var portList = $('.edgtf-portfolio-list-holder.edgtf-pl-masonry');

        if (portList.length) {
            portList.each(function () {
                var thisPortList = $(this),
                    masonry = thisPortList.children('.edgtf-pl-inner'),
                    size = thisPortList.find('.edgtf-pl-grid-sizer').width();

                edgtfResizePortfolioItems(size, thisPortList);

                masonry.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    percentPosition: true,
                    packery: {
                        gutter: '.edgtf-pl-grid-gutter',
                        columnWidth: '.edgtf-pl-grid-sizer'
                    }
                });

                setTimeout(function () {
                    edgtf.modules.common.edgtfInitParallax();
                }, 600);

                masonry.css('opacity', '1');
            });
        }
    }

    /**
     * Init Resize Portfolio Items
     */
    function edgtfResizePortfolioItems(size, container) {
        if (container.hasClass('edgtf-pl-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.edgtf-pl-masonry-default'),
                largeWidthMasonryItem = container.find('.edgtf-pl-masonry-large-width'),
                largeHeightMasonryItem = container.find('.edgtf-pl-masonry-large-height'),
                largeWidthHeightMasonryItem = container.find('.edgtf-pl-masonry-large-width-height');

            if (edgtf.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size);
                largeHeightMasonryItem.css('height', size);
                largeWidthHeightMasonryItem.css('height', size);
                largeWidthMasonryItem.css('height', Math.round(size / 2));
            }
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function edgtfInitPortfolioFilter() {
        var filterHolder = $('.edgtf-portfolio-list-holder .edgtf-pl-filter-holder');

        if (filterHolder.length) {
            filterHolder.each(function () {
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.edgtf-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.edgtf-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('edgtf-pl-pag-load-more') ? true : false;

                thisFilterHolder.find('.edgtf-pl-filter:first').addClass('edgtf-pl-current');

                if (thisPortListHolder.hasClass('edgtf-pl-gallery')) {
                    thisPortListInner.isotope();
                }

                thisFilterHolder.find('.edgtf-pl-filter').on('click', function () {
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
                        portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.edgtf-pl-filter').removeClass('edgtf-pl-current');
                    thisFilter.addClass('edgtf-pl-current');

                    if (portListHasLoadMore && !portListHasArtciles) {
                        edgtfInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
                    } else {
                        thisFilterHolder.parent().children('.edgtf-pl-inner').isotope({filter: filterValue});
                        edgtf.modules.common.edgtfInitParallax();
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function edgtfInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {
        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.edgtf-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
            ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'edgtf_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.edgtf-pl-loading');

        if (nextPage <= maxNumPages) {
            loadingItem.addClass('edgtf-showing edgtf-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: edgtfGlobalVars.vars.edgtfAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArtciles = !!thisPortListInner.children().hasClass(filterClassName);

                        if (portListHasArtciles) {
                            setTimeout(function () {
                                edgtfResizePortfolioItems(thisPortListInner.find('.edgtf-pl-grid-sizer').width(), thisPortList);
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('edgtf-showing edgtf-filter-trigger');

                                setTimeout(function () {
                                    thisPortListInner.css('opacity', '1');
                                    edgtfInitPortfolioListAnimation();
                                    edgtf.modules.common.edgtfInitParallax();
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('edgtf-showing edgtf-filter-trigger');
                            edgtfInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }

    /**
     * Initializes portfolio pagination functions
     */
    function edgtfInitPortfolioPagination() {
        var portList = $('.edgtf-portfolio-list-holder');

        var initStandardPagination = function (thisPortList) {
            var standardLink = thisPortList.find('.edgtf-pl-standard-pagination li');

            if (standardLink.length) {
                standardLink.each(function () {
                    var thisLink = $(this).children('a'),
                        pagedLink = 1;

                    thisLink.on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
                            pagedLink = thisLink.data('paged');
                        }

                        initMainPagFunctionality(thisPortList, pagedLink);
                    });
                });
            }
        };

        var initLoadMorePagination = function (thisPortList) {
            var loadMoreButton = thisPortList.find('.edgtf-pl-load-more a');

            loadMoreButton.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                initMainPagFunctionality(thisPortList);
            });
        };

        var initInifiteScrollPagination = function (thisPortList) {
            var portListHeight = thisPortList.outerHeight(),
                portListTopOffest = thisPortList.offset().top,
                portListPosition = portListHeight + portListTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;

            if (!thisPortList.hasClass('edgtf-pl-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > portListPosition) {
                initMainPagFunctionality(thisPortList);
            }
        };

        var initMainPagFunctionality = function (thisPortList, pagedLink) {
            var thisPortListInner = thisPortList.find('.edgtf-pl-inner'),
                nextPage,
                maxNumPages;

            if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
                maxNumPages = thisPortList.data('max-num-pages');
            }

            if (thisPortList.hasClass('edgtf-pl-pag-standard')) {
                thisPortList.data('next-page', pagedLink);
            }

            if (thisPortList.hasClass('edgtf-pl-pag-infinite-scroll')) {
                thisPortList.addClass('edgtf-pl-infinite-scroll-started');
            }

            var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisPortList),
                loadingItem = thisPortList.find('.edgtf-pl-loading');

            nextPage = loadMoreDatta.nextPage;

            if (nextPage <= maxNumPages || maxNumPages == 0) {
                if (thisPortList.hasClass('edgtf-pl-pag-standard')) {
                    loadingItem.addClass('edgtf-showing edgtf-standard-pag-trigger');
                    thisPortList.addClass('edgtf-pl-pag-standard-animate');
                } else {
                    loadingItem.addClass('edgtf-showing');
                }

                var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'edgtf_core_portfolio_ajax_load_more');

                $.ajax({
                    type: 'POST',
                    data: ajaxData,
                    url: edgtfGlobalVars.vars.edgtfAjaxUrl,
                    success: function (data) {
                        if (!thisPortList.hasClass('edgtf-pl-pag-standard')) {
                            nextPage++;
                        }

                        thisPortList.data('next-page', nextPage);

                        var response = $.parseJSON(data),
                            responseHtml = response.html;

                        if (thisPortList.hasClass('edgtf-pl-pag-standard')) {
                            edgtfInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);

                            thisPortList.waitForImages(function () {
                                if (thisPortList.hasClass('edgtf-pl-masonry')) {
                                    edgtfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                } else if (thisPortList.hasClass('edgtf-pl-gallery') && thisPortList.hasClass('edgtf-pl-has-filter')) {
                                    edgtfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                } else {
                                    edgtfInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                }
                            });
                        } else {
                            thisPortList.waitForImages(function () {
                                if (thisPortList.hasClass('edgtf-pl-masonry')) {
                                    if (pagedLink == 1) {
                                        edgtfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                    } else {
                                        edgtfInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                    }
                                } else if (thisPortList.hasClass('edgtf-pl-gallery') && thisPortList.hasClass('edgtf-pl-has-filter') && pagedLink != 1) {
                                    edgtfInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                } else {
                                    edgtfInitAppendGalleryNewContent(thisPortListInner, loadingItem, responseHtml);
                                }
                            });
                        }

                        if (thisPortList.hasClass('edgtf-pl-infinite-scroll-started')) {
                            thisPortList.removeClass('edgtf-pl-infinite-scroll-started');
                        }
                    }
                });
            }

            if (nextPage === maxNumPages) {
                thisPortList.find('.edgtf-pl-load-more-holder').hide();
            }
        };

        var edgtfInitStandardPaginationLinkChanges = function (thisPortList, maxNumPages, nextPage) {
            var standardPagHolder = thisPortList.find('.edgtf-pl-standard-pagination'),
                standardPagNumericItem = standardPagHolder.find('li.edgtf-pl-pag-number'),
                standardPagPrevItem = standardPagHolder.find('li.edgtf-pl-pag-prev a'),
                standardPagNextItem = standardPagHolder.find('li.edgtf-pl-pag-next a');

            standardPagNumericItem.removeClass('edgtf-pl-pag-active');
            standardPagNumericItem.eq(nextPage - 1).addClass('edgtf-pl-pag-active');

            standardPagPrevItem.data('paged', nextPage - 1);
            standardPagNextItem.data('paged', nextPage + 1);

            if (nextPage > 1) {
                standardPagPrevItem.css({'opacity': '1'});
            } else {
                standardPagPrevItem.css({'opacity': '0'});
            }

            if (nextPage === maxNumPages) {
                standardPagNextItem.css({'opacity': '0'});
            } else {
                standardPagNextItem.css({'opacity': '1'});
            }
        };

        var edgtfInitHtmlIsotopeNewContent = function (thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.find('article').remove();
            thisPortListInner.append(responseHtml);
            edgtfResizePortfolioItems(thisPortListInner.find('.edgtf-pl-grid-sizer').width(), thisPortList);
            thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
            thisPortList.removeClass('edgtf-pl-pag-standard-animate');

            setTimeout(function () {
                thisPortListInner.isotope('layout');
                edgtfInitPortfolioListAnimation();
                edgtf.modules.common.edgtfInitParallax();
            }, 600);
        };

        var edgtfInitHtmlGalleryNewContent = function (thisPortList, thisPortListInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edgtf-showing edgtf-standard-pag-trigger');
            thisPortList.removeClass('edgtf-pl-pag-standard-animate');
            thisPortListInner.html(responseHtml);
            edgtfInitPortfolioListAnimation();
            edgtf.modules.common.edgtfInitParallax();
        };

        var edgtfInitAppendIsotopeNewContent = function (thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.append(responseHtml);
            edgtfResizePortfolioItems(thisPortListInner.find('.edgtf-pl-grid-sizer').width(), thisPortList);
            thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edgtf-showing');

            setTimeout(function () {
                thisPortListInner.isotope('layout');
                edgtfInitPortfolioListAnimation();
                edgtf.modules.common.edgtfInitParallax();
            }, 600);
        };

        var edgtfInitAppendGalleryNewContent = function (thisPortListInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edgtf-showing');
            thisPortListInner.append(responseHtml);
            edgtfInitPortfolioListAnimation();
            edgtf.modules.common.edgtfInitParallax();
        };

        return {
            init: function () {
                if (portList.length) {
                    portList.each(function () {
                        var thisPortList = $(this);

                        if (thisPortList.hasClass('edgtf-pl-pag-standard')) {
                            initStandardPagination(thisPortList);
                        }

                        if (thisPortList.hasClass('edgtf-pl-pag-load-more')) {
                            initLoadMorePagination(thisPortList);
                        }

                        if (thisPortList.hasClass('edgtf-pl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisPortList);
                        }
                    });
                }
            },
            scroll: function () {
                if (portList.length) {
                    portList.each(function () {
                        var thisPortList = $(this);

                        if (thisPortList.hasClass('edgtf-pl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisPortList);
                        }
                    });
                }
            },
            getMainPagFunction: function (thisPortList, paged) {
                initMainPagFunctionality(thisPortList, paged);
            }
        };
    }

    var edgtfPortfolioSingleFollow = function () {
        var info = $('.edgtf-follow-portfolio-info .edgtf-portfolio-single-holder .edgtf-ps-info-sticky-holder');

        if (info.length) {
            var infoHolder = info.parent(),
                infoHolderOffset = infoHolder.offset().top,
                infoHolderHeight = infoHolder.height(),
                mediaHolder = $('.edgtf-ps-image-holder'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .edgtf-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0;
        }

        var infoHolderPosition = function () {
            if (info.length) {
                if (mediaHolderHeight > infoHolderHeight) {
                    if (edgtf.scroll > infoHolderOffset) {
                        var marginTop = edgtf.scroll - infoHolderOffset + edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight;
                        // if scroll is initially positioned below mediaHolderHeight
                        if (marginTop + infoHolderHeight > mediaHolderHeight) {
                            marginTop = mediaHolderHeight - infoHolderHeight;
                        }
                        info.stop().animate({
                            marginTop: marginTop
                        });
                    }
                }
            }
        };

        var recalculateInfoHolderPosition = function () {
            if (info.length) {
                if (mediaHolderHeight > infoHolderHeight) {
                    if (edgtf.scroll > infoHolderOffset) {

                        if (edgtf.scroll + headerHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar + infoHolderHeight + 50 < infoHolderOffset + mediaHolderHeight) { //50 to prevent mispositioning

                            //Calculate header height if header appears
                            if ($('.header-appear, .edgtf-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .edgtf-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (edgtf.scroll - infoHolderOffset + edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight)
                            });
                            //Reset header height
                            headerHeight = 0;
                        }
                        else {
                            info.stop().animate({
                                marginTop: mediaHolderHeight - infoHolderHeight
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {
            init: function () {
                infoHolderPosition();
                $(window).scroll(function () {
                    recalculateInfoHolderPosition();
                });
            }
        };
    };

    function initPortfolioSingleMasonry() {
        var masonryHolder = $('.edgtf-portfolio-single-holder .edgtf-ps-masonry-images'),
            masonry = masonryHolder.children();

        if (masonry.length) {
            masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.edgtf-ps-image',
                percentPosition: true,
                packery: {
                    gutter: '.edgtf-ps-grid-gutter',
                    columnWidth: '.edgtf-ps-grid-sizer'
                }
            });

            masonry.css('opacity', '1');
        }
    }

})(jQuery);