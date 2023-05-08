<?php

/*
 *
 Template Name: О Нас
*/

get_header();

$cats = get_field('kategorii');
$opys = get_field('opisanie');
$adv = get_field('preimushhestva');
$img = get_field('ikonka_bannera');
$im = get_field('izobrazhenie_bannera');
$imt = get_field('izobrazhenie_bannera_tab');
$imm = get_field('izobrazhenie_bannera_mob');

get_template_part('parts/breadcrumbs');

?>

    <section class="about">
        <div class="content-width">
            <h1><?php the_field('zagolovok');?></h1>
            <div class="content">
                <div class="bg">
                    <img src="<?= $im['url'];?>" alt="<?= $im['alt'];?>">
                    <img src="<?= $imt['url'];?>" alt="<?= $imt['alt'];?>" class="tab">
                    <img src="<?= $imm['url'];?>" alt="<?= $imm['alt'];?>" class="mob">
                </div>
                <div class="center">
                    <figure>
                        <img src="<?= $img['url'];?>" alt="<?= $img['alt'];?>">
                    </figure>
                    <h2><?php the_field('zagolovok_bannera');?></h2>
                    <p><?php the_field('podzagolovok_bannera');?></p>
                </div>
                <div class="right">
                    <?php if($adv):
                        foreach($adv as $ad):?>
                            <div class="item">
                                <h6><?= $ad['kolichestvo'];?><img src="<?= $ad['ikonka'];?>" alt=""></h6>
                                <p><?= $ad['nazvanie'];?></p>
                            </div>
                        <?php endforeach;
                    endif;?>
                </div>
            </div>
        </div>
    </section>

    <?php if($opys):?>

        <section class="about-info">
            <div class="content-width">
                <?php foreach($opys as $item):?>
                    <div class="content">
                        <div class="title">
                            <h2><?= $item['zagolovok'];?></h2>
                        </div>
                        <div class="text-wrap">
                            <?= $item['tekst'];?>

                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </section>

    <?php endif;?>

    <?php if($cats):?>

        <section class="popular popular-more">
            <div class="content-width">
                <div class="content">
                    <ul>
                        <?php foreach($cats as $term):
                            $ic = get_field('icon', 'product_cat_'.$term->term_id);

                            $args = [
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                                'product_cat' => $term->slug,

                            ];

                            $products = new WP_query($args);

                            ?>
                            <li>
                            <a href="<?= get_term_link($term->term_id);?>">
                                <figure>
                                    <img src="<?= $ic['url'];?>" alt="<?= $ic['alt'];?>">
                                </figure>
                                <h6><?= $term->name;?></h6>
                                <p><?= $products->found_posts ?> товаров</p>
                            </a>
                        </li>
                        <?php endforeach;?>

                    </ul>
                </div>
            </div>
        </section>

    <?php endif;?>

<?php get_footer();
