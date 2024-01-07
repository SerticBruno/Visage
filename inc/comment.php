<?php
defined( 'ABSPATH' ) || exit;

/**
 * Disable comments for Media (Image-Post, Jetpack-Carousel, etc.)
 *
 * @since v1.0
 */
add_filter( 'comments_open', 'visage_new_theme_filter_media_comment_status', 10, 2 );
function visage_new_theme_filter_media_comment_status( $open, $post_id = null ) {
	$media_post = get_post( $post_id );
	if ( 'attachment' === $media_post->post_type ) {
		return false;
	}
	return $open;
}
