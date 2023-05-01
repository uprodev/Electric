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
        var tax = $(this).attr('data-name')
        $('#' + tax).val(size).change();

        $(this).closest('.sort').find('li input').removeClass('active');
        $(this).addClass('active');
    })


    /**
     * order
     */

    $(document).on('change', '.desk-filter input', function () {
        var val = $(this).val();
        $('.orderby').val(val).change()

    })


    /**
     * login
     */

    if ($('.loginform').length)
        $('.loginform').validate({

            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                var pl = $(element).closest('div')
                error.prependTo(pl);
            },

            submitHandler: function (form) {

                var data = $('.loginform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
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

    if ($('.registerform').length)
        $('.registerform').validate({

            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                var pl = $(element).closest('div')
                error.prependTo(pl);
            },

            submitHandler: function (form) {

                var data = $('.registerform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if (data) {
                            console.log(data)

                            if (data.update) {
                                $.fancybox.close();
                                $.fancybox.open($('#send-ok'), {
                                    touch: false,
                                    autoFocus: false,
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


    if ($('.lostpasswordform').length)
        $('.lostpasswordform').validate({
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                var pl = $(element).closest('div')
                error.prependTo(pl);
            },

            submitHandler: function (form) {

                var data = $('.lostpasswordform').serialize()
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if (data) {


                            $('.result-reset').html(data.status)

                            $.fancybox.close();
                            $.fancybox.open($('#send-ok-password'), {
                                touch: false,
                                autoFocus: false,
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



        $('.mini-cart').block({
            message: null,
            overlayCSS: {
                background: '#fff',
                opacity: 0.4
            }
        })



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
                $( document.body ).trigger( 'wc_fragment_refresh' );
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
        $('.product-item.is-select').each(function () {

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



    $(document).on('click', '[name="apply_coupon_chekout"]', function (e) {

        e.preventDefault()

        var coupon = $('#code').val();
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'apply_coupon',
                coupon: coupon,
            },
            success: function (data) {
                console.log(data)
                $(document.body).trigger('update_checkout');

            },
        });



    });

    $(document).on('click', '[name="select-city"]', function (e) {
        update_details()
    });

    $(document).on('change', '[name="shipping-date"]', function (e) {
        update_details()
    });

    $(document).on('change', '[name="payment_method"]', function (e) {
        update_details()
    })

    $(document).on('change', '.shipping_method', function (e) {
        update_details()
    })


    function update_details() {

        var val = $('[name="select-city"]:checked').val();
        $('.shipping-point_text').html(val)

        var val = $('[name="shipping-date"] option:selected').val();
        var val2 = $('[name="shipping-time"] option:selected').val();
        $('.shipping-date_text').html(val + ", " + val2)

        var val = $('[name="payment_method"]:checked').next('label').find('.h6').text();
        $('.payment_method_text').html(val)

        var val = $('.shipping_method:checked').next('label').find('.h6').text();
        $('.shipping_method_text').html(val)




    }

    update_details()







    /**
     * account
     */


    $(document).on('change', '.filter-form-viewed [name]', function (e) {

        var data = $('.filter-form-viewed').serialize()

        $.ajax({
            type: 'GET',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            success: function (data) {


                if (data.found > 0) {
                    $('.item-empty').remove();
                    $('.favorites').show();
                    $('.viewed-result').html(data.result)
                }

                // else {
                //     $(data.result).insertBefore('.favorites')
                //     $('.favorites').hide();
                // }



            },
        });
    })


    $(document).on('click', '.personal-data-form .save:not(.save-pass)', function () {
        var user_id = $(this).closest('.personal-data-form').attr('data-user_id');
        var field_name = $(this).parent().parent().parent().find('input').attr('name');
        var field_value = $(this).parent().parent().parent().find('input').val();
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'save_personal_data',
                user_id: user_id,
                field_name: field_name,
                field_value: field_value,
            },
            success: function (data) {
                console.log(data)

                if (data.fail) {
                    alert(data.fail_message)
                }
            },
        });
    });

    $(document).on('click', '.personal-data-form .save.save-pass', function () {
        var user_id = $(this).closest('.personal-data-form').attr('data-user_id');

        var pass2 = $('#password2').val();
        var pass3 = $('#password3').val();

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'save_personal_data',
                user_id: user_id,
                pass: true,

                pass2: pass2,
                pass3: pass3,
            },
            success: function (data) {
                console.log(data)

                if (data.fail) {
                    alert(data.fail_message)
                }
            },
        });
    });


    $(document).on('click', '.btn-save-company', function () {
        var user_id = $(this).closest('.personal-data-form').attr('data-user_id');

        var bank = {};

        $('.edit-company-fields').each(function(){
            var name = $(this).find('input').attr('name');
            var value = $(this).find('input').val();
            bank[name] = value;
        });

        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            dataType:'json',
            data: {
                action: 'save_personal_data',
                user_id: user_id,
                bank: bank


            },
            success: function (data) {
                console.log(data)

                if (data.html) {
                    $('.characteristics').html(data.html)
                }

            },
        });
    });


    if ($('#add-repair form').length)
        $('#add-repair form').validate({

            submitHandler: function (form) {

                var data = $('#add-repair form').serialize()
                $.ajax({
                    url: wc_add_to_cart_params.ajax_url,
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if (data) {


                            $.fancybox.close();
                            $.fancybox.open( $('#repair-ok'), {
                                touch:false,
                                autoFocus:false,
                            });


                        }
                    }
                });

            }
        });


    /**
     * favourites
     */

    function onlyUnique(value, index, array) {
        return array.indexOf(value) === index;
    }

    function getKeyByValue(object, value) {
        return Object.keys(object).find(key => object[key] === value);
    }


    var globalFav = globals.fav

    $(document).on('click', 'a.add_to_fav', function () {

        var user_id = $(this).attr('data-user_id');
        var product_id = $(this).attr('data-product_id');
        var liked = $(this).attr('data-liked');

        if (user_id > 0) {
            var fav = globalFav ? globalFav : [];
        } else {
            var fav = Cookies.get('fav') ? Cookies.get('fav') : [];
        }

        if (fav.length > 0) {
            fav = fav.split('|');
        }

        fav = fav.filter(onlyUnique);

        if (liked) {
            var key = getKeyByValue(fav, product_id)
            delete fav[key];

        } else {
            fav.push(product_id);
            $(this).attr('data-liked', 1);
        }

        fav = fav.join('|');

        Cookies.set('fav', fav);


        globalFav = fav
        if (user_id > 0) {

            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,

                data: {
                    action: 'add_to_fav',
                    user_id: user_id,
                    fav: fav


                },
                success: function (data) {

                },
            });
        }
    });


    /* add to cart */

    $(document).on('click', '.add-to-cart', function (e) {
        e.preventDefault();

        var width = $(window).width();
        var product_id = $(this).attr('data-product_id');
        var variation_id = $(this).attr('data-variation_id');
        var qty1 = $(this).closest('.buy').find('input').val();
        var qty2 = $(this).closest('.cost-wrap').find('input').val();
        var qty = qty1 ? qty1 : qty2
        var that = $(this)

        $('#add-product-cart').block({
            message: null,
            overlayCSS: {
                background: '#fff',
                opacity: 0.4
            }
        })
        $.ajax({
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'add_to_cart',
                product_id: product_id,
                variation_id: variation_id,
                qty: qty
            },
            success: function (data) {
                $( document.body ).trigger( 'wc_fragment_refresh' );
                $('#add-product-cart').unblock()
                $.fancybox.close();

                if (width > 768) {
                  $.fancybox.open( $('#add-product-cart'), {
                      touch:false,
                      autoFocus:false,
                  });
                } else {
                  that.addClass('btn-border-red');
                  that.find('span').text('В корзине');
                  $('.mob-sku').hide()
                }

            },
        });
    });


    $(document).on('click', '.bapf_update', function (e) {
        $.fancybox.close();
    })


    document.addEventListener( 'wpcf7mailsent', function( event ) {
        if ( '448' == event.detail.contactFormId ) {
            $.fancybox.close();
            $.fancybox.open( $('#fast-shop-ok'), {
                touch:false,
                autoFocus:false,
            });

        }
    }, false );



    // top banner

    $(document).on('click', '.close-top-info', function (e) {
        Cookies.set('top', 1);
    })









});
