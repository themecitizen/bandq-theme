<?php

/**
 * Function get saved option's value
 *
 * @param $field_id string id registered when generate theme options
 * @return $result string option's value
 */
function wpfunc_get_option($field_id)
{
    global $wptext_theme_options;
    if (isset($wptext_theme_options[$field_id])) {
        $result = $wptext_theme_options[$field_id];
    } else {
        $result = '';
    }
    return $result;
}

/**
 * Function return list socials available in theme
 *
 * @return array $socials socials name and link
 */

function wpfunc_get_socials()
{
    $socials = array(
        'facebook'  =>  array(
            'label'     =>  __('Facebook', 'wpf_domain'),
            'default'   =>  esc_url('http://facebook.com/'),
        ),
        'twitter'   =>  array(
            'label'     =>  __('Twitter', 'wpf_domain'),
            'default'   =>  esc_url('http://twitter.com/'),
        ),
        'linkedin'  =>  array(
            'label'     =>  __('LinkedIn', 'wpf_domain'),
            'default'   =>  '',
        ),
        'google-plus'    =>  array(
            'label'     =>  __('Google+', 'wpf_domain'),
            'default'   =>  esc_url('http://google.com/'),
        ),
        'tumblr'    =>  array(
            'label'     =>  __('Tumblr', 'wpf_domain'),
            'default'   =>  '',
        ),
        'youtube'   =>  array(
            'label'     =>  __('YouTube', 'wpf_domain'),
            'default'   =>  '',
        ),
        'instagram' =>  array(
            'label'     =>  __('Instagram', 'wpf_domain'),
            'default'   =>  '',
        ),
        'wordpress' =>  array(
            'label'     =>  __('Wordpress', 'wpf_domain'),
            'default'   =>  '',
        ),
        'dribbble'   =>  array(
            'label'     =>  __('Dribble', 'wpf_domain'),
            'default'   =>  esc_url('http://dribble.com/'),
        ),
        'behance'   =>  array(
            'label'     =>  __('Behance', 'wpf_domain'),
            'default'   =>  esc_url('http://behance.com/'),
        ),
        'pinterest' =>  array(
            'label'     =>  __('Pinterest', 'wpf_domain'),
            'default'   =>  esc_url('http://pinterest.com/'),
        )
    );

    return apply_filters('wptext_social_links', $socials);
}
