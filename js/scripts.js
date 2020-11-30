(function ($) {
    'use strict';
    var tzTheme = tzTheme || {};
    tzTheme.init = function () {
        this.$window = $(window);
        this.$body = $(document.body);

        this.socialsInfoCarousel();
        this.toggleMobileNav();
    };

    tzTheme.socialsInfoCarousel = function () {
        var $container = tzTheme.$body.find('#site-footer .social-section');

        var $slide = $container.find('.socials-info');

        $slide.not('.slick-initialized').slick({
            arrows: false,
            dots: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            infinite: true,
            swipeToSlide: true,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        autoplay: false,
                        centerMode: false
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        autoplay: false,
                        centerMode: false
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        autoplay: false,
                        centerMode: false
                    }
                },
                {
                    breakpoint: 390,
                    settings: {
                        slidesToShow: 1,
                        autoplay: false,
                        centerMode: false
                    }
                }
            ]
            
        });
    },

    tzTheme.toggleMobileNav = function () {
        // var $navMobile = tzTheme.$body.find('#mobile-menu-nav'),
        //     $toogleButton = tzTheme.$body.find('.navbar-toggler'),
        //     $nav = tzTheme.$body.find('.mobile-nav-container');
            tzTheme.$body.find('.toggle-menu').on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            var $current = $(this),
                $parent = $current.parents('.left-content');
            $parent.find('.navbar').stop(true, true).slideToggle();
        });
        // $toogleButton.on('click', function (e) {
        //     e.preventDefault();
        //     var $current = $(this);
        //     $current.toggleClass('collapsed');
        //     $nav.toggleClass('showed');
        // });
        // $nav.find('#close-mobile-nav').on('click', function (e) {
        //     e.stopPropagation();
        //     e.preventDefault();
        //     $nav.removeClass('showed');
        //     $toogleButton.addClass('collapsed');
        // });
        // $nav.on('click', function (e) {
        //     e.preventDefault();
        //     $nav.find('#close-mobile-nav').trigger('click');
        // });
    };

    /**
     * Document ready
     */
    $(function () {
        tzTheme.init();
    });

})(jQuery);