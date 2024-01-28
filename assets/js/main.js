function navOpen() {
    var x = document.getElementById("menu-reponsive");
    if (x.className === "site-navigation") {
        x.className += " navigation-open";
    } else {
        x.className = "site-navigation";
    }
}
function clickChangeUrls(url) {
    document.location.href = url;
}

$(document).ready(function() {
    if ($('.section-product .owl-carousel').length > 0){
        var path_resource = themeData.direc_url;
        var arrow_left = path_resource+"image/left.svg";
        var arrow_right = path_resource+"image/next.svg";
        $('.section-product .owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            margin: 34,
            navText: [
                '<a href="javascript:;" class="owl_next prev_owl"><img src='+arrow_left+' alt="left"></a>',
                '<a href="javascript:;" class="owl_prev next_owl"><img src='+arrow_right+' alt="right"></a>'
            ],
            responsive: {
                0: {
                    nav: false,
                    items: 1
                },
                767: {
                    nav: false,
                    items: 2
                },
                991: {
                    nav: false,
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
        // $('.section-product .owl-carousel .owl-nav').removeClass('disabled');
    }

    if ($('.owl-carousel.shs-nav-blog-releated-1').length > 0 ){
        $('.owl-carousel.shs-nav-blog-releated-1').owlCarousel({
            startPosition: 0,
            nav: true,
            loop: true,
            margin: 10,
            navText: ["<i class='fa-solid fa-chevron-left'></i>","<i class='fa-solid fa-chevron-right'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: true,
                    // center: true,
                },
                768: {
                    items: 4,
                    nav: true,
                    // center: true,
                }
            },
        });
        $('.owl-carousel.shs-nav-blog-releated-1 .owl-nav').removeClass('disabled');
    }

 if ($('#dropdownAddress').length > 0){
     $('#dropdownAddress').select2();
 }

    $('#_cmb_profession').select2({
        placeholder: 'Chọn ngành nghề',
        allowClear: true,
        multiple: true,
    });

 if ($('#triggerFileInput').length > 0){
     document.getElementById('triggerFileInput').addEventListener('click', function() {
         document.getElementById('fileInput').click();
     });
 }

});