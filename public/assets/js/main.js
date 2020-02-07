(function($) {
    'use strict';

    $(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() {
            $(this).remove();
        });
        $(".slides__preload_wrapper").fadeOut(1500);
    });

    $('.single-page-nav').singlePageNav({
        offset: $('.single-page-nav').outerHeight(),
        filter: ':not(.external)',
        updateHash: true,
    });

    $("#navigation").menumaker({
        title: "",
        format: "multitoggle"
    });

    var wow = new WOW({
        mobile: false
    });
    wow.init();

    $(".scrollup").on('click', function() {
        $('html,body').animate({
            'scrollTop': '0'
        }, 4000);
        return false;
    });

})(jQuery);
