<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("header.php");


if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    die("Invalid request.");
}

if (isset($_POST['submit'])) {
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($new_password === $confirm_password) {
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

        $sql = "SELECT * FROM signup WHERE reset_token='$token'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE signup SET password='$hashed_password', reset_token=NULL WHERE reset_token='$token'";
            mysqli_query($conn, $sql);

            echo "<script>alert('Password has been reset successfully.')</script>";
            echo "<script> location.href='login.php'; </script>";
        } else {
            echo "<script>alert('Invalid token.')</script>";
        }

        $conn->close();
    } else {
        echo "<script>alert('Passwords do not match.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .reset-password-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin-left: 35%;
            margin-top: 99px;
        }

        .reset-password-form h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .reset-password-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .reset-password-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .reset-password-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="login.php" method="POST" class="reset-password-form">
        <h3>Reset Password</h3>
        <input type="password" name="new_password" placeholder="Enter new password" required>
        <input type="password" name="confirm_password" placeholder="Confirm new password" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>

<?php
include("footer.php");
?>