@extends('layouts.master')

@section('page-title')

  Room

@endsection

@section('content')

 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ul class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"> Dashboard </a></li>
        <li class="active"> Room </li>
      </ul>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 margin-t1">
      @include('partials.flash_message')
      @include('partials.validate')
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

      <a href="{{url('room/create')}}" class="btn btn-success ">Add New Room </a>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
    
      <div class="blog blog-success">
        <div class="blog-header"> <h5 class="blog-title"> Rooms </h5> </div>

        <div class="blog-body">
          <table class="table table-striped table-hover data-table" >
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Room Name</th>
                <th>Mail Server</th>
                <th>Room Email</th>
                <th>Port</th>
                <th>Description</th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              @if(count($rooms) > 0)
                @foreach($rooms as $rooms)
                  <tr>
                    <td><input type="checkbox" name="" value=""></td>
                    <td>{{$rooms->room_name}}</td>
                    <td>{{$rooms->mail_server}}</td>
                    <td>{{$rooms->room_email}}</td>
                    <td>{{$rooms->port}}</td>
                    <td>{{$rooms->description}}</td>
                    <td>
                    <a href='{{ url("room/read/{$rooms->id}")}}' class = "label label-primary"> Read </a> | 
                    <a href='{{ url("room/update/{$rooms->id}")}}' class = "label label-success"> Edit </a> | 
                    <a href="{{ url('/meetings', $rooms)}}" class = "label label-info"> Meetings </a>
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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete</h4>
            </div>
           <div class="modal-body">
            <p>Are you sure you want to delete this room </p>
            </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          {{-- <a href='{{ url("/delete/{$rooms->id}")}}' class = "btn btn-danger">Delete</a> --}}
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

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

