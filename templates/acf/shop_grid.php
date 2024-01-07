<section class="shop-grid">
    <div class="container">
        <div class="row">
            <?php foreach($params['items'] as $k => $v) { ?>
                <?php $image = wp_get_attachment_image($v['image']['id'], 'full', false); ?>
                <div class="col-12 col-md-4 item">
                    <a href="<?php echo $v['url'] ?>" target="_blank">
                        <?php $startRot = rand(4, 17); ?>
                        <h4 class="item-title"><?php echo $v['title'] ?></h4>
                        <div class="item-image-wrapper">
                            <?php echo $image ?>
                        </div>
                        <div class="item-button-wrapper">
                            <p>KUPI</p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>