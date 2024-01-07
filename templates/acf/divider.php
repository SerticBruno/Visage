<?php
    $rand = mt_rand();
?>
<style>
    section.spacer-<?php echo $rand; ?> {

        <?php
            $pMin = px2rem(min($params['distance']['mobile'], $params['distance']['desktop']));
            $pMax = px2rem($params['distance']['desktop']);
            $wMin = px2rem(568);
            $wMax = px2rem(1440);    
            $s = ($pMax - $pMin) / ($wMax - $wMin); 
            $y = -$wMin * $s + $pMin; 
         ?>

        padding-bottom: clamp( <?php echo $pMin; ?>rem, calc(<?php echo $y; ?>rem + <?php echo $s * 100; ?>vw), <?php echo $pMax; ?>rem ); 
        padding-top:    clamp( <?php echo $pMin; ?>rem, calc(<?php echo $y; ?>rem + <?php echo $s * 100; ?>vw), <?php echo $pMax; ?>rem );
    }
</style>


<section id="<?php echo $params['anchor_name']; ?>" class="divider-desktop spacer-<?php echo $rand; ?>"></section>
 