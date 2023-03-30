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


    /**
     * order
     */

    $(document).on('change',  '.desk-filter input', function(){
        var val = $(this).val();
        $('.orderby').val(val).change()

    })


    /**
     * login
     */

    if($('.loginform').length)
        $('.loginform').validate({

            submitHandler: function(form) {

                var data = $('.loginform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if (data) {
                            console.log(data)

                            $('.result-login').html(data.status)

                            if (data.update)
                                location.href = data.redirect
                        }
                    }
                });

            }
        });

    if($('.registerform').length)
        $('.registerform').validate({

            submitHandler: function(form) {

                var data = $('.registerform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if (data) {
                            console.log(data)

                            if (data.update) {
                                $.fancybox.close();
                                $.fancybox.open( $('#send-ok'), {
                                    touch:false,
                                    autoFocus:false,
                                });
                            }

                            // $('.result-register').html(data.status)
                            //
                            // location.href = data.redirect
                        }
                    }
                });

            }
        });


    if($('.lostpasswordform').length)
        $('.lostpasswordform').validate({

            submitHandler: function(form) {

                var data = $('.lostpasswordform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if (data) {
                            console.log(data)

                            $('.result-reset').html(data.status)

                            $.fancybox.close();
                            $.fancybox.open( $('#send-ok-password'), {
                                touch:false,
                                autoFocus:false,
                            });


                        }
                    }
                });

            }
        });


    /**
     * cart
     */

    $(document).on('change', '.woocommerce-cart-form .qty', function () {
        var item_hash = $(this)
            .attr('name')
            .replace(/cart\[([\w]+)\]\[qty\]/g, '$1');
        var item_quantity = $(this).val();
        var currentVal = parseFloat(item_quantity);

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'qty_cart',
                hash: item_hash,
                quantity: currentVal,
            },
            success: function (data) {
                $(document.body).trigger('wc_update_cart');
            },
        });
    });

    $(document).on('click', '.delete-item a', function () {
        var item_hash = $(this).attr('data-hash');

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'remove_item_from_cart',
                hash: [item_hash],
            },
            success: function (data) {
                $(document.body).trigger('wc_update_cart');

                if (data.count === 0) location.href = '/shop';
            },
        });
    });




    $(document).on('click', '.delete-items', function () {

        var item_hash = [];
        $('.product-item.is-select').each(function(){

            item_hash.push($(this).find('.delete-item a').attr('data-hash'));

            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,
                data: {
                    action: 'remove_item_from_cart',
                    hash: item_hash,
                },
                success: function (data) {
                    $(document.body).trigger('wc_update_cart');

                    if (data.count === 0) location.href = '/shop';
                },
            });
        })


    });





});