(function ($) {
    "use strict";

    $(".scroll-top").hide();
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 300) {
            $(".scroll-top").fadeIn();
        } else {
            $(".scroll-top").fadeOut();
        }
    });
    $(".scroll-top").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            700
        );
    });

    $(document).ready(function () {
        $(".select2").select2({
            theme: "bootstrap",
        });
    });

    new WOW().init();

    $(".video-button").magnificPopup({
        type: "iframe",
        gallery: {
            enabled: true,
        },
    });

    $(".magnific").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });

    $(".slide-carousel").owlCarousel({
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        margin: 0,
        mouseDrag: false,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
        nav: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    $(".testimonial-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 1500,
        margin: 30,
        nav: false,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav: true,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
        },
    });

    $(".room-detail-carousel").owlCarousel({
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        margin: 0,
        mouseDrag: false,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
        nav: true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    jQuery(".mean-menu").meanmenu({
        meanScreenWidth: "991",
    });

    tinymce.init({
        selector: ".editor",
        height: "300",
    });

    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true
    });
})(jQuery);
