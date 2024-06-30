<?php 
    
$feature = $params;
$link = $feature['url'];
$title = $params['feature_title'];
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

if($params['mobile_style'] == "one-in-row") {
    $mobileColumnClass = "col-12";
}
else if($params['mobile_style'] == "two-in-row"){
    $mobileColumnClass = "col-6";
}


if(!empty($feature['anchor'])){
    
    $featureUrl = substr_replace($feature['url'], '', -1);
    $linkUrl = $featureUrl . "#" . $feature['anchor'];
}
else{
    $linkUrl = $feature['url'];
}


?>

<div class="<?php echo $columnClass; ?> <?php echo $mobileColumnClass; ?> pb-3 link-wrapper">
    <a href="<?php echo $linkUrl; ?>" class="position-relative">
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
