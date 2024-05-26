<?php
defined( 'ABSPATH' ) || exit;
define('THEME_DIR', get_stylesheet_directory());
define('THEME_URL', get_stylesheet_directory_uri());
// define('THEME_OPTIONS', get_fields('option'));
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version); //gets version written in your style.css

require THEME_DIR . '/inc/enqueue.php';
require THEME_DIR . '/inc/util.php';
require THEME_DIR . '/inc/theme_setup.php';
require THEME_DIR . '/inc/ajax.php';
require THEME_DIR . '/inc/ACF.php';

// require THEME_DIR . '/inc/cpt/albumi.php';