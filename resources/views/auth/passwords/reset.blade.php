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
            background: #3D5672;
            width: 100%;
        }

    </style>

@endsection

@section('content')


    <div class="row">
        <div class="col-md-push-4 col-md-4 col-sm-push-3 col-sm-6 col-sx-12">
            
            <!-- Header end -->
            <div class="login-container">
                <div class="login-wrapper animated flipInY">
                    <div id="login" class="show">
                        <div class="login-header">
                            <h4 style="color: #D66061;"> Reset Pasword </h4>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.request') }}">
                        
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">


                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">E-mail Address </label>

                                <input type="text" class="form-control" id="email" placeholder="Email"  name="email" value="{{ $email or old('email') }}" required autofocus>
                                <i class="fa fa-user text-info form-control-feedback"></i>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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

                            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class=" control-label">Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" placeholder="*********" name="password_confirmation" required>
                                <i class="fa fa-key text-danger form-control-feedback"></i>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                           
                            </div>


                            

                            <input type="submit" value="Reset Pasword" class="btn btn-danger btn-lg btn-block">
                        </form>
                        <a href="{{ route('login') }}" class="underline text-info"> Return To Login Page </a>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
