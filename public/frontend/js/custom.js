
   $(document).ready(function () {

    Loadcart();
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
           });
    function Loadcart()
    {
    $.ajax({
        method:"GET",
        url:"/Load-cart-data",
      success: function (response)
      {
          $('.cart-count').html(response.count);

      }
    });
    }

    //$('.increament-btn').click(function (e) {
    $(document).on('click','.increament-btn',function (e) {

    e.preventDefault();


       var increment = $(this).closest('.product_data').find('.qty-input').val();

          var value = parseInt(increment, 10);

             value = isNaN(value) ? 0 : value;

              if(value < 10)
              {
                value++;

             $(this).closest('.product_data').find('.qty-input').val(value);
              }
    });
    //$('.decrement-btn').click(function (e) {
    $(document).on('click','.decrement-btn',function (e) {

         e.preventDefault();

           var decrement =  $(this).closest('.product_data').find('.qty-input').val();

             var value = parseInt(decrement, 10);

               value = isNaN(value) ? 0 : value;

                 if(value > 1)
                 {
                    value--;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                 }
    });

    $(document).on('click','.delete-cart-item',function (e) {

     e.preventDefault();
     $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
         var product_id =  $(this).closest('.product_data').find('.product_id').val();
         $.ajax({
      method: "POST",
      url: "delete-cart-item",
      data: {
          'product_id' : product_id,

      },
      success: function (response)
      {
          //window.location.reload();
          Loadcart();
          $('.carts').load(location.href + " .carts");
          swal("",response.message,"success");
      }
    });


    });
    //$('.changeQuantity').click(function (e) {
    $(document).on('click','.changeQuantity',function (e) {

    e.preventDefault();
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

      var product_id =  $(this).closest('.product_data').find('.product_id').val();

      var qty =  $(this).closest('.product_data').find('.qty-input').val();
      data = {
          'product_id' : product_id,
          'product_qty' : qty,
      }

      $.ajax({
      method: "POST",
      url: "update-cart",
      data:data,
      datatype: "json",
          success: function (response)
      {
        $('.carts').load(location.href + " .carts");
          //window.location.reload();
         swal("",response.message,"success");
      }


    });


    });


    $('.addtocart').click(function (e){
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.product_id').val();
    var product_qty = $(this).closest('.product_data').find('.qty-input').val();

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
      method: "POST",
      url: "/add-to-cart",
      data: {
          'product_id' : product_id,
          'product_qty' : product_qty,
      },
      success: function (response)
      {
          swal(response.message);
          Loadcart();
      }
    });

    });

    });
