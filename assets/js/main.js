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
                    items: 3
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
     document.getElementById('fileInput').addEventListener('change', function () {
         displayFileName();
     });

 }
function displayFileName() {
    var fileInput = document.getElementById('fileInput');
    var fileNameDisplay = document.getElementById('fileNameDisplay');

    if (fileInput.files.length > 0) {
        fileNameDisplay.innerText =  fileInput.files[0].name;
    } else {
        fileNameDisplay.innerText = '';
    }
}
 if ($('#enterprise-filter').length > 0){
     $('#dropdownProfession, #dropdownProvince').change(function () {
         $(this).closest('form').submit();
     });
     $('#enterprise-filter').submit(function () {
         var filter = $('#enterprise-filter');
         $.ajax({
             url: filter.attr('action'),
             data: {
                 action: 'my_filter_function_profession',
                 profession: $('#dropdownProfession').val(),
                 province: $('#dropdownProvince').val()
             },
             type: filter.attr('method'),
             success: function (data) {
                 $('#primary').html(data);
             }
         });
         return false;
     });
 }
 if ($(".tab-review").length > 0){
     $(".tab-review").on('click', function () {
         $(this).parents('.widget-box-info').find('.box-info-review').addClass('active');
         $(this).parents('.widget-box-info').find('.box-write-review').removeClass('active');
         $(this).parents('.widget-box-info').find('.tab-review').addClass('active');
         $(this).parents('.widget-box-info').find('.tab-write-review').removeClass('active');
     });
 }

 if ($(".tab-write-review").length > 0){
     $(".tab-write-review").on('click', function () {
         $(this).parents('.widget-box-info').find('.box-info-review').removeClass('active');
         $(this).parents('.widget-box-info').find('.box-write-review').addClass('active');
         $(this).parents('.widget-box-info').find('.tab-review').removeClass('active');
         $(this).parents('.widget-box-info').find('.tab-write-review').addClass('active');
     });
 }
    if ($('#commentform').length > 0){
        $("#commentform").append($("#comment").parent());
        $("#commentform").append($(".form-submit-btn").parent());
        var stars = document.querySelectorAll('.rating-stars i');
        stars.forEach(function(star) {
            star.addEventListener('click', function() {
                var selectedValue = this.getAttribute('data-value');
                stars.forEach(function(s) {
                    s.classList.remove('selected');
                });
                for (var i = 0; i < selectedValue; i++) {
                    stars[i].classList.add('selected');
                }
                $('#rating_hide').val(selectedValue);
                console.log('Đã chọn ' + selectedValue + ' sao');
            });
        });
        stars[4].click();
    }
    if ($('#text_search_fill').length > 0 && $('.box-link-click').length > 0) {
        $('.box-link-click').on('click', function(event) {
            event.preventDefault();
            $('#text_search_fill').val($(this).text().trim());
        });
    }
});