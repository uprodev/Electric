<?php

/**
 * Two Images
 *

 **/

$img1 = get_field( 'image_1' );
$img2 = get_field( 'image_2' );

?>

<div class="img-two">
    <figure>
        <?php if($img1):?>
            <img src="<?= $img1['url'];?>" alt="<?= $img1['alt'];?>">
        <?php endif;?>
    </figure>
    <figure>
        <?php if($img2):?>
            <img src="<?= $img2['url'];?>" alt="<?= $img2['alt'];?>">
        <?php endif;?>
    </figure>
</div>