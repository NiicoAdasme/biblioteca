<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('titulo','Biblioteca')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <link rel="shortcut icon" href="{{asset("assets/$theme/dist/img/biblioteca.png")}}" type="image/x-icon">

        <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">

        @yield('styles')

    </head>
    <body class="hold-transition sidebar-mini layout-boxed">
        <div class="wrapper">
            <!-- Inicio header -->
            @include("theme/$theme/header")
            <!-- Fin header -->
            <!-- Inicio Asidea -->
            @include("theme/$theme/aside")
            <!-- Fin Aside -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper mt-5">
                <!-- Main content -->
                <!-- Main content -->
                <section class="content">
                    @yield('contenido')
                </section>
                <!-- /.content -->
            </div>
            <!-- Inicio Footer-->
            @include("theme/$theme/footer")
            <!-- Fin Footer -->
        </div>
        <!-- jQuery -->
        <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>

        <script src="{{asset("assets/$theme/plugins/jquery-validation/jquery.validate.min.js")}}"></script>

        <script src="{{asset("assets/$theme/plugins/jquery-validation/additional-methods.min.js")}}"></script>

        @yield('scripts')
    </body>
</html>