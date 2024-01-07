<?php
defined( 'ABSPATH' ) || exit;

/**
 * Adds 'DISTINCT' to the query that's executing on the search page.
 *
 * @param     string $distinct    The initial DISTINCT clause.
 * @return    string $distinct    The 'DISTINCT' keyword, if we're on the search template.
 */
add_filter( 'posts_distinct', 'visage_select_distinct_search_records' );
function visage_select_distinct_search_records( $distinct ) {
	if ( is_admin() || ! is_search() ) {
		return $distinct;
	}
	return 'DISTINCT';
}


/**
 * Pagination layout.
 *
 * @package understrap
 */


function visage_pagination( $args = array(), $class = 'pagination' ) {

//myErr($GLOBALS['wp_query']);

	if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
		return;
	}

	$args = wp_parse_args(
		$args,
		array(
//			'base'				 => get_site_url() . '%_%',
//			'format'			 => '?page=%#%',
			'mid_size'           => 2,
			'prev_next'          => true,
			'prev_text'          => __( '&laquo;', 'visage' ),
			'next_text'          => __( '&raquo;', 'visage' ),
			'screen_reader_text' => __( 'Posts navigation', 'visage' ),
			'type'               => 'array',
			'current'            => max( 1, get_query_var( 'paged' ) ),
//			'current'            => max( 1, (isset($_GET['paged']) ? $_GET['paged'] : 1) ),
		)
	);
	$links = paginate_links( $args );

//myErr($args);
//myErr($links);
	?>
	<div class="container paginator">
		<div class="row">
			<div class="col-12">
				<nav aria-label="<?php echo $args['screen_reader_text']; ?>">
					<ul class="list-inline">
						<?php
						foreach ( $links as $key => $link ) {
							?>
							<li class="list-inline-item <?php echo strpos( $link, 'current' ) ? 'active' : ''; ?>">
								<?php echo $link; ?>
							</li>
							<?php
						}
						?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<?php
}

