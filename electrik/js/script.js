jQuery(document).ready(function ($) {

  /*like*/
  $(document).on('click', '.like a', function (e){
    e.preventDefault();
    $(this).toggleClass('is-like')
  })

 /* catalog list*/
/*  if(window.innerWidth > 1199){
    $('.catalog .view-item>li').toggleClass('is-active');
    $('.catalog .content-product').addClass('is-line')
  }*/

  /*hide info line*/
  $(document).on('click', '.close-top-info', function (e){
    e.preventDefault();
    $('.top-info').slideUp();
  });


  $( function() {


    $('input[name="shipping_city"]').autocomplete({
      source:  function (request, response) {
        response($.map(JSON.parse(globals.cities), function (obj, key) {

          var name = obj.value.toUpperCase();

          if (name.indexOf(request.term.toUpperCase()) != -1) {



            return {
              label: obj.label  , // Label for Display
              value: obj.label // Value
            }
          } else {
            return null;
          }
        }));
      },

      select: function( event, ui ) {


        $('#shipping_city').val(ui.item.value)

        setTimeout(function(){
          $(document.body).trigger('update_checkout')
          $( document.body ).trigger( 'wc_fragment_refresh' );
        }, 400)

      }


    });


    $('input[name="bank-4"]').autocomplete({
      source: globals.bik,
      select: function( event, ui ) {

        var selected_val = ui.item.value;
        var key = getKeyByValue(globals.bik, selected_val);
        $('input[name="bank-3"]').val(globals.bank[key]);
      }
      });
    $('input[name="bank-3"]').autocomplete({
      source: globals.bank,
      select: function( event, ui ) {

        var selected_val = ui.item.value;
        var key = getKeyByValue(globals.bank, selected_val);
        $('input[name="bank-4"]').val(globals.bik[key]);
      }
    });
  });

  function getKeyByValue(object, value) {
    return Object.keys(object).find(key => object[key] === value);
  }

  var swiperBanner = new Swiper(".slider-banner", {
    pagination: {
      el: ".banner-pagination",
      clickable: true,
    },

  });


  /*site menu*/
  if(window.innerWidth >1199){
    $(document).on('mouseenter', '.catalog-line .left a, .site-menu-section', function (e){
      e.preventDefault();
      $('body').addClass('is-open');
    });

    $(document).on('mouseenter', '.site-menu, .catalog-line .left', function (e){
      e.stopPropagation();

    });

    $(document).on('mouseenter', '.top-info, main, .catalog-line, .top-line, .site-menu-wrap .content-width', function (e){
      e.preventDefault();
      $('body').removeClass('is-open');
    });


  }else{
    $(document).on('click', '.catalog-line .left a', function (e){
      e.preventDefault();
      $('body').toggleClass('is-open');

    });
    $(document).on('click', 'main .top-line, .top-info', function (e){

      $('body').removeClass('is-open');
      $('.site-menu > ul > li > a').removeClass('is-open');

    });

    $(document).on('click','.site-menu > ul > li > a', function (e){
      $('.site-menu > ul > li > a').removeClass('is-open');
      $(this).toggleClass('is-open');

    })
  }

  /*slider*/
  var swiperProduct1 = new Swiper(".product-slider-1", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".product-next-1",
      prevEl: ".product-prev-1",
    },
    breakpoints: {
      320: {
        slidesPerView: "auto",
        spaceBetween: 0,
      },
      576: {
        slidesPerView: "auto",
        spaceBetween: 10,
      },
      768: {
        slidesPerView: "auto",
        spaceBetween: 20,
      },
      991: {
        slidesPerView: "auto",
        spaceBetween: 20,
      },
      1280: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    }
  });

  /*slider*/
  var swiperProduct2 = new Swiper(".product-slider-2", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".product-next-2",
      prevEl: ".product-prev-2",
    },
    breakpoints: {
      320: {
        slidesPerView: "auto",
        spaceBetween: 0,
      },
      576: {
        slidesPerView: "auto",
        spaceBetween: 10,
      },
      768: {
        slidesPerView: "auto",
        spaceBetween: 20,
      },
      991: {
        slidesPerView: "auto",
        spaceBetween: 20,
      },
      1280: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    }
  });

  /*col product*/
  $(document).on('click', ".btn-count-plus", function () {
    var e = $(this).parent().find("input");
    return e.val(parseInt(e.val()) + 1), e.change(), !1
  }),  $(document).on('click', ".btn-count-minus", function () {
    var e = $(this).parent().find("input"), t = parseInt(e.val()) - 1;
    return t = t < 1 ? 1 : t, e.val(t), e.change(), !1
  });


  $(document).on('click', '.search-tab a', function (e){
    e.preventDefault();
    $('.top-line .center').toggleClass('is-active');
    if($('.top-line .center').hasClass('is-active')){
      $('.top-line .center').slideDown();
      $('.search-tab').addClass('is-find');
    }else{
      $('.top-line .center').slideUp();
      $('.search-tab').removeClass('is-find');
    }
  });

/*  $(document).on('click', 'main', function (e){
    $('.top-line .center').removeClass('is-active').slideUp();
  })*/


  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('body').addClass('is-active');
      $('html').addClass('is-menu');
      $('header').addClass('is-active');
    }, 100);

  });

  /* mob-menu*/
  $(document).on('click', '.fancybox-login', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-cabinet'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('body').addClass('is-active');
      $('html').addClass('is-menu');
      $('header').addClass('is-active');
    }, 100);

  });




  $(document).on('click', '.filter-btn a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#filter'), {
      touch:false,
      autoFocus:false,
      afterClose : function(e){
        $('body').removeClass('is-active');
        $('html').removeClass('is-menu');
        $('header').removeClass('is-active');
      },
    });
    setTimeout(function() {
      $('body').addClass('is-active');
      $('html').addClass('is-menu');
      $('header').addClass('is-active');
    }, 100);

  });

  $(document).on('click', '.favorites-btn a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#filter-favorites'), {
      touch:false,
      autoFocus:false,
      afterClose : function(e){
        $('body').removeClass('is-active');
        $('html').removeClass('is-menu');
        $('header').removeClass('is-active');
      },
    });
    setTimeout(function() {
      $('body').addClass('is-active');
      $('html').addClass('is-menu');
      $('header').addClass('is-active');
    }, 100);

  });



  $(document).on('click', '.close-menu a, .close-filter a', function (e){
    e.preventDefault();
    $('body').removeClass('is-active');
    $.fancybox.close();
    $('header').removeClass('is-active');
    $('html').removeClass('is-menu');
  });


  $(document).on('click', '.prev a', function (e){
    e.preventDefault();
    $(this).closest('.sub-menu').hide();
    $(this).closest('li').children('a').removeClass('is-open')
  });

  /*popup*/
  $(".fancybox").fancybox({
    touch:false,
    autoFocus:false,
  });

  $(document).on('click', '.register', function (e){
    $.fancybox.close();
    $.fancybox.open( $('#register'), {
      touch:false,
      autoFocus:false,
    });
  });

  $(document).on('click', '.btn-reg', function (e){
    // $.fancybox.close();
    // $.fancybox.open( $('#send-ok'), {
    //   touch:false,
    //   autoFocus:false,
    // });
  });

  $(document).on('click', '.repair-ok', function (e){
    // $.fancybox.close();
    // $.fancybox.open( $('#repair-ok'), {
    //   touch:false,
    //   autoFocus:false,
    // });
  });




  $(document).on('click', '.send-password', function (e){
    console.log('send-password')
    $.fancybox.close();
    $.fancybox.open( $('#send-password'), {
      touch:false,
      autoFocus:false,
    });
  });

  $(document).on('click', '.btn-send-password', function (e){
    console.log('send-password-ok')
    // $.fancybox.close();
    // $.fancybox.open( $('#send-ok-password'), {
    //   touch:false,
    //   autoFocus:false,
    // });
  });

  //RANGE

  var $range = $(".js-range-slider"),
    $from = $(".js-from"),
    $to = $(".js-to"),
    range,
    min = 0,
    max = 200000,
    from,
    to;

  var updateValues = function () {
    $from.prop("value", from);
    $to.prop("value", to);
  };

  $range.ionRangeSlider({
    type: "double",
    min: min,
    max: max,
    skin: "round",
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    onChange: function (data) {
      from = data.from;
      to = data.to;
      updateValues();

    }
  });

  range = $range.data("ionRangeSlider");

  var updateRange = function () {
    range.update({
      from: from,
      to: to
    });

  };

  $from.on("change", function () {

    from = +$(this).prop("value");
    if (from < min) {
      from = min;
    }
    if (from > to) {
      from = to;
    }

    updateValues();
    updateRange();
  });

  $to.on("change", function () {
    to = +$(this).prop("value");
    if (to > max) {
      to = max;
    }
    if (to < from) {
      to = from;
    }

    updateValues();
    updateRange();
  });



  //RANGE 2

  var $range2 = $(".js-range-slider-2"),
    $from2 = $(".js-from-2"),
    $to2 = $(".js-to-2"),
    range2,
    min2 = 0.007,
    max2 = 96,
    from2,
    to2;

  var updateValues2 = function () {
    $from2.prop("value", from2);
    $to2.prop("value", to2);
  };

  $range2.ionRangeSlider({
    type: "double",
    min: min2,
    skin: "round",
    max: max2,
    step:0.001,
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    onChange: function (data) {
      from2 = data.from;
      to2 = data.to;
      updateValues2();

    }
  });

  range2 = $range2.data("ionRangeSlider");

  var updateRange2 = function () {
    range2.update({
      from: from2,
      to: to2
    });

  };

  $from2.on("change", function () {

    from2 = +$(this).prop("value");
    if (from2 < min2) {
      from2 = min2;
    }
    if (from2 > to2) {
      from2 = to2;
    }

    updateValues2();
    updateRange2();
  });

  $to2.on("change", function () {
    to2 = +$(this).prop("value");
    if (to2 > max2) {
      to2 = max2;
    }
    if (to2 < from2) {
      to2 = from2;
    }

    updateValues2();
    updateRange2();
  });


  //RANGE 3

  var $range3 = $(".js-range-slider-3"),
    $from3 = $(".js-from-3"),
    $to3 = $(".js-to-3"),
    range3,
    min3 = 0.22,
    max3 = 2000,
    from3,
    to3;

  var updateValues3 = function () {
    $from3.prop("value", from3);
    $to3.prop("value", to3);
  };

  $range3.ionRangeSlider({
    type: "double",
    skin: "round",
    min: min3,
    max: max3,
    step:0.01,
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    onChange: function (data) {
      from3 = data.from;
      to3 = data.to;
      updateValues3();

    }
  });

  range3 = $range3.data("ionRangeSlider");

  var updateRange3 = function () {
    range3.update({
      from: from3,
      to: to3
    });

  };

  $from3.on("change", function () {

    from3 = +$(this).prop("value");
    if (from3 < min3) {
      from3 = min3;
    }
    if (from3 > to3) {
      from3 = to3;
    }

    updateValues3();
    updateRange3();
  });

  $to3.on("change", function () {
    to3 = +$(this).prop("value");
    if (to3 > max3) {
      to3 = max3;
    }
    if (to3 < from3) {
      to3 = from3;
    }

    updateValues3();
    updateRange3();
  });


  //show item filter
  $(document).on('click','.head-filter', function(e){
    e.preventDefault();
    let item = $(this).closest('.item');
    item.toggleClass('is-open');
    if(item.hasClass('is-open')){
      item.find('.filter').slideDown();
    }else{
      item.find('.filter').slideUp();
    }
  });

  /*show all filters*/
  $(document).on('click','.all-filters', function(e){
    e.preventDefault();
    $('.catalog .left-filter .item').slideDown()
  });

  //view product
  $(document).on('click','.catalog .view-item li a', function(e){
    e.preventDefault();
    let item = $(this).parent('li');
    if(!item.hasClass('is-active')){
      $('.catalog .content-product').toggleClass('is-line');
      $('.catalog .view-item li').toggleClass('is-active')
    }
  });


  /*show more text*/
  $(document).on('click',' .show-text a', function(e){
    e.preventDefault();
    $(this).toggleClass('is-show');
    if($(this).hasClass('is-show')){
      $('.info-section p').slideDown();
    }else{
      $('.info-section p:nth-child(n + 5)').slideUp();
    }
  });

  /*sort list*/
/*  if(window.innerWidth < 576){
    $(document).on('click', '.catalog .sort-2 ul li ', function (e){
      $('.catalog .sort-2 ul').toggleClass('is-open')
      $('.catalog .sort-2 ul li').removeClass('is-active');
      $(this).addClass('is-active');
      $('.catalog .sort-2 ul li input').prop('checked', false);
      $(this).find('input').prop('checked', true);
    });
  };*/


  /*add product*/

  if(window.innerWidth < 576){
    $(document).on('click', '.catalog .product .product-item .card-product a', function (e){
     e.preventDefault();
     $(this).closest('.product-item').addClass('is-buy');
     console.log('add product')
    });
  };

  /*slider*/

  if($('.slider-small').length >0 ){
    var swiperSmall = new Swiper(".slider-small", {
      spaceBetween: 0,
      slidesPerView: 'auto',
      watchSlidesProgress: true,
    });
    var swiperBig1 = new Swiper(".slider-big", {
      spaceBetween: 0,
      pagination: {
        el: ".pagination-big",
        clickable: true
      },
      thumbs: {
        swiper: swiperSmall,
      },

    });
  }else{
    var swiperBig2 = new Swiper(".slider-big", {
      spaceBetween: 0,
      pagination: {
        el: ".pagination-big",
        clickable: true
      },


    });
  }


  if(window.innerWidth > 767){
    /*zoom img*/
    $('.zoom-img').zoom();
  }



  /*show all characteristics*/
  $(document).on('click', '.characteristics li a', function (e){
    e.preventDefault();
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      $('.characteristics li').addClass('is-show');
    }else{
      $('.characteristics li:nth-child(n + 8)').removeClass('is-show')
    }
  });

  //TABS
  (function($){
    jQuery.fn.lightTabs = function(options){

      var createTabs = function(){
        tabs = this;
        i = 0;

        showPage = function(i){
          $(tabs).find(".tab-content").children("div").hide();
          $(tabs).find(".tab-content").children("div").eq(i).show();
          $(tabs).find(".tabs-menu").children("li").removeClass("is-active");
          $(tabs).find(".tabs-menu").children("li").eq(i).addClass("is-active");
        }

        showPage(0);

        $(tabs).find(".tabs-menu").children("li").each(function(index, element){
          $(element).attr("data-page", i);
          i++;
        });

        $(tabs).find(".tabs-menu").children("li").click(function(){
          showPage(parseInt($(this).attr("data-page")));
        });
      };
      return this.each(createTabs);
    };
  })(jQuery);
  $(".tabs").lightTabs();

 /* add reviews*/
  $(document).on('click', '.add-reviews', function (e){
    console.log('add-reviews')
    $.fancybox.close();
    $.fancybox.open( $('#send-reviews'), {
      touch:false,
      autoFocus:false,
    });
  });

 /* show/hide product*/
  if(window.innerWidth < 1000000){
    $(document).on('click', '.favorite-block h3', function (e){
      e.preventDefault();
      $(this).closest('.favorite-block').toggleClass('is-open');
      if($('.favorite-block').hasClass('is-open')){
        $('.popup-product-cart .product-add-cart').slideDown();
      }else{
        $('.popup-product-cart .product-add-cart').slideUp();
      }
    });
  };

 /* popup tabs*/
  $(document).on('click', '.tab-menu-popup li', function (e){
    e.preventDefault();
    let item = $(this).index() + 1;
    $('.tab-menu-popup li').removeClass('is-active');
    $(this).addClass('is-active');
    $('.select-city .tab-item-popup').hide();
    $(".select-city .tab-item-popup:nth-child(" + item + ")").show();

  });

  /*show/hide info */
  $('.popup-fast-shop .select-radio input').change(function(){
    let item = $('.popup-fast-shop .select-radio').find('input:checked').closest('p').index();
    if(item <1){
      $('.popup-fast-shop .select-city').show()
    }else{
      $('.popup-fast-shop .select-city').hide()
    }
  });





  /*auto content*/
  if(window.innerWidth > 991 && $('.main').length > 0){
    $('.main').createTOC({
      title: "Содержание",
      insert: ".sidebar"
    });
  }


  /*fix block on the scroll*/
/*  $('.article-block .sidebar').fixTo({
    top: 50,
  });*/

  /*scroll to block*/
  $(document).on('click', '.mini-menu li a', function (e) {
    e.preventDefault();
    var id  = $(this).attr('href'),
      top = $(id).offset().top - 20;
    $('body,html').animate({scrollTop: top}, 1000);
  });


  /*fix header*/
  if(window.innerWidth > 767){
    $(".catalog-line").sticky({
      topSpacing:0
    });
  }else{

  }

  /*scroll to reviews*/
  $(document).on('click', '.product-inner .top .stars-wrap p', function (e){
    e.preventDefault();
    var  top = $('.info-product-full').offset().top - 100;
    $('body,html').animate({scrollTop: top}, 1000);

    $('.info-product-full .tabs-menu li').removeClass('is-active');
    $('.info-product-full .tabs-menu li:nth-child(2)').addClass('is-active');
    $('.info-product-full .tab-item').hide();
    $('.info-product-full .tab-item-2').show();

  });

  /*slider*/
  var swiperBlog = new Swiper(".blog-slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: "auto",
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
  });

  /*tel mask*/
  $('.tel').mask('+375 (00) 000-00-00');
  $('input[type=tel]').mask('+375 (00) 000-00-00');
  $('.number-9').mask('000 000 000');
  $('.cabinet #bank-1').mask('000 000 000');

  /*delete item cart*/
  $(document).on('click', '.delete-item a', function (e) {
    e.preventDefault();
   $(this).closest('.product-item').hide();
   console.log('delete item')
  });

  $(document).on('click', '.cart-block .mob-select p span', function (e) {
    e.preventDefault();
    $(this).closest('p').toggleClass('is-active');
    $('.cart-block .content-product.product').find('.product-item').addClass('is-select')
  });

  $(document).on('click', '.product-item .mob-check p', function (e) {
    e.preventDefault();
    $(this).closest('.product-item').toggleClass('is-select')
  });


  $(document).on('click', '.cart-block .mob-select p a', function (e) {
    e.preventDefault();
    $('.cart-block .content-product.product').find('.product-item.is-select').hide();
    console.log('delete select item')
  });

  /*checkout*/
  $(document).on('click','.select-step-1 input',function(){
    $('.select-step-1 .select').toggleClass('is-active');
    let index = $('.select-step-1 .select.is-active').index() + 1;
    $('.wrap-hide-show-1 .select-item').hide()
    $(".wrap-hide-show-1 .select-item:nth-child(" + index + ")").show()

  });

  $(document).on('change','.select-step-2 input',function(){

    $('.select-step-2 .select').removeClass('is-active');
    $('.select-step-2 input:checked').closest('.select').addClass('is-active');

    let index = $('.select-step-2 .select.is-active').index() + 1;
    var method = $(this).val()
    console.log(method)
    if(method == 'bacs'){
      $('.wrap-hide-show-2 .select-item').show()
    }else{
      $('.wrap-hide-show-2 .select-item').hide()
    }

  });



  /*niceselect*/
  $('.select-list, .select-block-mob select').niceSelect();


  /*next step checkout*/
  $(document).on('click', '.next-step', function (e){
    e.preventDefault();
    $(this).closest('.step').removeClass('is-open').addClass('is-complete');
    let index = $(this).closest('.step').index() + 2;
    $(".checkout-block .step:nth-child("+ index + ")").addClass('is-open')
  });


  $(document).on('click', '.is-complete h2', function (e){
    e.preventDefault();
    $(this).closest('.step').toggleClass('is-open')
  });

  /*cabinet login*/
  $(document).on('click', '.cabinet-wrap.is-active>a', function (e){
    e.preventDefault();
    $(this).toggleClass('is-show');
    if($(this).hasClass('is-show')){
      $('.cabinet-list').slideDown();
    }else{
      $('.cabinet-list').slideUp();
    }
  });

  if(window.innerWidth < 1200){
    $(document).on('click', '.cabinet .aside .btn-tab a', function (e){
      e.preventDefault();
      $('.cabinet .aside').toggleClass('is-open');
      if($('.cabinet .aside').hasClass('is-open')){
        $('.cabinet .aside .item').slideDown();
      }else{
        $('.cabinet .aside .item').slideUp();
      }
    })
  };

 /* cabinet*/
  $(document).on('click', '.cabinet .info-bottom-link a', function (e){
    e.preventDefault();
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      $(this).closest('.item-wrap').find('.item-open').slideDown();
    }else{
      $(this).closest('.item-wrap').find('.item-open').slideUp();
    }
  });
  /* cabinet edit name*/
  if(window.innerWidth > 300){
    $(document).on('click', '.personal-data .input-wrap .btn-wrap a', function (e){
      e.preventDefault();
      let item = $(this).closest('.input-wrap');
      $(this).closest('.input-wrap').removeClass('new').toggleClass('is-edit');

      if(item.hasClass('is-edit')){
        item.find('input').prop("disabled", false);
      }else{
        item.find('input').prop("disabled", true);
      }
    });
  }else{

  }


  /*send code*/
  $(document).on('click', '.send-code', function (e){
    e.preventDefault();
    $('.tel-number-popup').addClass('is-send');
    console.log('send-code')
  });

  /*edit-company*/
  if(window.innerWidth > 300){
    $(document).on('click', '.btn-edit-company', function (e){
      e.preventDefault();
      $(this).closest('.info-company').addClass('is-edit-company')
    });

    $(document).on('click', '.btn-save-company', function (e){
      e.preventDefault();
      $(this).closest('.info-company').removeClass('is-edit-company')
    });
  }else{

  }

  /*checkout mobile step*/
  $(document).on('click', '.fix-menu-checkbox .btn-next', function (e){
    e.preventDefault();
    let item = $(this).index() + 2;
    $(this).removeClass('is-show');
    $('.checkout-block .step').removeClass('is-open');
    $(".fix-menu-checkbox .btn-red:nth-child(" + item + ")").addClass('is-show');
    $(".checkout-block .step:nth-child(" + item + ")").addClass('is-open');
    console.log(item)
    if(item > 2){
      $('.cart-block .aside').addClass('is-show');
    }else{
      $('.cart-block .aside').removeClass('is-show');
    }
  });


  $(document).on('click', '.prev-step-1', function (e){
    e.preventDefault();
    $('.checkout-block .step').removeClass('is-open');
    $('.checkout-block .step-1').addClass('is-open');

    $(".fix-menu-checkbox .btn-red").removeClass('is-show');
    $(".fix-menu-checkbox .btn-red:first-child").addClass('is-show');
  });

  $(document).on('click', '.prev-step-2', function (e){
    e.preventDefault();
    $('.checkout-block .step').removeClass('is-open');
    $('.checkout-block .step-2').addClass('is-open');
    $('.cart-block .aside').removeClass('is-show');
    $(".fix-menu-checkbox .btn-red").removeClass('is-show');
    $(".fix-menu-checkbox .btn-red:nth-child(2)").addClass('is-show');
  });

});
