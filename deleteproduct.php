<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: adminproduct.php");
    exit();
}

// Enable detailed error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
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

// Check if p_id is set in the GET request
if (isset($_GET['p_id'])) {
    $p_id = intval($_GET['p_id']); // Ensure p_id is an integer

    // Prepare the DELETE statement
    $sql = "DELETE FROM products WHERE p_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the p_id parameter
    $stmt->bind_param("i", $p_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully'); window.location.href='product.php';</script>";
    } else {
        echo "<script>alert('Error deleting product: " . $stmt->error . "'); window.location.href='product.php';</script>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "<script>alert('Product ID not specified'); window.location.href='product.php';</script>";
}

// Close the connection
$conn->close();
?>