<?php 
defined( 'ABSPATH' ) || exit;

/**************************************************************************************/
/*
function filter_projects() {

	/* Sve što se nalazi unutar super globalne varijable $_POST vezano je s ajax.js file-om, što znači da ajax.js i ajax.php međusobno komuniciraju na način da se direkt šalje HTTP request na server i vraća bez refresha */
/*
  $catSlug = $_POST['category']; // ključ 'category' je zapravo vrijednost pod category property-em unutar ajax objekta u ajax.js
  $page_id = $_POST['page_id']; // ključ 'page_id' je zapravo vrijednost pod page_id property-em unutar ajax objekta u ajax.js

if(!empty($catSlug)) {
  $ajaxposts = new WP_Query([ // radimo upit nad WP bazom, sa svojstvima iz ajax requesta
	'posts_per_page' => -1,
	'post_type'		 => 'team-members',
		'tax_query' => array(
			array(
				'taxonomy' => 'team-member-role',
				'field'    => 'slug',
				'terms'    => $catSlug,
			),
		),
  ]);
} else {
  $ajaxposts = new WP_Query([ // radimo upit nad WP bazom, sa svojstvima iz ajax requesta
	'posts_per_page' => -1,
	'post_type'		 => 'team-members',
  ]);
}
  $response = '';

  if($ajaxposts->have_posts()) {


	  
	  foreach ($ajaxposts->posts as $k => $v_team) {
	
		$response .= get_component_template_ajax('card', (object)$v_team);
		// myErr($v_team);

	  }


  } else {
	$response = 'empty';
  }


  exit;
//  myErr($response);


}

add_action('wp_ajax_filter_projects', 'filter_projects'); // hookamo našu funkciju koja se zove filter_projects na wordpressovu funkciju wp_ajax_filter_projects -> ako nam se funkcija zove my_filter_projects onda 
														  // ju moramo i hookati na wp_ajax_my_filter_projects
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects'); // ista stvar i ovdje


/**************************************************************************************/
/*
function more_post_ajax(){
    $offset = $_POST["offset"];

	$total_posts = wp_count_posts()->publish;
	$posts_left = $total_posts - 9;
	?>
	<script>
		// var nmb = <?php echo $num_posts; ?>;
		// console.log(nmb);
		var posts = <?php echo $posts_left; ?> ;
		var offsetPosts = <?php echo $offset; ?>;
		var postsLeft = posts - offsetPosts;
		// console.log(postsLeft);

		if(postsLeft <= 0 ){
			jQuery("#more_posts").addClass('d-none');
		}
	</script>
	<?php

     $args = array(
        'post_type' => 'post',
         'posts_per_page' => 3,
         'order' => 'ASC',
         'offset' => $offset,
     );

    $news = new WP_Query($args);
	// myErr($news);
    
	if($news->have_posts()) {
		foreach ($news->posts as $key => $value) {
			get_component_template('card-posts', (object)$value);
		}
	}

	

   wp_reset_postdata();

     die(); // use die instead of exit 
  }

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
*/