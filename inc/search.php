<?php
defined( 'ABSPATH' ) || exit;

function visage_get_search_form($desktop = true) {

  if ($desktop === true) {
    get_search_form();
  } else {
?>
<form role="search" method="get" id="<?php echo $desktop; ?>searchform" action="<?php //echo home_url('/'); ?>">
  <label class="screen-reader-text" for="<?php echo $desktop; ?>sm"><i class="fa fa-search" aria-hidden="true"></i></label>
  <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="<?php echo $desktop; ?>sm" placeholder="<?php _e('What can we do for you?', 'visage'); ?>...">
<?php if ($desktop == 'notFound') { ?>
  <button type="button" value="" id="<?php echo $desktop; ?>FormReset"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
<?php } ?>
  <input type="hidden" name="lang" value="<?php echo pll_current_language(); ?>">
</form>
<?php   
  }

}



/**
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return [array] [list of custom fields]
 */
function list_searcheable_acf(){
  $list_searcheable_acf = array("title", "content");
  return $list_searcheable_acf;
}


/**
 * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
 * @param  [query-part/string]      $where    [the initial "where" part of the search query]
 * @param  [object]                 ${$table_prefix}query []
 * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
 * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
 * credits to Vincent Zurczak for the base query structure/spliting tags section
 */
 
// add_filter( 'posts_search', 'visage_advanced_custom_search', 500, 2 );
function visage_advanced_custom_search( $where, $wp_query ) {

// myErr($wp_query);

    global $wpdb;
    global $table_prefix;

    if ( empty( $where ))
        return $where;
 
    // get search expression
    $terms = $wp_query->query_vars[ 's' ];
    
    // explode search expression to get search terms
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );
         
    // reset search in order to rebuilt it as we whish
    $where = '';
    
    // get searcheable_acf, a list of advanced custom fields you want to search content in
    $list_searcheable_acf = list_searcheable_acf();

    foreach( $exploded as $tag ) :
        $where .= " 
          AND (
            ({$table_prefix}posts.post_title LIKE '%$tag%')
            OR ({$table_prefix}posts.post_content LIKE '%$tag%')
            OR EXISTS (
              SELECT * FROM {$table_prefix}postmeta
	              WHERE post_id = {$table_prefix}posts.ID
	                AND (";

        foreach ($list_searcheable_acf as $searcheable_acf) :
          if ($searcheable_acf == $list_searcheable_acf[0]):
            $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          else :
            $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          endif;
        endforeach;

	        $where .= ")
            )
            OR EXISTS (
              SELECT * FROM {$table_prefix}comments
              WHERE comment_post_ID = {$table_prefix}posts.ID
                AND comment_content LIKE '%$tag%'
            )
            OR EXISTS (
              SELECT * FROM {$table_prefix}terms
              INNER JOIN {$table_prefix}term_taxonomy
                ON {$table_prefix}term_taxonomy.term_id = {$table_prefix}terms.term_id
              INNER JOIN {$table_prefix}term_relationships
                ON {$table_prefix}term_relationships.term_taxonomy_id = {$table_prefix}term_taxonomy.term_taxonomy_id
              WHERE (
          		taxonomy = 'post_tag'
            		OR taxonomy = 'category'          		
          		)
              	AND object_id = {$table_prefix}posts.ID
              	AND {$table_prefix}terms.name LIKE '%$tag%'
            )
        )";
    endforeach;

    return $where;
}


//add_filter( 'pre_get_posts', 'visage_custom_post_type_search' );
function visage_custom_post_type_search( $query ) {
      if ( is_search() && $query->is_main_query() && $query->get( 's' ) ){
          $query->set('post_type', array( 'post', 'events', 'glossary', 'network'));
          $query->query_vars['posts_per_page'] = -1;
//myErr($query->query_vars);
     }
     return $query;
}

