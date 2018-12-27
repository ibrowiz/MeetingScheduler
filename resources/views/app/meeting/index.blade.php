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
        <li><a href="{{url('room/read', $room->id)}}"> {{ $room->room_name }} </a></li>
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
                      
                      <h4>Room Name : {{$room->room_name}}</h4>
                      <h4>Room Email :{{$room->room_email}}</h4>
                      <h4>Room Description : {{$room->description}}</h4>


                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table" >
                  <form>
                
               <div class="form-group col-md-9 col-sm-12 col-xs-12" >
              <label> Date Range </label>
              <input type="text" name="date-range" class="form-control task-date-range" >
             
            </div>
            <div class="pull-right">
            <button type="submit" class = "btn btn-success btn-rounded btn-transparent">search</button>
            <button type="submit" class = "btn btn-info btn-rounded btn-transparent">reserve</button>
            </div>
            <input type="hidden" name="start_date" value="" class="task-start_date">
            <input type="hidden" name="end_date" value="" class="task-due_date">
                  </form>
                          <thead>
                            <tr>
                              <th>Subject</th>
                              <th>Location</th>
                              <th>Sender Email</th>
                              <th>Start Time</th>
                              <th>End Time</th>
                              <th>Action</th>

                            </tr>
                          </thead>
                                <tbody>
                                  
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

      $(function() {    
      
      $('[data-toggle="tooltip"]').tooltip();

      $('.task-date-range').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            autoUpdateInput: false,
            locale: {
                format: 'MMMM DD, YYYY H:mm'
            },
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
        }, function (start, end) {
            $('.task-start_date').val(start.format('DD-MM-YYYY H:mm'));
            $('.task-due_date').val(end.format('DD-MM-YYYY H:mm'));
      });

      $('.task-date-range').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY H:mm') + ' - ' + picker.endDate.format('DD-MM-YYYY H:mm'));
      });
      $('.task-date-range').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
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

