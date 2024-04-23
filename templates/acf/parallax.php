<?php

$title = $params['title'];
?>

<section class="parallax">
    <div class="container">
        <div class="col-12">

            <?php if(!empty($title)) { ?>
                <div class="row py-4">
                    <div class="div d-flex versailles">
                        <span class="h2">----------</span>
                        <h2 class="line"><?php echo $title ?></h2>
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
                                    <div class="title pb-3" data-swiper-parallax="-300"><?php echo $v['title'] ?></div>
                                    <div class="text" data-swiper-parallax="-300">
                                        <?php echo $v['description'] ?>
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
