@extends('layouts.master')

@section('page-title')

  Device

@endsection

@section('content')

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"> Dashboard </a></li>
        <li class="active"> Device </li>
      </ol>
    </div>
  </div>

  <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12 margin-t1">

          @include('partials.flash_message')
          @include('partials.validate')

      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

        <a href="{{url('device/create')}}" class="btn btn-success ">Add New Device </a>

      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Device </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                      <div class="table-responsive">
                        <table class="table table-striped table-hover data-table ">
                          <thead>
                            <tr>
                              <th>Device Name</th>
                              <th>Room Name</th>
                              <th>Device Number</th>
                              <th>Device uuID</th>
                              <th>Platform</th>
                              <th>Description</th>
                              <th><center>Action</center></th>

                            </tr>
                          </thead>
                          <tbody>
                            @if(count($devices) > 0)
                              @foreach($devices as $device)
                                <tr>
                                    <td>{{$device->device_name}}</td>
                                    <td>{{$device->room->room_name}}</td>
                                    <td>{{$device->device_no}}</td>
                                    <td>{{$device->device_uuid}}</td>
                                    <td>{{$device->platform}}</td>
                                    <td>{{$device->description}}</td>
                                    <td>
                                      <center>
                                        <a href='{{url("device/show/{$device->id}")}}' class = "btn btn-info btn-xs">Read</a> | 
                                        <a href='{{url("/editDevice/{$device->id}")}}' class = "btn btn-success btn-xs">Edit</a> 
                                        
                                      </center>
                                    </td>
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
        
        $mn_list = $('#menu > ul > li.device');
        $('#menu > ul > li').removeClass('highlight active ');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(2) > a').addClass('select');

    </script>

@endsection

