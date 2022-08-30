<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>





    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body>






    @include('layouts.inc.navbar')
        <main class="content"style="margin-top: 50px">

            @yield('content')





        </main>
@include('layouts.inc.footer')




    <!-- Scripts -->



    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <script src="{{ asset('frontend/js/bootstrap.js') }}" ></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

          var availableTags = [
          ];
          $.ajax({
      method: "GET",
      url: "/product-list",

      success: function (response)
      {
        startautocomplete(response);
         //console.log(response)
      }
  });
    function startautocomplete(availableTags)
    {

        $( "#search" ).autocomplete({
            source: availableTags
          });

    }

        </script>
        <script>

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


        </script>
    @if(session('message'))
  <script>
        swal("{{session('message')}}");
  </script>

    @endif
    @yield('scripts')
    <!--this website was developed by EgbonTech-->
</body>
</html>

