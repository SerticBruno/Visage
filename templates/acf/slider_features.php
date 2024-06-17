<?php

$features = $params['features'];

?>

<section class="slider-features">
    <div class="container-fluid py-3">
        <div class="row justify-content-around">
            <div class="swiper swiper-features">
                <div class="swiper-wrapper">
                    <?php foreach($features as $k => $v) { ?>

                        <?php
                            $url = $v['url'];

                            if($v['style'] == "external") {
                                $external = "_blank";
                            }
                            else{
                                $external = "";
                            }
                        ?>
                        <div class="swiper-slide">
                            <div class="col-12 text-center">
                                <a href="https://trello.com/b/gJ7TyZtA/visage" target="<?php echo $external; ?>">
                                    <div class="img-wrap">
                                        <img src="<?php echo $v['image']['url'] ?>"></img>
                                    </div>
                                    <?php if (!empty($v['title'])) { ?>
                                        <div class="col-12">
                                            <?php echo $v['title'] ?>
                                        </div>
                                    <?php } ?>
                                </a>
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