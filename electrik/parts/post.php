<div class="item">
    <figure>
        <a href="<?php the_permalink();?>">
            <img src="<?php the_post_thumbnail_url();?>" alt="<?= strip_tags(get_the_title());?>">
        </a>
    </figure>
    <div class="text-wrap">
        <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
        <?php the_excerpt();?>
        <div class="bottom-text">
            <p><img src="<?= get_template_directory_uri();?>/img/icon-52.svg" alt=""><?php the_time('j F');?></p>
            <p><a href="<?php the_permalink();?>">Подробнее <img src="<?= get_template_directory_uri();?>/img/icon-53.svg" alt=""></a></p>
        </div>
    </div>
</div>