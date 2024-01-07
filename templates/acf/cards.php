<?php

$cards = $params['cards'];

?>

<section class="cards py-5">
    <div class="swiper cards-swiper">
        <div class="swiper-wrapper">
            <?php foreach($cards as $k => $v) { ?>
                <div class="swiper-slide">
                    <div class="col-12">
                        <div class="img-wrapper">
                            <img src="<?php echo $v['image']['url'] ?>"></img>
                        </div>
                        <div class="info text-center">
                            <?php echo $v['title'] ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <!-- <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div> -->
        </div>
    </div>
</section>