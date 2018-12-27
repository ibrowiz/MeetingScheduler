@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t2">	
			<ul class="breadcrumb">
				<li><a href="{{ url('dashboard') }}"> Dashboard </a> </li>
				<li><a href="{{ url('profile') }}"> Profile </a></li>
				<li class="active"> Profile Settings </li>
			</ul>
		</div>
	</div>

	<div class="row margin-t1">

		<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 margin-t1 ">

			@include('partials.flash_message')
			@include('partials.validate')

		</div>

	</div>

	<div class="row margin-t1">

		<div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 ">
			<div class="blog blog-info">
				<div class="blog-header"> <h5 class="blog-title"> Edit Profile </h5> </div>
				<div class="blog-body">

					<div class="col-lg-12 col-md-12">		
						<form class="form" action="{{url('profile/update', $user->id)}}" method="post" accept-charset="utf-8">

							{{csrf_field()}}

							<input type="hidden" name="_method" value="PUT">

							<div class="form-group">
								<label class="control-label">LastName</label>
								<input type="text" name="lastname" value="{{$user->lastname or old('lastname')}}" placeholder="" class="form-control">
							</div>

							<div class="form-group">
								<label class="control-label">FirstName</label>
								<input type="text" name="firstname" value="{{$user->firstname or old('firstname')}}" placeholder="" class="form-control">
							</div>

							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" name="username" value="{{$user->username or old('username')}}" placeholder="" class="form-control">
							</div>

							

							<div class="form-group">
								<button type="submit" class="btn btn-info"> Update Profile</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>


		<div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 ">
			<div class="blog blog-success">
				<div class="blog-header"> <h5 class="blog-title"> Edit Password </h5> </div>
				<div class="blog-body">

					<div class="col-lg-12 col-md-12">
		
						<form class="form" action="{{url('profile/password', [$user->id])}}" method="post" accept-charset="utf-8">

							{{csrf_field()}}

							<input type="hidden" name="_method" value="PUT">

							<div class="form-group">
								<label class="control-label"> Old Password</label>
								<input type="password" name="old_password" placeholder="***" value="" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label"> New Password</label>
								<input type="password" name="password" placeholder="" value="" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label"> Confirm Password</label>
								<input type="password" name="password_confirmation" placeholder="" class="form-control">
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-success"> Update Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>

	</div>

@endsection

