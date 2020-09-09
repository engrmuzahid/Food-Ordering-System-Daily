(function ($) {
    $(document).ready(function () {
        //mobile menu custom js
        $(".mobile-home-btn").on("click", function () {
            $("html").animate({
                scrollTop: 0
            }, 800);
        });
        $(".mobile-menu-btn").on("click", function () {
            $('ul.mobile-menu').css({
                'right': '0',
                'opacity': '1',
                'transition': 'all .5s',
            });
        });
        $("#close").on("click", function () {
            $('ul.mobile-menu').css({
                'right': '-100%',
                'opacity': '0',
                'transition': 'all .8s',
            });
        });
        $("ul.mobile-menu li a").on("click", function () {
            $('ul.mobile-menu').css({
                'right': '-100%',
                'opacity': '0',
                'transition': 'all .8s',
            });
        });

        //sticky menu when scroll
        $(window).on('scroll', function () {
            var scroll = $(window).scrollTop();
            if (scroll > 70) {
                $(".main-menu-section").addClass("sticky_top_section");
            } else {
                $(".main-menu-section").removeClass("sticky_top_section");
            }
        });

        //sticky mobile header when scroll
        $(window).on('scroll', function () {
            var scroll = $(window).scrollTop();
            if (scroll > 0) {
                $(".mobile-header").addClass("sticky-mobile-header");
            } else {
                $(".mobile-header").removeClass("sticky-mobile-header");
            }
        });

        //hero slider
        $('#hero-slider').owlCarousel({
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            mouseDrag: false,
            touchDrag: false,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                600: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });
        //slider animation
        $('#hero-slider').on('translate.owl.carousel', function () {
            $('.hero-content h1, .hero-content h3, .view-btn a, .buy-btn a').removeClass('animated fadeInUp').css('opacity', '0');
        });
        $('#hero-slider').on('translated.owl.carousel', function () {
            $('.hero-content h1, .hero-content h3, .view-btn a, .buy-btn a').addClass('animated fadeInUp').css('opacity', '0');
        });

//package slider
        $('.menu-items').owlCarousel({
            margin: 15,
            autoplay: false,
            responsiveClass: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                600: {
                    items: 2,
                    nav: true,
                    loop: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: true
                }
            }
        });

//package details slider
        $('.package-tumbnail').owlCarousel({
            margin: 0,
            autoplay: true,
            responsiveClass: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                600: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });

//reviews slider
        $('.reviews-slide').owlCarousel({
            margin: 0,
            autoplay: true,
            responsiveClass: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    loop: true
                },
                600: {
                    items: 1,
                    loop: true
                },
                1000: {
                    items: 1,
                    loop: true
                }
            }
        });

//related-item-slide
        $('.related-item-slide').owlCarousel({
            margin: 10,
            autoplay: true,
            responsiveClass: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    loop: true
                },
                600: {
                    items: 2,
                    loop: true
                },
                1000: {
                    items: 1,
                    loop: true
                }
            }
        });

        //WoW js activation
        new WOW().init();

        //back to top show when scroll
        $(".back_to_top i.fa").css("display", "none");
        $(window).on('scroll', function () {
            var scroll = $(window).scrollTop();
            if (scroll < 300) {
                $(".back_to_top i.fa").css("display", "none");
            } else {
                $(".back_to_top i.fa").css("display", "block");
            }
        });
        $(".back_to_top i.fa").on("click", function () {
            $("html").animate({
                scrollTop: 0
            }, 800);
        });



    });
})(jQuery);

/*package details taps*/
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
 