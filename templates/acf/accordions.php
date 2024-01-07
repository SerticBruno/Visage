<?php

$blocks = $params['blocks'];

$args = [
    'post_type' => 'koncerti',
    'post_count' => 0,
    'posts_per_page' => -1,
    // 'wp_grid_builder'   => 'wpgb-content-1',
    // 'number_to_load_more' => 3
];

$wp_query = new WP_Query($args);
// myErr($wp_query);
// myErr($wp_query->posts);
?>

<section class="concert-accordions">
    <div class="container">
        <div class="row justify-content-center">
            <div class="accordion col-12" id="accordionExample">
                <?php foreach($wp_query->posts as $k => $v) { ?>
                    <?php

                        $concert_info = get_field('concert_info', $v->ID);
                        // myErr($concert_info);


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
                            <button class="accordion-button w-100 <?php echo ($k > 0) ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $k ?>" aria-expanded="<?php echo ($k > 0) ? 'false' : 'true' ?>" aria-controls="collapse-<?php echo $k ?>">
                                <div class="accordion-title row w-100">
                                    <div class="col-6">
                                        <p>
                                            <?php echo get_the_title($v) ?>
                                        </p>
                                    </div>
                                    <?php if(!empty($date) || !empty($time)) { ?>
                                        <div class="concert-date col-6">
                                            <p>
                                                <?php echo $date ?><?php echo $time ?>
                                            </p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse-<?php echo $k ?>" class="accordion-collapse collapse <?php echo ($k > 0) ? '' : 'show' ?>" aria-labelledby="heading-<?php echo $k ?>"               data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php echo $concert_info['content'] ?>
                                <?php if($concert_info['link'] == 'internal') { ?>
                                    <?php if(!empty($concert_info['post'])){ ?>
                                        <div class="d-flex">
                                            <a class="post-link" href="<?php echo get_permalink($concert_info['post']) ?>">
                                                POGLEDAJ VIŠE
                                                <div class="img-wrapper img-wrap-arrow d-flex align-items-center">
                                                    <img class="arrow-next replaceSvg" src="<?php echo THEME_URL ?>/assets/img/svg/arrowNext.svg">
                                                </div>
                                            </a>
                                        </div>
                                    <?php }?>
                                <?php } else if($concert_info['link'] == 'external') { ?>
                                    <?php if(!empty($concert_info['url'])){ ?>
                                        <div class="d-flex">
                                            <a class="post-link" target="blank" href="<?php echo $concert_info['url'] ?>">
                                                POGLEDAJ VIŠE
                                                <div class="img-wrapper img-wrap-arrow d-flex align-items-center">
                                                    <img class="arrow-next replaceSvg" src="<?php echo THEME_URL ?>/assets/img/svg/arrowNext.svg">
                                                </div>
                                            </a>
                                        </div>
                                    <?php }?>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>