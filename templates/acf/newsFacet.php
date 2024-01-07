<?php 

$posts = get_posts();
// myErr($posts);
?>

<?php
		
	$argsAll = array(
		'post_type'         => 'post',
		'posts_per_page'    => 2,
		'orderby'           => 'post_date',
		'order'             => 'DESC',
		'wp_grid_builder'   => 'wpgb-content-1',
		// 'category_name'     => '',
	);
	$the_query_all = new WP_Query($argsAll);
	// $archives = get_field('archives', 'options');
	
?>

<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="news-title"><?php echo $params['title'] ?></h2>
            </div>


            <div class="search-wrapper d-flex justify-content-end load-posts-button ">
                    
                <div class="col-3">
                    <div class="search-title">
                        <h2>A trazis sto zelis</h2>
                    </div>
                    <?php wpgb_render_facet( [ 'id' => 2, 'grid' => 'wpgb-content-1' ] ); ?>
                </div>
            </div>

            <div class="row news-list wpgb-content-1">
                <?php if ($the_query_all->post_count > 0) {
					foreach ($the_query_all->posts as $k => $v) { ?>
						<?php get_component_template('cards/news-card', $v); ?>
					<?php } 
				} ?>
            </div>
            
			<div class="pagination-wrap d-flex justify-content-center">
				<?php wpgb_render_facet( [ 'id' => 1, 'grid' => 'wpgb-content-1' ] ); ?>
			</div>

        </div>
    </div>
</section>


<!-- [wpgb_facet id="1" grid="0"] -->