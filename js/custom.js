/**
 * File custom.js.
 *
 * Theme custom enhancements
 *
 */

jQuery(document).ready(function($) {

    "use strict";

    var wheight = $(window).height(); //get the height of the window
    $('.fullheight').css('height', wheight*1); //set to window tallness

    //adjust height of .fullheight elements on window resize
    $(window).resize(function() {
        wheight = $(window).height(); //get the height of the window
        $('.fullheight').css('height', wheight*1); //set to window tallness
    });



    // To style all <select>s
    $('select').selectpicker();

    //sort the navbar so it reacts on hover
    $('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover();
    $('.dropdown').on('hidden.bs.dropdown', function(){
        $('.dropdown > a').blur();
    });

    // Scroll to top
    // Makes scroll to top appear only when user starts to scroll down
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });
    // Animation for scroll to top
    $('.scroll-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('img').each(function(){
        $(this).addClass(' img-responsive')
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });

    var bumpIt = function() {
            $('body').css('margin-bottom', $('.site-footer').height());
        },
        didResize = false;

    bumpIt();

    $(window).resize(function() {
        didResize = true;
    });
    setInterval(function() {
        if(didResize) {
            didResize = false;
            bumpIt();
        }
    }, 250);

    // initialize Isotope after all images have loaded
    var $container = $('#portfolio-items').imagesLoaded( function() {
        $container.isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
    });

// filter items on button click
    $('#filters').on( 'click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $container.isotope({ filter: filterValue });
    });

    $('#portfolio-carousel').carousel({interval:3500});
    $('#portfolio-carousel .carousel-indicators li:first').addClass("active");
    $('#portfolio-carousel .carousel-inner .item:first').addClass("active");



    var slideqty = $('#slider-carousel .item').length;
    var randSlide = Math.floor(Math.random()*slideqty);

    //replace IMG inside carousels with a background image
    $('#slider-carousel .item img').each(function() {
        var imgSrc = $(this).attr('src');
        $(this).parent().css({'background-image': 'url('+imgSrc+')'});
        $(this).remove();
    });

    $('#slider-carousel .item').eq(randSlide).addClass('active');

    //Automatically generate carousel indicators
    for (var i=0; i < slideqty; i++) {
        var insertText = '<li data-target="#slider-carousel" data-slide-to="' + i + '"';
        if (i === randSlide) {
            insertText += ' class="active" ';
        }
        insertText += '></li>';
        $('#slider-carousel ol').append(insertText);
    }

    $('#slider-carousel').carousel({interval:5000});

});