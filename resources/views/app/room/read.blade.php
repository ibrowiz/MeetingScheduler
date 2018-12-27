@extends('layouts.master')

@section('page-title')

  Room

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
      <ul class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"> Dashboard </a></li>
        <li><a href="{{ url('room') }}"> Rooms </a></li>
        <li class="active"> Show </li>
      </ul>
    </div>
</div>

<div class="row">

    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 margin-t1">
      @include('partials.flash_message')
      @include('partials.validate')
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

          <a href="{{url('room/update', $room->id )}}" class="btn btn-success "> Edit </a>

          <a href="{{ url('/meetings', $room)}}" class = "btn btn-info">Meetings</a>

          <a href='' class = "btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>


    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
    
      <div class="blog blog-success">
        <div class="blog-header"> <h5 class="blog-title"> Rooms </h5> </div>

        <div class="blog-body">
          
          <div class="col-md-12 table-responsive">
            <table class="table table-striped ">
              <tbody>
                <tr>
                   <td>Room Name</td>
                   <td colspan="2">{{$room->room_name}}</td>
                </tr>
                <tr>
                   <td>Mail Server</td>
                   <td colspan="2">{{$room->mail_server}}</td> 
                </tr>
                <tr>
                   <td>Room Email</td>
                   <td colspan="2">{{$room->room_email}}</td>
                </tr>
                <tr>
                   <td>Port</td>
                   <td colspan="2">{{$room->port}}</td>
                </tr>
                <tr>
                  <td>Description</td>
                  <td colspan="2">{{$room->description}}</td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form method="post" action="{{ url('room/delete') }}">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete</h4>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this room </p>
            <input type="hidden" name="room" value="{{ $room->id }}">

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
        
        $mn_list = $('#menu > ul > li.room');
        $('#menu > ul > li').removeClass('highlight active ');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(2) > a').addClass('select');

    </script>

@endsection

