<?php

/**
 * Register metabox on for posts, pages and custom post-type
 *
 * @package WPF Start Theme
 */

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function bandq_register_meta_boxes($meta_boxes)
{
	// Post format
	$meta_boxes[] = array(
		'id'       => 'post-format-settings',
		'title'    => __('MetaBox Settings', 'bandq'),
		'pages'    => array('post'),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name'             => __('Image', 'bandq'),
				'id'               => 'mb_image',
				'type'             => 'image_advanced',
				'class'            => 'image',
				'max_file_uploads' => 1,
			),
			array(
				'name'  => __('Gallery', 'bandq'),
				'id'    => 'mb_images',
				'type'  => 'image_advanced',
				'class' => 'gallery',
			),
			array(
				'name'  => __('Audio', 'bandq'),
				'id'    => 'mb_audio',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'audio',
			),
			array(
				'name'  => __('Video', 'bandq'),
				'id'    => 'mb_video',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'video',
			),
			array(
				'name'  => __('Link', 'bandq'),
				'id'    => 'mb_url',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 1,
				'class' => 'link',
			),
			array(
				'name'  => __('Text', 'bandq'),
				'id'    => 'mb_url_text',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 1,
				'class' => 'link',
			),
			array(
				'name'  => __('Quote', 'bandq'),
				'id'    => 'mb_quote',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'quote',
			),
		),
	);

	// Dispaly Settings
	$meta_boxes[] = array(
		'id'       => 'display-settings',
		'title'    => __('Display Settings', 'bandq'),
		'pages'    => array('page'),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name'  => __('Custom CSS', 'bandq'),
				'id'    => 'mb_custom_css',
				'type'  => 'textarea',
				'std'   => false,
			)
		),
	);

	return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'bandq_register_meta_boxes');

/**
 * Enqueue scripts for admin
 *
 * @since  1.0
 */
function bandq_meta_boxes_scripts($hook)
{
	// Detect to load un-minify scripts when WP_DEBUG is enable
	$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

	if (in_array($hook, array('post.php', 'post-new.php'))) {
		wp_enqueue_script('wpf-meta-boxes', BANDQ_URL . "/js/admin/scripts.js", array('jquery'), BANDQ_VERSION, true);
	}
}
add_action('admin_enqueue_scripts', 'bandq_meta_boxes_scripts');
