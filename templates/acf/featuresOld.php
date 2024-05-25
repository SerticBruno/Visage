<?php

$features = $params['feature'];

?>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-5">
                <h2 class="versailles">USLUGE</h2>
            </div>
        </div>
        <div class="row justify-content-around">
            <?php foreach($features as $k => $v) { ?>
                <div class="feature col-4 col-md-3 row text-center" style="background-image: url('<?php echo $v['icon']['url'] ?>')">
                    <?php
                        if($v['link'] == 'internal'){
                            $link = $v['internal'];
                            $target = 'target=""';
                        }else if($v['link'] == 'external'){
                            $link = $v['external'];
                            $target = 'target="_blank"';
                        }
                    ?>
                    <a href="<?php echo $link ?>" <?php echo $target ?>>
                        <h3><?php echo $v['title'] ?></h3>
                        <p><?php echo $v['description'] ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>