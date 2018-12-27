@extends('layouts.master')

@section('page-title')

    Room &#187; Meeting

@endsection

@section('content')

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"> Dashboard </a></li>
        <li><a href="{{url('room')}}"> Room </a></li>
        <li><a href="{{url('room/read', $meeting->room->id)}}"> {{ $meeting->room->room_name }} </a></li>
        <li class="active">Meeting</li>
      </ol>
    </div>
  </div>

  <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12 margin-t1">

          @include('partials.flash_message')
          @include('partials.validate')

      </div>

      <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Meeting </h5> </div>

              <div class="blog-body">

                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                  <div class="table-responsive">

                    <table class="table table-striped ">
                      <tbody>
                      <tr>
                         <td>Room Email</td>
                         <td colspan="2">{{$meeting->room_email}}</td>
                      </tr>
                      <tr>
                         <td>Subject</td>
                         <td colspan="2">{{$meeting->subject}}</td>
                      </tr>
                      <tr>
                        <td>Location</td>
                        <td colspan="2">{{$meeting->location}}</td>
                      </tr>
                      <tr>
                         <td>Body</td>
                         <td colspan="2">{{$meeting->description}}</td> 
                      </tr>
                      <tr>
                         <td>Sender</td>
                         <td colspan="2">{{$meeting->from}}:&nbsp;&nbsp;{{$meeting->from_mail}}</td>
                      </tr>
                      <tr>
                         <td>Time</td>    
                         <td colspan="2">{{$meeting->start_time}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$meeting->end_time}}</td>
                      </tr>
                      <tr>
                         <td>Time</td>    
                         <td colspan="2">{{$meeting->start_time}}&nbsp;&nbsp;-&nbsp;&nbsp;{{$meeting->end_time}}</td>
                      </tr>
                      <tr>
                         <td>Sequence</td>
                         <td colspan="2">{{$meeting->sequence}}</td>
                      </tr>
                      <tr>
                         <td>UUID</td>
                         <td colspan="2">{{$meeting->uuid}}</td>
                      </tr>
                      @if(count($meeting->frequency))
                      <tr>
                        <td>Frequency</td>
                        <td colspan="2">{{$meeting->frequency}}</td>
                      </tr>
                      @else
                      @endif
                      <tr>
                        <td>Interval</td>
                        <td colspan="2">{{$meeting->interval}}</td>
                      </tr>
                      <tr>
                        <td>No of Occurrences</td>
                        <td colspan="2">{{$meeting->count}}</td>
                      </tr>
                      <tr>
                        <td>Day of Month</td>
                        <td colspan="2">{{$meeting->day_of_month}}</td>
                      </tr>
                      <tr>
                        <td>Month of Year</td>
                        <td colspan="2">{{$meeting->month_of_year}}</td>
                      </tr>
                      <tr>
                        <td>Day of Year</td>
                        <td colspan="2">{{$meeting->day_of_year}}</td>
                      </tr>
                      <tr>
                        <td>Day(s) of week</td>
                        <td colspan="2">{{$meeting->day_s_of_week}}</td>
                        </tr>
                      </tbody>
                    </table>
      
                  </div>

                </div>

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
        $mn_list.find('ul > li:nth-child(2) > a').addClass('select');

    </script>

@endsection

