<!DOCTYPE html>
@extends('layouts.master')
<html>
<head>
	<title>Checkout</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<style>
 		#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
 	</style>
</head>
<body>
@section('contents')
 	<div class="col-md-6">
		<h1>Checkout</h1>
		<h4>Your Total: {{ $total }}</h4>
		<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
			{{ Session::get('error') }}
		</div>
		<form action="{{ route('checkout') }}" method="post" id="checkout-form">
			{{ csrf_field() }}
			  <input name="token" type="hidden" value=""/>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" class="form-control" required>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" id="address" class="form-control" required name="address">	
					</div>
				</div>

				<div class="col-xs-6">
					<div class="form-group">
						<label for="card-name">Card Holder Name</label>
						<input type="text" id="card-name" class="form-control" required>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="form-group">
						<label for="card-number">Credit Card Number</label>
						<input type="text" id="card-number" class="form-control" required>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="form-group">
						<div class="col-xs-6">
							<label for="card-expiry-month">Expririon Month</label>
							<input type="text" id="card-expiry-month" class="form-control" required>
						</div>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="form-group">
						<div class="col-xs-6">
							<label for="card-expiry-year">Expririon Year</label>
							<input type="text" id="card-expiry-year" class="form-control" required>
						</div>
					</div>
				</div><br>

				<div class="col-xs-6">
					<div class="form-group">
						<div class="col-xs-6">
							<label for="card-cvc">CVC</label>
							<input type="text" id="card-cvc" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
			
			<br>
			<button type="submit" class="btn btn-success">Buy now</button>
		</form>
	</div>
	

		<script src="{{ asset('/js/2co.js') }}"></script>
 			<script type="text/javascript"> 
			    $(document).ready(function() { 
			 
			        $('#button').click(function() { 
			            $('div.test').block({ message: null }); 
			        }); 
			 
			        $('#button2').click(function() { 
			            $('div.test').block({ 
			                message: '<h1>Processing</h1>', 
			                css: { border: '3px solid #a00' } 
			            }); 
			        });
			    }); 
			 
			       
			</script>
<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
@endsection
 </body>
</html>