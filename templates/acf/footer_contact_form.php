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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5147.97933751365!2d16.372625581160964!3d45.4888494836397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4766f374fb1939eb%3A0xd77f5c49db8a3267!2scampMeteor%20Studio%20d.o.o.!5e0!3m2!1shr!2shr!4v1720956368880!5m2!1shr!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5593.997439789343!2d16.37258954038398!3d45.48997052673421!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4766f208aedebb51%3A0xff4fa3df8d5974e9!2sUl.%20Stjepana%20i%20Antuna%20Radi%C4%87a%2037%2C%2044000%2C%20Sisak!5e0!3m2!1sen!2shr!4v1718036219650!5m2!1sen!2shr" title="google-maps" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                </div>
            </div>
            <div class="col-12 col-md-6 footer-contact-form-campMeteor">
                <div class="form-campMeteor-footer">
                    <?php echo do_shortcode('[forminator_form id="240"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>