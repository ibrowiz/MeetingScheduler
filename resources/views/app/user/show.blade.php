@extends('layouts.master')

@section('page-title')

    User

@endsection

@section('content')

	<div class="row">
		<div class="col-md-12 margin-t2">
			<ol class="breadcrumb">
                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
				<li><a href="{{url('user')}}">Users</a></li>
				<li class="active">Show</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-xs-12 ">

			@include('partials.flash_message')
			@include('partials.validate')

		</div>

		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 margin-t2">

			<div class="blog blog-info" >

				<div class="blog-header"> <h5 class="blog-title"> User Info </h5> </div>

				<div class="blog-body">
					<div class="table-responsive">	
						<table class="table table-striped ">
							<tbody>
								<tr>
									<td>Firstname</td>
									<td colspan="2">{{$user->firstname}}</td>
								</tr>
								<tr>
									<td>Lastname</td>
									<td colspan="2">{{$user->lastname}}</td>
								</tr>
								<tr>
									<td>Username</td>
									<td colspan="2">{{$user->username}}</td>
								</tr>
								<tr>
									<td>Email</td>
									<td colspan="2">{{$user->email}}</td>
								</tr>
								@if($user->isAdmin == true)
								<tr>
									<td>Type of User</td>
									<td colspan="2">Admin</td>
								</tr>
								@else
								<tr>
									<td>Type of User</td>
									<td colspan="2">User</td>
								</tr>
								@endif
								<tr>
									<td>
										<a class="btn btn-info {{Auth::user()->isAdmin? "":"disabled"}}" data-toggle="modal" data-target="#editUser" href="#"><i class="fa fa-edit"></i>  Edit </a>
									</td>
									<td>
										<a class="btn btn-danger pull-right {{Auth::user()->isAdmin? "":"disabled"}}" data-toggle="modal" data-target="#deleteUser" href="#"><i class="fa fa-trash"></i>  Delete</a>
									</td>
								</tr>
							</tbody>
						</table>

					</div>
					

				</div>

			</div>
		</div>




		<div class="modal fade" id="deleteUser">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Delete Confirmation</h4>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this User Account?</p>
					</div>
					<div class="modal-footer">
						<form action="{{url('user/delete')}}" method="post" accept-charset="utf-8">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>

							{{csrf_field()}}
							<input type="hidden" name="user" value="{{ $user->id }}">
							<button type="submit" class="btn btn-success"> <i class="fa fa-trash"></i>  Proceed</button>

						</form>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


		<div class="modal fade" id="editUser">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					{{-- <form action="{{url('user/update', [$user->id])}}" method="post" accept-charset="utf-8"> --}}
					<form action="{{url('user/update', $user->id )}}" method="post" accept-charset="utf-8">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Modify User Details </h4>
						</div>

						<div class="modal-body">

							{{csrf_field()}}

							<input type="hidden" name="_method" value="PUT">



							<div class="form-group">
								<label class="control-label">first Name</label>
								<input type="text" name="firstname" value="{{$user->firstname}}" placeholder="" class="form-control">
							</div>

							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input type="text" name="lastname" value="{{$user->lastname}}" placeholder="" class="form-control">
							</div>

							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" name="username" value="{{$user->username or old('username')}}" placeholder="" class="form-control">
							</div>

							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" name="email" value="{{$user->email or old('username')}}" placeholder="" class="form-control">
							</div>

							{{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

			                    <label for="admin" class="col-md-8 control-label"> <input type="checkbox" name="isAdmin" {{$user->isAdmin?'checked':''}} /> Please check to make this user an admin</label>

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
                                        <input type="checkbox" name="role[]" {{$role->users->contains('id', $user->id) ? 'checked' :''}}  value="{{$role->id}}"> {{$role->description}}
                                    </label>
                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>  Cancel</button>


							<button type="submit" class="btn btn-success"> <i class="fa fa-trash"></i>  Proceed</button>

						</div>

					</form>
				</div><!-- /.modal-content -->

			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


	</div>

@endsection

@section('extra-css')

    <style type="text/css" media="screen">
        .main-content {
            border-top: 5px solid #e7e4ec;
            padding: 24px;
            border-radius: 5px;
        }
        canvas {
            height: 600px!important;
        }
    </style>

@endsection


@section('extra-script')

    <script type="text/javascript">
        
        $mn_list = $('#menu > ul > li.user');
        $('#menu > ul > li').removeClass('highlight active');
        $mn_list.addClass('highlight active');
        $mn_list.find('ul').css({'display': 'block'});
        $mn_list.find('ul > li:nth-child(2) > a').addClass('select');

    </script>

@endsection

