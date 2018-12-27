@extends('layouts.master')

@section('page-title')

  Bookings

@endsection

@section('content')

 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('bookings/index')}}">Bookings</a></li>
        <li class="active">Show</li>
      </ol>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 margin-t1">
      @include('partials.flash_message')
      @include('partials.validate')
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
    
      <div class="blog blog-success">
        <div class="blog-header"> <h5 class="blog-title">Bookings</h5> </div>

        <div class="blog-body">
          <table class="table table-striped table-hover data-table" >
            <thead>
              <tr>
                <th>Room Email</th>
                <th>Start Date</th>
                <th>End Date</th>
              </tr>
            </thead>
            <tbody>
              @if(count($bookings) > 0)
                @foreach($bookings as $booking)
                  <tr>
                    <td>{{$booking->room_email}}</td>
                    <td>{{$booking->start_date}}</td>
                    <td>{{$booking->end_date}}</td>
                  </tr>
                @endforeach
              @endif

            </tbody>
          </table> 
        </div>

      </div>

    </div>
  </div>
@endsection

@section('extra-script')
<script type="text/javascript">
        
        $mn_list = $('#menu > ul > li.room');
        $('#menu > ul > li').removeClass('highlight active ');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(1) > a').addClass('select');

 </script>

@endsection