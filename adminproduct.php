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
$sql = "SELECT p_id, P_name, p_price, p_image, p_categories FROM products";
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }
        .btn {
            padding: 10px 20px;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-update {
            background-color: #28a745;
        }
        .btn-update:hover {
            background-color: #218838;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Price </th>
                    <th>Product Category</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['p_id']}</td>
                                <td>{$row['P_name']}</td>
                                <td><img src='" . $row["p_image"] . "' alt='" . $row["P_name"] . "'></td>
                                <td>{$row['p_price']}</td>
                                <td>{$row['p_categories']}</td>
                                <td><a href='updateproduct.php?p_id={$row['p_id']}' class='btn btn-update'>Update</a></td>
                                <td><a href='deleteproduct.php?p_id={$row['p_id']}' class='btn btn-delete'>delete</a></td>
                                
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No products found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
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
                                // echo "<h2>" .$row["p_categories"]. "</h2>";

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
                    // $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>