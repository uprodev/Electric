<?php

/*
 *
 Template Name: Доставка
*/

get_header();

$usl = get_field('usloviya_dostavki');
$prices = get_field('czena_dostavki');

get_template_part('parts/breadcrumbs');

?>

    <section class="delivery-block">
        <div class="content-width">
            <h1><?php the_field('zagolovok');?></h1>
            <?php if(!empty($prices)):
                foreach($prices as $pr):?>
                        <div class="item">
                        <h2><?= $pr['zagolovok'];?> <img src="<?= $pr['ikonka']['url'];?>" alt="<?= $pr['ikonka']['alt'];?>"></h2>
                        <div class="wrap">
                            <div class="info">
                                <p><?= $pr['zakaz_do']['zagolovok'];?></p>
                                <h6><?= $pr['zakaz_do']['ot'];?> <span>— <?= $pr['zakaz_do']['do'];?></span></h6>
                            </div>
                            <div class="info">
                                <p><?= $pr['zakaz_svyshe']['zagolovok'];?></p>
                                <h6><?= $pr['zakaz_svyshe']['ot'];?><span>— <i><?= $pr['zakaz_svyshe']['do'];?></i></span></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            endif;?>
        </div>
    </section>

    <section class="text-column-2">
        <div class="content-width">
            <?php $ic = get_field('usloviya_ikonka');?>
            <h2><?php the_field('usloviya_zagolovok');?> <img src="<?= $ic;?>" alt=""></h2>
            <?php if(!empty($usl)):?>
                <ul class="point-list">
                    <?php foreach($usl as $us):?>
                        <li><?= $us['uslovie'];?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div>
    </section>

<?php get_footer();
