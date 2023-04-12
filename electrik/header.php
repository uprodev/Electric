<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo wp_get_document_title(); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
		<?php wp_head();?>
</head>

<body <?php body_class() ?>>

<?php
$banner = get_field('banner', 'options');
$show = $banner['pokazat_banner'];



if($show && !$_COOKIE['top']):
?>

<div class="top-info">
    <div class="content-width">
        <?php if($banner['podzagolovok']):?>
            <div class="left">
                <p><b><?= $banner['podzagolovok'];?></b></p>
            </div>
        <?php endif;?>

        <?php if($banner['zagolovok']):?>
            <div class="center">
                <p><?= $banner['zagolovok'];?></p>
            </div>
        <?php endif;?>
        <div class="right">
            <?php $link = $banner['link'];

            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <p><a class="" href="<?= esc_url($link_url); ?>" target="<?= esc_attr($link_target); ?>"><?= esc_html($link_title); ?></a></p>
            <?php endif; ?>
            <a href="#" class="close-top-info"><img src="<?= get_template_directory_uri();?>/img/close.svg" alt=""></a>
        </div>
    </div>
</div>

<?php endif;?>

    <?php get_template_part('templates/header-menu');?>

    <main>
        
