(function ($) {
    $(document).ready(function () {


        $('.search-top-form .list-items li a').click(function (e) {
            e.preventDefault(e);
            var value = $(this).attr('data-value');
            $('.search-top-form .search-cat').val(value);
            $('.search-top-form .current-cat').text($(this).text());
            $('.search-top-form .search-cat-id').val(value);
        });

//        $('.ver-menu .sub-ver-2').each(function () {
//            $(this).hover(function () {
//                var imgsrc = $(this).parent('li').find('.menu-bg').attr('data-src');
//                if (imgsrc !== '') {
//                    $('.ver-menu #load-bgmenu').html('<img src="' + imgsrc + '" />');
//                }
//            }, function () {
//                $('.ver-menu #load-bgmenu').html('');
//            });
//        });

        $('.ver-menu .sub-ver-1 li').each(function () {
            $(this).mouseover(function () {
                if ($(this).find('.menu-image').length > 0) {
                    var imgsrc = $(this).find('.menu-image').attr('src');
                    $('.ver-menu #load-bgmenu').html('<img src="' + imgsrc + '" />');
                }
            });
            $(this).mouseleave(function () {
                $('.ver-menu #load-bgmenu').html('');
            });

        });

        if (window.matchMedia("(min-width: 768px)").matches) {
//            $('.dropdown').hover(function () {
//                $('.dropdown-toggle', this).trigger('click');
//            });
        }

        $('li.dropdown').on('click', function () {
            var $el = $(this);
//                if ($el.hasClass('open')) {
            var $a = $el.children('a.dropdown-toggle');
            if ($a.length && $a.attr('href')) {
                location.href = $a.attr('href');
//                    }
            }
        });
        $('li.dropdown').on('mouseover', function () {
            $(this).addClass('open');
        });
        $('li.dropdown').on('mouseleave', function () {
            $(this).removeClass('open');
        });
        
        $('.tab-menu .product-tabs').each(function () {
            $(this).find('li:first').addClass('active');
        });
        $('.product-part .tab-content').each(function () {
            $(this).find('.products:first').addClass('active');
        });

        var slider1 = $('.says').bxSlider({
            auto: true,
            minSlides: 1,
            maxSlides: 1,
            slideWidth: 360
        });
        $(".bx-controls-direction").click(function () {
            var i = $(this).attr("data-slide-index");
            slider1.goToSlide(i);
            slider1.stopAuto();
            slider1.startAuto();
            return false;
        });
        
//        $('.images .thumbnails a').click(function(e){
//           e.preventDefault();
//           var imgurl = $(this).attr('href');
//           $('.images .woocommerce-main-image img').attr('src', imgurl);
//        });


    });
})(jQuery);

