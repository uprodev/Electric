<?php

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );


function add_styles() {
    wp_enqueue_style('normalizecss', get_template_directory_uri().'/css/normalize.css');
    wp_enqueue_style('uicss', get_template_directory_uri().'/css/jquery-ui.min.css');
    wp_enqueue_style('fontawesomecss', get_template_directory_uri().'/fonts/FA5PRO-master/css/all.css');
    wp_enqueue_style('fancyboxcss', get_template_directory_uri().'/css/jquery.fancybox.min.css');
    wp_enqueue_style('swipercss', get_template_directory_uri().'/css/swiper.min.css' );
    wp_enqueue_style('niceselectcss', get_template_directory_uri().'/css/nice-select.css');
    wp_enqueue_style('ionrangeSlider', get_template_directory_uri().'/css/ion.rangeSlider.css');
    wp_enqueue_style('skinFlat', get_template_directory_uri().'/css/ion.rangeSlider.skinFlat.css');
    wp_enqueue_style('styles', get_template_directory_uri().'/css/styles.css');
    wp_enqueue_style('responsive', get_template_directory_uri().'/css/responsive.css');
    wp_enqueue_style( 'theme', get_stylesheet_uri() );

}

function add_scripts() {
    wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/js/swiper.js', array('jquery'), false, true);
    wp_enqueue_script( 'fancyboxjs', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), false, true);
    wp_enqueue_script( 'niceselectjs', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array('jquery'), false, true);
//    wp_enqueue_script("jquery-ui-core", array('jquery'));
    wp_enqueue_script('ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), false, true);
    wp_enqueue_script('ion', get_template_directory_uri() . '/js/ion.rangeSlider.min.js', array('jquery'), false, true);
    wp_enqueue_script( 'zoomjs', get_template_directory_uri() . '/js/jquery.zoom.min.js', array('jquery'), false, true);
    wp_enqueue_script( 'createTOCjs', get_template_directory_uri() . '/js/jquery.createTOC.js', array('jquery'), false, true);
    wp_enqueue_script( 'fixtojs', get_template_directory_uri() . '/js/fixto.js', array('jquery'), false, true);
    wp_enqueue_script( 'maskjs', get_template_directory_uri() . '/js/jquery.mask.js', array('jquery'), false, true);
    wp_enqueue_script( 'stickyjs', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), false, true);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), false, true);

    wp_enqueue_script('jqueryvalidation',  'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js', array(), false, 1);
    wp_enqueue_script('jqueryvalidation_ru',  'https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_ru.js', array(), false, 1);


    if (is_account_page() ) {
        wp_enqueue_script( 'cart',   '/wp-content/plugins/woocommerce/assets/js/frontend/cart.min.js', array('jquery'), false, true);
        wp_enqueue_script( 'wc-cart' );
    }

    if (is_product()){
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);

     wp_localize_script('main', 'globals',
        array(
            'url' => admin_url('admin-ajax.php'),
            'template' => get_template_directory_uri(),
            'fav' => get_field('fav', 'user_'. get_current_user_id())
        )
     );


}