<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
setlocale(LC_ALL, 'ru_RU.UTF-8  ');
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$sertifikaty = get_field('sertifikaty');

$rating_count = $product->get_rating_count();
$unrate = 5 - $rating_count;
$review_count = $product->get_review_count();
$average_rating =  $product->get_average_rating();
$attributes = $product->get_attributes();

$pcats = get_the_terms(get_the_ID(), 'product_cat');
$cat = $pcats[0]->term_id;

$date = strtotime('+3 days');


if ($product->is_type( 'variable' )) {
    $variations = ($product->get_available_variations());
    $variations_attr = ($product->get_variation_attributes());

    $default_attributes = $product->get_default_attributes();
    foreach($product->get_available_variations() as $variation_values ){
        foreach($variation_values['attributes'] as $key => $attribute_value ){
            $attribute_name = str_replace( 'attribute_', '', $key );
            $default_value = $product->get_variation_default_attribute($attribute_name);
            if( $default_value == $attribute_value ){
                $is_default_variation = true;
            } else {
                $is_default_variation = false;
                break;
            }
        }
        if( $is_default_variation ){
            $variation_id = $variation_values['variation_id'];
            break;
        }
    }
}
$sechenie = $product->get_attribute('pa_sechenie');


$unit = get_field('_woo_uom_input');
?>

<section class="product-inner">
    <div class="content-width">
        <div class="top">
            <div class="left">
                <?php woocommerce_template_single_title();?>
                <div class="stars-wrap">
                    <div class="wrap">
                        <?php
                        foreach (range(1, 5) as $star) {
                            $icon = '1';
//                            if ($star - $average_rating > 1)
//                                continue;

                            if ($average_rating - $star  < 0  || $star - $average_rating >= 0.5)
                                $icon = '2';

                            ?>
                            <img src="<?= get_template_directory_uri(); ?>/img/icon-37-<?= $icon ?>.svg" alt="">
                        <?php } ?>
                    </div>
                    <p><a href="#reviews"><?= plural($review_count); ?></a></p>
                </div>
            </div>
            <div class="right">
                <div class="info">
                    <p><span><?= __('Код товара:', 'electrik');?></span> <?php echo $product->sku;?></p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="slider-wrap">

                <?php woocommerce_show_product_images();?>

                <ul class="characteristics">
                    <?php
                    foreach ( $attributes as $attribute ) :
                        if (  ( $attribute['is_taxonomy'] && taxonomy_exists( $attribute['name'] ) ) ) {
                            $values = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'names' ) );
                            $att_val =     implode( ', ', $values ) ;


                        } else {
                            $att_val = $attribute['value'];
                        }

                        if( empty( $att_val ) )
                            continue;

                        ?>
                        <li>
                            <p><i><?= wc_attribute_label( $attribute['name'] ); ?></b></i></p>
                            <p><?= $att_val ?></p>
                        </li>


                    <?php endforeach; ?>

                    <li>
                        <a href="#">
                            <span><?= __('Все характеристики', 'electrik');?></span>
                            <span><?= __('Свернуть', 'electrik');?></span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="text-wrap">
                <div class="product-info">




                    <?php if (!empty($variations_attr )) { ?>

                        <?php foreach ($variations_attr as $key=>$variation_attr) {
                            $tax = get_taxonomy($key)?>
                            <h2><?= str_replace('Товар ', '', $tax->label) ?></h2>
                            <ul class="sort sort-<?= $tax->name ?>">

                                <?php
                                $sizes = [];

//

                                    foreach ($variation_attr as  $variation) {



                                        $size = get_term_by('slug', $variation , $tax->name);

                                        ?>
                                            <li>
                                                <input type="radio" data-name="<?= $tax->name ?>" name="<?= $tax->name;?>" id="cross-<?= $size->slug;?>" value="<?= $size->slug;?>" <?= $default_attributes[$tax->name] == $size->slug ? 'checked' : '' ?>>
                                                <label for="cross-<?= $size->slug;?>"><?= $size->name ?></label>
                                            </li>

                                    <?php }

                                 ?>

                            </ul>
                        <?php }?>

                    <?php }?>


                    <?php if ($attributes) { ?>
                        <ul class="characteristics">
                            <?php
                            foreach ( $attributes as $attribute ) :
                                if (  ( $attribute['is_taxonomy'] && taxonomy_exists( $attribute['name'] ) ) ) {
                                    $values = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'names' ) );
                                    $att_val =     implode( ', ', $values ) ;


                                } else {
                                    $att_val = $attribute['value'];
                                }

                                if( empty( $att_val ) )
                                    continue;

                                ?>
                                <li>
                                    <p><i><?= wc_attribute_label( $attribute['name'] ); ?></b></i></p>
                                    <p><?= $att_val ?></p>
                                </li>


                            <?php endforeach; ?>

                            <li>
                                <a href="#">
                                    <span><?= __('Все характеристики', 'electrik');?></span>
                                    <span><?= __('Свернуть', 'electrik');?></span>
                                    <i class="fas fa-chevron-down"></i>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>

                </div>
                <div class="product-cart">
                    <div class="cost-wrap">
                        <div class="cost">
                            <?php woocommerce_template_single_price();?>
                            <p><span>1 <?= $unit ? $unit : __('шт.', 'electrik');?></span></p>
                        </div>
                        <div class="like">
                            <a href="#" class="add_to_fav <?= is_favorite($product->get_id()) ?>" data-liked="<?= is_favorite($product->get_id()) ?>" data-user_id="<?= get_current_user_id() ?>" data-product_id="<?= $product->get_id() ?>">
                                <img src="<?= get_template_directory_uri();?>/img/icon-11-1.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="availability">
                        <p><?= __('Наличие', 'electrik');?></p>
                        <p><img src="<?= get_template_directory_uri();?>/img/icon-38.svg" alt=""><?= $product->get_stock_quantity(); ?> <?= $cat==17? __('м/п', 'electrik'): __('шт.', 'electrik');?> <?= __('на складе', 'electrik');?></p>
                    </div>
                    <div class="btn-wrap">
                        <a href="#" data-variation_id=""  data-product_id="<?= the_id() ?>" class="btn-border-red   add-to-cart"><img src="<?= get_template_directory_uri();?>/img/icon-25-3.svg" alt=""><?= __('В корзину', 'electrik');?></a>
                        <a href="#fast-shop" class="btn-red fancybox"><img src="<?= get_template_directory_uri();?>/img/icon-39.svg" alt=""><?= __('Быстрый заказ', 'electrik');?></a>
                    </div>
                    <div class="delivery">
                        <h2><?= __('Способы получения заказа', 'electrik');?></h2>
                        <ul>
                            <li>
                                <p><b><img src="<?= get_template_directory_uri();?>/img/icon-40-1.svg" alt=""><?= __('Самовывоз в Минске', 'electrik');?></b></p>
                                <p><?= __('сегодня со склада', 'electrik');?></p>
                            </li>
                            <li>
                                <p><b><img src="<?= get_template_directory_uri();?>/img/icon-40-2.svg" alt=""><?= __('Курьер по Минску', 'electrik');?></b></p>
                                <p><?= __('сегодня', 'electrik');?></p>
                            </li>
                            <li>
                                <p><b><img src="<?= get_template_directory_uri();?>/img/icon-40-3.svg" alt=""><?= __('Отправка в Ваш город', 'electrik');?></b></p>
                                <p><?=
                                     strftime('%A, %d %h', strtotime("+1 day"));
                                 //   date('j F', $date);?>
                                </p>
                            </li>
                        </ul>
                        <div class="info">
                            <a target="_blank" href="<?= get_permalink(45) ?>"><?= __('Подробнее о самовывозе и доставке', 'electrik');?><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <?php if( $product->is_type('variable')){
                woocommerce_template_single_add_to_cart();
            }?>

        </div>
    </div>
</section>

<section class="info-product-full">
    <div class="content-width">
        <div class="tabs">
            <ul class="tabs-menu">
                <li><i class="fas fa-chevron-right"></i><?= __('Характеристики', 'electrik');?></li>
                <li><i class="fas fa-chevron-right"></i><?= __('Отзывы', 'electrik');?> <span><?= $review_count;?></span></li>
                <li><i class="fas fa-chevron-right"></i><?= __('Похожие товары', 'electrik');?> <img src="<?= get_template_directory_uri();?>/img/icon-44.svg" alt=""></span></li>

                <?php if($product->get_upsell_ids()):?>
                    <li><i class="fas fa-chevron-right"></i><?= __('Сопутствующие товары', 'electrik');?> <img src="<?= get_template_directory_uri();?>/img/icon-43.svg" alt=""></li>
                <?php endif;?>

                <?php if($sertifikaty):?>
                    <li><i class="fas fa-chevron-right"></i><?= __('Сертификаты', 'electrik');?></li>
                <?php endif;?>

            </ul>
            <div class="tab-content">
                <div class="tab-item tab-item-1">
                    <div class="item">
                        <h2><?= __('Технические характеристики', 'electrik');?> <?php the_title();?></h2>
                        <ul class="characteristics">
                            <?php foreach ( $attributes as $attribute ) :
                                if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) )
                                    continue;

                                $values = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'names' ) );
                                $att_val = apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

                                if( empty( $att_val ) )
                                    continue;

                                ?>
                                <li>
                                    <p><i><?= wc_attribute_label( $attribute['name'] ); ?></i></p>
                                    <?= $att_val; ?>
                                </li>


                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="item">
                        <h2><?= __('Описание', 'electrik');?></h2>
                        <?= apply_filters('the_content', $product->get_description());?>
                    </div>
                </div>
                <div class="tab-item tab-item-2">
                    <?php wc_get_template_part( 'single-product-reviews' ); ?>
                </div>
                <div class="tab-item tab-item-3">
                    <?php woocommerce_output_related_products(); ?>
                </div>

                <?php if($product->get_upsell_ids()):?>
                    <div class="tab-item tab-item-4">
                        <?php woocommerce_upsell_display(); ?>
                </div>
                <?php endif;?>


                <?php if($sertifikaty):?>
                    <div class="tab-item tab-item-3">
                        <h2><?= __('Сертификаты', 'electrik');?></h2>
                        <?php if( $sertifikaty ):?>
                            <div class="certificates">
                                <?php foreach( $sertifikaty as $im ): ?>
                                    <a href="<?= $im['url'];?>" data-fancybox><img src="<?= $im['url'];?>" alt="<?= $im['alt'];?>"></a>
                                <?php endforeach;?>

                            </div>

                        <?php endif; ?>

                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>






