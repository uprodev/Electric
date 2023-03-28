<?php

get_header();

if(is_home()){
    $title = get_the_title(get_option('page_for_posts'));
    $content = get_field('poleznaya_informacziya', get_option('page_for_posts'));
}else{
    $title = get_queried_object()->name;
    $text = get_queried_object()->description;

    if($text){
        $content = $text;
    }else{
        $content = get_field('poleznaya_informacziya', get_option('page_for_posts'));
    }
}

get_template_part('parts/breadcrumbs');

?>

    <section class="blog">
        <div class="content-width">
            <h1><?= $title;?></h1>
            <?php if(have_posts()):?>
                <div class="content">
                    <?php while(have_posts()): the_post();

                        get_template_part('parts/post');

					endwhile;?>
                </div>
            <?php endif;?>
            <div class="pagination-wrap">
                <?php $args = array(
                    'type' => 'list',
                    'show_all'     => false,
                    'end_size'     => 1,
                    'mid_size'     => 2,
                    'prev_next'    => false,
                    'screen_reader_text' => '',
                    'class'        => 'pagination',
                );
                the_posts_pagination( $args );?>
            </div>
        </div>
    </section>

    <?php if($content):?>
        <section class="info-section">
        <div class="content-width">
            <h2>Полезная информация <img src="<?= get_template_directory_uri();?>/img/icon-36.svg" alt=""></h2>
            <div class="text-wrap">
                <?= $content;?>
                <div class="show-text">
                    <a href="#">
                        <span>Показать весь текст</span>
                        <span>Скрыть весь текст</span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>
<?php get_footer();
