<?php
include("header.php");
// session_start();
$loggedIn = isset($_SESSION['username']) ? true : false;
$username = $loggedIn ? $_SESSION['username'] : '';

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

if (isset($_GET['p_id'])) {
    $product_id = $_GET['p_id'];

    // Fetch product details
    $sql = "SELECT * FROM products WHERE p_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_name = $_POST['P_name'];
        $product_price = $_POST['p_price'];
        $product_category = $_POST['p_categories'];
        $product_image = $_POST['p_image'];

        // Update product details
        $sql = "UPDATE products SET P_name = ?, p_price = ?, p_categories = ?, p_image = ? WHERE p_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $product_name, $product_price, $product_category, $product_image, $product_id);

        if ($stmt->execute()) {
            echo "<script>alert('Product updated successfully');</script>";
            echo "<script>window.location.href='adminproduct.php';</script>";
        } else {
            echo "<script>alert('Error updating product');</script>";
        }
    }
} else {
    echo "<script>alert('Invalid Product ID');</script>";
    echo "<script>window.location.href='admin_products.php';</script>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            width: 50%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Product</h2>
        <form method="POST" action="">
            <label for="P_name">Product Name</label>
            <input type="text" name="P_name" value="<?php echo $product['p_name']; ?>" required>

            <label for="p_price">Product Price</label>
            <input type="number" name="p_price" value="<?php echo $product['p_price']; ?>" required>

            <label for="p_categories">Product Category</label>
            <input type="text" name="p_categories" value="<?php echo $product['p_categories']; ?>" required>

            <label for="p_image">Product Image URL</label>
            <input type="text" name="p_image" value="<?php echo $product['p_image']; ?>" required>

            <button type="submit" class="btn">Update Product</button>
        </form>
    </div>
</body>
</html>

<?php
include("footer1.php");
?>