<?php 
get_header();
$content = get_field('404', 'option')['not_found_label'];
$youtube = get_field('404', 'option')['youtube'];
$errorContent = get_field('404', 'option');
?>
<main id="content" role="main">

    <section class="error-page">
        <div class="container py-4 d-flex justify-content-center align-items-center">
            <div class="row message">
                <div class="col content mb-5 pb-5">
                    <?php echo nl2p($content); ?>
                </div>
            </div>
        </div>
    </section>

    
    <div class="row justify-content-around">
        <!-- ovdje sve pjesme iz albuma -->
        <section class="youtube-cards">
            <div class="container">
                <div class="row justify-content-around youtube-list">
                    <?php 
                        $video = checkID($youtube);
                        // $placeHolderLogo = '';
                        $url = "https://www.youtube.com/embed/{$video['id']}?autoplay=0&mute=0&modestbranding=1&rel=0&fs=1&enablejsapi=1";
                        $linkUrl = "https://www.youtube.com/watch?v={$video['id']}?autoplay=0&mute=0"
                    ?>
                    <div class="col-10 col-md-6 card-wrapper text-center">
                        <a class="link-box" href="<?php echo $linkUrl ?>" target="_blank">
                            <h3><?php echo $errorContent['youtube_card_title'] ?></h3>
                        </a>
                        <div class="card">
                            <iframe src="<?php echo $url ?>">
                            </iframe>
                            <a href="<?php echo $linkUrl ?>" target="_blank"><?php echo $errorContent['youtube_card_description'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>
<?php get_sidebar(); ?>

<?php 
get_footer();
?>