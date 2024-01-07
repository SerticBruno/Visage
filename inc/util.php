<?php
defined( 'ABSPATH' ) || exit;

function px2Rem($px, $fontSize = 16) {

	return $px / $fontSize; // defaultni font-size browsera je 16px;

}

function get_slice_template($name, $params = NULL) {  
	if (is_file(THEME_DIR . '/templates/SLICE/template/' . $name . '.php')) {
		require THEME_DIR . '/templates/SLICE/template/' . $name . '.php';
	}
}

function myErr($s) {
	echo '<pre>';
	print_r($s);
	echo '</pre>';
}


function get_page_id_from_path( $path ) {
	$page = get_page_by_path( $path );
	if( $page ) {
		return $page->ID;
	} else {
		return null;
	};
}

function add_slug_to_body_class( $classes ) {
	global $post;

	if( is_home() ) {			
		$key = array_search( 'blog', $classes );
		if($key > -1) {
			unset( $classes[$key] );
		};
	} elseif( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif(is_singular()) {
		$classes[] = sanitize_html_class( $post->post_name );
	};

	return $classes;
}

function get_category_id( $cat_name ){
	$term = get_term_by( 'name', $cat_name, 'category' );
	return $term->term_id;
}

function q_get_menu_items($menu_name){
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        return wp_get_nav_menu_items($menu->term_id);
    }
}


function nl2p($string) {
    $paragraphs = '';

    foreach (explode("\n", $string) as $line) {
        if (trim($line)) {
        	if (substr($line, 0, 1) !== '<') {
            	$paragraphs .= '<p>' . $line . '</p>';
            } else {
            	$paragraphs .= $line;            	
            }
        }
    }

    return $paragraphs;
}

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' ) {
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    $interval = date_diff($datetime1, $datetime2);
    return $interval->format($differenceFormat); 
}

function array_insert_after_key($array, $key, $array_to_insert) {
    $key_pos = array_search($key, array_keys($array));
    if ($key_pos !== false){
        $key_pos++;
        $second_array = array_splice($array, $key_pos);
        $array = array_merge($array, $array_to_insert, $second_array);
    }
    return $array;
}

function user_can_post() {
	return (is_user_logged_in() && ((current_user_can('create_posts') && current_user_can('edit_posts')) || current_user_can('publish_posts')));
}

function isNewArticle($params) {
	$old = explode(' ', dateDifference($params->post_modified_gmt, date('YmdHis'), '%a %h %i'));
	return (($old[0] == '0' && $old[1] == '0' && $old[2] <= '5') && ($params->post_author == get_current_user_id()));
}


// function sendEmail($form) {
// 	$user = get_userdata(get_current_user_id());
// 	$mail = get_field('new_post__event_info', 'option');
// 	$user_page = um_get_core_page('user').$user->data->user_login;

// 	$find = array('{{date}}', '{{user}}', '{{user_page}}', '{{post_type}}', '{{url}}', '{{title}}');
// 	$newData = array(date('d.m.Y H:i:s'), $user->data->user_login, $user_page, $form['post_type'], $form['perma'], $form['post_title']);

// 	$mail['email_content'] = '<html><body>' . str_replace($find, $newData, $mail['email_content']) . '</body></html>';
// 	$mail['headers'] = array('Content-Type: text/html; charset=UTF-8');

// 	$send = wp_mail($mail['email_to'], $mail['email_title'], $mail['email_content'], $mail['headers']);
// }


// Check if given link is from youtube or vimeo
function checkID($url){
	$r = array();

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match1);
	preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $match2);

	if (count($match1) > 0) {
		$r['video'] = 'youtube';
		$r['id'] = $match1[1];
	} elseif (count($match2) > 0) {
		$r['video'] = 'vimeo';
		$r['id'] = $match2[5];
	}

	return $r;

//	$pattern = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
//	return preg_match($pattern, $url);
}

function MakeReadable($bytes) {
    $i = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $i), [0,0,2,2,3][$i]).['B','kB','MB','GB','TB'][$i];
}

function RandomString($len = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $len; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

function Slugify($string){
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
}


/******************************** SOCIAL SHARE *********************************************** */
function social_share($post_title, $post_body, $social_share_repeater) {

	global $post;
	$current_url = get_permalink( $post->ID );
	$body_content_tags = str_replace(['</h1>', '</h2>', '</h3>', '</h4>', '</h5>', '</h6>', '</p>'], "%0D%0A%0D%0A", $post_body);
	$body_content_no_tags = strip_tags($body_content_tags);

	foreach($social_share_repeater as $k => $v) {

		$type = ($v['icon']->class == 'fa-twitter' ? "https://twitter.com/intent/tweet?text=$current_url" : 
				($v['icon']->class == 'fa-facebook' ? "https://www.facebook.com/sharer/sharer.php?u=$current_url" : 
				($v['icon']->class == 'fa-envelope' ? "mailto:?subject=$post_title&amp;body=$body_content_no_tags%0D%0A" . $current_url : 
				($v['icon']->class == 'fa-linkedin' ? "https://www.linkedin.com/sharing/share-offsite/?url={$current_url}" : 
				"whatsapp://send?text=$current_url"))));
				
		$whatsapp_check = ($v['icon']->class == 'fa-whatsapp' ? 'data-action="share/whatsapp/share"' : ''); ?>

		<a class="pr-2" href="<?php echo $type;?>" target="_blank" <?php echo $whatsapp_check; ?>>
			<span class="icon-wrap">
				<?php echo $v['icon']->element; ?>
			</span>
		</a>
	<?php } ?>

<?php } 
/********************************************************************************* */



/******************************** RETURN FULL IMG ELEMENT WITH CUSTOM CLASSES SEO-READY *********************************************** */

function get_img_object($image_id, $classes = "", $size = "full") {


	// $image_ID = get_post_thumbnail_id($image_id);
    $image = wp_get_attachment_image($image_id, $size, false, ["class" => $classes]);

	return $image;

}

/* 
	RETURN FULL IMG ELEMENT WITH CUSTOM ATTRIBUTES
*/
function get_img_object_extended($image_id, $atts = array(), $size = "full") {


	// $image_ID = get_post_thumbnail_id($image_id);
    $image = wp_get_attachment_image($image_id, $size, false, $atts);

	return $image;

}
/********************************************************************************* */


/******************************** HEX TO RGBA *********************************************** */
function ak_convert_hex2rgba($color, $opacity = false) {
    $default = 'rgb(0,0,0)';    
    
    if (empty($color))
        return $default;    

    if ($color[0] == '#')
        $color = substr($color, 1);
    
    if (strlen($color) == 6)
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    
    elseif (strlen($color) == 3)
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    
    else
        return $default;
       
    $rgb = array_map('hexdec', $hex);    

    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;

        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }    
    return $output;
}
/********************************************************************************* */

/********************************************************************************* */
function get_post_by_title($page_title, $post_type ='post' , $output = OBJECT) {
    global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type= %s", $page_title, $post_type));
        if ( $post )
            return get_post($post, $output);

    return null;
}
/********************************************************************************* */
