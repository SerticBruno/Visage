<?php 
// $images = wp_get_attachment_image($params['images'], 'img1200', false); 
$style = $params['style'];
?>

<?php if($style == 'two_images') { ?>
    <section class="two-img">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="grid-container gallery">

                        <?php foreach($params['images'] as $k => $v) { ?>
                                <?php 
                                    if($k > 1)
                                        continue;
                                    $image = wp_get_attachment_image($v['image'], 'full', false);
                                    $imageURL = wp_get_attachment_image_url($v['image'], 'full', false);
                                ?>

                                <div class="grid-item-<?= $k+1 ?>">
                                    <a href="<?= $imageURL ?>" class="img-wrapper"><?= $image ?></a>
                                </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else if($style == 'five_images')  { ?>
    <section class="five-img">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="grid-container gallery">
                        <?php foreach($params['images'] as $k => $v) { ?>
                                <?php 
                                $image = wp_get_attachment_image($v['image'], 'full', false);
                                $imageURL = wp_get_attachment_image_url($v['image'], 'full', false);
                                    // echo $image;    
                                ?>

                                <div class="grid-item-<?= $k+1 ?>">
                                    <a href="<?= $imageURL ?>" class="img-wrapper"><?= $image ?></a>
                                </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
<section class="single-image">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="img-wrapper gallery">
                    <?php 
                    // myErr($params);
                    $image = wp_get_attachment_image($params['images'][0]['image'], 'full', false, ['class' => 'single-video-thumbnail']); 
                    // myErr($image);
                    ?>
                    <?php echo $image ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
