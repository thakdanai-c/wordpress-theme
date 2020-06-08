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