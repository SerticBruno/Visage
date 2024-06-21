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
                    <h2 class="versailles"><?php echo $title ?></h2>

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

        <?php if(!empty($params['text_url'])) { ?>
            <div class="row see-more pt-2">
                <div class="button-wrapper d-flex justify-content-end">
                    <a href="<?php echo $params['link']; ?>" class="btn btn-primary">
                        <?php echo $params['text_url']; ?>
                    </a>
                </div>
            </div>
        <?php }?>
    </div>
</section>