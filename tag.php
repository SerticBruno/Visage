<?php get_header(); 
$content = get_field('404', 'option')['not_found_label'];
$youtube = get_field('404', 'option')['youtube'];
$errorContent = get_field('404', 'option');

$for0for = get_field('404', 'option');
$title = $for0for['not_found_label'];
$button = $for0for['button'];?>


<main id="content" role="main" style="background-color: #ddd">
    <section class="error-page">
        <div class="container py-3 d-flex justify-content-center align-items-center">
            <div class="row message">
                <div class="col content mb-5 pb-5">
                </div>
            </div>
        </div>
        <div class="container py-3 mt-5 d-flex justify-content-center align-items-center">
            <div class="col mb-5 pb-5 mt-5">
                <h1><?php echo $title ?></h1>
                
                <div class="button-wrapper pt-5">
                    <a href="<?php echo get_home_url() ?>" class="btn btn-primary"><?php echo $button['label']; ?></a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>