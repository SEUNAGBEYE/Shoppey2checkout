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
			  <input name="token" type="hidden" value="" />
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
	

		
<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

<script type="text/javascript">

    // Called when token created successfully.
  var successCallback = function(data) {
    var myForm = document.getElementById('checkout-form');

    // Set the token as the value for the token input
    myForm.token.value = data.response.token.token;

    // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
    myForm.submit();
  };

  // Called when token creation fails.
  var errorCallback = function(data) {
    if (data.errorCode === 200) {
      // This error code indicates that the ajax call failed. We recommend that you retry the token request.
      tokenRequest();
    } else {
      alert(data.errorMsg);
    }
  };

  var tokenRequest = function() {
    // Setup token request arguments
    var args = {
  	sellerId: "901355178",
  	publishableKey: "392AECE2-52DC-43F6-9C3D-4F53CAF5CCC7",
    ccNo: $("#card-number").val(),
    cvv: $("#card-cvc").val(),
    expMonth: $("#card-expiry-month").val(),
    expYear: $("#card-expiry-year").val()
    };


    // Make the token request
    TCO.requestToken(successCallback, errorCallback, args);
  };

  $(function() {
    // Pull in the public encryption key for our environment
    TCO.loadPubKey('sandbox');

    $("#checkout-form").submit(function(e) {
      // Call our token request function
      tokenRequest();

      // Prevent form from submitting
      return false;
    });
  });



</script>


@endsection
 </body>
</html>