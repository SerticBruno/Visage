<?php

$features = $params['features'];

?>

<section class="slider-features">
    <div class="container py-3">
        <div class="row justify-content-around">
            <div class="swiper swiper-features">
                <div class="swiper-wrapper">
                    <?php foreach($features as $k => $v) { ?>
                        <div class="swiper-slide">
                            <div class="col-12 text-center">
                                <div class="img-wrap">
                                    <img src="<?php echo $v['image']['url'] ?>"></img>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="text-center">
                    <div class="swiper-features-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>