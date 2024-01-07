<?php

$blocks = $params['blocks'];

$args = [
    'post_type' => 'koncerti',
    // 'posts_per_page' => $params['limit_posts'] ? $limit : -1,
    // 'wp_grid_builder'   => 'wpgb-content-1',
    // 'number_to_load_more' => 3
];

$wp_query = new WP_Query($args);
// myErr($wp_query);
// myErr($wp_query->posts);

$header = get_field('header', 'option');
$defaultLogo = $header['logo']['url']; 

?>


<section class="accordions-with-cards youtube-cards">
    <div class="container">
        <div class="row justify-content-center">
            <div class="accordion col-12" id="accordionExample">
                <?php foreach($params['blocks'] as $k => $v) { ?>
                    <?php

                        $concert_info = get_field('concert_info', $v->ID);
                        $rand = rand(1, 4);
                        $randRot = $rand * .1;

                        if($k % 2 == 1){
                            $randRot *= -1;
                        }

                        if(!empty($concert_info['date'])){
                            $date = $concert_info['date'];
                        }
                        
                        if(!empty($concert_info['time'])){
                            $time = " - " . $concert_info['time'];
                        }

                    ?>

                    <div class="accordion-item" style="transform: rotate(<?php echo $randRot ?>deg);">
                        <h2 class="accordion-header" id="heading-<?php echo $k ?>">
                            <button class="accordion-button accordion-button-all w-100 <?php echo ($k > 0) ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $k ?>" aria-expanded="<?php echo ($k > 0) ? 'false' : 'true' ?>" aria-controls="collapse-<?php echo $k ?>">

                                <div class="accordion-title row w-100">
                                    <div class="col-10">
                                        <p>
                                            <?php echo ($v['album']->post_title) ?>
                                        </p>
                                    </div>
                                    <!-- <?php if(!empty($date) || !empty($time)) { ?>
                                        <div class="concert-date col-6">
                                            <p>
                                                <?php echo $date ?><?php echo $time ?>
                                            </p>
                                        </div>
                                    <?php } ?> -->
                                </div>
                            </button>
                        </h2>
                        <div id="collapse-<?php echo $k ?>" class="accordion-collapse collapse <?php echo ($k > 0) ? '' : 'show' ?>" aria-labelledby="heading-<?php echo $k ?>"               data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                
                                <?php 
                                    //  get album builder and songs 
                                    $album = get_field('album_info', $v['album']->ID);
                                ?>

                                <?php echo $album['description'] ?>
                                
                                <div class="row justify-content-around">
                                    <!-- ovdje sve pjesme iz albuma -->
                                    <?php foreach($album['songs'] as $k => $v) { ?>
                                        <?php 
                                            $video = checkID($v['youtube_link']);
                                            $placeHolderLogo = '';
                                            $url = "https://www.youtube.com/embed/{$video['id']}?autoplay=1&modestbranding=1&rel=0&fs=1&enablejsapi=1";

                                            // myErr($video);
                                            if(!empty($v['video_thumbnail'])){
                                                $logo = wp_get_attachment_image_url($v['video_thumbnail']['ID'], 'high');
                                            }
                                            else{
                                                $logo = $defaultLogo;
                                                $placeHolderLogo = ' placeholder-logo';
                                            }

                                        ?>

                                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                                            <div class="card my-3 video-play-card" data-bs-toggle="modal" data-bs-target="#modal" data-src="<?php echo $url; ?>">
                                                <!-- <iframe src="" frameborder="0" allow="autoplay" allowfullscreen></iframe> -->
                                                <div class="img-wrapper">
                                                    <img class="video-cover<?php echo $placeHolderLogo ?>" src="<?php echo $logo ?>"/>
                                                    <button class="video-play-modal"></button>
                                                </div>
                                                <div class="card-title">
                                                    <h4><?php echo $k+1 . '. ' . $v['title']?></h4>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>


                                <?php if(!empty($concert_info['post'])){ ?>
                                    <div class="d-flex">
                                        <a class="post-link" href="<?php echo get_post_permalink($concert_info['post']) ?>">
                                            POGLEDAJ VIŠE
                                            <div class="img-wrapper img-wrap-arrow d-flex align-items-center">
                                                <img class="arrow-next replaceSvg" src="<?php echo THEME_URL ?>/assets/img/svg/arrowNext.svg">
                                            </div>
                                        </a>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>