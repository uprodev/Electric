<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit;


 ?>

<?php
get_template_part('parts/breadcrumbs');
?>

<section class="cart-block">

    <form   class="form-icon woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <div class="content-width">
            <?php
            do_action( 'woocommerce_before_cart' );
            do_action( 'woocommerce_before_cart_table' );


            ?>

            <div class="top">
                <div class="title">
                    <h1>Корзина</h1>

                </div>
<!--                <div class="btn-wrap">-->
<!--                    <a href="#"><img src="--><?//= get_template_directory_uri() ?><!--/img/icon-68.svg" alt=""></a>-->
<!--                </div>-->
            </div>

            <?php do_action( 'woocommerce_before_cart_table' ); ?>


            <div class="content">
                <div class="cart-content">
                    <div class="title-table">
                        <div class="data data-1">
                            <p>Фото</p>
                        </div>
                        <div class="data data-2">
                            <p>Название товара</p>
                        </div>
                        <div class="data data-3">
                            <p>Цена</p>
                        </div>
                        <div class="data data-4">
                            <p>Количество</p>
                        </div>
                        <div class="data data-5">
                            <p>Сумма</p>
                        </div>

                    </div>
                    <div class="mob-select">
                        <p><span>Выбрать все</span></p>
                        <p><a class="delete-items" href="#">Удалить выбранные</a></p>
                    </div>

                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                    <div class="content-product product is-line">


                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            $unit = get_field('_woo_uom_input', $product_id);

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                ?>

                                <?php do_action( 'woocommerce_cart_contents' ); ?>

                                <div class="product-item">
                                    <div class="mob-check">
                                        <p></p>
                                    </div>
                                    <figure>
                                        <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( ! $product_permalink ) {
                                            echo $thumbnail; // PHPCS: XSS ok.
                                        } else {
                                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                        }
                                        ?>
                                    </figure>
                                    <div class="text-wrap">
                                        <div class="wrap-title">

                                            <?php
                                            if ( ! $product_permalink ) {
                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                            } else {
                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<h6><a href="%s">%s</a></h6>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                            }

                                            do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                            // Meta data.
                                            echo '<p>' . wc_get_formatted_cart_item_data2( $cart_item ) . '</p>'; // PHPCS: XSS ok.

                                            // Backorder notification.
                                            if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                            }
                                            ?>

                                        </div>

                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="">
                                                    <?=  WC()->cart->get_product_price( $_product ) ?>
                                                    <span><?= $unit ?></span>
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
                                            <div class="total-item">
                                                <p> <?php
                                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                    ?>
                                                </p>
                                                <div class="delete-item">
                                                    <a data-hash="<?= $cart_item_key ?>" href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-69.svg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                 <?php
                            }
                        }
                        ?>

                        <?php do_action( 'woocommerce_after_cart_contents' ); ?>



                    </div>

                </div>
                <div class="aside aside-cart">
                    <div class="item">

                        <?php woocommerce_cart_totals() ?>

                        <div class="wrap">


                            <?php if ( wc_coupons_enabled() ) { ?>

                                <div class="coupon">
                                    <div class="input-wrap">
                                        <label for="code"><img src="<?= get_template_directory_uri() ?>/img/icon-70.svg" alt=""></label>
                                        <input type="text" name="coupon_code" id="code" placeholder="Введите промокод">
                                        <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>

                                    </div>

                                    <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                </div>
                            <?php } ?>


                            <?php do_action( 'woocommerce_cart_actions' ); ?>

                            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>


                            <a href="/checkout" class="btn-big btn-red"><img src="<?= get_template_directory_uri() ?>/img/icon-71.svg" alt="">Оформить заказ</a>
                        </div>

                    </div>
                </div>
                <div class="btn-wrap-full btn-tab">
                    <a href="/shop" class="btn-border-black btn-medium">Продолжить покупки</a>
                </div>
            </div>
        </div>
    </form>

</section>


	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		//do_action( 'woocommerce_cart_collaterals' );
	?>


<?php do_action( 'woocommerce_after_cart' ); ?>
