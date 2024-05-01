var window, document, jQuery;
(function (jQuery) {
    "use strict"; 

    var swiper = new Swiper('.top_slider', {
        spaceBetween: 30,
        loop:true,
        autoplay: {
        delay: ajax_admin.ajax_data.image_speed,
        disableOnInteraction: false,
        },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
    });

    jQuery("#myCarousel" ).carousel({
        interval:ajax_admin.ajax_data.image_speed,
    });

    if ( ajax_admin.ajax_data.sticky_header == 'on' ) {
        jQuery(document).ready(function() {
        jQuery(window).scroll(function () {
        if( jQuery(window).width() > 768) {
            if (jQuery(this).scrollTop() > 100) {
            jQuery('header').addClass('sticky-header');
            }
            else {
        jQuery('header').removeClass('sticky-header');
        }
        }
            else {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('header').addClass('sticky-header');
            }else {
        jQuery('header').removeClass('sticky-header');
        }
            }               
        });
        });
    }
})(jQuery);
