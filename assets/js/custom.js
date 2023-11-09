jQuery(document).ready(function($) {
    var desktop_width = $(window).width();
    if ($('.owl-carousel.linh-vuc-hoat-dong').length > 0 && desktop_width > 767){
        $('.owl-carousel.linh-vuc-hoat-dong').owlCarousel({
            loop: true,
            nav: false,
            items: 5,
            autoplay: false,
            dotsData: true,
            dotsClass: 'shs-nav-number',
        });
    }
    if ($('.owl-carousel.hsh-tin-tuc').length > 0 && desktop_width > 767){
        $('.owl-carousel.hsh-tin-tuc').owlCarousel({
            loop: true,
            nav: false,
            items: 3,
            autoplay: false,
            dotsData: true,
            dotsClass: 'shs-nav-number shs-nav-number-news',
        });
    }

    // $(".js-window-trigger").each(function () {
    //     $(this).addClass('is-active');
    // });
    $(window).scroll(function () {
        $(".js-scroll-trigger").each(function () {
            let position = $(this).offset().top,
                scroll = $(window).scrollTop(),
                windowHeight = $(window).height();
            console.log('scroll: '+scroll);
            console.log('scroll2: '+ (position - windowHeight + 80));
            if (scroll > position - windowHeight + 80) {
                console.log(scroll > position - windowHeight + 80);
                $(this).addClass('is-active');
            }
        });
    });
    $(window).trigger('scroll');
});