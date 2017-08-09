<!DOCTYPE html>
@extends('layouts.master')
<html>
<head>
	<title></title>
</head>
<body>
@section('contents')

@if(\Session::has('message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Success!</strong> {{\Session::get('message')}}
		</div>
@endif
<h1>It Works</h1>
@endsection
</body>
</html>