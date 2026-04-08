<?php
include("header.php");
?>

<?php
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

// Fetch data from products table
// $sql = "SELECT p_id, P_name, p_price, p_image FROM products";
$sql = "SELECT p_id, P_name, p_price, p_image, p_categories 
        FROM products 
        WHERE p_categories = 'iphones'";	

$result = $conn->query($sql);

// Handle Add to Cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $session_id = session_id();
        
        // Check if the product is already in the cart
        $sql = "SELECT quantity FROM cart WHERE session_id = ? AND product_id = ? AND username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $session_id, $product_id, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Product is already in the cart, increase the quantity
            $sql = "UPDATE cart SET quantity = quantity + 1 WHERE session_id = ? AND product_id = ? AND username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sis", $session_id, $product_id, $username);
            $stmt->execute();
        } else {
            // Product is not in the cart, add a new entry
            $sql = "INSERT INTO cart (session_id, product_id, quantity, username) VALUES (?, ?, 1, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sis", $session_id, $product_id, $username);
            $stmt->execute();
        }

        echo "<script>
                alert('Item added to cart');
                window.location.href='product.php';
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .firstContainer-heading-S1{
            margin-left: 36%;
            font-size: 34px;
            margin-top: 6%;
            font-family: sans-serif;
            letter-spacing: 5px;
            font-weight: 700;
        }
        /* body {
            font-family: Arial, sans-serif;
        }
        .loader_bg {
            position: fixed;
            z-index: 999999;
            background: #fff;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.8;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .loader {
            width: 100px;
            height: 100px;
        }
        .loader img {
            width: 100%;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }
        .product-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 233px;
            height: 395px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .product-box img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
        .product-box h3 {
            font-size: 18px;
            margin: 0 0 10px 0;
        }
        .product-box .price {
            color: #b12704;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .product-box .cart-button-container {
            margin-top: auto; 
        }
        .product-box .cart-button {
               background-color: darkorange;
                border: none;
                border-radius: 3px;
                color: white;
                cursor: pointer;
                padding: 9px 29px;
                font-size: 14px;
                text-transform: uppercase;
                transition: background-color 0.3s;
        }
        .product-box .cart-button:hover {
            background-color: black;
        }
        
        .menu-area-main a {
            text-decoration: none;
            color: #000;
            font-size: 16px;
            text-transform: uppercase;
            padding: 10px;
            transition: color 0.3s;
        }
        .menu-area-main a:hover {
            color: #f0c14b;
        }
        .menu-area-main .active a {
            color: #f0c14b;
        }
        .brand_color {
            background: #f0c14b;
            padding: 20px 0;
        }
        .brand_color h2 {
            color: #fff;
            text-align: center;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        .title span {
            font-size: 18px;
            color: #555;
        }
        .product-bg {
            background: #f9f9f9;
            padding: 20px 0;
        }
        .product-bg-white {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }  */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .product-bg {
            /* background-color: #343a40; */
            padding: 20px 0;
        }
        .product-bg-white {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product-box {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 10px;
            /* margin: 15px;
            padding: 20px; */
            text-align: center;
            /* width: calc(25% - 40px); */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            width: 22%;
            height: 20%;
        }
        .product-box:hover {
            transform: translateY(-10px);
        }
        .product-box img {
            max-width: 100%;
            border-radius: 10px;
        }
        .product-box h3 {
            font-size: 1.5em;
            margin: 15px 0;
        }
        .product-box .price {
            color: #28a745;
            font-size: 1.2em;
            font-weight: bold;
        }
        .cart-button-container {
            margin-top: 15px;
        }
        .cart-button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }
        .cart-button:hover {
            background-color: black;
        }
    </style>
</head>
<body>
        <div class="firstContainer-heading-S1">
            <label>I-PHONES</label><br>
        </div>
        <div class="product-bg">
        <div class="product-bg-white">
            <div class="container mt-5">
                <div class="products-container">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            

                   
                                echo "<div class='product-box'>";
                                echo "<img src='" . $row["p_image"] . "' alt='" . $row["P_name"] . "'>";
                                echo "<h3>" . $row["P_name"] . "</h3>";
                                echo "<span class='price'>₹" . $row["p_price"] . "</span>";

                            echo '<div class="cart-button-container">';
                            echo '<form method="POST" action="">';
                            echo '<input type="hidden" name="product_id" value="' . $row["p_id"] . '">';
                            if ($loggedIn) {
                                echo '<button type="submit" name="add_to_cart" class="cart-button">Add to Cart</button>';
                            } else {
                                echo '<button type="button" class="cart-button" onclick="alert(\'You need to be logged in to add items to the cart\')">Add to Cart</button>';
                            }
                            echo '</form>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No products found</p>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
include("footer1.php");
?>