<?php

$features = $params['features'];

?>

<section class="slider-features">
    <div class="container py-3">
        <div class="row">
            <div class="col-12 py-2">
                <h2><?php echo $params['title'] ?></h2>
            </div>
        </div>
        <div class="row justify-content-around">
                
            <div class="swiper swiper-features">
                <div class="swiper-wrapper">
                    <?php foreach($features as $k => $v) { ?>
                        <div class="swiper-slide">
                            <div class="col-12 text-center">
                                <div class="img-wrap">
                                    <img src="<?php echo $v['image']['url'] ?>"></img>
                                </div>
                                <div class="info p-2">
                                    <h3 class="pb-3"><?php echo $v['title'] ?></h3>
                                    <p><?php echo $v['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="text-center">
                    <div class="swiper-features-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>