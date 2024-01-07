<?php get_header(); ?>
<main id="content" role="main">
<?php if (!FlexibleContent('page_builder')) { ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'templates/wp/entry' ); ?>
	<?php comments_template(); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'templates/wp/nav', 'below' ); ?>
<?php } ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>