<?php

/**
 * Enqueue main scripts and styles
 *
 * @return void
 * @since  1.0
 */
function bandq_enqueue_scripts()
{
    wp_register_style('google-fonts', bandq_fonts_url());
    wp_register_style('font-awesome', BANDQ_URL . '/css/font-awesome.min.css', array(), '4.6.3');
    wp_register_style('bootstrap', BANDQ_URL . '/css/bootstrap.min.css', array(), '4.0.0');
    wp_enqueue_style('wpf-style', get_template_directory_uri() . '/style.css', array('google-fonts', 'font-awesome', 'bootstrap'), BANDQ_VERSION);

    //    if ( is_home() || is_archive() )
    //    {
    //        wp_enqueue_script( 'imagesloaded' );
    //        wp_enqueue_script( 'jquery-masonry' );
    //    }
    //
    //    if( wp_script_is( 'wc-add-to-cart-variation', 'registered' ) && ! wp_script_is( 'wc-add-to-cart-variation', 'enqueued' ) )
    //    {
    //        wp_enqueue_script( 'wc-add-to-cart-variation' );
    //    }
    //
    //    wp_enqueue_script( 'bandq' );
    //
    //    if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
    //        wp_enqueue_script( 'comment-reply' );
}


add_action('wp_enqueue_scripts', 'bandq_enqueue_scripts', 10);

/**
 * Print header script
 *
 * @return void
 * @since  1.0.1
 */
function bandq_generate_header_scripts()
{
    $header_scripts = bandq_get_option('custom_header_editor');

    if (!empty($header_scripts)) {
        wp_add_inline_script('wpf-scripts', $header_scripts);
    }
}


add_action('wp_head', 'bandq_generate_header_scripts');

function bandq_typography()
{
    $props = array('font-family', 'font-size', 'font-weight', 'text-align', 'line-height', 'color');
    $body_typo = bandq_get_option('body_typography');
    $h1_typo = bandq_get_option('h1_typography');
    $h2_typo = bandq_get_option('h2_typography');
    $h3_typo = bandq_get_option('h3_typography');
    $h4_typo = bandq_get_option('h4_typography');
    $h5_typo = bandq_get_option('h5_typography');
    $h6_typo = bandq_get_option('h6_typography');
    $list_body_prop = '';
    $list_h1_prop = '';
    $list_h2_prop = '';
    $list_h3_prop = '';
    $list_h4_prop = '';
    $list_h5_prop = '';
    $list_h6_prop = '';
    $typo = '';

    foreach ($props as $prop) {
        if (isset($body_typo[$prop]) && $body_typo[$prop]) {
            $list_body_prop .= sprintf('%s: %s; ', $prop, $body_typo[$prop]);
        }
        if (isset($h1_typo[$prop]) && $h1_typo[$prop]) {
            $list_h1_prop .= sprintf('%s: %s; ', $prop, $h1_typo[$prop]);
        }
        if (isset($h2_typo[$prop]) && $h2_typo[$prop]) {
            $list_h2_prop .= sprintf('%s: %s; ', $prop, $h2_typo[$prop]);
        }
        if (isset($h3_typo[$prop]) && $h3_typo[$prop]) {
            $list_h3_prop .= sprintf('%s: %s; ', $prop, $h3_typo[$prop]);
        }
        if (isset($h4_typo[$prop]) && $h4_typo[$prop]) {
            $list_h4_prop .= sprintf('%s: %s; ', $prop, $h4_typo[$prop]);
        }
        if (isset($h5_typo[$prop]) && $h5_typo[$prop]) {
            $list_h5_prop .= sprintf('%s: %s; ', $prop, $h5_typo[$prop]);
        }
        if (isset($h6_typo[$prop]) && $h6_typo[$prop]) {
            $list_h6_prop .= sprintf('%s: %s; ', $prop, $h6_typo[$prop]);
        }
    }

    if (!empty($list_body_prop)) {
        $typo = bandq_style_body_css($list_body_prop);
    }


    if (!empty($list_h1_prop)) {
        $typo .= bandq_style_h1_css($list_h1_prop);
    }

    if (!empty($list_h2_prop)) {
        $typo .= bandq_style_h2_css($list_h2_prop);
    }

    if (!empty($list_h3_prop)) {
        $typo .= bandq_style_h3_css($list_h3_prop);
    }

    if (!empty($list_h4_prop)) {
        $typo .= bandq_style_h4_css($list_h4_prop);
    }

    if (!empty($list_h5_prop)) {
        $typo .= bandq_style_h5_css($list_h5_prop);
    }

    if (!empty($list_h6_prop)) {
        $typo .= bandq_style_h6_css($list_h6_prop);
    }

    if (!empty($typo)) {
        wp_add_inline_style('wpf-style', $typo);
    }
}
add_action('wp_enqueue_scripts', 'bandq_typography', 15);

function bandq_style_body_css($props)
{

    return <<<CSS
	body,
	p,
	a {
		  $props
    }
CSS;
}

function bandq_style_h1_css($props)
{

    return <<<CSS
	h1 {
		  $props;
    }
CSS;
}

function bandq_style_h2_css($props)
{

    return <<<CSS
	h2,
	h2.site-description, 
	h2.entry-title {
		  $props;
    }
CSS;
}

function bandq_style_h3_css($props)
{

    return <<<CSS
	h3 {
		  $props;
    }
CSS;
}

function bandq_style_h4_css($props)
{

    return <<<CSS
	h4 {
		  $props;
    }
CSS;
}

function bandq_style_h5_css($props)
{

    return <<<CSS
	h5 {
		  $props;
    }
CSS;
}

function bandq_style_h6_css($props)
{

    return <<<CSS
	h6 {
		  $props;
    }
CSS;
}

function bandq_custom_style()
{
    $custom_css = '';

    $custom_css .= bandq_get_post_meta('mb_custom_css');

    wp_add_inline_style('wpf-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'bandq_custom_style', 11);
