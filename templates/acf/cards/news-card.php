<?php 
    
$post = $params;
$image = get_the_post_thumbnail($post);

$range = array_merge(range(-11, -3), range(3, 8));
// $rangeCard = array_merge(range(358, 359), range(1, 2));

$startRot = $range[rand(0, count($range) - 1)];

// $commonCard = $rangeCard[rand(0, count($rangeCard) - 1)];
// $commonCard = 0;

$hoverRot = rand(5, 15);

if($startRot > 0){
    $hoverRot = abs($hoverRot) * -1;
}
else{
    $hoverRot = abs($hoverRot);
}

?>

<div class="col-lg-4 pb-5 link-wrapper">
    <a href="<?php echo get_permalink($post); ?>" class="position-relative">
        <div class="news-card card">
            <div class="card-title" style="transform: rotate(<?php echo $startRot ?>deg); --hoverRotate: <?php echo $hoverRot ?>deg;">
                <h2 class="p-3"><?php echo get_the_title($post) ?></h2>
            </div>
            <div class="img-wrapper">
                <?php echo $image ?>
            </div>
            <div class="info p-3">
                <time class="strong"><?php echo get_the_date('d M Y', $post) ?></time>
                <p><?php echo get_the_excerpt($post) ?></p>
                <span class="author">- <?php echo get_the_author_meta('user_nicename', $post->post_author) ?></span>
            </div>
        </div>
    </a>
</div>
