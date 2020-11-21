<?php

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once WPF_DIR . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'wpfunc_register_required_plugins');

/**
 * Register required plugins use in theme
 *
 * @since  1.0
 */
function wpfunc_register_required_plugins()
{
    $plugins = array(
        array(
            'name'               => 'Meta Box',
            'slug'               => 'meta-box',
            'required'           => true,
        ),
        array(
            'name'               => 'WPBakery Visual Composer',
            'slug'               => 'js_composer',
            'source'             => esc_url('http://plugins.themecitizen.com/wpf_domain/js_composer.zip'),
            'required'           => true,
        ),
        array(
            'name'               => 'Revolution Slider',
            'slug'               => 'revslider',
            'source'             => esc_url('http://plugins.themecitizen.com/wpf_domain/revslider.zip'),
            'required'           => true,
        ),
    );

    $config = array(
        'id'           => 'wptext',
        'default_path' => '',
        'menu'         => 'install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa($plugins, $config);
}
