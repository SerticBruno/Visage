<?php 

$posts = get_posts();
// myErr($posts);
?>

<?php
		
	$argsAll = array(
		'post_type'         => 'post',
		'posts_per_page'    => 0,
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
            <div class="col-12 col-md-5">
                <h2 class="news-title">
                    <?php echo $params['title'] ?>
                </h2>
                <div class="description pb-5">
                    <?php echo $params['description'] ?>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="search-wrapper d-flex justify-content-end load-posts-button mb-5">
                    <div class="col-8">
                        <div class="search-title">
                            <!-- <h2 class="pb-3">A trazis sto zelis</h2> -->
                            <h2 class="pb-3"><?php echo $params['search_title'] ?></h2>
                            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row news-list wpgb-content-1">
                <?php if ($the_query_all->post_count > 0) {
					foreach ($the_query_all->posts as $k => $v) { ?>
						<?php get_component_template('cards/news-card', $v); ?>
					<?php } 
				} ?>
            </div>
            <div class="navigation">
            </div>
<!--             
			<div class="pagination-wrap d-flex justify-content-center">
				<?php //wpgb_render_facet( [ 'id' => 1, 'grid' => 'wpgb-content-1' ] ); ?>
			</div> -->

        </div>
    </div>
</section>


<!-- [wpgb_facet id="1" grid="0"] -->