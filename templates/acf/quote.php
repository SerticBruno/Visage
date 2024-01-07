<?php

$content = $params['content'];

?>

<section class="quote">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-around">
                <div class="quotediv quotediv-left">
                    <img src="<?php echo THEME_URL ?>/assets/img/png/note-round.png" />
                </div>
                <div class="content">
                    <?php echo $content ?>
                </div>
                <div class="quotediv quotediv-right">
                    <img src="<?php echo THEME_URL ?>/assets/img/png/note-round.png" />
                </div>
            </div>
        </div>
    </div>
</section>