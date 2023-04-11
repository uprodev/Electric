</main>
<?php
$soc = get_field('socz_seti', 'options');
$fp = get_field('forma_podpiski', 'options');
?>
<footer>
    <div class="content-width">
        <div class="top-footer">
            <?= $fp['zagolovok'];?>
            <div class="form-wrap">
                <div class="footer-form">
                    <?= do_shortcode('[contact-form-7 id="'.$fp['form'].'"]');?>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="item item-1">
                <h6><?php the_field('zagolovok_menyu_1', 'options');?></h6>
                <?php wp_nav_menu([

                    'container' => '',
                    'menu' => 'Footer 1',
                ]);?>
            </div>
            <div class="item item-2">
                <div class="sub-item">
                    <h6><?php the_field('zagolovok_menyu_2', 'options');?></h6>
                    <?php wp_nav_menu([

                        'container' => '',
                        'menu' => 'Footer 2',
                    ]);?>
                </div>
                <div class="sub-item">
                    <h6><?php the_field('zagolovok_menyu_3', 'options');?></h6>
                    <ul class="contact">
                        <li>
                            <a href="tel:+<?= phone_clear(get_field('telefon', 'options'));?>"><img src="<?= get_template_directory_uri();?>/img/icon-20.svg" alt=""><?php the_field('telefon', 'options');?></a>
                            <p><?php the_field('grafik', 'options');?></p>
                        </li>
                        <?php if(get_field('adres', 'options')):?>
                            <li class="city">
                                <p><img src="<?= get_template_directory_uri();?>/img/icon-21.svg" alt=""><?php the_field('adres', 'options');?></p>
                            </li>
                        <?php endif;?>
                        <?php if(get_field('e-mail', 'options')):?>
                            <li class="email">
                                <a href="mailto:<?php the_field('e-mail', 'options');?>"><img src="<?= get_template_directory_uri();?>/img/icon-22.svg" alt=""><?php the_field('e-mail', 'options');?></a>
                            </li>
                        <?php endif;?>
                    </ul>
                    <?php if(!empty($soc)):?>
                        <ul class="soc">
                            <?php foreach ($soc as $ss):?>
                                <li><a href="<?= $ss['url'];?>" target="_blank"><i class="fab fa-<?= $ss['font_awesome_class'];?>"></i></a></li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <p><?php the_field('kopirajt_tekst', 'options');?></p>
            <?php $link = get_field('ssylka_futera', 'options');

            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <p><a href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a></p>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php get_template_part('templates/popups');?>

<?php get_template_part('templates/popup-filter');?>

<?php
if(is_product()) {
    get_template_part('templates/popup-product');
}?>

  <?php wp_footer(); ?>
	</body>
</html>
