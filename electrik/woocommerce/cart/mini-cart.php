<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

if (is_cart() || is_account_page())
    return;





do_action( 'woocommerce_before_mini_cart' ); ?>



    <div class="popup-main catalog mini-cart">
        <?php if ( ! WC()->cart->is_empty() ) : ?>
        <h3>Товар добавлен в корзину</h3>

        <?php
        $cart_total = WC()->cart->get_cart_contents_total();
        $cross_sells = WC()->cart->get_cross_sells();
        $discount = get_field('discount', 'options');
        $free_shipping = get_field('free_shipping', 'options');

        if ($free_shipping) {
            $free_shipping_left = $free_shipping - $cart_total;
            $free_shipping_left_percent = $cart_total/$free_shipping * 100;
        }
        if ($discount['min']) {
            $discount_left = $discount['min'] - $cart_total;
            $discount_left_percent = $cart_total / $discount['min'] * 100;
        }
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
            $product = new WC_Product($product_id);
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>


                <div class="product is-line product-cart woocommerce-cart-form">
                    <div class="product-item">
                        <div class="line-info">
                            <ul>
<!--                                <li class="hot">-->
<!--                                    <img src="--><?//= get_template_directory_uri() ?><!--/img/icon-10.svg" alt="">-->
<!--                                </li>-->
                                <?= ask_percentage_sale(  $product ) ?>

                            </ul>
                        </div>
                        <div class="like">
                            <a href="#">
                                <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                            </a>
                        </div>
                        <figure>
                            <?php if ( empty( $product_permalink ) ) : ?>
                                <?php echo $thumbnail  ; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $product_permalink ); ?>">
                                    <?php echo $thumbnail  ; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php endif; ?>
                        </figure>
                        <div class="text-wrap">
                            <div class="wrap-title">
                                <h6><a href="<?php echo esc_url( $product_permalink ); ?>"><?= $product->get_title() ?></a></h6>
                                <p><?php


                                    echo wc_get_formatted_cart_item_data2( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                            </div>

                            <div class="cost-wrap">
                                <div class="cost">
                                    <p class="new">
                                        <?=  WC()->cart->get_product_price( $_product ) ?>
                                    </p>
                                </div>

                                <div class="buy">
                                    <div class="input-number ">
                                        <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $min_quantity = 1;
                                            $max_quantity = 1;
                                        } else {
                                            $min_quantity = 0;
                                            $max_quantity = $_product->get_max_purchase_quantity();
                                        }

                                        $product_quantity = woocommerce_quantity_input(
                                            array(
                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                'input_value'  => $cart_item['quantity'],
                                                'max_value'    => $max_quantity,
                                                'min_value'    => $min_quantity,
                                                'product_name' => $_product->get_name(),
                                            ),
                                            $_product,
                                            false
                                        );

                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                        ?>
                                        <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        }

        do_action( 'woocommerce_mini_cart_contents' );
        ?>


        <div class="cart-info">
            <p><span>В корзине:</span><?= WC()->cart->get_cart_contents_count() ?> <?= _n( 'товар', 'товаров', WC()->cart->get_cart_contents_count()  ); ?></p>
            <p><span>На сумму:</span><?= WC()->cart->get_cart_total() ?></p>
        </div>
        <div class="btn-wrap">
            <a href="<?= wc_get_cart_url();?>" class="btn-red btn-big"><img src="<?= get_template_directory_uri() ?>/img/icon-25-3.svg" alt="">Перейти в корзину</a>
        </div>
        <div class="progress-wrap">

            <?php if ($free_shipping) { ?>
            <div class="progress-item">

                <?php if ($free_shipping_left <= 0) { ?>
                    <p>Теперь у вас есть бесплатная доставка!</p>
                <?php } else { ?>
                    <p>вам осталось <span><?= $free_shipping_left > 0 ? $free_shipping_left : 0 ?>₽</span> до бесплатной доставки</p>
                <?php } ?>

                <div class="wrap">
                    <div class="progress-bg"></div>
                    <div class="progress-line" style="width: <?= $free_shipping_left_percent <= 100 ? $free_shipping_left_percent : 100 ?>%;"></div>
                </div>
            </div>
            <?php } ?>

            <?php if ($discount['min']) { ?>
            <div class="progress-item">
                <p>вам осталось <span><?= $discount_left > 0 ? $discount_left : 0 ?>₽</span> до скидки <?= $discount['percent'] ?>%</p>
                <div class="wrap">
                    <div class="progress-bg"></div>
                    <div class="progress-line" style="width: <?= $discount_left_percent <= 100 ? $discount_left_percent : 100 ?>%;"></div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="btn-wrap">
            <a href="/shop" class="btn-border-black btn-big"><img src="<?= get_template_directory_uri() ?>/img/icon-48.svg" alt="">Продолжить покупки</a>
        </div>

        <?php if ( $cross_sells ) { ?>
        <div class="favorite-block">
            <h3>Вам также может пригодиться</h3>
            <div class="product is-line product-cart product-add-cart">
                <?php foreach ( $cross_sells as $cross_sell ) {
                    $product = new WC_Product($cross_sell) ?>

                    <div class="product-item">
                    <div class="line-info">
                        <ul>
<!--                            <li class="hot">-->
<!--                                <img src="--><?//= get_template_directory_uri() ?><!--/img/icon-10.svg" alt="">-->
<!--                            </li>-->
                            <?= ask_percentage_sale(  $product ) ?>
                        </ul>
                    </div>
                    <div class="like">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                        </a>
                    </div>
                    <figure>
                        <a href="<?= $product->get_permalink() ?>">
                            <?= $product->get_image() ?>
                        </a>
                    </figure>
                    <div class="text-wrap">
                        <div class="wrap-title">
                            <h6><a href="<?= $product->get_permalink() ?>"><?= $product->get_title() ?></a></h6>

                        </div>

                        <div class="cost-wrap">
                            <div class="cost">
                                <p class="new"><?= $product->get_price() ?>₽</p>
                            </div>

                            <div class="buy">
                                <div class="input-number ">
                                    <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                    <input type="text" name="count" value="1" class="form-control"/>
                                    <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                </div>
                                <div class="card-product">
                                    <a href="#" class="add-to-cart" data-qty="1" data-product_id="<?= $product->get_id() ?>" >
                                        <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php } ?>

        <?php else : ?>

            <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

        <?php endif; ?>


    </div>




<?php do_action( 'woocommerce_after_mini_cart' ); ?>
