<?php

$content = $params['content'];

?>

<section class="price-list">
    <div class="container py-3 versailles">
        <div class="row">
            <div class="col-12 col-lg-2">
                <div>
                    <h2>Cjenik</h2>
                </div>
                <div class="img-wrapper">
                    <img src="<?php echo $params['image']['url'] ?>"></img>
                </div>
            </div>
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12 strong">
                        Tretmani
                    </div>
                </div>
                <?php foreach($params['items'] as $k => $v) { ?>
                    <div class="row">
                        <div class="col-6">
                            <?php echo $v['product'] ?>
                        </div>
                        <div class="col-6">
                            <?php echo $v['price'] ?> EUR
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>