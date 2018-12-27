@extends('layouts.master')

@section('page-title')

    Role

@endsection

@section('content')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
			<ol class="breadcrumb">
                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
				<li><a href="{{url('role')}}">Roles</a></li>
				<li class="active">Create</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-sm-12 col-xs-12">

			@include('partials.flash_message')
			@include('partials.validate')

        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">

            <div class="blog blog-success">

                <div class="blog-header "> <h5 class="blog-title"> New Role </h5> </div>

                <div class="blog-body">

                    <div class="col-md-12 col-sm-12 col-xs-12">

            			<form class="form-horizontal app-form" name="frmCreateRole" method="POST" action="{{url('role')}}">
            				{{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" control-label">Name</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                            </div>

            				<div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                                <label for="label" class=" control-label">Label</label>

                                <input id="label" type="text" class="form-control" name="label" value="{{ old('label') }}" required autofocus>

                                @if ($errors->has('label'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('label') }}</strong>
                                    </span>
                                @endif
                                
                            </div>

                            <div class="form-group{{ $errors->has('usernam') ? ' has-error' : '' }}">
                                <label for="description" class=" control-label">Description</label>
                    
                                <textarea id="description" class="form-control" name="description" required autofocus>{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                
                            </div>

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    Permission ({{$permissions->count()}})
                                </div>

                                <div class="panel-body">

                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        
                                        @foreach($permissions as $permission)

                                            <div class="col-xs-4">
                                                <label class="check">
                                                    <input type="checkbox" name="permission[]" value="{{$permission->id}}"> {{$permission->description}}
                                                </label>
                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success "> <i class="fa fa-save"></i> Create Role </button>
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
    
        $mn_list = $('#menu > ul > li.role');
        $('#menu > ul > li').removeClass('highlight active');
        $mn_list.addClass('highlight');
        $mn_list.find('a').append('<span class="current-page"> </span>');
        

  </script>

@endsection
