<?php
defined( 'ABSPATH' ) || exit;

//Save
add_filter('acf/settings/save_json', 'visage_acf_json_save_point');
function visage_acf_json_save_point( $path ) {
    
    // update path
    $path = THEME_DIR . '/acf-json';
    
    // return
    return $path;
}
 
//Load
add_filter('acf/settings/load_json', 'visage_acf_json_load_point');
function visage_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = THEME_DIR . '/acf-json';
    
    // return
    return $paths;
}

function get_component_template($name, $params = NULL) {  
	if (is_file(THEME_DIR . '/templates/acf/' . $name . '.php')) {
		require THEME_DIR . '/templates/acf/' . $name . '.php';
	}
}

function get_component_template_ajax($name, $v = NULL) {  
	if (is_file(THEME_DIR . '/templates/acf/' . $name . '.php')) {
		require THEME_DIR . '/templates/acf/' . $name . '.php';
	}
}

function FlexibleContent($v) {
	$page = get_field($v);
	// myErr($page);

	if (is_array($page) and count($page) > 0) {
		foreach ($page as $k => $v) {
			get_component_template($v['acf_fc_layout'], $v);
		}
		return true;
	} else {
		return false;
	}
}

// Google map api Method 2: Setting. https://www.advancedcustomfields.com/resources/google-map/
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCikysarNLm6L-wRtg0CakgJAnxizWAnho');
}
add_action('acf/init', 'my_acf_init');


