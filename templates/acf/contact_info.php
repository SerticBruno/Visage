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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2797.0014310322276!2d16.370227812957673!3d45.489915931600414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4766f208aedebb51%3A0xff4fa3df8d5974e9!2sUl.%20Stjepana%20i%20Antuna%20Radi%C4%87a%2037%2C%2044000%2C%20Sisak!5e0!3m2!1sen!2shr!4v1709296471880!5m2!1sen!2shr" title="google-maps" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
        </div>
    </div>
</section>

