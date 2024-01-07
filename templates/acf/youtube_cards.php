<?php

$cards = $params['cards'];

?>

<section class="youtube-cards">
    <div class="container">
        <div class="row justify-content-around youtube-list">
            <?php foreach($cards as $k => $v) { ?>
                <?php 
                    $video = checkID($v['url']);
                    // $placeHolderLogo = '';
                    $url = "https://www.youtube.com/embed/{$video['id']}?autoplay=0&mute=0&modestbranding=1&rel=0&fs=1&enablejsapi=1";
                    $linkUrl = "https://www.youtube.com/watch?v={$video['id']}?autoplay=0&mute=0"
                ?>
                <div class="col-10 col-md-6 card-wrapper text-center">
                    <a class="link-box" href="<?php echo $linkUrl ?>" target="_blank">
                        <h3><?php echo $v['title'] ?></h3>
                    </a>
                    <div class="card">
                        <iframe src="<?php echo $url ?>">
                        </iframe>
                        <a href="<?php echo $linkUrl ?>" target="_blank"><?php echo $v['description'] ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>