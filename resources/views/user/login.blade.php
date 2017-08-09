<!DOCTYPE html>
@extends('layouts.master')
<html>
<head><!DOCTYPE html>
<html>
<head>
	<title>SignIn</title>
	<style type="text/css">
		.box {
			box-sizing: border-box;
			display: flex;
			justify-content: center;
			align-content: center;
 			border: 2px solid lightgrey;
			border-radius: 4px;
			width: 55%!important;
			height: 400px;
		}
		.admin {
			margin-top: 40px;
			margin-bottom: 40px;
		}
	</style>
</head>
<body>
@section('contents')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" style="display: flex; justify-content: center; align-items: center; align-content: center;">
	<div class="box">
	<div class="form">
	@if(count($errors)> 0)
		<div class="alert-danger" style="margin-top: 20px">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	@if(\Session::has('login'))
	<div class="alert-info col-md-12" style="margin-top: 10px;">
		<strong> {{ \Session::get('login') }} </strong>
	</div>
	@endif
		<h3 class="admin">Sign In</h3>
<!-- 		<h4>SignUp</h4>
 -->		<form action="" method="post" action="{{ 'user.signin' }}">
			<div class="form-group">
				<label for="email">E-Mail</label>
				<input type="text" name="email" id="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">SignIn</button>
			{{ csrf_field() }}
		</form><br>
		<p>Don't have an account <a href="{{ route('user.signup') }}">Sign-up</a></p>
		</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
@endsection
</body>
</html>
	