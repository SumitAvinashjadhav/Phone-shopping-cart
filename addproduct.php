<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "phone.com"; // Make sure the database name is correct

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $category = $_POST['p_categories'];

    // Handle file upload
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["p_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an actual image
    $check = getimagesize($_FILES["p_image"]["tmp_name"]);
    if($check === false) {
        die("File is not an image.");
    }

    // Check file size (limit to 5MB)
    if ($_FILES["p_image"]["size"] > 5000000) {
        die("Sorry, your file is too large.");
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    // Move file to target directory
    if (!move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }

    // Insert product data into database
    $sql = "INSERT INTO products (p_name, p_price, p_categories, p_image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdss", $name, $price, $category, $target_file);

    if ($stmt->execute()) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Product</h1>
        <form id="add-product-form" action="addproduct.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="p_name" required>
            </div>
            <div class="form-group">
                <label for="product-price">Product Price</label>
                <input type="number" id="product-price" name="p_price" required>
            </div>
            <div class="form-group">
                <label for="product-category">Category</label>
                <select id="product-category" name="p_categories" required>
                    <option value="">Select a category</option>
                    <option value="Smartphones">Smartphones</option>
                    <option value="Tablets">Tablets</option>
                    <option value="I-Phones">I-Phones</option>
                    <option value="Accessories">Accessories</option>
                    <option value="oneplus">OnePlus</option>
                    <option value="realme">Realme</option>
                    <option value="vivo">Vivo</option>
                    <option value="nokia">Nokia</option>
                    <option value="oppo">OPPO</option>
                    <option value="xiaomi">Xiaomi</option>
                    <option value="motorola">Motorola</option>
                    <option value="samsung">Samsung</option>
                    <option value="asus">Asus</option>
                    <option value="lenovo">Lenovo</option>
                    <option value="sony">SONY</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-image">Product Image</label>
                <input type="file" id="product-image" name="p_image" accept="image/*" required>
            </div>
            <button type="submit">Add Product</button>
                                 
        </form>
    </div>
</body>
</html>