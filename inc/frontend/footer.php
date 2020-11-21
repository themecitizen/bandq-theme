<?php

/**
 * Hooks custom elements in footer
 */

/**
 * Function displays widgets registered on footer
 */
if (!function_exists('wpfunc_footer_layout')) {
    function wpfunc_footer_layout()
    {
        $footer_layout = wpfunc_get_option('footer_layout');

        $select_footer = wpfunc_get_post_meta('custom_footer');

        if ($select_footer) {
            $footer_layout = wpfunc_get_post_meta('footer_layout');
        }

        $footer_layout = apply_filters('wpfunc_footer_layout_args', $footer_layout);

        if ('type1' == $footer_layout) {
            get_template_part('templates/footers/layout', '1');
        } else if ('type2' == $footer_layout) {
            get_template_part('templates/footers/layout', '2');
        } else if ('type3' == $footer_layout) {
            get_template_part('templates/footers/layout', '3');
        } else if ('type4' == $footer_layout) {
            get_template_part('templates/footers/layout', '4');
        } else {
            get_template_part('templates/footers/layout', '1');
        }
    }
}

add_action('wptext_footer', 'wpfunc_footer_layout', 10);

/**
 * Function footer type
 */
if (!function_exists('wpfunc_footer_type')) {
    function wpfunc_footer_type($footer_type)
    {
        $footer_layout = wpfunc_get_option('footer_layout');

        $select_footer = wpfunc_get_post_meta('wpfunc_custom_footer');

        if ($select_footer) {
            $footer_layout = wpfunc_get_post_meta('wpfunc_footer_layout');
        }

        $footer_layout = apply_filters('wpfunc_footer_type_args', $footer_layout);

        if ($footer_layout) {
            $footer_type[] = $footer_layout;
        } else {
            $footer_type[] = 'type1';
        }


        return $footer_type;
    }
}

add_filter('wptext_footer_type', 'wpfunc_footer_type');

/**
 * Function display mobile menu
 */
function wpfunc_mobile_menu()
{
    $location = has_nav_menu('mobile') ? 'mobile' : 'primary';
?>
    <div class="mobile-nav-container">
        <div class="wrapper">
            <div class="mobile-nav-header">
                <a href="#" id="close-mobile-nav" class="close-mobile-nav"></a>
            </div>
            <nav id="mobile-menu-nav" class="mobile-nav mobile-menu-nav" role="navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => $location,
                    'container'      => false,
                    'walker'    => new WPCLASS_Mobile_Nav_Walker(),
                ));
                ?>
            </nav>
        </div>
    </div>
<?php
}
// add_action('wp_footer', 'wpfunc_mobile_menu');
