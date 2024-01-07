<?php
defined( 'ABSPATH' ) || exit;


// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'visage' ),
	'lang' => __( 'Lang Menu', 'visage' ),
	'footer' => __( 'Footer Menu', 'visage' ),
	'gdpr' => __( 'GDPR Menu', 'visage' ),
) );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
add_action( 'wp_head', 'visage_pingback_header' );
function visage_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

/**
 * Change the default text after an excerpt
 */
add_filter( 'excerpt_more', 'visage_excerpt_more' );
function visage_excerpt_more( $more ) {
	return '...';
}

/**
 * Limit the excerpt length
 */
add_filter( 'excerpt_length', 'visage_excerpt_length' );
function visage_excerpt_length( $length ) {
	return 25;
}


/**
 * General Theme Settings
 *
 * @since v1.0
 */
if ( ! function_exists( 'visage_new_theme_setup_theme' ) ) {
	function visage_new_theme_setup_theme() {

		// Make theme available for translation: Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'visage', THEME_DIR . '/languages' );

		add_post_type_support( 'post', 'post-formats' );

		// Theme Support
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Default Attachment Display Settings
		update_option( 'image_default_align', 'none' );
		update_option( 'image_default_link_type', 'none' );
		update_option( 'image_default_size', 'large' );

		// Custom CSS-Styles of Wordpress Gallery
		add_filter( 'use_default_gallery_style', '__return_false' );

	}
	add_action( 'after_setup_theme', 'visage_new_theme_setup_theme' );
}

/**
 * Fire the wp_body_open action.
 *
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 *
 * @since v2.2
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since v2.2
		 */
		do_action( 'wp_body_open' );
	}
}



/**
 * Style Edit buttons as badges: http://getbootstrap.com/components/#badges
 *
 * @since v1.0
 */
add_filter( 'edit_post_link', 'visage_new_theme_custom_edit_post_link' );
function visage_new_theme_custom_edit_post_link( $output ) {
	$output = str_replace( 'class="post-edit-link"', 'class="post-edit-link badge badge-secondary"', $output );
	return $output;
}

add_filter( 'edit_comment_link', 'visage_new_theme_custom_edit_comment_link' );
function visage_new_theme_custom_edit_comment_link( $output ) {
	$output = str_replace( 'class="comment-edit-link"', 'class="comment-edit-link badge badge-secondary"', $output );
	return $output;
}


/**
 * Responsive oEmbed filter: http://getbootstrap.com/components/#responsive-embed
 *
 * @since v1.0
 */
add_filter( 'embed_oembed_html', 'visage_new_theme_oembed_filter', 10, 4 );
function visage_new_theme_oembed_filter( $html ) {
	$return = '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	return $return;
}


if ( ! function_exists( 'visage_new_theme_content_nav' ) ) {
	/**
	 * Display a navigation to next/previous pages when applicable
	 *
	 * @since v1.0
	 */
	function visage_new_theme_content_nav( $nav_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) :
	?>
			<div id="<?php echo $nav_id; ?>" class="d-flex mb-4 justify-content-between">
				<div><?php next_posts_link( '<span aria-hidden="true">&larr;</span> ' . __( 'Older posts', 'visage' ) ); ?></div>
				<div><?php previous_posts_link( __( 'Newer posts', 'visage' ) . ' <span aria-hidden="true">&rarr;</span>' ); ?></div>
			</div><!-- /.d-flex -->
	<?php
		else :
			echo '<div class="clearfix"></div>';
		endif;
	}

	// Add Class
	add_filter( 'next_posts_link_attributes', 'visage_posts_link_attributes' );
	add_filter( 'previous_posts_link_attributes', 'visage_posts_link_attributes' );
	function visage_posts_link_attributes() {
		return 'class="btn btn-secondary btn-lg"';
	}
}




add_action( 'wp_footer', 'visagevisage_footer' );
function visagevisage_footer() {
?>
	<script>
	jQuery(document).ready(function($) {
		var deviceAgent = navigator.userAgent.toLowerCase();
		if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
			$("html").addClass("ios");
		}
		if (navigator.userAgent.search("MSIE") >= 0) {
			$("html").addClass("ie");
		} else if (navigator.userAgent.search("Chrome") >= 0) {
			$("html").addClass("chrome");
		} else if (navigator.userAgent.search("Firefox") >= 0) {
			$("html").addClass("firefox");
		} else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
			$("html").addClass("safari");
		} else if (navigator.userAgent.search("Opera") >= 0) {
			$("html").addClass("opera");
		}
		$(".menu-toggle").on("keypress click", function(e) {
			if (e.which == 13 || e.type === "click") {
				e.preventDefault();
				$("#menu").toggleClass("toggled");
			}
		});
		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				if ($("#menu").hasClass("toggled")) {
					$("#menu").toggleClass("toggled");
				}
			}
		});
		$("img.no-logo").each(function() {
			var alt = $(this).attr("alt");
			$(this).replaceWith(alt);
		});
	});
	</script>
<?php
}



add_filter( 'document_title_separator', 'visage_document_title_separator' );
function visage_document_title_separator( $sep ) {
	$sep = '|';
	return $sep;
}

add_filter( 'the_title', 'visage_title' );
function visage_title( $title ) {
	if ( $title == '' ) {
		return '...';
	} else {
		return $title;
	}
}

function visage_schema_type() {
	$schema = 'https://schema.org/';
	if ( is_single() ) {
		$type = "Article";
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	echo 'itemscope itemtype="' . $schema . $type . '"';
}



add_filter( 'nav_menu_link_attributes', 'visage_schema_url', 10 );
function visage_schema_url( $atts ) {
	$atts['itemprop'] = 'url';
	return $atts;
}

if ( !function_exists( 'visage_wp_body_open' ) ) {
	function visage_wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

add_action( 'wp_body_open', 'visage_skip_link', 5 );
function visage_skip_link() {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'visage' ) . '</a>';
}

add_filter( 'the_content_more_link', 'visage_read_more_link' );
function visage_read_more_link() {
	if ( !is_admin() ) {
		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'visage' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}

add_filter( 'excerpt_more', 'visage_excerpt_read_more_link' );
function visage_excerpt_read_more_link( $more ) {
	if ( !is_admin() ) {
		global $post;
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'visage' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}

add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'visage_image_insert_override' );
function visage_image_insert_override( $sizes ) {
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}

add_action( 'widgets_init', 'visage_widgets_init' );
function visage_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar Widget Area', 'visage' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}


add_action( 'comment_form_before', 'visage_enqueue_comment_reply_script' );
function visage_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function visage_custom_pings( $comment ) {
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}

add_filter( 'get_comments_number', 'visage_comment_count', 0 );
function visage_comment_count( $count ) {
	if ( !is_admin() ) {
		global $id;
		$get_comments = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $get_comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}


/**
 * Init Widget areas in Sidebar
 *
 * @since v1.0
 */
/*
function visage_new_theme_widgets_init() {
	// Area 1
	register_sidebar(
		array(
			'name'          => 'Primary Widget Area (Sidebar)',
			'id'            => 'primary_widget_area',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 2
	register_sidebar(
		array(
			'name'          => 'Secondary Widget Area (Header Navigation)',
			'id'            => 'secondary_widget_area',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// Area 3
	register_sidebar(
		array(
			'name'          => 'Third Widget Area (Footer)',
			'id'            => 'third_widget_area',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'visage_new_theme_widgets_init' );
*/

