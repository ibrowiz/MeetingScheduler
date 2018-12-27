@extends('layouts.master')

@section('page-title')

	Profile &#187; {{ $user->lastname ." " . $user->firstname }}
	
@endsection

@section('content')

	<div class="row">
		<div class="container-fluid margin-t2">
			<ol class="breadcrumb">
				<li><a href="{{ url('dashboard') }}"> Dashboard </a></li>
				<li><a href="{{ url('user') }}"> Users </a></li>
				<li class="active"> Profile </li>
			</ol>
		</div>
	</div>

	<!-- Row start -->
	<div class="row">
		<div class="col-md-12 col-sm-12 col-sx-12">
			<div class="current-profile">
				<div class="user-bg" style="background-image: url({{URL::to('images/profile-bg.jpg')}}); background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"> </div>

				<div class="user-pic img" style="background-image: url({{URL::to($user->avatar())}}); background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">  </div>

				<div class="user-details" style="background: rgba(0,0,0,0.3); margin-left: 5px; margin-right: 5px;">
					<h4 class="user-name"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $user->lastname ." " . $user->firstname }} <i>!</i>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 	  
					@if(Auth::user()->id == $user->id) <a class="btn-link text-white" href="{{url('profile/edit')}}"> ... <span class="fa fa-pencil fa-1x text-white"></span></a> @endif  </h4>
					
				</div>

			
			</div>
		</div>
	</div>
	<!-- Row end -->


	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

			<div class="blog blog-danger">
				<div class="blog-header"> <h5 class="blog-title" > Profile Detail  
				
				</div>
				<div class="blog-body " style="padding: 0">

					

					<div class="row" style="background: rgba(0,0,0,0.3); border-top: 2px solid rgba(0,0,0,0.2); color: white; padding: 15px;" >

						<div class="col-md-4 center-align-text ">
							
							<small class="text-uppercase">User Name</small>

							<h4>{{ $user->username }}</h4>

						</div>


					</div>

					<div class="row" style="background: rgba(0,0,0,0.3); border-top: 2px solid rgba(0,0,0,0.2); color: white; padding: 15px;" >

						<div class="col-md-4 center-align-text ">
							
							<small class="text-uppercase">Email Address </small>

							<h4>{{ $user->email }}</h4>

						</div>


						<div class="col-md-3 center-align-text ">
							
							<small class="text-uppercase">  Mobile </small>

							<h4>{{ $user->profile->phone }}</h4>

						</div>



						<div class="col-md-2 center-align-text ">
							
							<small class="text-uppercase">  Gender </small>

							<h4>{{ $user->profile->gender }}</h4>

						</div>


					</div>


				</div>
			</div>

		</div>

		

	</div>

@endsection