<!DOCTYPE html>
@extends('layouts.master')
<html>
<head>
 	<title>Shopping Cart</title>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
@section('contents')
	@if(Session::has('cart'))
		 <div class="row">
		 	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
		 		<ul class="list-group">
		 			@foreach ($products as $product)
		 				<li class="list-group-item">
		 					<span class="badge">{{ $product['quantity'] }}</span>
		 					<strong> {{ $product['item'] }}</strong>
		 					<span class="label label-success">{{ $product['eachprice']}}</span>
		 					<div class="btn-group">
		 						<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle = "dropdown">Action<span class="caret"></span>
		 						</button>
		 						<ul class="dropdown-menu">
		 							<li><a href="/removeItem/{{ $product['id'] }}">Reduce by 1</a></li>
		 							<li><a href="/removeAllItem">Reduce All</a></li>
		 						</ul>
		 					</div>
		 				</li>
		 			@endforeach
		 		</ul>	
		 	</div>
		</div>
		<div class="row">
		 	<div class="col-md-6">
		 		<strong>Total: {{ $totalPrice }}</strong>
		 	</div>
		</div>
		<hr>
		<div class="row">
		 	<div class="col-md-6">
		 		<button type="button" class="btn btn-success"><a href="{{ route('checkout') }}" style="text-decoration: none; color: white;">Checkout</a></button>
		 		<button type="button" class="btn btn-danger"><a href="/clearCart" style="text-decoration: none; color: white;">Clear Cart</a></button>
		 		<button type="button" class="btn btn-info"><a href="/product" style="text-decoration: none; color: white;">Continue Shopping</a></button>

		 	</div>
		</div>
		@else
			<div class="row">
		 	<div class="col-md-6">
		 		<h2>No item in Cart</h2>
		 	</div>
		</div>
		@endif


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
<script
src="http://code.jquery.com/jquery-1.12.4.min.js"
integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>