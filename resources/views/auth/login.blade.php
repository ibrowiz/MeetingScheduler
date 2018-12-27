@extends('layouts.guest')

@section('extra-css')
    
        <!-- Login CSS -->
    <link href="{{ URL::to('css/login.css')}}" rel="stylesheet" media="screen">

    <style type="text/css">
        body{
            background: url("{{ asset('/images/login-body-bg.jpg') }}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            /*background: #2F4050;*/
            background: #3D5672;
            width: 100%;
        }

    </style>

@endsection

@section('content')

    <div class="row">
            <h3 style=" text-align: center; margin: 0px;color: #e6e6e6; font-size: 180px; font-weight: 800; letter-spacing: -10px; line-height: 60px;">Welcome</h3>

        <div class="col-md-push-4 col-md-4 col-sm-push-3 col-sm-6 col-sx-12">
            <!-- Header end -->
            <div class="login-container">
                <div class="login-wrapper animated flipInY">
                    <div id="login" class="show">
                        <div class="login-header">
                            <h4 style="color: #D66061;">Sign In To Your Account</h4>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                        
                            {{ csrf_field() }}

                            <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="userName" class=" control-label">User Name</label>

                                <input type="text" class="form-control" id="userName" placeholder="User Name"  name="username" value="{{ old('username') }}" required autofocus>
                                <i class="fa fa-user text-info form-control-feedback"></i>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                         
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label" for="passWord">Password</label>

                                <input type="password" class="form-control" id="passWord" placeholder="*********" name="password" required >
                                <i class="fa fa-key text-danger form-control-feedback"></i>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            

                            <input type="submit" value="Login" class="btn btn-danger btn-lg btn-block">
                        </form>
                        <a href="{{ route('password.request') }}" class="underline text-info">Forgot Password?</a>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

