<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.confirmation-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    text-align: center;
}

.image-container {
    margin-bottom: 20px;
}

.confirmation-image {
    max-width: 32%;
    height: auto;
}

.message-box {
    margin: 20px 0;
}

.success-heading {
    color: #28a745;
    font-size: 36px;
    margin: 0;
}

.order-message {
    color: #333;
    font-size: 24px;
    margin: 10px 0;
}

.thank-you-message {
    color: #333;
    font-size: 22px;
    margin: 10px 0;
}

.form-btn {
    margin-top: 20px;
}

.btn-primary {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .confirmation-container {
        padding: 15px;
    }

    .success-heading {
        font-size: 28px;
    }

    .order-message {
        font-size: 20px;
    }

    .thank-you-message {
        font-size: 18px;
    }

    .btn-primary {
        padding: 10px 20px;
        font-size: 14px;
    }
}
    </style>
</head>
<body>
        
   
<!-- <form action="phono.php" method="post">
    <center><img src="icon/pay_done.gif" alt="img" height="50%" width="50%"/></center>
    <div style="max-width: 554px; margin: 16px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px;">
        <h1 style="text-align: center; color: green;font-size:35px">Payment Done Successfully!!!</h1>
        <h1 style="text-align: center; color: black;font-size:22px">Your order was completed successfully!!</h1>
        <h1 style="text-align: center; color: black;font-size:21px">Thank you visit again!!!!!</h1>
    </div>
            <div class="form-btn text-center">
                        <button id="rzp-button1" type="submit" class="btn btn-primary">Back to Homepage</button>
            </div>
      

 </form> -->

 <div class="confirmation-container">
        <form action="phono.php" method="post">
            <div class="image-container">
                <img src="image/successful.png" alt="Payment Done" class="confirmation-image"/>
            </div>
            <div class="message-box">
                <h1 class="success-heading">Payment Done Successfully!!!</h1>
                <h2 class="order-message">Your order was completed successfully!!</h2>
                <h3 class="thank-you-message">Thank you, visit again!!!!!</h3>
            </div>
            <div class="form-btn">
                <button type="submit" class="btn btn-primary">Back to Homepage</button>
            </div>
        </form>
    </div>
    
</body>
</html>

<?php
include("footer1.php");
?>