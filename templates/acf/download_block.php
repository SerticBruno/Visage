<?php

$title = $params['title'];
$blocks = $params['blocks'];
// myErr($params);
?>

<section class="download-block">
    <div class="container">
        <div class="row justify-content-around">
            <?php foreach($blocks as $k => $v) { ?>
                <a href="<?php echo $v['url'] ?>" target="_blank" class="block col-9 col-md-8 row text-center rot-<?php echo ($k % 2) + 1?>">
                    <div class="info" style="background-image: url('<?php echo wp_get_attachment_image_url($v['image']['id'], 'full', false); ?>')">
                        <p class="title title-rot-<?php echo ($k % 2) + 1?>"><?php echo $v['title'] ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</section>