<!DOCTYPE html>
@extends('layouts.master')
<html>
<head><!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<style type="text/css">
		.box {
			box-sizing: border-box;
			display: flex;
			justify-content: center;
			align-content: center;
 			border: 2px solid lightgrey!important;
			border-radius: 4px;
			width: 55%!important;
			height: 400px;
		}
		.admin {
			/*margin-top: 40px;*/
			/*margin-bottom: 40px;*/
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
	
		<h3 class="admin">Administrator Sign Up</h3>
<!-- 		<h4>SignUp</h4>
 -->		<form action="" method="post" action="{{ route('addAdmin') }}">
			<div class="form-group">
				<label for="email">E-Mail</label>
				<input type="text" name="email" id="email" class="form-control">
			</div>

			<div class="form-group">
				<input type="hidden" value="2" name="role_id" id="role_id" class="form-control">
				<input type="hidden" name="status_id" id="status_id" value="1" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>

			<div class="form-group">

				<label for="password_confirmation">Confirm Password</label>
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="confirm_password" id="confirm_password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Signup</button>
			{{ csrf_field() }}
		</form><br>
		</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
@endsection
</body>
</html>
	