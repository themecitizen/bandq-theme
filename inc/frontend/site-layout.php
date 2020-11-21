<?php

/**
 * Created by PhpStorm.
 * User: BABYMASTER
 * Date: 16/03/2017
 * Time: 4:06 PM
 */

/**
 * Add Bootstrap's column classes
 *
 * @since 1.0
 *
 * @param array  $classes
 * @param string $class
 * @param string $post_id
 *
 * @return array
 */
function bandq_blog_classes($classes, $class = '', $post_id = '')
{
    if (is_home() || is_archive() || is_search()) {
        $classes[] = 'col-xs-4 blog-item';
    }

    return $classes;
}
// Add Bootstrap classes
add_filter('post_class', 'bandq_blog_classes', 10, 3);

function bandq_custom_body_classes($classes)
{
    $classes[] = bandq_get_layout();
    return $classes;
}
add_filter('body_class', 'bandq_custom_body_classes');
