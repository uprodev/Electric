<?php

/* phone number */

function phone_clear($phone_num){
    $phone_num = preg_replace("![^0-9]+!",'',$phone_num);
    return($phone_num);
}

/* pagination template */

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){

    return ' <nav class="%1$s" >
		%3$s
	</nav>
	';
}

/* body_class */

add_filter( 'body_class','my_class_names' );
function my_class_names( $classes ) {

    // добавим класс 'class-name' в массив классов $classes
    if( is_checkout() || is_cart() )
        $classes[] = 'hide-mob-header-footer';

    return $classes;
}