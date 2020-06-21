<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>Sistema Admin</title>
        <!--
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        -->

        <!-- Bootstrap -->
        <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- jQuery custom content scroller -->
        <link href="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

        <!-- PNotify -->
        <link href="assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="assets/build/css/custom.min.css" rel="stylesheet">
      </head>
      <body class="nav-md">
        <div id="app" class="container body">
          <div class="main_container">
            
            <!--  MENU -->

            <menu-component></menu-component>
    
            <!-- top navigation -->
            <topnavegacion-component></topnavegacion-component>
            <!-- /top navigation -->
    
            <!-- page content -->
            <div class="right_col" role="main">
              <router-view></router-view>
            </div>
            <!-- /page content -->
    
            <!-- footer content -->
            <footer-component></footer-component>
            <!-- /footer content -->
          </div>
        </div>
    
        <script src="{{asset('js/app.js')}}"></script>
        <!-- jQuery -->
        <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="assets/vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="assets/vendors/iCheck/icheck.min.js"></script>
        <!-- jQuery custom content scroller -->
        <script src="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- PNotify -->
        <script src="assets/vendors/pnotify/dist/pnotify.js"></script>
        <script src="assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
        <script src="assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="assets/build/js/custom.min.js"></script>
      </body>
</html>
