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

// Initialize default values for start and end dates
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Fetch orders with optional date filter
$sql_orders = "SELECT * FROM orders";
if (!empty($startDate) && !empty($endDate)) {
    $sql_orders .= " WHERE order_date BETWEEN '$startDate' AND '$endDate'";
}
$sql_orders .= " ORDER BY order_date DESC";
$result_orders = $conn->query($sql_orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Details</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="date"] {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 0 10px;
        }
        button {
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
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
        .btn-view {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }
        .btn-view:hover {
            background-color: #0056b3;
        }
        .print-btn {
            display: block;
            margin: 10px auto 20px;
            background-color: #17a2b8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }
        .print-btn:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Details</h2>

        <!-- Print All Button -->
        <button class="print-btn" onclick="printTable()">Print All</button>

        <!-- Date Filter Form -->
        <form method="get" action="">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($startDate) ?>">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($endDate) ?>">
            <button type="submit">Filter</button>
        </form>

        <?php
        if ($result_orders->num_rows > 0) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Order ID</th>';
            echo '<th>Username</th>';
            echo '<th>Order Date</th>';
            echo '<th>Product Image</th>';
            echo '<th>Product ID</th>';
            echo '<th>Product Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Price</th>';
            echo '<th>Download</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($order = $result_orders->fetch_assoc()) {
                $order_id = $order['order_id'];
                $username = $order['username'];
                $order_date = $order['order_date'];

                // Fetch order items for the current order
                $sql_items = "SELECT * FROM order_items WHERE order_id = $order_id";
                $result_items = $conn->query($sql_items);

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
                        echo '<td>' . htmlspecialchars($order_id) . '</td>';
                        echo '<td>' . htmlspecialchars($username) . '</td>';
                        echo '<td>' . htmlspecialchars($order_date) . '</td>';
                        echo '<td><img src="' . htmlspecialchars($product_image) . '" class="product-image" alt="' . htmlspecialchars($product_name) . '"></td>';
                        echo '<td>' . htmlspecialchars($product_id) . '</td>';
                        echo '<td>' . htmlspecialchars($product_name) . '</td>';
                        echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
                        echo '<td class="price">₹' . htmlspecialchars($price) . '</td>';
                        echo '<td><a href="paymentorder.php?order_id=' . $order_id . '" class="btn-view">print</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="9">No items found for this order.</td></tr>';
                }
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No orders found.</p>';
        }

        $conn->close();
        ?>
    </div>

    <script>
        // Print Table Function
        function printTable() {
            const tableContent = document.querySelector('table').outerHTML;

            const printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print Orders</title>
                        <style>
                            table { width: 100%; border-collapse: collapse; }
                            th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
                            th { background-color: #007BFF; color: white; }
                            tr:nth-child(even) { background-color: #f9f9f9; }
                        </style>
                    </head>
                    <body>
                        <h2>Order Details</h2>
                        ${tableContent}
                    </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html>
