<?php
$banners = get_field('bannery', 'option');


if ($banners) {
    foreach ($banners as $banner) {
        ?>

        <div class="item <?= $banner['white'] ?  'item-white' : '' ?>">
            <div class="bg">
                <img src="<?= $banner['image']['url'] ?>" alt="">
                <img src="<?= $banner['image_mob']['url'] ?>" alt="" class="mob">
            </div>
            <h6><?= $banner['text'] ?></h6>
            <?php if ($banner['desc']) { ?>
                <p><?= $banner['desc'] ?></p>
            <?php } ?>

            <?php if ($banner['price']) { ?>
                <p class="cost"><?= $banner['price'] ?></p>
            <?php } ?>
            <div class="btn-wrap">
                <a href="<?= $banner['ssylka']['url'] ?>" class="btn-border<?= $banner['white'] ?  '' : '-black' ?>"><?= $banner['ssylka']['title'] ?></a>
            </div>
        </div>

        <?php
    }
} ?>