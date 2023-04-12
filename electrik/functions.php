<?php

include 'inc/ajax-actions.php'; // ajax
include 'inc/enqueue.php';      // add styles and scripts
include 'inc/acf.php';          // custom acf functions
include 'inc/extras.php';       // custom functions
include 'inc/woo.php';          // woocommerce functions
include 'classes/walker.php';   // walker nav menu

add_theme_support( 'post-thumbnails');
add_theme_support( 'woocommerce');

add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu(){
	register_nav_menus( array(
        'main-menu' => 'main',
        'head-menu' => 'header',
        'mob-menu'  => 'mobile',
       )
    );
}
add_filter( 'wpcf7_autop_or_not', '__return_false' );

