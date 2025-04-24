(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
    
    
    // Initiate the wowjs
    new WOW().init();
    

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top shadow-sm').css('top', '0px');
        } else {
            $('.nav-bar').removeClass('sticky-top shadow-sm').css('top', '-100px');
        }
    });


    // Header carousel
    var headerCarousel = $(".header-carousel");
    headerCarousel.owlCarousel({
        animateOut: 'fadeOut',
        items: 1,
        margin: 0,
        stagePadding: 0,
        autoplay: true,
        autoplayTimeout: 5000,  // slower slide change
        smartSpeed: 500,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
    });

    
 // Pause carousel autoplay when interacting with model-viewer
headerCarousel.find('model-viewer').each(function() {
    var modelViewer = $(this);
    modelViewer.on('pointerdown', function() {
        headerCarousel.trigger('stop.owl.autoplay');
    });
    modelViewer.on('pointerup pointerleave', function() {
        headerCarousel.trigger('play.owl.autoplay', [5000]);
    });
});

// Prevent carousel slide changes while interacting with model-viewer
headerCarousel.on('changed.owl.carousel', function(event) {
    if (headerCarousel.hasClass('interaction-mode')) {
        headerCarousel.trigger('to.owl.carousel', [event.item.index]);
    }
});

headerCarousel.find('model-viewer').each(function() {
    var modelViewer = $(this);
    modelViewer.on('pointerdown', function() {
        headerCarousel.addClass('interaction-mode');
    });
    modelViewer.on('pointerup pointerleave', function() {
        headerCarousel.removeClass('interaction-mode');
    });
});



    // testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: false,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="fa fa-arrow-right"></i>',
            '<i class="fa fa-arrow-left"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 5,
        time: 2000
    });


   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


})(jQuery);

