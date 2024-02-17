<?php
    $footer = get_field('footer', 'option');
?>

<section class="footer-contact-form pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-description"><?php echo $footer['footer_contact_description']; ?></div>
            </div>
            <div class="col-12 col-md-6 contact-form-visage">
                <?php //echo do_shortcode('[forminator_form id="429"]'); ?>
                <?php echo do_shortcode('[forminator_form id="240"]'); ?>
            </div>
        </div>
    </div>
</section>