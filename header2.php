<?php
session_start();
$loggedIn = isset($_SESSION['username']) ? true : false;
$username = $loggedIn ? $_SESSION['username'] : '';

$servername = "localhost";
$username1 = "root";
$password = "";
$dbname = "phone.com";

// Create connection
$conn = new mysqli($servername, $username1, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SUM(quantity) AS total_quantity FROM cart WHERE username = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $username); // Bind username
    $stmt->execute();
    $stmt->bind_result($total_quantity); // Bind the result to a variable
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var isLoggedIn = <?php echo json_encode($loggedIn); ?>;
            var username = <?php echo json_encode($username); ?>;
            
            if (isLoggedIn) {
                $('.login-status').html('<a class="buy" href="logout.php">Log Out</a> <br>');
            } else {
                $('.login-status').html('<a class="buy" href="login.php">Login</a>');
            }
        });
    </script>
    <style>
        .username {
            font-weight: bold;
            color: black;
            margin-left: 14px;
            font-style: oblique;
        }
        .buy {
            background: black;
            padding: 7px 41px !important;
            margin-top: 18px;
            border-radius: 5px;
            display: inline-block;
            float: right;
            list-style: none;
            color: white;
            margin-left: 30px;
        }
        .buy:hover {
            color: #fff;
        }
        .login-status {
            list-style: none;
        }
        .uname {
            margin-left: 95%;
            margin-top: -20px;
        }
        * {
            margin: 0;
            padding: 0;
        }
        .blackfirstDiv {
            /* height: 6%; */
            background-color: black;
            color: white;
            text-align: center;
            font-size: 19px;
            padding: 17px;
        }
        .first-heading {
            color: white;
            font-family: sans-serif;
            font-weight: 600;
            margin-left: 34%;
            background-color: black;
            padding: 20px;
            width: 100%;
        }
        .second-container {
            width: 100%;
            background-color: white;
            display: flex;
        }
        .image-div {
            width: 9%;
            padding: 22px;
            margin-left: 47px;
        }
        nav {
            margin-left: 43px;
            margin-top: 30px;
        }
        nav ul {
            display: flex;
            list-style: none;
            width: 111%;
            font-weight: 700;
            font-size: 20px;
        }
        li {
            margin-left: 50px;
            font-size: 16px;
            font-family: sans-serif;
        }
        li a {
            text-decoration: none;
            color: black;
        }
        li a:hover {
            color: red;
        }
        .login-div {
            width: 10%;
            padding: 20px;
            margin-left: -46px;
        }
        .login-img {
            width: 25px;
        }
        .userimage1 {
            width: 13%;
            margin-left: 100px;
            margin-top: -9px;
        }
        #loginbuttonfirst {
            padding: 9px 29px;
            border: 1px solid black;
            font-family: sans-serif;
            font-weight: 700;
            background-color: white;
        }
        #loginbuttonfirst:hover {
            background-color: black;
            color: white;
            cursor: pointer;
        }
        .loginDiv {
            margin-left: 217px;
            margin-top: -34px;
        }
        .quantity-badge {
            position: fixed;
            top: 57px;
            right: 142px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            width: 10px;
            height: 17px;
            line-height: 20px;
        }
    </style>
</head>
<body>
    <div class="blackfirstDiv">
        <label>Long Weekend Sale Up to 50% OFF Shop Now</label>
        <div class="uname"><?php echo htmlspecialchars($username); ?></div>
    </div>
    <div class="second-container">
        <div class="image-div">
            <img src="image/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li class="hideOnMobile"><a href="phono.php">Home</a></li>
                <li class="hideOnMobile"><a href="product.php">Collection</a></li>
                <li class="hideOnMobile"><a href="#">Shop</a></li>
                <li class="hideOnMobile"><a href="#">Android</a></li>
                <li class="hideOnMobile"><a href="#">Accessories</a></li>
                <li class="hideOnMobile"><a href="contact.php">Contact Us</a></li>
                <li class="hideOnMobile"><a href="#">Pages</a></li>
                <li>
                    <div class="cart-icon">
                        <a href="addtocart.php"><img class="userimage1" alt="Cart" src="image/shopping.png"></a>  
                        <span class="quantity-badge"><?php echo $total_quantity ? $total_quantity : 0; ?></span>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="login-status"></div>
    </div>
</body>
</html>