<?php 

$title = $params['title'];
$button = $params['button'];

?>

<section class="features">
    <div class="container">
        <?php if(!empty($title)) { ?>
            <div class="row">
                <div class="col-12 pb-4 versailles d-flex align-items-center">
                    <span class="span-line"></span>
                    <h2><?php echo $title ?></h2>

                    <?php if(!empty($button['label'])){ ?>
                        <div class="button-wrapper ms-auto">
                            <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="row cards card-row"> 
            <?php foreach($params['feature'] as $k => $v) { ?>
                <?php $v = array_merge($v, $params); ?>
                <?php get_component_template('cards/feature-card', $v); ?>
            <?php } ?>
        </div>
    </div>
</section>