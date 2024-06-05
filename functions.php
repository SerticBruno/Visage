<?php
defined( 'ABSPATH' ) || exit;
define('THEME_DIR', get_stylesheet_directory());
define('THEME_URL', get_stylesheet_directory_uri());
// define('THEME_OPTIONS', get_fields('option'));

require THEME_DIR . '/inc/enqueue.php';
require THEME_DIR . '/inc/util.php';
require THEME_DIR . '/inc/theme_setup.php';
require THEME_DIR . '/inc/ajax.php';
require THEME_DIR . '/inc/ACF.php';

// require THEME_DIR . '/inc/cpt/albumi.php';

// Allow SVG uploads
function add_svg_to_upload_mimes($upload_mimes) {
    $upload_mimes['svg'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

// Sanitize SVG files
function sanitize_svg($svg) {
    $tags = array('svg', 'g', 'path', 'rect', 'circle', 'line', 'polygon', 'polyline', 'ellipse', 'use', 'image', 'text', 'tspan');
    $attributes = array('id', 'x', 'y', 'width', 'height', 'viewBox', 'transform', 'd', 'points', 'xlink:href', 'style', 'class', 'xmlns', 'fill', 'stroke', 'stroke-width', 'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'version', 'baseProfile');

    // Add additional sanitization code as needed

    return $svg;
}

add_filter('wp_handle_upload_prefilter', 'sanitize_svg');
