<?php 
$title = $params['title'];
?>

<section class="features">
    <div class="container">
        <?php if(!empty($title)) { ?>
            <div class="row">
                <div class="col-12 pb-4 versailles d-flex align-items-center">
                    <span class="span-line"></span>
                    <h2><?php echo $title ?></h2>
                </div>
            </div>
        <?php } ?>
        <div class="row cards card-row"> 
            <?php foreach($params['feature'] as $k => $v) { ?>
                <?php get_component_template('cards/feature-card', $v); ?>
            <?php } ?>
        </div>
    </div>
</section>