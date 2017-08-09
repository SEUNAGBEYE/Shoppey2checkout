<!DOCTYPE html>
@extends('layouts.master')
<html>
<head>
	<title>Product</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
<body>

@section('contents')
	
	@if(\Session::has('success-signup'))
		<div class="alert alert-success col-md-5">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Success!</strong> {{\Session::get('success-signup')}}
		</div><br><br><br><br>
	@endif

	@if(\Session::has('added'))
		<div class="alert alert-success col-md-5">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Success!</strong> {{\Session::get('added')}}
		</div><br><br><br><br>
	@endif

	 @if(\Session::has('message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Success!</strong> {{\Session::get('message')}}
		</div>
	@endif

	@if (Session::has('success'))
		<div class="row">
			<div>
				<div id="charge-message" class="alert alert-success">
					{{ Session::get('success') }}
					
				</div>
			</div>
		</div>
	@endif
	<div class="container">
		
		<div class="row">

			@foreach ($products as $product)
			<div class="col-md-4">
					<div class="well">
						<form method="post" action="/product/{{ $product->id }}">
						<p>{{ $product->item }}</p>

						
							{{ csrf_field() }}
							<span class="pull-right">{{ $product->price }}Naira</span>
							<input type="submit" name="" value="AddToCart" class="glyphicon glyphicon-plus btn btn-success">
						</form>
					
						<!-- bb -->
					</div>

			</div>
			@endforeach
			</div>
			<!-- End of loop -->
		
	</div>
@endsection
</body>
</html>