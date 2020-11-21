<?php

function wpfunc_show_page_title()
{
    $hide_page_title_section = wpfunc_get_option('hide_page_title');
    $show_breadcrumb = wpfunc_get_option('show_breadcrumb');

    if ((!is_search() && !is_archive()) && wpfunc_get_post_meta('mb_hide_title')) {
        $hide_page_title_section = wpfunc_get_post_meta('mb_hide_title');
    }
    
    if ($hide_page_title_section) {
        return;
    }

    if (wpfunc_get_post_meta('mb_hide_breadcrumb')) {
        $show_breadcrumb = wpfunc_get_post_meta('mb_hide_breadcrumb');
    }

    $section_style = '';
    $bg_img = wpfunc_get_option('page_title_bg_image');
    if ($bg_img) {
        if (isset($bg_img['url']) && !empty($bg_img['url'])) {
            $section_style = sprintf('style="background-image: url(%s)"', $bg_img['url']);
        }
    }

    include(locate_template('templates/banners/layout-1.php', false, false));
}
add_action('wptext_before_content', 'wpfunc_show_page_title');
