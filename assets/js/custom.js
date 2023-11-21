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
            dotsData: false,
            // dotsClass: 'shs-nav-number shs-nav-number-news',
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
    if ($('nav .submenu').length > 0){
        setTimeout(function () {
            var menuItems = document.querySelectorAll('.submenu .child-menu-a');
            menuItems.forEach(function(item) {
                item.addEventListener('mouseover', function() {
                    var siblingsBefore  = getSiblings(item, 'previous');
                    siblingsBefore .forEach(function(sibling) {
                        sibling.classList.remove('active');
                        sibling.classList.add('no-active-up');
                    });
                    var siblingsAfter  = getSiblings(item, 'next');
                    siblingsAfter .forEach(function(sibling) {
                        sibling.classList.remove('active');
                        sibling.classList.add('no-active-down');
                    });
                    item.classList.remove('no-active-up');
                    item.classList.remove('no-active-down');
                    item.classList.add('active');
                });
                item.addEventListener('mouseout', function() {
                    item.classList.remove('active');
                    item.classList.remove('no-active-up');
                    item.classList.remove('no-active-down');
                });
            });
            var submenu = document.querySelector('.submenu');
            submenu.addEventListener('mouseout', function() {
                menuItems.forEach(function(item) {
                    item.classList.remove('active');
                    item.classList.remove('no-active-up');
                    item.classList.remove('no-active-down');
                });
            });
        }, 1000);
    }
    // if ($('.shs-nav-number a[href^="#"]').length > 0){
    //         document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    //             anchor.addEventListener('click', function (e) {
    //                 e.preventDefault();
    //
    //                 const targetId = this.getAttribute('href').substring(1);
    //                 const targetElement = document.getElementById(targetId);
    //
    //                 if (targetElement) {
    //                     // Scroll smoothly to the target element
    //                     window.scrollTo({
    //                         top: targetElement.offsetTop,
    //                         behavior: 'smooth'
    //                     });
    //                 }
    //             });
    //         });
    // }
    if ($('#scroll-bullets').length > 0){
        var sections = document.querySelectorAll("section");
        const bulletsContainer = document.getElementById("scroll-bullets");

        sections.forEach((section, index) => {
            const bullet = document.createElement("div");
            bullet.classList.add("nav-number");
            bullet.textContent = (index < 9) ? ('0'+(index + 1)) : (index + 1);
            bullet.addEventListener("click", () => scrollToSection(index));
            bulletsContainer.appendChild(bullet);
        });
        function scrollToSection(index) {
            sections[index].scrollIntoView({ behavior: "smooth" });
        }

        function updateActiveBullet() {
            const scrollPosition = window.scrollY;
            const windowHeight = window.innerHeight;
            sections.forEach((section, index) => {

                const sectionTop = section.offsetTop;
                const sectionBottom = sectionTop + section.clientHeight;
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    const bullet = bulletsContainer.childNodes[index+1];
                    if (bullet && bullet.nodeType === 1 && bullet.classList) {
                        bulletsContainer.childNodes.forEach((otherBullet, otherBulletIndex) => {
                            if (otherBullet.nodeType === 1 && otherBullet.classList) {
                                otherBullet.classList.remove("active");
                            }
                        });
                        bullet.classList.add("active");
                    }
                }
            });
        }
        setTimeout(function () {
            window.addEventListener("scroll", updateActiveBullet);
            window.addEventListener("resize", updateActiveBullet);
            updateActiveBullet();
        },1000);
    }
    if ($('.hsh-form-apply').length > 0){
        var formApply = document.querySelector('.hsh-form-apply');
        var backdrop = document.querySelector('.modal-backdrop-cus');
        var btnApplys = document.querySelectorAll('.btn-apply');
        var btnCloses = document.querySelectorAll('.close');

        btnApplys.forEach(function(btnApply) {
            btnApply.addEventListener('click', function() {
                formApply.classList.add('active');
                backdrop.classList.add('active');
            });
        });
        window.addEventListener('click', function(event) {
            var positionTarget = event.target;
            if (!formApply.contains(positionTarget) && ![...btnApplys].some(btnA => btnA.contains(positionTarget))) {
                formApply.classList.remove('active');
                backdrop.classList.remove('active');
            }
        });
        btnCloses.forEach(function(btnClose) {
            btnClose.addEventListener('click', function() {
                formApply.classList.remove('active');
                backdrop.classList.remove('active');
            });
        });
    }

    function getSiblings(element,direction) {
        var siblings = [];
        var sibling = (direction === 'next') ? element.nextSibling : element.previousSibling;

        while (sibling) {
            if (sibling.nodeType === 1) {
                siblings.push(sibling);
            }
            sibling = (direction === 'next') ? sibling.nextSibling : sibling.previousSibling;
        }

        return siblings;
    }

    function getSiblingss(element) {
        var siblings = [];
        var sibling = element.parentNode.firstChild;

        while (sibling) {
            if (sibling.nodeType === 1 && sibling !== element) {
                siblings.push(sibling);
            }
            sibling = sibling.nextSibling;
        }

        return siblings;
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