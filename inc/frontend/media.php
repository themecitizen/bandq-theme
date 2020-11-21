<?php

/**
 * Get uploaded file information
 *
 * @param int   $file_id Attachment image ID (post ID). Required.
 * @param array $args    Array of arguments (for size).
 *
 * @return array|bool False if file not found. Array of image info on success
 */
function bandq_file_info($file_id, $args = array())
{
    $args = wp_parse_args($args, array(
        'size' => 'thumbnail',
    ));

    $img_src = wp_get_attachment_image_src($file_id, $args['size']);
    if (!$img_src) {
        return false;
    }

    $attachment = get_post($file_id);
    $path       = get_attached_file($file_id);
    return array(
        'ID'          => $file_id,
        'name'        => basename($path),
        'path'        => $path,
        'url'         => $img_src[0],
        'width'       => $img_src[1],
        'height'      => $img_src[2],
        'full_url'    => wp_get_attachment_url($file_id),
        'title'       => $attachment->post_title,
        'caption'     => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'alt'         => get_post_meta($file_id, '_wp_attachment_image_alt', true),
    );
}
