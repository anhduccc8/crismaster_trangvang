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
    if ($('.owl-carousel.lich-su-thanh-lap').length > 0 ){
        var owl1 = $('.owl-carousel.lich-su-thanh-lap').owlCarousel({
            loop: true,
            nav: false,
            navText: ["<i class='fa-solid fa-chevron-left'></i>","<i class='fa-solid fa-chevron-right'></i>"],
            items: 1,
            autoplay: false,
            dots: false,
            mouseDrag: false,
            touchDrag: false,
        });
    }
    if ($('.owl-carousel.year-lich-su').length > 0 ){
        var owl2 = $('.owl-carousel.year-lich-su').owlCarousel({
            loop: true,
            nav: true,
            navText: ["<i class='fa-solid fa-chevron-left'></i>","<i class='fa-solid fa-chevron-right'></i>"],
            autoplay: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                    nav: true,
                    center: true,
                },
                768: {
                    items: 3,
                    nav: true,
                    center: true,
                }
            },
        });
        $('.owl-carousel.year-lich-su .owl-nav').removeClass('disabled');
        owl2.on('changed.owl.carousel', function(event) {
            var currentItem = event.item.index;
            if (currentItem !== owl1.trigger('owl.carousel').to) {
                owl1.trigger('to.owl.carousel', [currentItem, 300, true]);
                $('.owl-carousel.year-lich-su .owl-item').not(':eq(' + currentItem + ')').removeClass('actived');
                $('.owl-carousel.year-lich-su .owl-item').eq(currentItem).addClass('actived');
                $('.owl-carousel.year-lich-su .owl-item').not(':eq(' + currentItem + ')').find('.nav-year').removeClass('actived');
                $('.owl-carousel.year-lich-su .owl-item').eq(currentItem).find('.nav-year').removeClass('actived');
            }
        });
    }

    if ($('#horizontal-image .shs-item-activiti-column').length > 0){
        setTimeout(function () {
            var all = document.querySelectorAll('#horizontal-image');
            var menuItems = document.querySelectorAll('#horizontal-image .shs-item-activiti-column');
            menuItems.forEach(function(item) {
                item.addEventListener('mouseover', function() {
                    item.classList.add('active');
                    $('#horizontal-image').addClass('active');
                });
                item.addEventListener('mouseout', function() {
                    item.classList.remove('active');
                    $('#horizontal-image').removeClass('active');
                });
            });
        }, 1000);
    }


    // $(".js-window-trigger").each(function () {
    //     $(this).addClass('is-active');
    // });
    $(window).scroll(function () {
        $(".js-scroll-trigger").each(function () {
            let position = $(this).offset().top,
                scroll = $(window).scrollTop(),
                windowHeight = $(window).height();
            if (scroll > position - windowHeight + 80) {
                $(this).addClass('is-active');
            }
        });
    });
    $(window).trigger('scroll');
});