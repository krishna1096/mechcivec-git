;(function($){
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                var a = $(this),
                    items = a.data('items') || [1,1,1],
                    margin = a.data('margin'),
                    loop = a.data('loop'),
                    nav = a.data('nav'),
                    dots = a.data('dots'),
                    center = a.data('center'),
                    autoplay = a.data('autoplay'),
                    autoplaySpeed = a.data('autoplay-speed'),
                    rtl = a.data('rtl'),
                    autoheight = a.data('autoheight');
    
                var options = {
                    nav: nav || true,
                    loop: loop || false,
                    dots: dots || false,
                    center: center || false,
                    autoplay: autoplay || false,
                    autoHeight: autoheight || false,
                    rtl: rtl || false,
                    margin: margin || 0,
                    autoplayTimeout: autoplaySpeed || 3000,
                    autoplaySpeed: 400,
                    autoplayHoverPause: true,
                    navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                    responsive: {
                        0: { items: items[2] || 1 },
                        576: { items: items[1] || 1 },
                        1200: { items: items[0] || 1}
                    }
                };
    
                a.owlCarousel(options);
            });
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/teammember.default',function(scope,$){
            $('.team-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    700: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/projectwidget.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                var a = $(this),
                    items = a.data('items') || [1,2,3],
                    margin = a.data('margin'),
                    loop = a.data('loop'),
                    nav = a.data('nav'),
                    dots = a.data('dots'),
                    center = a.data('center'),
                    autoplay = a.data('autoplay'),
                    autoplaySpeed = a.data('autoplay-speed'),
                    rtl = a.data('rtl'),
                    autoheight = a.data('autoheight');
    
                var options = {
                    nav: nav || true,
                    loop: loop || false,
                    dots: dots || false,
                    autoplay: autoplay || true,
                    rtl: rtl || false,
                    margin: margin || 30,
                    autoplayTimeout: autoplaySpeed || 3000,
                    autoplaySpeed: 400,
                    autoplayHoverPause: true,
                    navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
                    responsive: {
                        0: { items: items[0] || 1 },
                    }
                };
    
                a.owlCarousel(options);
            });
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/portfolio.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                $('.portfolio-carousel').owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,
                    navText: [
                        "<i class='fal fa-long-arrow-left'></i>",
                        "<i class='fal fa-long-arrow-right'></i>"
                    ],
                    dots: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1300: {
                            items: 3,
                            margin: 15
                        }
                    }
                });
            });

        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/counterup.default',function(scope,$){
            $(scope).find('.timer').each(function() {
                $('.timer').countTo();
        $('.fun-fact').appear(function() {
            $('.timer').countTo();
        }, {
            accY: -100
        });
            });
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/consulting.default',function(scope,$){
           $('.appoinment-form select').niceSelect();
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/portfolio.default',function(scope,$){
        $('#portfolio-grid,.blog-masonry').imagesLoaded(function() {

            /* Filter menu */
            $('.mix-item-menu').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });

            /* filter menu active class  */
            $('.mix-item-menu button').on('click', function(event) {
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
                event.preventDefault();
            });

            /* Filter active */
            var $grid = $('#portfolio-grid').isotope({
                itemSelector: '.pf-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.pf-item',
                }
            });

            /* Filter active */
            $('.blog-masonry').isotope({
                itemSelector: '.blog-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.blog-item',
                }
            });

        });
        });
    });
    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/services.default',function(scope,$){
            $(scope).find('.owl-carousel').each(function() {
                $('.services-carousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: false,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>"
                    ],
                    dots: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
                /* ==================================================
                # Car Services Carousel
                ===============================================*/
                $('.car-ser-carousel').owlCarousel({
                    loop: true,
                    margin: 1,
                    nav: false,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>"
                    ],
                    dots: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        }
                    }
                });
            });
        });
    });

    $(window).on('elementor/frontend/init',function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/clients.default',function(scope,$){
            $('.clients-items').owlCarousel({
                loop: false,
                margin: 30,
                nav: false,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                dots: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
             $('.brand-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                800: {
                    items: 3
                },
                1200: {
                    items: 5
                }
            }
        });
        });
    });

    function doAnimations(elems) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';
        elems.each(function() {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function() {
                $this.removeClass($animationType);
            });
        });
    }

    //Variables on page load
    var $immortalCarousel = $('.animate_text'),
        $firstAnimatingElems = $immortalCarousel.find('.item:first').find("[data-animation ^= 'animated']");
    //Initialize carousel
    $immortalCarousel.carousel();
    //Animate captions in first slide on page load
    doAnimations($firstAnimatingElems);
    //Other slides to be animated on carousel slide event
    $immortalCarousel.on('slide.bs.carousel', function(e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });
    
    /* ==================================================
        # Smooth Scroll
     ===============================================*/
    $("body").scrollspy({
        target: ".navbar-collapse",
        offset: 200
    });
    $('ul.nav>li>a').on('click', function(event) {
        var $anchor = $(this);
        var headerH = '75';
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

})(jQuery);