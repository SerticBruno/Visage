<?php 
// $images = wp_get_attachment_image($params['images'], 'img1200', false); 
$title = $params['title'];
$image = $params['image'];
?>

<section class="full-width-image" style="background-image: url('<?php echo $image['url'] ?>');">
    <div class="container">
        <div class="row img-row">
            <div class="row">
                <div class="col-12">
                    <h2><?php echo $title ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
