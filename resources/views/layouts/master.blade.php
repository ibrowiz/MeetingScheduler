
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Telvida Meeting Room">
    <meta name="author" content="Adeyinka Abiodun">
    <meta name="keywords" content="Meeting, Meeting Room, Telvida ">
    
    <title>Meeting - Telvida </title>

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
    <link href="{{ URL::to('css/custom.css')}}" rel="stylesheet" media="screen">
     
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::to('daterangepicker/daterangepicker.css') }}" />
    <script type="text/javascript" src="{{URL::to('https://code.jquery.com/jquery-1.11.3.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{URL::to('daterangepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{URL::to('daterangepicker/daterangepicker.js') }}"></script> 


    <!-- Datepicker CSS -->
    <!-- <link rel="stylesheet" href="{{URL::to('css/bootstrap-datetimepicker.min.css') }}"> -->
    <link rel="stylesheet" href="{{URL::to('css/sweetalert.css')}}">
    <link rel="icon" href="{{URL::to('images/logo.png')}}">
    <link rel="stylesheet" href="{{URL::to('css/dataTables.bootstrap.min.css')}}">


    <link  rel="stylesheet"  href="{{URL::to('//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css') }}">
    
    <script src="{{ URL::to('//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js') }}"></script>
   <!--  <script src="{{URL::to('js/jquery-3.1.1.js') }}"></script> -->
    

    <!-- jQuery UI JS -->
    <script src="{{ URL::to('js/jquery-ui-v1.10.3.js') }}"></script>

    <script src="{{URL::to('js/bootstrap.min.js') }}"></script>
{{--     <script src="{{URL::to('js/moment.min.js')}}"></script>
    <script src="{{URL::to('js/bootstrap-datetimepicker.min.js')}}"></script> --}}
    <script src="{{URL::to('js/sweetalert.min.js') }}"></script>


    <!-- Notifications JS -->
    <script src="{{ URL::to('js/alertify/alertify.js') }}"></script>
    <script src="{{ URL::to('js/alertify/alertify-custom.js') }}"></script>
  
    
    @yield('extra-css')

   
</head>

<body>


    <header>

        
        <!-- Logo starts -->
        <div class="logo">
            <a href="#">
                <img src="{{URL::to('images/logo.png')}}" width="50" alt="logo"> <span style="color: #f2f2f2; font-size: 16px;"> TVD MEETING </span>
                <span class="menu-toggle hidden-xs">
                    <i class="fa fa-bars"></i>
                </span>
            </a>
        </div>
        <!-- Logo ends -->

        <!-- Custom Search Starts -->
        <div class="custom-search pull-left hidden-xs hidden-sm">
            <input type="text" class="search-query" placeholder="Search here">
            <i class="fa fa-search"></i>
        </div>
        <!-- Custom Search Ends -->

        <!-- Mini right nav starts -->
        <div class="pull-right">
            <ul id="mini-nav" class="clearfix">

                <li class="list-box user-profile hidden-xs">
                    <a href="#" class="user-avtar animated rubberBand">
                        <img src="{{ URL::to(Auth::user()->avatar()) }}" alt="user avatar">
                    </a>
                </li>
            </ul>
        </div>
        <!-- Mini right nav ends -->

    </header>


    <aside id="sidebar">


        <!-- Current User Starts -->
        <div class="current-user">
            <div class="user-avatar animated rubberBand">
                <img src="{{ URL::to(auth::user()->avatar()) }}" alt="Current User">
                <span class="busy"></span>
            </div>
            <div class="user-name">Welcome {{ auth::user()->lastname }}</div>
            <ul class="user-links">
                <li>
                    <a href="{{ url('profile') }}">
                        <i class="fa fa-user text-success"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url('dashboard') }}">
                        <i class="fa fa-desktop text-warning"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url('profile/edit') }}">
                        <i class="fa fa-sliders text-info"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out text-danger"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
        <!-- Current User Ends -->

        <div id="menu">

            @include('partials.sidebar')            

        </div>          

           
    </aside>
    <!-- Left sidebar ends -->

    <!-- Dashboard Wrapper starts -->
    <div class="dashboard-wrapper">

        <!-- Top Bar starts -->
        <div class="top-bar">
            <div class="page-title">
                @yield('page-title')
            </div>
            
        </div>
        <!-- Top Bar ends -->

        <!-- Main Container starts -->
        <div class="main-container" style="min-height: calc(100vh - 125px) !important;">

            <!-- Container fluid Starts -->
            <div class="container-fluid">

                <!-- Spacer starts -->
                <div class="spacer">
                    @yield('content')

                </div>
                <!-- Spacer Ends -->

            </div>
            <!-- Container fluid Ends -->

        </div>
        <!-- Main Container Ends -->

        <!-- Right sidebar starts -->
        <div class="right-sidebar" style="height: calc(100vh - 125px) !important; overflow-y: auto;" >
            
            <!-- Addons starts -->
            <div class="add-on clearfix" > 
                <h5> Notifications </h5>
                <ul class="articles" >

                    @if($notifications )

                        @foreach($notifications->take(30) as $notification)
                            
                            <li>
                                <a class="btn_notification" href="#">
                                    <span class="label-bullet">
                                        &nbsp;
                                    </span>
                                    <span class="text-info"> {{ $notification->room_email }} </span> 
                                    <span> {{$notification->message}} </span>
                                    <span class="date"> {{$notification->created_at->diffForHumans()}} </span>
                                </a>
                            </li>

                        @endforeach
                    
                    @endif

                </ul>
            </div>
            <!-- Addons ends -->

        </div>
        <!-- Right sidebar ends -->

        <!-- Footer starts -->
        <footer>
            Copyright Telvida Int'l Limited 2017 by Adeyinka Abiodun.
        </footer>
        <!-- Footer ends -->
        <!-- Footer ends -->

    </div>
    <!-- Dashboard Wrapper ends -->
                

    
    <!-- Sparkline graphs -->
    <script src="{{ URL::to('js/sparkline.js') }}"></script>

    <!-- jquery ScrollUp JS -->
    <script src="{{ URL::to('js/scrollup/jquery.scrollUp.js') }}"></script>

    <!-- Custom Index -->
    <script src="{{ URL::to('js/custom.js') }}"></script>



    <script src="{{URL::to('js/bootstrap-notify.min.js') }}"></script>

    <script src="{{URL::to('js/socket.io.js')}}"></script>

    <script src="{{URL::to('js/Chart.bundle.min.js')}}"></script>
    
    <script src="{{URL::to('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{URL::to('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{URL::to('js/custom-dataTable.js') }}"></script>
    <script type="text/javascript">
        
        var socket = io.connect('//{{$_SERVER['SERVER_ADDR']}}:8001');

        socket.on("notify", function(data){
            // var data = JSON.parse(data);
            
            alertify.set({ delay: 10000 });
            alertify.success(data.msg);

        });

        socket.on("notifyerr", function(data){          
            // var data = JSON.parse(data);
            alertify.set({ delay: 10000 });
            alertify.error(data.msg);

        });

    </script>

    @yield('extra-script')
    
</body>
</html>