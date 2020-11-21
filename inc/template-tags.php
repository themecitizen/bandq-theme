<?php

/**
 * Register google fonts
 *
 * @return string
 */
if (!function_exists('bandq_fonts_url')) {
    function bandq_fonts_url()
    {
        $fonts_url = '';

        /* Translators: If there are characters in your language that are not
		* supported by Montserrat, translate this to 'off'. Do not translate
		* into your own language.
		*/

        $poppins = _x('on', 'Poppins font: on or off', 'bandq');
        /* Translators: If there are characters in your language that are not
		* supported by Montserrat, translate this to 'off'. Do not translate
		* into your own language.
		*/
        $monsterat = _x('on', 'Montserrat font: on or off', 'bandq');

        /* Translators: If there are characters in your language that are not
		* supported by Montserrat, translate this to 'off'. Do not translate
		* into your own language.
		*/
        $playball = _x('on', 'Playball font: on or off', 'bandq');

        $noto_serif = _x('on', 'Playball font: on or off', 'bandq');

        if ('off' !== $monsterat || 'off' !== $playball || 'off' !== $playball) {
            $font_families = array();

            if ('off' !== $poppins)
                $font_families[] = 'Poppins:400';

            if ('off' !== $monsterat)
                $font_families[] = 'Montserrat:400,700';

            if ('off' !== $playball)
                $font_families[] = 'Playball:400';

            if ('off' !== $noto_serif)
                $font_families[] = 'Noto Serif:300,400,500,600,700';

            $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
            );

            $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
        }

        return esc_url_raw($fonts_url);
    }
}

if (!function_exists('bandq_comments')) {
    /**
     * Function will make change HTML layout on each comment
     * @param  $comment array
     * @param  $args    array
     * @param  $depth   int
     *
     * @return mixed
     */
    function bandq_comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
?>

        <<?php echo esc_html($tag) ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent '); ?> id="comment-<?php comment_ID() ?>">
            <?php if ('div' != $args['style']) : ?>
                <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
                <?php endif; ?>
                <div class="media">
                    <?php
                    if (get_avatar($comment)) {
                    ?>
                        <div class="media-left">
                            <?php
                            if ($args['avatar_size'] != 0) {
                                echo get_avatar($comment, $args['avatar_size']);
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="media-body">
                        <div class="author-meta">
                            <div class="name d-flex justify-content-between">
                                <?php echo get_comment_author_link(); ?>
                                <div class="text-right">
                                    <a class="time" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                        <?php echo sprintf('%s at %s', get_comment_date('M d, Y'), get_comment_time('g:i a')); ?>
                                    </a>
                                    <?php
                                    comment_reply_link(
                                        array_merge(
                                            $args,
                                            array(
                                                'add_below' => $add_below,
                                                'depth' => $depth,
                                                'max_depth' => $args['max_depth'],
                                                'reply_text' => esc_html__('Reply', 'bandq'),
                                            )
                                        )
                                    );

                                    edit_comment_link(esc_html__('Edit', 'bandq'), '  ', '');
                                    ?>
                                </div>
                            </div>
                            <?php if ($comment->comment_approved == '0') : ?>
                                <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'bandq'); ?></em>
                            <?php endif; ?>
                        </div>
                        <div class="comment-content">
                            <?php comment_text(); ?>
                        </div>
                    </div>
                </div>

                <?php if ('div' != $args['style']) : ?>
                </div>
            <?php endif; ?>
        <?php
    }
}

if (!function_exists('bandq_parse_args')) :
    /**
     * Recursive merge user defined arguments into defaults array.
     *
     * @param array $args
     * @param array $default
     *
     * @return array
     */
    function bandq_parse_args($args, $default = array())
    {
        $args   = (array) $args;
        $result = $default;

        foreach ($args as $key => $value) {
            if (is_array($value) && isset($result[$key])) {
                $result[$key] = bandq_parse_args($value, $result[$key]);
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

endif;

if (!function_exists('bandq_get_mega_menu_setting_default')) :
    /**
     * Get the default mega menu settings of a menu item
     *
     * @return array
     */
    function bandq_get_mega_menu_setting_default()
    {
        return apply_filters(
            'bandq_mega_menu_setting_default',
            array(
                'mega'         => false,
                'icon'         => '',
                'hide_text'    => false,
                'disable_link' => false,
                'content'      => '',
                'width'        => '',
                'border'       => array(
                    'left' => 0,
                ),
                'background'   => array(
                    'image'      => '',
                    'color'      => '',
                    'attachment' => 'scroll',
                    'size'       => '',
                    'repeat'     => 'no-repeat',
                    'position'   => array(
                        'x'      => 'left',
                        'y'      => 'top',
                        'custom' => array(
                            'x' => '',
                            'y' => '',
                        ),
                    ),
                ),
            )
        );
    }
endif;

if (!function_exists('bandq_numeric_pagination')) {
    /**
     * pagination
     */
    function bandq_numeric_pagination()
    {
        global $wp_query;

        if ($wp_query->max_num_pages < 2) {
            return;
        }

        ?>
            <nav class="navigation numeric-navigation" role="navigation">
                <?php
                $big = 999999999;
                $args = array(
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'mid_size'  =>  1,
                    'end_size'  =>  0,
                    'prev_next' => true,
                    'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
                    'next_text' => '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
                    'current'   => max(1, get_query_var('paged')),
                    'type'      => 'list',
                    'total'     => $wp_query->max_num_pages,
                );

                echo paginate_links($args);
                ?>
            </nav>
    <?php
    }
}

if (!function_exists('bandq_post_thumbnail')) {
    /**
     * Display an optional post thumbnail
     */
    function bandq_post_thumbnail($thumbnail_size)
    {
        $output = '';
        $post_type = get_post_format();
        $class = 'format-' . $post_type;
        $size = 'wpf-blog-large-thumb';

        if (isset($thumbnail_size)) {
            $size = $thumbnail_size;
        }

        switch ($post_type) {
            case 'image':

                $image = get_post_meta(get_the_ID(), 'bandq_image', true);
                if (empty($image)) {
                    if (has_post_thumbnail()) {
                        $output = get_the_post_thumbnail(get_the_ID(), $size);
                        $image_id = get_post_thumbnail_id();
                    }
                } else {
                    $output = wp_get_attachment_image($image, $size);
                    $image_id = $image;
                }
                if (isset($image_id)) {
                    $caption = get_post($image_id)->post_excerpt;
                    $output .= sprintf('<div class="caption">%s</div>', $caption);
                }

                break;

            case 'video':
                $video = get_post_meta(get_the_ID(), 'video', true);
                if (!$video) {
                    break;
                }

                // If URL: show oEmbed HTML
                if (filter_var($video, FILTER_VALIDATE_URL)) {
                    if ($oembed = @wp_oembed_get($video, array('width' => 1140))) {
                        $output .= $oembed;
                    } else {
                        $atts = array(
                            'src'   => $video,
                            'width' => 870,
                        );

                        if (has_post_thumbnail()) {
                            $atts['poster'] = get_the_post_thumbnail_url(get_the_ID(), $size);
                        }
                        $output .= wp_video_shortcode($atts);
                    }
                } // If embed code: just display
                else {
                    $output .= $video;
                }

                break;
            case 'gallery':

                $images = get_post_meta(get_the_ID(), 'images');

                if (empty($images)) {
                    break;
                }

                $gallery = array();
                foreach ($images as $image) {
                    $gallery[] = wp_get_attachment_image($image, $size);
                }
                $output .= '<div class="post-format-images-carousel entry-gallery"><ul class="slides">' . implode('', $gallery) . '</ul></div>';

                break;
            default:
                if (has_post_thumbnail()) {
                    $output = get_the_post_thumbnail(get_the_ID(), $size);
                    $image_id = get_post_thumbnail_id();
                    $caption = get_post($image_id)->post_excerpt;
                    $output .= sprintf('<div class="caption">%s</div>', $caption);
                }
                break;
        }

        $repsonse = false;

        if (!empty($output)) {
            $repsonse = "<div class='entry-format $class'>$output</div>";
        }

        return $repsonse;
    }
}

/**
 * Function get post meta
 *
 * @since  1.0
 *
 * @param  $key string
 * @param  $args array
 * @param  $post_id int
 *
 * @return mixed
 */
function bandq_get_post_meta($key, $args = array(), $post_id = null)
{
    if (function_exists('rwmb_meta')) {
        return rwmb_meta($key, $args, $post_id);
    }

    /**
     * Use Meta Box plugin function
     */
    $post_id = empty($post_id) ? get_the_ID() : $post_id;
    $args    = wp_parse_args(
        $args,
        array(
            'type' => 'text',
        )
    );

    // Set 'multiple' for fields based on 'type'
    if (!isset($args['multiple'])) {
        $args['multiple'] = in_array($args['type'], array('checkbox_list', 'file', 'file_advanced', 'image', 'image_advanced', 'plupload_image', 'thickbox_image'));
    }

    $meta = get_post_meta($post_id, $key, !$args['multiple']);

    // Get uploaded files info
    if (in_array($args['type'], array('file', 'file_advanced'))) {
        if (is_array($meta) && !empty($meta)) {
            $files = array();
            foreach ($meta as $id) {
                if (get_attached_file($id)) {
                    $files[$id] = bandq_file_info($id);
                }
            }
            $meta = $files;
        }
    }

    // Get uploaded images info
    elseif (in_array($args['type'], array('image', 'plupload_image', 'thickbox_image', 'image_advanced'))) {
        global $wpdb;

        $meta = $wpdb->get_col(
            $wpdb->prepare(
                "SELECT meta_value FROM $wpdb->postmeta
					WHERE post_id = %d AND meta_key = '%s'
					ORDER BY meta_id ASC
				",
                $post_id,
                $key
            )
        );

        if (is_array($meta) && !empty($meta)) {
            $images = array();
            foreach ($meta as $id) {
                $images[$id] = bandq_file_info($id, $args);
            }
            $meta = $images;
        }
    }

    // Get terms
    elseif ('taxonomy_advanced' == $args['type']) {
        if (!empty($args['taxonomy'])) {
            $term_ids = array_map('intval', array_filter(explode(',', $meta . ',')));

            // Allow to pass more arguments to "get_terms"
            $func_args = wp_parse_args(
                array(
                    'include'    => $term_ids,
                    'hide_empty' => false,
                ),
                $args
            );
            unset($func_args['type'], $func_args['taxonomy'], $func_args['multiple']);
            $meta = get_terms($args['taxonomy'], $func_args);
        } else {
            $meta = array();
        }
    }

    // Get post terms
    elseif ('taxonomy' == $args['type']) {
        $meta = empty($args['taxonomy']) ? array() : wp_get_post_terms($post_id, $args['taxonomy']);
    }

    return $meta;
}

// Add new google for wpbakery visual element
//  500 bold:500:normal - title:font-weight:font-style
if (!function_exists('bandq_add_vc_google_fonts') && !has_filter('vc_google_fonts_get_fonts_filter', 'bandq_add_vc_google_fonts')) {
    function bandq_add_vc_google_fonts($fonts)
    {
        $fonts[] = json_decode('{"font_family":"Poppins","font_styles":"regular","font_types":"400 regular:400:normal,500 bold:500:normal,600 bold regular:600:normal,700 bold regular:700:normal"}');
        $fonts[] = json_decode('{"font_family":"Heebo","font_styles":"regular","font_types":"400 regular:400:normal,500 bold:500:normal,700 bold regular:700:normal"}');
        return $fonts;
    }
    add_filter('vc_google_fonts_get_fonts_filter', 'bandq_add_vc_google_fonts');
}
