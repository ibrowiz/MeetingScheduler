@extends('layouts.master')

@section('page-title')

  Role

@endsection

@section('content')
  
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
    	<ul class="breadcrumb">
    		<li><a href="{{ url('dashboard') }}"> Dashboard </a></li>
    		<li class="active"> Role </li>
    	</ul>
    </div>
  </div>

	<div class="row">

    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 margin-t1">
      @include('partials.flash_message')
      @include('partials.validate')
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

      <a href="{{url('role/create')}}" class="btn btn-success ">Add New Role </a>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
		
      <div class="blog blog-success">
        <div class="blog-header"> <h5 class="blog-title"> Roles </h5> </div>

        <div class="blog-body">

    			<table class="responstable data-table">

    				<thead>
    					<tr>
    						<th style="width:3px; ">S/N</th>
                <th>Name</th>
                <th>Label</th>
    						<th>Description</th>
    						<th style="max-width:120px !important; width: 120px !important; ">Created</th>
                <th>Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach($roles as $index => $role)

    					<tr>
    						<th>{{$index + 1}}</th>
                <td>{{$role->name}}</td>
                <td>{{$role->label}}</td>
                <td>{{$role->description}}</td>

                <td>{{$role->created_at->format('Y M d')}}</td>
                <td> <a href="{{ url('role/edit', $role->id) }}" class="btn btn-info btn-xs"> Edit </a> </td>

    					</tr>

    					@endforeach
    				</tbody>
    			</table>

        </div>

      </div>

		</div>



	</div>

@endsection


@section('extra-css')

<style type="text/css" media="screen">


.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}




</style>


@endsection


@section('extra-script')

  <script type="text/javascript">
    
        $mn_list = $('#menu > ul > li.role');
        $('#menu > ul > li').removeClass('highlight active');
        $mn_list.addClass('highlight');
        $mn_list.find('a').append('<span class="current-page"> </span>');
        

  </script>

@endsection
