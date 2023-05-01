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

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {

    // loop
    foreach( $items as &$item ) {

        // vars
        $icon = get_field('image', $item);


        // append icon
        if( $icon ) {

            $img = '<img src="'.$icon['url'].'" alt="">';

            $item->title .= $img;

        }

    }


    // return
    return $items;

}


function plural($number)
{
    if ($number % 10 == 1 && $number % 100 != 11) {
        return $number . ' отзыв';
    } else {
        if ($number % 10 >= 2 && $number % 10 <= 4 && ($number % 100 < 10 || $number % 100 >= 20)) {
            return ($number . ' отзыва');
        } else {
            return ($number . ' отзывов');
        }
    }
}
