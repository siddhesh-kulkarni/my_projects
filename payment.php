<?php
include('inc/header copy.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Payment Details</h5>
        </div>
        <div class="card-body">
          <form id="paymentForm">
            <div class="mb-3">
              <label for="cardNumber" class="form-label">Card Number</label>
              <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9101 1121" required>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="expiryDate" class="form-label">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="123" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="cardHolder" class="form-label">Cardholder Name</label>
              <input type="text" class="form-control" id="cardHolder" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
              <label for="upiId" class="form-label">UPI ID</label>
              <input type="text" class="form-control" id="upiId" placeholder="example@upi">
          </div>
          
            <div class="text-end">
              <button type="submit" class="btn btn-primary">Pay Now</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- Bootstrap JS (optional) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- <script>
  document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    
    // Validate form inputs
    var cardNumber = document.getElementById('cardNumber').value.trim();
    var expiryDate = document.getElementById('expiryDate').value.trim();
    var cvv = document.getElementById('cvv').value.trim();
    var cardHolder = document.getElementById('cardHolder').value.trim();
    
    if (cardNumber === '' || expiryDate === '' || cvv === '' || cardHolder === '') {
      alert('Please fill in all fields');
      return;
    }
    
    // Assuming basic validation for card number, expiry date, and CVV
    if (!isValidCardNumber(cardNumber)) {
      alert('Please enter a valid card number');
      return;
    }
    if (!isValidExpiryDate(expiryDate)) {
      alert('Please enter a valid expiry date in the format MM/YY');
      return;
    }
    if (!isValidCVV(cvv)) {
      alert('Please enter a valid CVV');
      return;
    }
    
    // Payment processing logic goes here
    
    alert('Payment successful!');
    // You can redirect to a success page or perform any other action after successful payment
    
    // Reset the form after successful submission
    document.getElementById('paymentForm').reset();
  });

  // Function to validate card number (can be extended for more detailed validation)
  function isValidCardNumber(cardNumber) {
    // Here you can add more detailed validation rules if required
    return /^\d{16}$/.test(cardNumber);
  }

  // Function to validate expiry date (can be extended for more detailed validation)
  function isValidExpiryDate(expiryDate) {
    // Here you can add more detailed validation rules if required
    return /^\d{2}\/\d{2}$/.test(expiryDate);
  }

  // Function to validate CVV (can be extended for more detailed validation)
  function isValidCVV(cvv) {
    // Here you can add more detailed validation rules if required
    return /^\d{3}$/.test(cvv);
  }
</script> -->

</body>
</html>
<!-- Add Paytm button -->
<div id="paytmButton"></div>

<!-- Include Paytm script -->
<script src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/MID.js"></script>

<script>
    // Function to initialize Paytm button
    function initPaytmButton() {
        const paytmButton = document.getElementById('paytmButton');

        // Configuration for Paytm button
        const config = {
            root: '',
            flow: 'DEFAULT',
            data: {
                orderId: 'YOUR_ORDER_ID',
                token: 'YOUR_GENERATED_PAYTM_TOKEN',
                tokenType: 'TXN_TOKEN',
                amount: 'AMOUNT',
                currency: 'INR',
            },
            handler: {
                transactionStatus: function (data) {
                    // Handle transaction status
                    alert('Transaction Status: ' + data.response.RESPMSG);
                },
            },
        };

        // Render Paytm button
        paytm.Checkout.configure(config);
    }

    // Initialize Paytm button
    initPaytmButton();
</script>
