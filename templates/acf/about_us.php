<?php

$image = $params['image']['url'];
$description = $params['description'];
$content = $params['content'];
$button = $params['button'];
$backgroundImage = $params['background_image']['url'];

?>

<section class="about-us" id="about-us">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8 d-flex justify-content-around mx-auto">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-12 d-flex justify-content-center align-items-center">
                        <div class="text-wrap">
                            <!-- //Vas content -->
                            <?php echo $description ?>
                            
                            <div class="button-wrapper">
                                <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="img-wrapper">
                            <img src="<?php echo $image ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>