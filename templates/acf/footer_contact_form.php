<?php
    $footer = get_field('footer', 'option');
?>

<section class="footer-contact-form">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <div class="form-description w-90">
                    <?php echo $footer['footer_contact_description']; ?>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center footer-contact-form-visage">
                <div class="w-90">
                    <?php echo do_shortcode('[forminator_form id="240"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>