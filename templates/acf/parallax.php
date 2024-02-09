<?php

$title = $params['title'];
?>

<section class="parallax py-3">
    <div class="container">
        <div class="col-12">

            <?php if(!empty($title)) { ?>
                <div class="row py-4">
                    <div class="div d-flex">
                        <h2 class="versailles p-1"><?php echo $title ?></h2>
                    </div>
                </div>
            <?php } ?>

            <div class="row parallax-row">
                
                <div class="swiper my-parallax-swiper">
                    <div class="parallax-bg" style="
                        background-image: url(<?php echo $params['image']['url'] ?>);
                        " data-swiper-parallax="-23%"></div>
                        <div class="swiper-wrapper">
                            <?php foreach($params['items'] as $k => $v) { ?>
                                <div class="swiper-slide">
                                    <div class="title" data-swiper-parallax="-300"><?php echo $v['title'] ?></div>
                                    <!-- <div class="subtitle" data-swiper-parallax="-200"></div> -->
                                    <div class="text" data-swiper-parallax="-100">
                                    <p>
                                        <?php echo $v['description'] ?>
                                    </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            
            </div>
        </div>
    </div>
</section>
