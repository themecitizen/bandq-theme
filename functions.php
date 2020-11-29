<?php

/**
 * functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPF Start Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 660;
}
/**
 * Define theme's constants
 */
define('BANDQ_VERSION', '1.0.0');
define('BANDQ_PATH', get_template_directory());
define('BANDQ_URL', get_template_directory_uri());

if (!function_exists('bandq_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bandq_setup()
    {
        /*
         * Make theme available for translation.
         */
        load_theme_textdomain('bandq', get_template_directory() . '/languages');

        // Add theme features
        add_theme_support('woocommerce');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_editor_style();
        /* For Gutenberg */
        add_theme_support('wp-block-styles');
        // Add support for full and wide align images.
        add_theme_support('align-wide');
        add_theme_support('align-full');
        add_theme_support('responsive-embeds');
        // Add support for editor styles.
        add_theme_support('editor-styles');
        // Enqueue editor styles.
        if (bandq_fonts_url()) {
            add_editor_style(array('css/gutenberg.css', bandq_fonts_url()));
        } else {
            add_editor_style('css/gutenberg.css');
        }
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'bandq'),
            'footer'  => __('Footer Menu', 'bandq'),
            'mobile'  => __('Mobile Menu', 'bandq'),
        ));

        // Register new image sizes
        add_image_size('bandp-custom-blog-list-thumbnail', 770, 460, true);
    }
}
add_action('after_setup_theme', 'bandq_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bandq_content_width()
{
    $GLOBALS['content_width'] = apply_filters('bandq_content_width', 640);
}
add_action('after_setup_theme', 'bandq_content_width', 0);

/**
 * Register widget area.
 */
function bandq_widgets_init()
{
    $sidebars = array(
        'blog-sidebar' => __('Blog Sidebar', 'bandq'),
        'shop-sidebar' => __('Shop Sidebar', 'bandq'),
        'top-sidebar'  => __('Top Sidebar', 'bandq'),
    );

    // Register sidebars
    foreach ($sidebars as $id => $name) {
        register_sidebar(array(
            'name'          => $name,
            'id'            => $id,
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }

    // Register footer sidebars
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name'          => __('Footer', 'bandq') . " $i",
            'id'            => "footer-sidebar-$i",
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }
}
add_action('widgets_init', 'bandq_widgets_init');

require BANDQ_PATH . '/inc/template-tags.php';
require BANDQ_PATH . '/inc/functions/theme-options.php';
require BANDQ_PATH . '/inc/functions/breadcrumbs.php';
require BANDQ_PATH . '/inc/functions/site-layout.php';

if (is_admin()) {
    require BANDQ_PATH . '/inc/backend/meta-boxes.php';
} else {
    require BANDQ_PATH . '/inc/frontend/media.php';
    require BANDQ_PATH . '/inc/frontend/mobile-nav.php';
    require BANDQ_PATH . '/inc/frontend/scripts.php';
    require BANDQ_PATH . '/inc/frontend/header.php';
    require BANDQ_PATH . '/inc/frontend/footer.php';
    require BANDQ_PATH . '/inc/frontend/site-layout.php';
    require BANDQ_PATH . '/inc/frontend/entry.php';
}
