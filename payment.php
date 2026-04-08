<?php
session_start();

// Razorpay API किज
$key_id = "rzp_test_VIdto8Snwz94lt"; // Razorpay Test Key ID
$key_secret = "kzLTPSLqNr2tBGKztA9GgjaV"; // Razorpay Test Secret Key

// Razorpay ऑर्डर तयार करण्याची फंक्शन
function createRazorpayOrder($amount) {
    global $key_id, $key_secret;

    $auth = base64_encode($key_id . ':' . $key_secret);
    $data = [
        'amount' => $amount * 100, // पैसे रुपये मध्ये (रुपये * 100)
        'currency' => 'INR',
        'receipt' => 'rcpt_' . time(),
        'payment_capture' => 1
    ];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Basic ' . $auth,
            'Content-Type: application/json'
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        return ['error' => true, 'message' => $err];
    } else {
        return json_decode($response, true);
    }
}

// मुख्य लॉजिक
$orderData = null;
$paymentError = null;
$amount = 100; // तुमची टेस्ट रक्कम (₹100)

if (isset($_POST['submit'])) {
    // Razorpay ऑर्डर तयार करा
    $orderData = createRazorpayOrder($amount);
    if (isset($orderData['error']) && $orderData['error']) {
        $paymentError = "Razorpay ऑर्डर तयार करताना त्रुटी: " . $orderData['message'];
    } else {
        $_SESSION['razorpay_order_id'] = $orderData['id'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        /* Basic styling for the page */
        body { font-family: Arial, sans-serif; }
        .payment-container { margin: 50px auto; padding: 20px; background-color: #fff; max-width: 600px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; }
        .btn { padding: 10px 20px; background-color: #008CBA; color: white; border: none; border-radius: 4px; cursor: pointer; text-align: center; display: block; width: 100%; }
        .btn:hover { background-color: #006f8c; }
    </style>
</head>
<body>

<div class="payment-container">
    <h1>Payment Page</h1>

    <?php if ($paymentError): ?>


        
        <p style="color: red;"><?php echo $paymentError; ?></p>
    <?php endif; ?>

    <p>Amount: ₹<?php echo $amount; ?></p>

    <!-- Payment Button -->
    <form action="payment.php" method="POST">
        <button class="btn" type="submit" name="submit">Pay Now</button>
    </form>

    <!-- Razorpay Script -->
    <?php if ($orderData && isset($orderData['id'])): ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "<?php echo $key_id; ?>", // तुमची Test Key ID
                "amount": "<?php echo $amount * 100; ?>", // पैसे रुपये मध्ये (रुपये * 100)
                "currency": "INR",
                "name": "Phono Shop",
                "description": "Test Payment",
                "image": "https://example.com/logo.png", // तुमचा लोगो इथे
                "order_id": "<?php echo $orderData['id']; ?>",
                "handler": function(response) {
                    alert("Payment Successful! Payment ID: " + response.razorpay_payment_id);
                },
                "prefill": {
                    "name": "Customer Name", // ग्राहकाचे नाव इथे
                    "email": "customer@example.com", // ग्राहकाचे ईमेल इथे
                    "contact": "9876543210" // ग्राहकाचा फोन नंबर इथे
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function(response) {
                alert("Payment Failed! Error: " + response.error.description);
            });
            rzp1.open();
        </script>
    <?php endif; ?>
</div>

</body>
</html>
