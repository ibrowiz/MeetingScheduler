@extends('layouts.master')

@section('page-title')

  Device

@endsection

@section('content') 

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"> Dashboard </a></li>
        <li><a href="{{ url('device') }}"> Device </a></li>
        <li class="active"> Create </li>
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

              <div class="blog-header "> <h5 class="blog-title"> Add New Device </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                    <form class="form-horizontal" method="POST" action = "{{ url('/saveDevice') }}">
                      {!!csrf_field()!!}
    
                      <div class="form-group">
                        <label for="deviceName" class=" control-label">Device Name</label>
                            
                        <input type="text" name = "deviceName" class="form-control" id="deviceName">

                      </div>
                      <div class="form-group">
                        <label for="roomName" class=" control-label">Room</label>

                        <select name = "roomName" class="form-control" id="select">
                          @foreach($rooms as $rooms)
                          <option value="{{$rooms->id}}">{{$rooms->room_name}}</option>
                          @endforeach
                        </select>

                      </div>

                      <div class="form-group">
                        <label for="description" class=" control-label">Description</label>
                        
                        <textarea class="form-control" name = "description"  rows="5" id="textArea"></textarea>
                        
                      </div>
                      <div class="form-group">

                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-success "> <i class="fa fa-save"></i> Submit</button>

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
        $mn_list.find('ul > li:nth-child(1) > a').addClass('select');

    </script>

@endsection