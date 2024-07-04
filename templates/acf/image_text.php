<?php
?>

<section class="image-text" id="<?php echo $anchor ?>">
    <div class="container-fluid">
        <?php foreach($params['rows'] as $k => $v) { ?>
            <?php
                $image = $v['image']['url'];
                $alt = $v['image']['alt'];
                $description = $v['description'];
                $title = $v['title'];
                $button = $v['button'];
                $anchor = $v['anchor'];

            ?>
            <div class="row py-5 justify-content-center anchor-target <?php echo $k % 2 == 0 ? 'dark-gray' : 'gray'; ?>" id="<?php echo $anchor ?>">
                <div class="col-11 d-flex">
                    <div class="row <?php echo $k % 2 == 1 ? 'flex-row-reverse' : ''; ?>">

                        <div class="col-md-8 col-12">
                            <div class="text">
                                <?php echo $description ?>
                                
                                <?php if(!empty($button['label'])){ ?>
                                    <div class="button-wrapper pb-4 pb-lg-0">
                                        <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="img-wrapper">
                                <img src="<?php echo $image ?>" alt="<?php echo $alt ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
