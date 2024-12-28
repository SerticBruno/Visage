<?php
    $footer = get_field('footer', 'option');
?>

<section class="footer-contact-form">
    <div class="container w-90">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-description pb-3">
                    <?php echo $footer['footer_contact_description']; ?>
                </div>
                <div class="form-map pb-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5810.921222161343!2d16.651602899134208!3d43.26272517810698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134a8581ca0fb9fb%3A0x4629ac003b85fe3c!2sCamp%20Meteor%20Bol!5e0!3m2!1shr!2shr!4v1734620375487!5m2!1shr!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 footer-contact-form-campMeteor">
                <div class="form-campMeteor-footer">
                    <?php echo do_shortcode('[forminator_form id="290"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>