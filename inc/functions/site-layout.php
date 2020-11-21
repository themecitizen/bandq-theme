<?php

/**
 * Function get column class follow bootstrap
 * @param null $layout
 * 0@return string
 */
function wpfunc_get_layout()
{
    $layout = '';
    if (is_page()) {
        $layout = wpfunc_get_option('layout_page');
    } else if (is_singular('post')) {
        $layout = wpfunc_get_option('layout_post');
    }

    if (!$layout || is_home() || is_front_page()) {
        $layout = 'full-content';
    }

    return $layout;
}

/**
 * Function get column class follow bootstrap
 * @param null $layout
 * 0@return string
 */
function wpfunc_get_column($layout = null)
{
    $layout = $layout ? $layout : wpfunc_get_layout();
    if ('full-content' == $layout) {
        return implode(' ', array('col-xs-12'));
    }

    return implode(' ', array('col-sm-9', 'col-xs-12'));
}
