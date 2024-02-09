<?php
$post_info = get_field('post_hero', $post->ID);

if(!is_null($post_info)){
    $title = $post->post_title;
}else{
    $title = $params['title'];
    $post_info = $params;
}

$style = $post_info['style'];
$image = wp_get_attachment_image($post_info['image'], 'full', false, ['class' => 'hero-slide-bg-img']);
$image = ( $style == 'image' ? $image : '<img src="' . get_the_post_thumbnail_url($post->ID) . '" alt="'. $alt . '" class="hero-slide-bg-img" />' );

$video = $post_info['video'];
$slides = $post_info['slides'];
$subtitle = $post_info['subtitle'];
$showButton = $post_info['show_button'];
$button = $post_info['button'];
?>

<section class="hero<?php echo ($style == 'text') ? ' hero-text' : '' ?>">
    <div class="swiper hero-slider">
        <div class="swiper-wrapper h-100">

            <?php if($style == 'video'){ ?>

                <div class="swiper-slide hero-slide">
                    <div class="hero-slide-bg">
                        <video class="hero-slide-bg-video" autoplay loop muted>
                            <source src="<?php echo $video['url'] ?>" type="video/mp4">
                        </video>
                        <div class="hero-slide-bg-overlay"></div>
                    </div>
                    <div class="container hero-slide-content">
                        <?php if($showButton == 1) {?>
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <div class="hero-slide-title">
                                        <h1 class="basis"><?php echo $title ?></h1>
                                        <h2 class="basis"><?php echo $subtitle ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="button-wrapper">
                                        <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                                    </div>
                                </div>

                                <div class="col-4 ms-auto d-none d-lg-block">
                                    <div class="scroll-down">
                                        <p><?php _e('Scroll Down', 'visage')?></p>
                                            <div class="img-wrapper ">
                                                <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-link.png"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row align-items-end">
                                <div class="col-12 col-lg-9">
                                    <div class="hero-slide-title">
                                        <h1 class="mb-0 "><span class="basis"><?php echo $title ?></span></h1>
                                    </div>
                                </div>
                                <div class="col-3 ms-auto d-none d-lg-block">
                                    <div class="scroll-down">
                                        <p><?php _e('Scroll Down', 'visage')?></p>
                                        <div class="img-wrapper ">
                                            <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-link.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php } elseif($style == 'image' || $style == 'featured_image'){ ?>

                <div class="hero-slide">
                    <div class="hero-slide-bg">
                        <?php
                            $scale = $params['image_scale'];
                            $imageMargin = $params['image_margin'];
                        ?>
                        <div class="wrap-img h-100" <?php if($scale != 0 && $imageMargin != 0) { ?> style="scale: <?php echo $scale ?>; margin-top: <?php echo $imageMargin ?>px"<?php } ?>>
                            <?php echo $image; ?>
                        </div>

                        <div class="hero-slide-bg-overlay"></div>
                    </div>
                    <div class="container hero-slide-content">
                        <?php if($showButton == 1) {?>
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <div class="hero-slide-title">
                                        <h1 class="basis"><?php echo $title ?></h1>
                                        <?php if(!empty($subtitle)){ ?>
                                            <h2 class="basis" ><?php echo $subtitle ?></h2>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="button-wrapper">
                                        <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                                    </div>
                                </div>
                                <div class="col-4 ms-auto d-none d-lg-block">
                                    <div class="scroll-down">
                                        <p><?php _e('Scroll Down', 'visage')?></p>
                                        <!-- <div class="scroll-down-body"> -->
                                            <div class="img-wrapper ">
                                                <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-link.png"/>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row align-items-end">
                                <div class="col-12 col-lg-9">
                                    <div class="hero-slide-title">
                                        <h1 class="mb-0 basis "><?php echo $title ?></h1>
                                        <?php if(!empty($subtitle)){ ?>
                                            <h2 class="basis" ><?php echo $subtitle ?></h2>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-3 ms-auto d-none d-lg-block pb-3">
                                    <div class="scroll-down">
                                        <p class="strong"><?php _e('Scroll Down', 'visage')?></p>
                                        <!-- <div class="scroll-down-body"> -->
                                            <div class="img-wrapper ">
                                                <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-link.png"/>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } elseif($style == 'slider') {?>
                <?php foreach ($slides as $k => $v) { ?>
                    <?php 
                        // myErr($v['style']);
                        if($v['style'] == 'image'){
                            $image = wp_get_attachment_image($v['image']['id'], 'full', false, ['class' => 'hero-slide-bg-img', 'style'  => 'object-fit: cover;']);
                            $title = $v['title'];
                            $subtitle = $v['subtitle'];
                            $showButton = $v['show_button'];
                        }
                    ?>
                    <?php if($v['style'] == 'image') { ?>
                        <div class="swiper-slide hero-slide">
                            <div class="hero-slide-bg">
                                <?php echo $image; ?>
                                <div class="hero-slide-bg-overlay"></div>
                            </div>
                            <div class="container hero-slide-content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slide-pagination d-none d-lg-block">     
                                            <div class="swiper-pagination pb-5">
                                                <span class="swiper-pagination-current"></span>
                                                /
                                                <span class="swiper-pagination-total"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="hero-slide-title">
                                            <?php if($k == 0) { ?>
                                                <h1><span class="basis  "><?php echo $title ?></span></h1>
                                                <h2 class="basis"><?php echo $subtitle ?></h2>
                                            <?php } else { ?>
                                                <h2 class="h1 "><span class="basis"><?php echo $title ?></span></h2>
                                                <h2 class="basis"><?php echo $subtitle ?></h2>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if($showButton == 1) { ?>
                                        <div class="col-6 button-wrapper">
                                            <?php 
                                                $button = $v['button'];
                                                include THEME_DIR . '/templates/acf/button-show.php'; 
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <div class="col-4 ms-auto d-none d-lg-block">
                                        <div class="scroll-down">
                                            <p><?php _e('Scroll Down', 'visage')?></p>
                                            <div class="img-wrapper ">
                                                <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-link.png"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if($v['style'] == 'video'){ 
                        $showButton = $v['show_button'];
                        $button = $v['button'];
                    ?>
                    <div class="swiper-slide hero-slide">
                        <div class="hero-slide-bg">
                            <video class="hero-slide-bg-video" autoplay loop muted>
                                <source src="<?php echo $v['video']['url'] ?>" type="video/mp4">
                            </video>
                            <div class="hero-slide-bg-overlay"></div>
                        </div>
                        <div class="container hero-slide-content">
                            <?php if($showButton == 1) {?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slide-pagination d-none d-lg-block">     
                                            <div class="swiper-pagination pb-5">
                                                <span class="swiper-pagination-current"></span>
                                                /
                                                <span class="swiper-pagination-total"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="hero-slide-title">
                                            <h1 class="basis "><?php echo $v['title'] ?></h1>
                                            <h2 class="basis"><?php echo $v['subtitle'] ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="button-wrapper">
                                            <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                                        </div>
                                    </div>

                                    <div class="col-4 ms-auto d-none d-lg-block">
                                        <div class="scroll-down">
                                            <p><?php _e('Scroll Down', 'visage')?></p>
                                            <div class="img-wrapper ">
                                                <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-link.png"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row align-items-end">
                                    <div class="col-12">
                                        <div class="slide-pagination d-none d-lg-block">     
                                            <div class="swiper-pagination pb-5">
                                                <span class="swiper-pagination-current"></span>
                                                /
                                                <span class="swiper-pagination-total"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="hero-slide-title">
                                            <h1 class="mb-0 "><span class="basis"><?php echo $v['title'] ?></span></h1>
                                            <h2 class="basis"><?php echo $v['subtitle'] ?></h2>
                                        </div>
                                    </div>
                                    <div class="col-3 ms-auto d-none d-lg-block">
                                        <div class="scroll-down">
                                            <p><?php _e('Scroll Down', 'visage')?></p>
                                            <div class="img-wrapper ">
                                                <img src="<?php echo THEME_URL ?>/assets/img/png/arrow-link.png"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            <?php } elseif($style == 'text') {?>
                <div class="container">
                    <section class="intro-two-columns">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h2 intro-title " style="color: black;"><?php echo $params['title']?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p class="medium"><?php echo $params['left_column'] ?></p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="medium"><?php echo $params['right_column'] ?></p>
                            </div>
                        </div>
                    </section>
                </div>
            <?php } ?>
        </div>

        <?php if($style == 'slider') { ?>
            <div class="swiper-navigation d-none d-lg-block">
                <div class="swiper-button swiper-button-next" style="transform: scaleX(-1)">
                    <img class="replaceSvg" style="opacity: 0;"  src="<?php echo THEME_URL; ?>/assets/img/svg/angle.svg" alt="">
                </div>
                <div class="swiper-button swiper-button-prev"  >
                    <img class="replaceSvg" style="opacity: 0;"  src="<?php echo THEME_URL; ?>/assets/img/svg/angle.svg" alt="">
                </div>
            </div>
            <div class="swiper-navigation-mobile d-lg-none">
                <div class="swiper-navigation-mobile-wrap">
                    <div class="swiper-button swiper-button-prev">
                        <img class="replaceSvg" style="opacity: 0;" src="<?php echo THEME_URL; ?>/assets/img/svg/angle.svg" alt="">
                    </div>
                    <div class="swiper-pagination-mobile"></div>
                    <div class="swiper-button swiper-button-next" style="transform: scaleX(-1)">
                        <img class="replaceSvg" style="opacity: 0;" src="<?php echo THEME_URL; ?>/assets/img/svg/angle.svg" alt="">
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
