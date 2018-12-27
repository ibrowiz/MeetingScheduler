@extends('layouts.master')

@section('page-title')

    User

@endsection


@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
            <ol class="breadcrumb">
                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="active">Users</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

            @include('partials.flash_message')
            @include('partials.validate')
        
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

            <a href="{{ url('user/create') }}" class="btn btn-info btn-block btn-rounded"> <i class="fa fa-plus"></i> New User </a>
        
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

            <div class="blog blog-info">

                <div class="blog-header"> 
                    <h5 class="blog-title"> User </h5>
                </div>
                <div class="blog-body">
                    
                    @include('app.user.partials.table')

                </div>
            </div>
            
        </div>


    </div>

@endsection


@section('extra-script')

    <script type="text/javascript">
        
        $mn_list = $('#menu > ul > li.user');
        $('#menu > ul > li').removeClass('highlight active');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(2) > a').addClass('select');

    </script>

@endsection

