<?php

$title = $params['title'];
?>

<section class="static-slider">
    <div class="container">
        <div class="col-12">
            <div class="static-slider-row row">
                <div class="swiper mySwi2per">
                    <div class="swiper-wrapper">
                        <?php foreach($params['items'] as $k => $v) { ?>
                            <?php
                                $imageUrl = $v['image']['url'];
                            ?>
                            <div class="swiper-slide" style="background-image: url('<?php echo $imageUrl ?>');">
                                <div class="text-wrapper p-5">
                                    <div class="title pb-2">
                                        <?php echo $v['title'] ?>
                                    </div>
                                    <div class="subtitle pb-2">
                                        <?php echo $v['subtitle'] ?>
                                    </div>
                                    <div class="text">
                                        <p>
                                            <?php echo $v['description'] ?>
                                        </p>
                                    </div>
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