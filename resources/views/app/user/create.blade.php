@extends('layouts.master')

@section('page-title')

    Users

@endsection

@section('content')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">
			<ol class="breadcrumb">
                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
				<li><a href="{{url('user')}}">Users</a></li>
				<li class="active">Create</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t1">

			@include('partials.flash_message')
			@include('partials.validate')
        
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">

            <div class="blog blog-info">

                <div class="blog-header"> 
                    <h5 class="blog-title"> Add New User </h5>
                </div>
                <div class="blog-body">
            		
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <form class="form-horizontal app-form" name="frmCreateUser" method="POST" action="{{url('user')}}">
            				{{ csrf_field() }}

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class=" control-label">First Name</label>


                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
          
                            </div>

            				<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class=" control-label">Last Name</label>

          
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class=" control-label">Username</label>


                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">E-Mail Address</label>


                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
               
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class=" control-label">Password</label>

                    
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class=" control-label">Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            </div>

                           

                            {{-- <div class="form-group">
                                <label for="roles" class=" control-label">User Roles</label>

                                <div class="col-md-8">
                                    @foreach ($roles as $role)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name = "isAdmin" id="{{$role->name}}" value="{{$role->id}}"> {{$role->label}}
                                    </label>
                                    @endforeach
                                </div>
                            </div> --}}

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    Roles ({{$roles->count()}})
                                </div>

                                <div class="panel-body">

                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">


                                        @foreach($roles as $role)

                                            <div class="col-xs-4">
                                                <label class="check">
                                                 <input type="checkbox" name="role[]" value="{{$role->id}}"> {{$role->description}}
                                                </label>
                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Register </button>
                       
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
        
        $mn_list = $('#menu > ul > li.user');
        $('#menu > ul > li').removeClass('highlight active');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(1) > a').addClass('select');

    </script>

@endsection