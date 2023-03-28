jQuery(document).ready(function ($) {

    /**
     *
     * variations
     *
     *
     */


    $(document).on('show_variation', '.single_variation_wrap', function (event, variation) {

        // $('.zoomImg').attr('src', variation.image.src);
        console.log(variation);

        $('.add-to-cart').attr('data-variation_id', variation.variation_id);


            $('.cost').html(variation.price_html);


    });


    $(document).on('change', '.sort li input', function (e) {
        e.preventDefault();
        var size = $(this).val();
        $('#pa_sechenie').val(size).change();

        $('.sort li input').removeClass('active');
        $(this).addClass('active');
    })

});