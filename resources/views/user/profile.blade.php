<!DOCTYPE html>
@extends('layouts.master')
<html>
<head><!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	
</head>
<body>
@section('contents')
<div class="row">
	<div class="col-8 col-md-offset-2">
		<h1>User Profile</h1>
		<hr>
		<h2>My Orders</h2>
		@foreach($orders as $order)
			<div class="panel panel-default">
		  		<div class="panel-body">
		    		<!-- List group -->
		  			<ul class="list-group">
		  				@foreach($order->cart->itemsName as $item)
			    			<li class="list-group-item">
			    				<span class="badge">{{ $item['eachprice'] }} </span>
			    				{{ $item['item']}} | {{ $item['quantity'] }} Units
			    			</li>
		    			@endforeach
		    
		  			</ul>
		  		</div>
		  	<div class="panel-footer">Total: {{ $order->cart->totalPrice }}</div>
		  	<button class="btn btn-danger">Clear Order</button>
		  	<hr>
		 @endforeach
  	</div>
</div>
@endsection
</body>
</html>
	