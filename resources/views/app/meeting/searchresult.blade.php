@extends('layouts.master')

@section('page-title')

    Book Room

@endsection

@section('content')

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('bookings/index')}}">Bookings</a></li>
        <li class="active">Create</li>
      </ol>
    </div>
  </div>

  

  <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12 margin-t1">

          @include('partials.flash_message')
          @include('partials.validate')

      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Book Room </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                    <form class="form-horizontal" method="POST" action = "{{ url('bookings/search') }}">
                      {!!csrf_field()!!}

                      <div class="form-group">
                          <label for="contentcategory" class="col-lg-2 control-label">Room Name</label>
                          <div class="col-xs-10 col-sm-5">
                            <select name="roomName" class="form-control" id="roomName">
                            <option value=" ">Select</option>
                              @foreach($rooms as $room)
                              <option value="{{$room->room_email}}">{{$room->room_name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Date</label>
                        <div class="col-xs-5 col-sm-5">
                          <input type="text" class="form-control task-date-range" name="date-range">
                        </div>
                      </div>

                     
                      
                <div class='form-group'>
                    <label for="" class="col-sm-2 control-label">Time From</label>
                       <div class="col-xs-5 col-sm-5">
                          <input type='text' class="form-control timepicker" name="start_time" />
                       </div>
                </div>
                <div class='form-group'>
                    <label for="" class="col-sm-2 control-label">Time To</label>
                        <div class="col-xs-5 col-sm-5">
                            <input type='text' class="form-control timepicker" name="end_time" />
                        </div>
                    <label for="" class="col-sm-2 control-label"><button type="submit" name = "submit" value = "search" class="btn btn-default">Search</button></label>
                </div>
                               
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" name= "submit" value = "reserve"  class="btn btn-primary">Reserve Room</button>
                    </div>
                  </div>


                  </form>
      
                  </div>

                    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                          <thead>
                            <tr>
                              <th>Subject</th>
                              <th>Location</th> 
                              <th>Sender</th>
                              <th>Start time</th>
                              <th>End time</th>
                            </tr>
                          </thead>
                            <tbody>
                              @if(count($meetings) > 0)
                                    @foreach($meetings as $meeting)
                                      <tr>
                                          <td>{{$meeting->subject}}</td>
                                          <td>{{$meeting->location}}</td>
                                          <td>{{$meeting->from_mail}}</td>
                                          <td>{{$meeting->start_time}}</td>
                                          <td>{{$meeting->end_time}}</td>
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
        
        $mn_list = $('#menu > ul > li.room');
        $('#menu > ul > li').removeClass('highlight active ');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(1) > a').addClass('select');

        $(function() {    
      
      $('[data-toggle="tooltip"]').tooltip();

      $('.task-date-range').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            timePickerIncrement: 30,
            autoUpdateInput: false,
            locale: {
                format: 'MMMM DD, YYYY H:mm'
            },
            
        }, function (start, end) {
            $('.task-start_date').val(start.format('DD-MM-YYYY H:mm'));
            //$('.task-due_date').val(end.format('DD-MM-YYY
      });

      $('.task-date-range').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
      });
      $('.task-date-range').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      $('.timepicker').timepicker({
              timeFormat: 'HH:mm:ss',
              interval: 01,
              minTime: '00',
              maxTime: '23:00',
              defaultTime: '',
              startTime: '00:00',
              dynamic: false,
              dropdown: true,
              scrollbar: true
          });



      $('body').on('click', '.add-task-btn', function(e){
        $('.task-box').hide();
        $('.task-box').removeClass("hide");
        $('.task-box').show( "slide", {direction: "right" }, 1000 );

      });

      $('body').on('click', '.hide-task-btn', function(e){
        $('.task-box').hide( "slide", {direction: "right" }, 1000 );
      });

      $('body').on('click', '.add-task-display-btn', function(e){       
        var url = "http://erp.telvida.com/helpdesk/ticket/task/content" + "/" + $(this).data('id');
        loadTaskContent(url);

      });

      $('body').on('click', '.hide-task-display-btn', function(e){
        $('.task-display-box').hide( "slide", {direction: "down" }, 1000 );
        $('.task-display-box-content').html('');
      });

    });

    </script>

@endsection

