<?php

/**
* Blockquote
*

**/

$text = get_field( 'text' );

if( !empty( $text ) ){

echo '<div class="border"><p>'.$text.'</p></div>';

}