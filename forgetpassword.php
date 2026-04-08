<?php
include("header.php");

if (isset($_POST['submit'])) {
    $email = $_POST["email"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phone.com";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50));
        $sql = "UPDATE signup SET reset_token='$token' WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
            // Send reset link via email
            $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
            $subject = "Password Reset";
            $message = "Click the link to reset your password: $resetLink";
            $headers = "From: noreply@yourwebsite.com";

            if (mail($email, $subject, $message, $headers)) {
                echo "<script>alert('Password reset link has been sent to your email.')</script>";
                echo "<script> location.href='resetpassword.php'; </script>";
            } else {
                echo "<script>alert('Failed to send email.')</script>";
            }
        } else {
            echo "<script>alert('Failed to update database.')</script>";
        }
    } else {
        echo "<script>alert('Email not found.')</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
           
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .forgot-password-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin: auto;
        }

        .forgot-password-form h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .forgot-password-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .forgot-password-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .forgot-password-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="resetpassword.php" method="POST" class="forgot-password-form">
        <h3>Forgot Password</h3>
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" name="submit">Send Reset Link</button>
    </form>
</body>
</html>

<?php
include("footer1.php");
?>