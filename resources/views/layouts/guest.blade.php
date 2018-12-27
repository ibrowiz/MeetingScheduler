<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Telvida Meeting Room">
    <meta name="author" content="Adeyinka Abiodun">
    <meta name="keywords" content="Meeting, Meeting Room, Telvida ">
    
    <title> Telvida - Meeting </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}" >

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{URL::to('css/font-awesome.min.css') }}">

    <!-- Animate CSS -->
    <link href="{{ URL::to('css/animate.css')}}" rel="stylesheet" media="screen">

    <!-- Alertify CSS -->
    <link href="{{ URL::to('css/alertify/alertify.core.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/alertify/alertify.default.css')}}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ URL::to('css/main.css')}}" rel="stylesheet" media="screen">





    <link rel="stylesheet" href="{{URL::to('css/sweetalert.css')}}">
    <link rel="icon" href="{{URL::to('images/logo.png')}}">
    <link rel="stylesheet" href="{{URL::to('css/bootstrap-toggle.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/dataTables.bootstrap.min.css')}}">
    
    <script src="{{URL::to('js/jquery-3.1.1.js') }}"></script>
   
    <!-- jQuery UI JS -->
    <script src="{{ URL::to('js/jquery-ui-v1.10.3.js') }}"></script>

    <script src="{{URL::to('js/bootstrap.min.js') }}"></script>

    <style type="text/css">
      body, html {
        margin: 0px;
        height: 100% !important;
        padding: 0px;
        color: #fff;
        /*background-color: #f3f3f4;*/

      }
      footer{
        margin-top: auto;
        position: fixed;
        width: 100% !important;
        bottom: 0px;
      }
    </style>
    @yield('extra-css')

   
</head>

<body>


    <!-- Header Start -->
    <header>

      <!-- Logo starts -->
      <div class="logo">
          <a href="{{ url('/') }}">
              <img src="{{URL::to('images/logo.png')}}" width="50" alt="logo"> <span style="color: #f2f2f2; font-size: 18px;"> TVD MEETING </span>
              <span class="menu-toggle hidden-xs">
                  
              </span>
          </a>
      </div>
      <!-- Logo ends -->

      <!-- Custom Search Starts -->
      {{-- <div class="custom-search pull-left hidden-xs hidden-sm">
        <input type="text" class="search-query" placeholder="Search here">
        <i class="fa fa-search"></i>
      </div> --}}
      <!-- Custom Search Ends -->

      <!-- Mini right nav starts -->
      <div class="pull-right">
        <ul id="mini-nav" class="clearfix">
          
          
          <li class="list-box " id="mob-nav">
            <a href="{{ route('login') }}">
              <i class="fa fa-sign-in"></i>
              Login
            </a>
          </li>

        </ul>
      </div>
      <!-- Mini right nav ends -->

    </header>
    <!-- Header ends -->

    <!-- Container fluid Starts -->
    <div class="container-fluid" style="padding-top: 50px; margin-bottom: 100px; !important;">

        <!-- Spacer starts -->

            @yield('content')

        <!-- Spacer Ends -->

    </div>
    <!-- Container fluid Ends -->


    <!-- Footer starts -->
    <footer class="text-center" >
        Copyright Telvida Int'l Limited 2017 by Adeyinka Abiodun.
    </footer>
    <!-- Footer ends -->
    <!-- Footer ends -->

    
    <!-- Sparkline graphs -->
    <script src="{{ URL::to('js/sparkline.js') }}"></script>

    <!-- jquery ScrollUp JS -->
    <script src="{{ URL::to('js/scrollup/jquery.scrollUp.js') }}"></script>

    <!-- Notifications JS -->
    <script src="{{ URL::to('js/alertify/alertify.js') }}"></script>
    <script src="{{ URL::to('js/alertify/alertify-custom.js') }}"></script>

    <!-- Custom Index -->
    <script src="{{ URL::to('js/custom.js') }}"></script>



    <script src="{{URL::to('js/bootstrap-notify.min.js') }}"></script>

    <script src="{{URL::to('js/Chart.bundle.min.js')}}"></script>
    <script src="{{URL::to('js/fullcalendar.min.js')}}"></script>
    <script src="{{URL::to('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{URL::to('js/dataTables.bootstrap.min.js') }}"></script>

    @yield('extra-script')
</body>
</html>