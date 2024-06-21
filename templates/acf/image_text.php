<?php

?>

<section class="image-text" id="image-text">
    <div class="container-fluid p-0 m-0">
        <?php foreach($params['rows'] as $k => $v) { ?>
            <?php
                $image = $v['image']['url'];
                $alt = $v['image']['alt'];
                $description = $v['description'];
                $title = $v['title'];
                $button = $v['button'];

            ?>

            <div class="row justify-content-center px-1 m-0 py-4 py-lg-5 <?php echo $k % 2 == 0 ? 'dark-gray' : 'gray'; ?>">
                <div class="row content px-1 px-md-4 px-lg-3 <?php echo $k % 2 == 1 ? 'flex-row-reverse' : ''; ?>">
                    <div class="col-lg-8 col-12">
                        <div class="text">
                            <?php echo $description ?>

                            <?php if(!empty($button['label'])){ ?>
                                <div class="button-wrapper pb-4 pb-lg-0">
                                    <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 d-flex justify-content-center">
                        <div class="img-wrapper">
                            <img src="<?php echo $image ?>" alt="<?php echo $alt ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
