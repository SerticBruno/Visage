<?php get_header(); ?>
<main id="content" role="main">

<?php
$post = get_post();
$id = get_the_ID();

$postHero = get_field('post_hero', $id);
?>

<?php include THEME_DIR . '/templates/acf/hero.php'; ?>

<?php if (!FlexibleContent('page_builder')) { ?>
	
<?php } ?>

<section class="prev-next-post">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="prev-post">
                    <?php
                        $prev_post = get_previous_post();
                        if ( ! empty( $prev_post ) ): ?>
                            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                                <div class="img-wrapper ">
                                    <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-next-empty.png"/>
                                </div>
                                <div class="title">
                                    <?php echo apply_filters( 'the_title', $prev_post->post_title ); ?>
                                </div>
                            </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="next-post d-flex-end">
                    <?php $next_post = get_next_post();
                        if ( ! empty( $next_post ) ): ?>
                            <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                                <div class="title">
                                    <?php echo apply_filters( 'the_title', $next_post->post_title ); ?>
                                </div>
                                <div class="img-wrapper">
                                    <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-next-empty.png"/>
                                </div>
                            </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    $newspage = get_field('general', 'option')['news_page'];
?>

<section class="all-news-button">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="button-wrapper" style="transform: rotate(-2deg);">
	                <a href="<?php echo $newspage ?>" class="btn btn-primary">Sve novosti</a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>