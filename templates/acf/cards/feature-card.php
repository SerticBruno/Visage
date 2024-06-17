<?php 
    
$feature = $params;
$link = $feature['url'];
$title = $params['title'];
$image = $params['image']['url'];
$alt = $params['image']['alt'];
$description = $params['description'];
if($params['style'] == "three-in-row") {
    $columnClass = "col-lg-4";
}
else if($params['style'] == "four-in-row"){
    $columnClass = "col-lg-3";
}
else if($params['style'] == "two-in-row"){
    $columnClass = "col-lg-6";
}
?>

<div class="<?php echo $columnClass; ?> col-12 pb-3 link-wrapper">
    <a href="<?php echo $feature['url']; ?>" class="position-relative">
        <div class="features-card">
            <div class="img-wrapper">
                <img src="<?php echo $image ?>" alt="<?php echo $alt ?>"/>
            </div>
            <div class="info">
                <h4><?php echo $title ?></h4>
                <p><?php echo $description ?></p>
            </div>
        </div>
    </a>
</div>
