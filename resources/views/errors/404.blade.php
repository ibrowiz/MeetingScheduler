<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from jesus.gallery/everest/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:45:11 GMT -->
	<head>
		
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Telvida Meeting Room">
	    <meta name="author" content="Adeyinka Abiodun">
	    <meta name="keywords" content="Meeting, Meeting Room, Telvida ">
	    
	    <title> Telvida - Meeting </title>

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}" >

	    <!-- Font Awesome CSS -->
	    <link rel="stylesheet" href="{{URL::to('css/font-awesome.min.css') }}">

	    <!-- Main CSS -->
	    <link href="{{ URL::to('css/main.css') }}" rel="stylesheet" media="screen">	

		<link href="{{ asset('css/error.css') }}" rel="stylesheet" media="screen">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>  

	<body>

		<div id="page-wrapper">
			<div class="error center-align-text">
				<h1 class="error-heading">404<i>!</i></h1>
				<h2 class="text-danger">Oops</h2>
				<h3>Page not found!</h3>
				
				<a href="{{ url('/') }}" class="btn btn-success">Back to Home</a>
			</div>       
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{URL::to('js/jquery-3.1.1.js') }}"></script>

	    <script src="{{URL::to('js/bootstrap.min.js') }}"></script>

		
	</body>

<!-- Mirrored from jesus.gallery/everest/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:45:11 GMT -->
</html>