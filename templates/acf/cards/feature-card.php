<?php 
    
$feature = $params;
$link = $feature['url'];
$title = $params['title'];
$image = $params['image']['url'];
$description = $params['description'];

?>

<div class="col-lg-3 col-md-4 col-6 pb-5 link-wrapper">
    <a href="<?php echo get_permalink($post); ?>" class="position-relative">
        <div class="features-card">
            <div class="img-wrapper">
                <img src="<?php echo $image ?>"></img>
            </div>
            <div class="info">
                <h4><?php echo $title ?></h4>
                <p><?php echo $description ?></p>
            </div>
        </div>
    </a>
</div>
