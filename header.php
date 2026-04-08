<?php
session_start();
$loggedIn=isset($_SESSION['username'])? true:false;
$username=$loggedIn ? $_SESSION['username']:'';

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
$sql = "SELECT SUM(quantity) AS total_quantity
        FROM cart
        WHERE username = ?";

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var isLoggedIn = <?php echo json_encode($loggedIn); ?>;
            var username = <?php echo json_encode($username); ?>;
            
            if (isLoggedIn) {
                $('.login-status').html('<a  class="buy" href="logout.php">LogOut  </a> <br> ');
            } else {
                $('.login-status').html('<a  class="buy" href="login.php">Login</a>');
            }

             // Dropdown functionality
             $(".dropdown").hover(function() {
                $(this).find(".dropdown-content").toggleClass("show");
            });
        });
    </script>
<style>
   
</style>
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            /* min-width: 160px; */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            width: 20%;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        li {
            text-transform: uppercase;
        }
        .userimage12{
            width: 25%;
            margin-left: 48px;
            margin-top: -9px;
        }
        .buy{
            padding: 9px 29px;
            border: none;
            font-family: sans-serif;
            font-weight: 700;
            background-color: black;;
            margin-left: 214px;
            margin-top: 16px;
            color:white;
        }
        .cart {
            position: absolute;
            top: -18px;
            right: 49px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            width: 20px;
            height: 20px;
            line-height: 20px;
            }

    </style>
</head>
<body>
    <div class="main-container">
            <div class="blackfirstDiv">
                <label>Long Weekend Sale Up to 50% OFF Shop Now</label>

                <div class="uname">
                <img style=" width: 27%;margin-left: -28px;margin-top: -5px;" src="image/icons8-user-96.png">
               <?php echo "$username"; ?>                 </div>
            </div>
            <div class="second-container">
                <div class="image-div">
                    <img src="image/logo.png">
                </div>
                <nav>
                
                    <ul >
                        <li class="hideOnMobile"><a href="phono.php">Home</a></li>
                        <li class="hideOnMobile"><a href="product.php">AllProducts</a></li>
                        <li class="hideOnMobile dropdown"><a href="#">Collection</a>
                            <ul class="dropdown-content">
                                <li><a href="smartphones.php">Smartphones</a></li>
                                <li><a href="tablets.php">Tablets</a></li>
                                <li><a href="iphones.php">Apple</a></li>
                                <li><a href="accessories.php">Accessories</a></li>
                                <li><a href="OnePlus.php">OnePlus</a></li>
                                <li><a href="Realme.php">Realme</a></li>
                                <li><a href="Vivo.php">Vivo</a></li>
                                <li><a href="Nokia.php">Nokia</a></li>
                                <li><a href="OPPO.php">OPPO</a></li>
                                <li><a href="Xiaomi.php">Xiaomi</a></li>
                                <li><a href="Motorola.php">Motorola</a></li>
                                <li><a href="Samsung.php">Samsung</a></li>
                                <li><a href="Asus.php">Asus</a></li>
                                <li><a href="Lenovo.php">Lenovo</a></li>
                                <li><a href="SONY.php">SONY</a></li>
                                
                            </ul>
                        </li>
                        <li class="hideOnMobile"><a href="contact.php">ContactUs</a></li>
                        <li class="hideOnMobile"><a href="about.php">AboutUs</a></li>
                        
                        
                        <li >
                             <div class="cart-icon">
                                <a href="addtocart.php"><img class="userimage12" alt="s" src="image/shopping.png"></a>  
                                <span class="cart"><?php echo $total_quantity ? $total_quantity : 0; ?></span>
                            </div>
                                  
                        </li>
                        <!-- <a href="addtocart.php"><img class="userimage1" alt="s" src="image/shopping.png"></a> -->

                    </ul>
                </nav>
                
                    
                    <!-- <div class="loginDiv1">
                        <a href="login.php"><button  id="loginbuttonfirst1">Login</button></a>
                    </div> -->
                <div class="yellowDiv">
                     
                    <div class=" ">
                        <li class="login-status"></li>    
                     </div>
                </div>

            </div>
    </div>

</body>
</html>