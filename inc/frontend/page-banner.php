<?php

function bandq_show_page_title()
{
    $hide_page_title_section = bandq_get_option('hide_page_title');
    $show_breadcrumb = bandq_get_option('show_breadcrumb');

    if ((!is_search() && !is_archive()) && bandq_get_post_meta('mb_hide_title')) {
        $hide_page_title_section = bandq_get_post_meta('mb_hide_title');
    }
    
    if ($hide_page_title_section) {
        return;
    }

    if (bandq_get_post_meta('mb_hide_breadcrumb')) {
        $show_breadcrumb = bandq_get_post_meta('mb_hide_breadcrumb');
    }

    $section_style = '';
    $bg_img = bandq_get_option('page_title_bg_image');
    if ($bg_img) {
        if (isset($bg_img['url']) && !empty($bg_img['url'])) {
            $section_style = sprintf('style="background-image: url(%s)"', $bg_img['url']);
        }
    }

    include(locate_template('templates/banners/layout-1.php', false, false));
}
add_action('bandq_before_content', 'bandq_show_page_title');
