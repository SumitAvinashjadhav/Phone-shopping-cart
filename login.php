<?php
include("header.php");

//session_start(); // Make sure session_start() is called

$loggedIn = isset($_SESSION['username']) ? true : false;
$username = $loggedIn ? $_SESSION['username'] : '';


if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $passwordd = $_POST["password"];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "phone.com";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Admin login check
    if ($email == "sumit123@gmail.com" && $passwordd == "1292") 
    {
        $_SESSION['admin_username'] = $email;
        
        echo "<script>alert('Admin Login Successfully..')</script>";
        echo "<script> location.href='adminpanel.php'; </script>";

    } else
     {
        // User login check
        $sql = "SELECT * FROM signup WHERE email='$email' AND password='$passwordd'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['username'] = $row['fname'];
            }
            echo "<script>alert('Login Successfully..')</script>";
            echo "<script> location.href='phono.php'; </script>";
        } else {
            $error_message = 'Incorrect email or password.';
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-form {
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

        #loginh1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .emailnameDiv-login {
            margin-bottom: 20px;
        }

        .emailnameDiv-login label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
            text-align: left;
        }

        .emailnameDiv-login input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        #login-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        #login-button:hover {
            background-color: #0056b3;
        }

        .forgetDiv {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .forgetDiv a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .forgetDiv a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="POST" class="login-form">
        <div class="login-inputDiv">
            <h3 id="loginh1">LOGIN</h3>
            <div class="emailnameDiv-login">
                
                <label id="emailstyle-login" for="email">Email</label>
                <input id="emailinput-login" type="text" name="email" placeholder="Enter a valid Email Address">
                <label id="namestyle-login" for="password">Password</label>
                <input id="emailinput3-login" type="password" name="password" placeholder="Enter Your Password">
            </div>
            <button id="login-button" type="submit" name="submit">Sign In</button>
            <div class="forgetDiv">
                <a href="forgetpassword.php" id="f1">Forgot your password?</a>
                <a href="signup.php" id="f2">Create account</a>
            </div>
        </div>
    </form>
</body>
</html>

<?php
include("footer1.php");
?>