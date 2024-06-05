<?php

$content = $params['content'];
$anchor = $params['anchor'];
?>

<section class="free-content" id="<?php echo $anchor ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-xl-8 mx-auto">
                <div class="text-wrap">
                    <!-- //Vas content -->
                    <?php echo $content ?>
                </div>
            </div>
        </div>
    </div>
</section>