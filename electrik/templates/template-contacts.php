<?php

/*
 *
 Template Name: Контакты
*/

get_header();

$tel = get_field('telefon');
$mail = get_field('pochta');
$time = get_field('vremya_raboty');
$adr = get_field('adres');

get_template_part('parts/breadcrumbs');

?>

<section class="contact-block">
    <div class="content-width">
        <h1><?php the_title();?></h1>
        <div class="content">
            <div class="item">
                <h2><?= $tel['zagolovok'];?> <img src="<?= $tel['ikonka']['url'];?>" alt="<?= $tel['ikonka']['alt'];?>"></h2>
                <div class="wrap">
                    <h6><a href="tel:+<?= phone_clear($tel['nomer']);?>"><?= $tel['nomer'];?></a></h6>
                    <p><?= $tel['opisanie'];?> </p>
                </div>
            </div>
            <div class="item">
                <h2><?= $time['zagolovok'];?> <img src="<?= $time['ikonka']['url'];?>" alt="<?= $time['ikonka']['alt'];?>"></h2>
                <div class="wrap">
                    <h6><?= $time['vremya_raboty'];?></h6>
                    <p><?= $time['opisanie'];?></p>
                </div>
            </div>
            <div class="item">
                <h2><?= $mail['zagolovok'];?> <img src="<?= $mail['ikonka']['url'];?>" alt="<?= $mail['ikonka']['alt'];?>"></h2>
                <div class="wrap">
                    <h6 class="red"><a href="mailto:<?= $mail['pochta'];?>"><?= $mail['pochta'];?></a></h6>
                    <p><?= $mail['opisanie'];?></p>
                </div>
            </div>
        </div>

        <div class="full-item">

            <h2><?= $adr['zagolovok'];?> <img src="<?= $adr['ikonka']['url'];?>" alt="<?= $adr['ikonka']['alt'];?>"></h2>
            <div class="wrap">
                <h6><?= $adr['adres'];?></h6>
                <div id="map"></div>
            </div>
        </div>

    </div>
</section>

<section class="contact-form-wrap">
    <div class="content-width">
        <?php $ic= get_field('ikonka_formy');?>


        <h2><?php the_field('zagolovok_formy');?> <img src="<?= $ic['url'];?>" alt="<?= $ic['alt'];?>"></h2>

        <?php if(get_field('forma')) {

            echo do_shortcode('[contact-form-7 id="' . get_field('forma') . '"]');

        } ?>

    </div>
</section>

    <script>
        function initMap() {
            var uluru = {lat: <?= $adr['karta']['lat'];?>, lng: <?= $adr['karta']['lng'];?>};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: uluru,
                mapTypeControl: false,
                scrollwheel: false,
                zoomControl: false,
                disableDefaultUI: true,
            });


            var marker = new google.maps.Marker({
                position: uluru,
                map: map,

            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY&callback=initMap">
    </script>

<?php get_footer();
