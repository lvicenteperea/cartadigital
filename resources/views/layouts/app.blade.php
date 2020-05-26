<!DOCTYPE html>
<!-- saved from url=(0054)https://getbootstrap.com/docs/3.4/examples/dashboard/# -->
<html lang="es">
<head>
    <!-- al final no lo uso    meta name="viewport" content="width=device-width, initial-scale=1"  -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Mi Primera Web">
    <meta name="author" content="Luis A. Vicente">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">

    <title>{{ Config::get('app.name') }}</title>

    <!-- Fonts Laravel-->
    <!-- al final no lo uso    link rel="dns-prefetch" href="https://fonts.gstatic.com" -->
    <!-- al final no lo uso    link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" -->
    <!-- Styles Laravel -->
    <!-- al final no lo uso link href="{{ asset('css/app.css') }}" rel="stylesheet" -->

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Scripts Laravel-->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/bootstrap/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('css/bootstrap/ie-emulation-modes-warning.js.descarga') }}"></script>

    <!--  script y css que saco de aquí para aligerar el archivo  -->
    <script src="{{ asset('css/bootstrap/otros.css') }}"></script>

</head>
<body>
    @include('includes.menu_superior')

    <div class="container-fluid">
      <div class="row">
        
        @include('includes.menu_lateral')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <main class="py-4">
              @yield('content')
           </main>
         </div>
      </div>
    </div>


    <!--  script y css de Bootstrap  -->
    <script src="{{ asset('js/bootstrap/otros.js') }}"></script>
</body>
</html>