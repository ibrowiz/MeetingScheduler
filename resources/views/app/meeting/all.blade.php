@extends('layouts.master')

@section('page-title')
 
  Meeting

@endsection

@section('content')

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"> Dashboard </a></li>
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
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>Subject</th>
                              <th>Location</th>
                              <th>Sender Email</th>
                              <th>Room Email</th>
                              <th>Start Time</th>
                              <th>End Time</th>
                              <th>Action</th>

                            </tr>
                          </thead>
                                <tbody>
                                  @if(count($meetings) > 0)
                                    @foreach($meetings as $meeting)
                                      <tr>
                                          <td>{{$meeting->subject}}</td>
                                          <td>{{$meeting->location}}</td>
                                          <td>{{$meeting->from_mail}}</td>
                                          <td> {{ $meeting->room_email }} </td>
                                          <td>{{$meeting->start_time}}</td>
                                          <td>{{$meeting->end_time}}</td>
                                          <td><a href='{{ url("/meeting/show/{$meeting->id}")}}' class = "label label-primary">Read</a></td>  
                                       </tr>
                                    @endforeach
                                @endif
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
        
        $mn_list = $('#menu > ul > li.meeting');
        $('#menu > ul > li').removeClass('highlight active');
        $mn_list.addClass('highlight');
        $mn_list.find('a').append('<span class="current-page"> </span>');


    </script>

@endsection

