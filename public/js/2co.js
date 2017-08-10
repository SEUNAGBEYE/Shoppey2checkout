// Called when token created successfully.
  var successCallback = function(data) {
    var myForm = document.getElementById('checkout-form');

    // Set the token as the value for the token input
    // myForm.token.value = data.response.token.token;
    // var $token = data.response.token.token;
    // myForm.token1.value = 1;
    // view.textContent = $token;
    // console.log($token);

    $myForm.append($('<input type="hidden" name= "token" />').val(12));


    // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
    myForm.submit();
  };
  // Called when token creation fails.
  var errorCallback = function(data) {
    if (data.errorCode === 200) {
      tokenRequest();
      // This error code indicates that the ajax call failed. We recommend that you retry the token request.
    } else {
      alert(data.errorMsg);
    }
  };

  var tokenRequest = function() {
    // Setup token request arguments

    var args = {
    sellerId: "901355040",
    publishableKey: "2E460B37-5BC1-41A4-906E-2F17C0BCF986",
    ccNo: $("#card-number").val(),
    cvv: $("#card-cvc").val(),
    expMonth: $("#card-expiry-month").val(),
    expYear: $("#card-expiry-year").val()
};

// TCO.loadPubKey('sandbox', function() {
//     TCO.requestToken(successCallback, errorCallback, args);
// });​

    // Make the token request
    TCO.requestToken(successCallback(), errorCallback(), args);
  // };

  // $(function() {
  //   // Pull in the public encryption key for our environment
  //   TCO.loadPubKey('sandbox', function(){
  //     publishableKey = "2E460B37-5BC1-41A4-906E-2F17C0BCF986";
  //   });

    $.getScript('https://www.2checkout.com/checkout/api/2co.min.js', function() {
                    try {
                            // Pull in the public encryption key for our environment
                            TCO.loadPubKey('sandbox');
                        } catch(e) {
                            alert(e.toSource());
                        }
                });

    $("#checkout-form").submit(function(e) {
      // Call our token request function
      tokenRequest();

      // Prevent form from submitting
      return false;
    });
  // });