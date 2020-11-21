<?php

/**
 * Function show header
 */
function bandq_show_header()
{
    $header_layout = bandq_get_option('header_layout');
    $select_header = bandq_get_post_meta('mb_custom_header');
    if ($select_header) {
        $header_layout = bandq_get_post_meta('mb_header_layout');
    }
    $header_layout = apply_filters('bandq_header_layout_args', $header_layout);

    if ($header_layout) {
        get_template_part('templates/headers/layout', $header_layout);
    } else {
        get_template_part('templates/headers/layout', '1');
    }
}

add_action('bandq_header', 'bandq_show_header');

/**
 * Function add more class for individual header types
 * @param $header_class array header's class
 * @return $header_class array header's class
 */
function bandq_header_type($header_class)
{
    $header_layout = bandq_get_option('header_layout');
    $select_header = bandq_get_post_meta('mb_custom_header');
    if ($select_header) {
        $header_layout = bandq_get_post_meta('mb_header_layout');
    }
    $header_layout = apply_filters('bandq_header_layout_args', $header_layout);
    /**
     * Get option layout from url
     */

    if ($header_layout) {
        $header_class[] = sprintf('type%s', $header_layout);
    } else {
        $header_class[] = 'type1';
    }
    return $header_class;
}
add_filter('bandq_header_class', 'bandq_header_type');

/**
 * Display site's favicon
 */

function bandq_site_icons()
{
    $favicon = bandq_get_option('general_favicon');
    if (isset($favicon['url']) && !empty($favicon['url'])) {
        if (!(function_exists('has_site_icon') && has_site_icon())) {
            echo '<link rel="icon" type="image/x-ico" href="' . esc_url($favicon['url']) . '" />';
        }
    }
}
add_action('wp_head', 'bandq_site_icons');
