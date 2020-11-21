(function ($) {
    'use strict';
    var tzTheme = tzTheme || {};
    tzTheme.init = function () {
        this.$window = $(window);
        this.$body = $(document.body);

        this.toggleMobileNav();
    };

    tzTheme.toggleMobileNav = function () {
        var $navMobile = tzTheme.$body.find('#mobile-menu-nav'),
            $toogleButton = tzTheme.$body.find('.navbar-toggler'),
            $nav = tzTheme.$body.find('.mobile-nav-container');
        $navMobile.find('.toggle-submenu').on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            var $current = $(this),
                $parent = $current.closest('.menu-item');
            $parent.toggleClass('expanded');
            $parent.children('.sub-menu').stop(true, true).slideToggle();
        });
        $toogleButton.on('click', function (e) {
            e.preventDefault();
            var $current = $(this);
            $current.toggleClass('collapsed');
            $nav.toggleClass('showed');
        });
        $nav.find('#close-mobile-nav').on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            $nav.removeClass('showed');
            $toogleButton.addClass('collapsed');
        });
        $nav.on('click', function (e) {
            e.preventDefault();
            $nav.find('#close-mobile-nav').trigger('click');
        });
    };

    /**
     * Document ready
     */
    $(function () {
        tzTheme.init();
    });

})(jQuery);