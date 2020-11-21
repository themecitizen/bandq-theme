<?php

/**
 * Register Theme options page use Redux framework
 */

if (!class_exists('Redux')) {
    return;
}

// register option name
$theme_option_name = "wptext_theme_options";

/**
 * Register argument
 */
$theme = wp_get_theme();

/**
 * Hook for register admin menu item and page option
 */
do_action('wptext_register_option_page', $theme_option_name, $theme);

/**
 * Hook for register help tab menu
 */
do_action('wptext_register_help_tab', $theme_option_name);

/**
 * Hook for register sections and section's field on page option
 */
do_action('wptext_register_setting_setions', $theme_option_name);
