<?php

/* Options */

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

    acf_add_options_sub_page('Theme Settings');
}

/* API key google map */

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}

add_action('acf/init', 'my_acf_init');

/* Custom Guttenberg Blocks */

  /* two images */

    function ti_register_blocks() {
        if( ! function_exists('acf_register_block') )
            return;
        acf_register_block( array(
            'name'          => 'two_image',
            'title'         => 'Two Images',
            'render_template'   => 'parts/blocks/two_images.php',
            'category'      => 'common',
            'icon'          => 'format-gallery',
            'mode'          => 'edit',
            'keywords'      => array( 'profile', 'user', 'author' )
        ));
    }
    add_action('acf/init', 'ti_register_blocks' );

  /* qoutte */

    function cq_register_blocks() {
        if( ! function_exists('acf_register_block') )
            return;
        acf_register_block( array(
            'name'          => 'custom_quote',
            'title'         => 'Blockquote',
            'render_template'   => 'parts/blocks/quote.php',
            'category'      => 'common',
            'icon'          => 'format-quote',
            'mode'          => 'edit',
            'keywords'      => array( 'profile', 'user', 'author' )
        ));
    }
    add_action('acf/init', 'cq_register_blocks' );