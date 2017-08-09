<!DOCTYPE html>
@extends('layouts.master')
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
			/*margin-bottom: 40px*/;
		}
		#img{
			position: absolute;
			left: 35%;
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
		<h3 class="admin">Administrator Sign In</h3>
			<div style="position: relative; height: 80px;">
				<img id="img" src="https://us.123rf.com/450wm/sai0112/sai01121202/sai0112120200007/12730353-metal-padlock-on-white-background.jpg?ver=6" width="50px">
			</div>
 		<form action="" method="post" action="{{ 'adminLogin' }}">
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
		</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>
@endsection
</body>
</html>
	