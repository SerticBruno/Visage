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
                <div class="card col-8 col-md-3 row text-center rot-<?php echo ($k % 6) + 1?>">
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
                        <img src="<?php echo $v['icon']['url'] ?>"></img>
                        <h3><?php echo $v['title'] ?></h3>
                        <p><?php echo $v['description'] ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>