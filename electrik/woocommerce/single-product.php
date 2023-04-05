<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    $viewed = trim(get_field('viewed', 'user_'.$user_id));
    $viewed = !empty($viewed) ? json_decode($viewed, true) : [];

    if (is_array($viewed)) {
        if (count($viewed) > 29)
            $viewed = array_slice($viewed, 0, 30);
    }

    $viewed[get_the_id()] = date('U');
    $viewed = json_encode($viewed);


    update_field('viewed', $viewed, 'user_'.$user_id);
}


get_header();

get_template_part('parts/breadcrumbs');



	 while ( have_posts() ) : the_post();

			wc_get_template_part( 'content', 'single-product' );

	 endwhile;


get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
