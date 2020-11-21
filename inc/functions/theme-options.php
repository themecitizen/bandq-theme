<?php

/**
 * Function get saved option's value
 *
 * @param $field_id string id registered when generate theme options
 * @return $result string option's value
 */
function bandq_get_option($field_id)
{
    global $bandq_theme_options;
    if (isset($bandq_theme_options[$field_id])) {
        $result = $bandq_theme_options[$field_id];
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

function bandq_get_socials()
{
    $socials = array(
        'facebook'  =>  array(
            'label'     =>  __('Facebook', 'bandq'),
            'default'   =>  esc_url('http://facebook.com/'),
        ),
        'twitter'   =>  array(
            'label'     =>  __('Twitter', 'bandq'),
            'default'   =>  esc_url('http://twitter.com/'),
        ),
        'linkedin'  =>  array(
            'label'     =>  __('LinkedIn', 'bandq'),
            'default'   =>  '',
        ),
        'google-plus'    =>  array(
            'label'     =>  __('Google+', 'bandq'),
            'default'   =>  esc_url('http://google.com/'),
        ),
        'tumblr'    =>  array(
            'label'     =>  __('Tumblr', 'bandq'),
            'default'   =>  '',
        ),
        'youtube'   =>  array(
            'label'     =>  __('YouTube', 'bandq'),
            'default'   =>  '',
        ),
        'instagram' =>  array(
            'label'     =>  __('Instagram', 'bandq'),
            'default'   =>  '',
        ),
        'wordpress' =>  array(
            'label'     =>  __('Wordpress', 'bandq'),
            'default'   =>  '',
        ),
        'dribbble'   =>  array(
            'label'     =>  __('Dribble', 'bandq'),
            'default'   =>  esc_url('http://dribble.com/'),
        ),
        'behance'   =>  array(
            'label'     =>  __('Behance', 'bandq'),
            'default'   =>  esc_url('http://behance.com/'),
        ),
        'pinterest' =>  array(
            'label'     =>  __('Pinterest', 'bandq'),
            'default'   =>  esc_url('http://pinterest.com/'),
        )
    );

    return apply_filters('bandq_social_links', $socials);
}
