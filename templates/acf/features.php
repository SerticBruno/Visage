<?php 

?>

<section class="features">
    <div class="container">
        <div class="row cards card-row"> 
            <?php foreach($params['feature'] as $k => $v) { ?>
                <?php get_component_template('cards/feature-card', $v); ?>
            <?php } ?>
        </div>

        <div class="row pt-3">
            <div class="col-12">
                <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
            </div>
        </div>
    </div>
</section>