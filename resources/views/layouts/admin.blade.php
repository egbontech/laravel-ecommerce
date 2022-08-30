<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    
    <!-- Styles -->
 
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body>
    

@include('layouts.inc.adminnav')

<div id="layoutSidenav">
    @include('layouts.inc.sidebar')

    <div id="layoutSidenav_content">
        <main>
            @yield('content')

        </main>
        @include('layouts.inc.adminfooter')
  </div>


    
    
    <!-- Scripts -->
    
  
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('message'))
  <script>
        swal("{{session('message')}}");
  </script>
    @endif
    @yield('scripts')
    <!--this website was developed by EgbonTech-->
</body>
</html>

