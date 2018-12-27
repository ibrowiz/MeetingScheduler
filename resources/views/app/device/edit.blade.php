@extends('layouts.master')

@section('page-title')

  Device

@endsection

@section('content')

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"> Dashboard </a></li>
        <li><a href="{{ url('device') }}"> Device</a></li>
        <li class="active"> Edit </li>
      </ol>
    </div>
  </div>

  <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12 margin-t1">

          @include('partials.flash_message')
          @include('partials.validate')

      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Edit Device </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                    <form class="form-horizontal" method="POST" action = "{{ url('/updateDevice',array($devices->id)) }}">
                      
                      {{ csrf_field() }}
                    
                      <div class="form-group">
                        
                        <label for="deviceName" class=" control-label">Device Name</label>
                                
                        <input type="text" name = "deviceName" class="form-control" id="deviceName" value = "<?php echo $devices->device_name;?>">
                          
                      </div>
                      <div class="form-group">
                            
                        <label for="roomName" class=" control-label">Room</label>
                                
                        <select name = "roomName" class="form-control" id="select">
                          @foreach($rooms as $room)
                            <option {{ $devices->room_id == $room->id ? "selected":"" }} value="{{$room->id}}">{{$room->room_name}}</option>
                          @endforeach
                        </select>
                      
                      </div>

                      <div class="form-group">
                        <label for="description" class=" control-label">Description</label>
                        
                        <textarea class="form-control" name = "description"  rows="5" id="textArea">{!! $devices->description !!}</textarea>
                      
                      </div>
                      <div class="form-group">

                        <a href="{{url('/devices')}}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-info"> Update </button>

                      </div>

                    </form>

                  </div>

              </div>
          </div>

      </div>
  </div> 
@endsection



@section('extra-script')

    <script type="text/javascript">
        
        $mn_list = $('#menu > ul > li.device');
        $('#menu > ul > li').removeClass('highlight active ');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(2) > a').addClass('select');

    </script>

@endsection