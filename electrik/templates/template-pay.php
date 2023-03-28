<?php

/*
 *
 Template Name: Оплата
*/

get_header();

$pays = get_field('sposoby_oplaty');

get_template_part('parts/breadcrumbs');

?>

<section class="contact-block pay-block tabs">
    <div class="content-width">
        <div class="top ">
            <h1><?php the_title();?></h1>
            <?php if($pays):?>
                <ul class="tabs-menu">
                    <?php foreach ($pays as $pay):?>
                        <li><?= $pay['naznachenie'];?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div>

        <?php if($pays):?>
            <div class="tab-content">
                <?php foreach ($pays as $pay):
                    $sps = $pay['sposoby_oplaty'];

                    if($sps):?>

                        <div class="tab-item">
                            <div class="content">

                                <?php foreach ($sps as $sp):?>

                                    <div class="item">
                                        <h2><?= $sp['nazvanie'];?> <img src="<?= $sp['ikonka'];?>" alt=""></h2>
                                        <div class="wrap">
                                            <?= $sp['opisanie'];?>
                                        </div>
                                    </div>

                                <?php endforeach;?>
                            </div>
                        </div>

                    <?php endif;

                endforeach;?>
            </div>
        <?php endif;?>

    </div>
</section>

<?php get_footer();?>
