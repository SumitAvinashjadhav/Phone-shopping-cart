<?php

// Database connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "phone.com";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get order_id from URL
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if ($order_id > 0) {
    // Fetch order details
    $sql_order = "SELECT * FROM orders WHERE order_id = $order_id";
    $result_order = $conn->query($sql_order);

    if ($result_order->num_rows > 0) {
        $order = $result_order->fetch_assoc();
        $username = $order['username'];
        $order_date = $order['order_date'];
        // $email = $order['email']; // Assuming email is in the orders table
        // $phone = $order['phone']; // Assuming phone is in the orders table

        // Fetch order items
        $sql_items = "SELECT * FROM order_items WHERE order_id = $order_id";
        $result_items = $conn->query($sql_items);
    } else {
        die("Order not found.");
    }
} else {
    die("Invalid order ID.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        thead {
            background-color: #007BFF;
            color: white;
        }
        th {
            background-color: #0056b3;
        }
        .product-image {
            width: 50px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .price {
            color: #007BFF;
            font-weight: bold;
        }
        .btn-print {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn-print:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h2>Order Details - Order ID: <?php echo htmlspecialchars($order_id); ?></h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <!-- <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p> -->
        <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order_date); ?></p>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_items->num_rows > 0) {
                    while ($item = $result_items->fetch_assoc()) {
                        $product_id = $item['product_id'];

                        // Fetch product details
                        $sql_product = "SELECT * FROM products WHERE p_id = $product_id";
                        
                        $result_product = $conn->query($sql_product);
                        $product = $result_product->fetch_assoc();
                        $product_name = $product['p_name'];
                        $product_image = $product['p_image'];
                        $price = $item['price'];

                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($product_id) . '</td>';
                        echo '<td>' . htmlspecialchars($product_name) . '</td>';
                        echo '<td><img src="' . htmlspecialchars($product_image) . '" class="product-image" alt="' . htmlspecialchars($product_name) . '"></td>';
                        echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
                        echo '<td class="price">₹' . htmlspecialchars($price) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No items found for this order.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <button class="btn-print" onclick="window.print()">Print</button>
    </div>
</body>
</html>

<?php
$conn->close();
?>