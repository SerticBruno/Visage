<?php

$showButton = $params['show_button'];
$button = $params['button'];
?>

<section class="contact-info">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 d-flex align-items-center">
                <div class="row p-3">
                    <div class="col-12 w-100">
                        <h2 class="form-title"><?php echo $params['title']; ?></h2>
                    </div>
                    <div class="col-12 form-description w-100">
                        <?php echo $params['description']; ?>
                    </div>
                    <?php if($showButton == 1) { ?>
                        <div class="col-12 pt-2 pb-4">
                            <div class="button-wrapper">
                                <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0 border-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5810.921222161343!2d16.651602899134208!3d43.26272517810698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134a8581ca0fb9fb%3A0x4629ac003b85fe3c!2sCamp%20Meteor%20Bol!5e0!3m2!1shr!2shr!4v1734620375487!5m2!1shr!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
        </div>
    </div>
</section>

