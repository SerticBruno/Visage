<?php
defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'visage_theme_enqueue_styles' );
function visage_theme_enqueue_styles() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'theme-styles', THEME_URL . '/assets/css/style.min.css', array(), rand(111,9999), 'all' );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-scripts', THEME_URL . '/assets/js/script.min.js', array(), rand(111,9999), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

//Disable emojis in WordPress
add_action( 'init', 'visage_smartwp_disable_emojis' );
function visage_smartwp_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'visage_disable_emojis_tinymce' );
	add_filter( 'emoji_svg_url', '__return_false' );

//Disable the json api and remove the head link
//add_filter('rest_enabled', '__return_false');
//add_filter( 'rest_jsonp_enabled', '__return_false' );
//remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
}

function visage_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

