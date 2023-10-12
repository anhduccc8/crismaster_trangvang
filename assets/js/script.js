jQuery(document).ready(function($) {
    $(document).on('click', '.size_guide', function(e) {
        $(this).parent().stop().toggleClass('active')
    });



    $('.tea_cat_blocks.slides-news').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        margin: 25,
        dots: false,
        navClass: ['slick-prev slick-arrow', 'slick-next slick-arrow'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: true,
            },
            480: {
                items: 3,
                nav: true,
            },
            768: {
                items: 6,
                nav: true,
            }
        }
    });
    $('.slides-nhan-cuoi-cao-cap').owlCarousel({
        loop: false,
        nav: true,
        autoplay: false,
        margin: 0,
        dots: false,
        navClass: ['slick-prev slick-arrow', 'slick-next slick-arrow'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: true,
            },
            768: {
                items: 4,
                nav: true,
            }
        }
    });
    $('.slides-nhan-cau-hon').owlCarousel({
        loop: false,
        nav: true,
        autoplay: false,
        margin: 0,
        dots: false,
        navClass: ['nhan-nu slick-prev slick-arrow', 'nhan-nu slick-next slick-arrow'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: true,
            },
            768: {
                items: 4,
                nav: true,
            }
        }
    });
    $('.slides-nhan-nu').owlCarousel({
        loop: false,
        nav: true,
        autoplay: false,
        margin: 0,
        dots: false,
        navClass: ['nhan-nu slick-prev slick-arrow', 'nhan-nu slick-next slick-arrow'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: true,
            },
            768: {
                items: 4,
                nav: true,
            }
        }
    });
    $('.slides-kim-thuy-moc-hoa-tho').owlCarousel({
        loop: false,
        nav: true,
        autoplay: false,
        margin: 0,
        dots: false,
        navClass: ['nhan-nu slick-prev slick-arrow', 'nhan-nu slick-next slick-arrow'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: true,
            },
            768: {
                items: 4,
                nav: true,
            }
        }
    });
    $('.slides-nhan-nam-cao-cap').owlCarousel({
        loop: false,
        nav: true,
        autoplay: false,
        margin: 0,
        dots: false,
        navClass: ['nhan-nu slick-prev slick-arrow', 'nhan-nu slick-next slick-arrow'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: true,
            },
            768: {
                items: 4,
                nav: true,
            }
        }
    });
    $('.slides-co-the-ban-thich').owlCarousel({
        loop: false,
        nav: true,
        autoplay: false,
        margin: 0,
        dots: false,
        navClass: ['nhan-nu slick-prev slick-arrow', 'nhan-nu slick-next slick-arrow'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            480: {
                items: 2,
                nav: true,
            },
            768: {
                items: 4,
                nav: true,
            }
        }
    });
    $('.owl-carousel.widget-popular-post').owlCarousel({
        loop: false,
        items: 1,
        nav: true,
        autoplay: true,
        margin: 0,
        dots: false,
    });

    $('.related-blogs.owl-carousel').owlCarousel({
        loop: false,
        nav: true,
        items: 3,
        autoplay: true,
        margin: 0,
        dots: false,
    });
    $('.owl-carousel.recent-product').owlCarousel({
        loop: false,
        nav: true,
        items: 4,
        autoplay: true,
        margin: 0,
        dots: false,
    });
    $('.owl-carousel.tin-tuc-trang-chu').owlCarousel({
        loop: false,
        nav: true,
        items: 3,
        autoplay: true,
        margin: 0,
        dots: false,
    });

    $('.tea_cat_blocks.slides-news .owl-item').addClass('item');
    $('.slides-nhan-cuoi-cao-cap .owl-item').addClass('item');
    $('.slides-nhan-cau-hon .owl-item').addClass('item');
    $('.slides-nhan-nu .owl-item').addClass('item');
    $('.slides-kim-thuy-moc-hoa-tho .owl-item').addClass('item');
    $('.slides-nhan-nam-cao-cap .owl-item').addClass('item');
    $('.slides-co-the-ban-thich .owl-item').addClass('item');
    $('.owl-carousel.widget-popular-post .owl-item').addClass('item');
    $('.related-blogs.owl-carousel .owl-item').addClass('item');
    $('.owl-carousel.recent-product .owl-item').addClass('item');
    $('.owl-carousel.tin-tuc-trang-chu .owl-item').addClass('item');

    if ($('.ets_prmn_megamenu.sticky_enabled').length > 0) {
        var sticky_navigation_offset_top = $('.ets_prmn_megamenu.sticky_enabled').offset().top;
        var headerFloatingHeight = $('.ets_prmn_megamenu.sticky_enabled').height() + ($('#header').length > 0 ? parseInt($('.ets_prmn_megamenu.sticky_enabled').css('marginTop').replace('px', '')) + parseInt($('.ets_prmn_megamenu.sticky_enabled').css('marginBottom').replace('px', '')) : 0);
        var oldHeaderMarginBottom = $('#header').length > 0 ? parseInt($('#header').css('marginBottom').replace('px', '')) : 0;
        var sticky_navigation = function() {
            if (!$('.ets_prmn_megamenu').hasClass('sticky_enabled'))
                return !1;
            var scroll_top = $(window).scrollTop();
            if (scroll_top > sticky_navigation_offset_top) {
                $('.ets_prmn_megamenu.sticky_enabled').addClass('scroll_heading');
                if ($('#header').length > 0)
                    $('#header').css({
                        'marginBottom': headerFloatingHeight + 'px'
                    })
            } else {
                $('.ets_prmn_megamenu.sticky_enabled').removeClass('scroll_heading');
                if ($('#header').length > 0)
                    $('#header').css({
                        'marginBottom': oldHeaderMarginBottom + 'px'
                    })
            }
        };
        sticky_navigation();
        $(window).scroll(function() {
            sticky_navigation()
        });
        if ($(window).width() < 768 && !$('body').hasClass('disable-sticky'))
            $('body').addClass('disable-sticky');
        $(window).on('resize', function(e) {
            if ($(window).width() < 768 && !$('body').hasClass('disable-sticky'))
                $('body').addClass('disable-sticky');
            else if ($(window).width() >= 768 && $('body').hasClass('disable-sticky'))
                $('body').removeClass('disable-sticky')
        })
    }

    if ($('.ets_mn_submenu_full_height').length > 0) {
        var ver_sub_height = $('.ets_mn_submenu_full_height').height();
        $('.ets_mn_submenu_full_height').find('.prmn_columns_ul').css("min-height", ver_sub_height)
    }

    if ($('.prmn_columns_ul_tab_content').length > 0 && $('body#index').length > 0) {
        $('.prmn_columns_ul_tab_content').addClass('active').prev('.arrow').removeClass('closed').addClass('opened')
    }
    $(window).resize(function() {
        $('.prmn_menus_ul:not(.ets_prmn_all_show_resize)').removeClass('ets_mn_active')
    });
    $(document).on('click', '.prmn_has_sub > .arrow', function() {
        var wrapper = $(this).next('.prmn_columns_ul');
        if ($(this).hasClass('closed')) {
            $('.prmn_columns_ul').removeClass('active');
            $('.prmn_has_sub > .arrow').removeClass('opened');
            $('.prmn_has_sub > .arrow').addClass('closed');
            var btnObj = $(this);
            btnObj.removeClass('closed');
            btnObj.addClass('opened');
            wrapper.stop(!0, !0).addClass('active')
        } else {
            var btnObj = $(this);
            btnObj.removeClass('opened');
            btnObj.addClass('closed');
            wrapper.stop(!0, !0).removeClass('active')
        }
    });
    $('.ybc-menu-toggle, .ybc-menu-vertical-button').on('click', function() {
        var wrapper = $(this).next('.prmn_menus_ul');
        if ($(this).hasClass('closed')) {
            var btnObj = $(this);
            btnObj.removeClass('closed');
            btnObj.addClass('opened');
            wrapper.stop(!0, !0).addClass('active');
            if ($('.transition_slide.transition_default').length != '') {
                wrapper.stop(!0, !0).slideDown(0)
            }
        } else {
            var btnObj = $(this);
            btnObj.removeClass('opened');
            btnObj.addClass('closed');
            wrapper.stop(!0, !0).removeClass('active');
            if ($('.transition_slide.transition_default').length != '') {
                wrapper.stop(!0, !0).slideUp(0)
            }
        }
    });
    $(document).on('click', '#ets_menu-icon', function(e) {
        var wrapper = $('.ets_prmn_megamenu .prmn_menus_ul');
        if ($(this).hasClass('closed')) {
            var btnObj = $(this);
            btnObj.removeClass('closed');
            btnObj.addClass('opened');
            wrapper.stop(!0, !0).addClass('active');
            if ($('.transition_slide.transition_default').length != '') {
                wrapper.stop(!0, !0).slideDown(0)
            }
        } else {
            var btnObj = $(this);
            btnObj.removeClass('opened');
            btnObj.addClass('closed');
            wrapper.stop(!0, !0).removeClass('active');
            if ($('.transition_slide.transition_default').length != '') {
                wrapper.stop(!0, !0).slideUp(0)
            }
        }
    });
    $('.close_menu').on('click', function() {
        $(this).parent().prev().removeClass('opened');
        $(this).parent().prev().addClass('closed');
        $(this).parent().stop(!0, !0).removeClass('active');
        $('#ets_menu-icon').removeClass('opened').addClass('closed')
    });
    if ($('.ets_prmn_megamenu').hasClass('enable_active_menu') && $('.prmn_menus_ul > li').length > 0) {
        var currentUrl = window.location.href;
        $('.prmn_menus_ul > li').each(function() {
            if ($(this).find('a[href="' + currentUrl + '"]').length > 0) {
                $(this).addClass('active');
                return !1
            }
        })
    }
    if ($('.prmn_breaker').length > 0 && $('.prmn_breaker').prev('li').length > 0) {
        $('.prmn_breaker').prev('li').addClass('prmn_before_breaker')
    }
    $('.prmn_menus_li_tab').hover(function() {
        if ($(this).find('.open').length == 0) {
            $(this).find('.open_first').addClass('open')
        }
    });
    $('.prmn_tab_li_content').hover(function() {
        if (!$(this).closest('.prmn_tabs_li').hasClass('open')) {
            $(this).closest('.prmn_columns_ul_tab').find('.prmn_tabs_li').removeClass('open');
            $(this).closest('.prmn_tabs_li').addClass('open');
            $(this).closest('.prmn_columns_ul').removeClass('prmn_tab_no_content');
            if (!$(this).next('.prmn_columns_contents_ul').length) {
                $(this).closest('.prmn_columns_ul').addClass('prmn_tab_no_content')
            }
            displayHeightTab()
        }
    }, function() {
        if (!$(this).closest('.prmn_tabs_li').hasClass('ver_alway_hide')) {
            $(this).closest('.prmn_tabs_li').removeClass('open')
        }
    });
    $('.prmn_menus_li:not(.menu_ver_alway_show_sub )').hover(function() {
        $('.menu_ver_alway_show_sub .prmn_columns_ul_tab_content').removeClass('active')
    }, function() {
        $('.menu_ver_alway_show_sub .prmn_columns_ul_tab_content').addClass('active')
    });
    if ($('.clicktext_show_submenu').length <= 0) {
        $(document).on('click touchstar', '.prmn_tab_li_content', function(evt) {
            var btnObj = $(this),
                wrapper = $(this).next();
            if (!btnObj.find('.prmn_tab_toggle_title a').is(evt.target)) {
                if (btnObj.hasClass('closed')) {
                    $('.prmn_tab_li_content').removeClass('opened');
                    $('.prmn_tab_li_content').addClass('closed');
                    $('.prmn_columns_contents_ul').removeClass('active');
                    btnObj.removeClass('closed');
                    btnObj.addClass('opened');
                    wrapper.stop(!0, !0).addClass('active')
                } else {
                    btnObj.removeClass('opened');
                    btnObj.addClass('closed');
                    wrapper.stop(!0, !0).removeClass('active')
                }
            }
        })
    }
});
