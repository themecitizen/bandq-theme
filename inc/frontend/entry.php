<?php

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
if (!function_exists('bandq_custom_excerpt_more')) {
	function bandq_custom_excerpt_more($more)
	{
		$more_text = bandq_get_option('blog_custom_excerpt');
		if (!$more_text) {
			$more_text = '';
		}
		return $more_text;
	}

	add_filter('excerpt_more', 'bandq_custom_excerpt_more');
}

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if (!function_exists('bandq_custom_permalink_length')) {
	function bandq_custom_permalink_length($length)
	{
		$setting_length = bandq_get_option('blog_custom_excerp_length');
		$setting_length = apply_filters('bandq_custom_permalink_length', $setting_length);

		if ($setting_length) {
			$length = intval($setting_length);
		} else {
			$length = 30;
		}
		return $length;
	}

	add_filter('excerpt_length', 'bandq_custom_permalink_length');
}
