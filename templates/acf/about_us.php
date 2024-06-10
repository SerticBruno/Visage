<?php

$image = $params['image']['url'];
$alt = $params['image']['alt'];
$description = $params['description'];
$title = $params['title'];
$content = $params['content'];
$button = $params['button'];
$backgroundImage = $params['background_image']['url'];

?>

<section class="about-us" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-around mx-auto">
                <div class="row">
                    <div class="col-lg-5 col-12 d-flex justify-content-center align-items-center">
                        <div class="text-wrap">
                            <h2 class="pb-2"><?php echo $title ?></h2>
                            <?php echo $description ?>
                            <div class="button-wrapper pt-2">
                                <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="img-wrapper">
                            <img src="<?php echo $image ?>" alt="<?php echo $alt ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>