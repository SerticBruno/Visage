<?php

$title = $params['title'];
$features = $params['features'];

?>

<section class="slider-features">
    <div class="container-fluid py-3 pt-5">
        <?php if(!empty($title)) { ?>
            <div class="container">

                <div class="row">
                    
                    <div class="col-12 pb-4 versailles d-flex align-items-center">
                        <span class="span-line"></span>
                        <h2 class="versailles"><?php echo $title ?></h2>
                        
                        <?php if(!empty($button['label'])){ ?>
                            <div class="button-wrapper ms-auto">
                                <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
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
                                <?php if(!empty($v['url'])) { ?>
                                    <a href="<?php echo $v['url']; ?>" target="<?php echo $external; ?>">
                                <?php } ?>
                                    <div class="img-wrap">
                                        <img src="<?php echo $v['image']['url']; ?>" alt="feature-icon-<?php echo $k + 1; ?>"></img>
                                    </div>
                                    <?php if (!empty($v['title'])) { ?>
                                        <div class="col-12">
                                            <?php echo $v['title'] ?>
                                        </div>
                                    <?php } ?>
                                    
                                <?php if(!empty($v['url'])) { ?>
                                    </a>
                                <?php } ?>
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