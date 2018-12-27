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

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 
          <a href='{{url("/editDevice/{$device->id}")}}' class = "btn btn-success">Edit</a> 

          <a href='' class = "btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>  

      </div>
 
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">

          <div class="blog blog-success">

              <div class="blog-header "> <h5 class="blog-title"> Device </h5> </div>

              <div class="blog-body">

                  <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class=" table-responsive">
                      <table class="table table-striped ">
                        <tbody>
                          <tr>
                             <td>Device Name</td>
                             <td colspan="2">{{$device->device_name}}</td>
                          </tr>
                          <tr>
                             <td>Room Name</td>
                             <td colspan="2">{{$device->room->room_name}}</td> 
                          </tr>
                          <tr>
                             <td>Device Number</td>
                             <td colspan="2">{{$device->device_no}}</td>
                          </tr>
                          <tr>
                             <td>Device UUID</td>
                             <td colspan="2">{{$device->device_uuid}}</td>
                          </tr>
                          <tr>
                            <td>Platform</td>
                            <td colspan="2">{{$device->platform}}</td>
                          </tr>
                          <tr>
                            <td>Description</td>
                            <td colspan="2">{{$device->description}}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>

              </div>

          </div>
      </div>
    
  </div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form method="post" action="{{ url('device/delete') }}">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete</h4>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this device </p>
            <input type="hidden" name="device" value="{{ $device->id }}">

            {{ csrf_field() }}

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>

            <button type="submit" class="btn btn-success"> Yes </button>
        </div>
      </div>
    </form>
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