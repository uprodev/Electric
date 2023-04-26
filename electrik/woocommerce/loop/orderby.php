<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$catalog_orderby_options = apply_filters(
    'woocommerce_catalog_orderby',
    array(
       // 'menu_order' => __( 'Default sorting', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
        'rating'     => __( 'Sort by average rating', 'woocommerce' ),
        'date'       => __( 'Sort by latest', 'woocommerce' ),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
    )
);
$default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
$orderby = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby;

?>


<form class="woocommerce-ordering" method="get">
    <div class="sort-2">
    <p >Сортировать по:</p>
    <ul class="desk-filter">

        <?php foreach ( $catalog_orderby_options as $id => $name ) :
            $i++;

            if ('menu_order' == $id)
                continue;

            ?>
            <li class="<?= $orderby == $id ?: 'is-active' ?> ">
                <input class="orderby0" type="radio" name="orderby0" id="sort-2-<?= $i ?>" value="<?php echo esc_attr( $id ); ?>" <?php checked( $orderby, $id ); ?>>
                <label for="sort-2-<?= $i ?>"><?php echo esc_html( $name ); ?></label>
            </li>
        <?php endforeach; ?>

    </ul>
    <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>


    <div class="select-block-mob ">
        <div class=" " tabindex="0">

            <select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
                <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                    <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
                <?php endforeach; ?>
            </select>

        </div>
    </div>

    </div>
</form>

