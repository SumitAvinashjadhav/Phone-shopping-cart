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
$sql = "SELECT p_id, P_name, p_price, p_image, p_categories FROM products ORDER BY p_id DESC LIMIT 10";
                
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
  <title>Admin Dashboard</title>
  <!-- <link rel="stylesheet" href="styles.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
  /* display: flex; */
  min-height: 100vh;
  margin: 0;
  font-family: Arial, sans-serif;
}

header {
  width: 100%;
  background-color: white;
  color: black;
  display: flex;
  /* justify-content: space-between; */
  align-items: center;
  /* padding: 1rem; */
  
  
}
nav{
    margin-left: 12%;
    text-transform: uppercase;
    font-family: sans-serif;
}
header .logo {
  font-size: 1.5rem;
}

header nav ul {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}

header nav ul li {
  margin-left: 1rem;
  font-size: 74%;
}

header nav ul li a {
  color: black;
  text-decoration: none;
  font-size: 16px;
    font-weight: 600;
}
header nav ul li a:hover{
  color:red;
}
aside {
  width: 250px;
  background-color: #343a40;
  color: #fff;
  padding: 1rem;
  margin-left: 19px;
  margin-top: 17px;

}

aside ul {
  list-style: none;
  padding: 0;
}

aside ul li {
  margin-bottom: 1rem;
}

aside ul li a {
  color: #fff;
  text-decoration: none;
  display: flex;
  align-items: center;
}
aside ul li a:hover{
  color:red;
}
aside ul li a i {
  margin-right: 0.5rem;
}

main {
  flex: 1;
  padding: 1rem;
  background-color: #f8f9fa;
}

main .overview {
  display: flex;
  justify-content: space-between;
}

main .overview .card {
  background-color: cadetblue;
  padding: 1rem;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  width: 24%;
  text-align: center;
}

main .charts {
  margin-top: 1rem;
}

main .recent-orders {
  margin-top: 1rem;
}

main .recent-orders table {
  width: 100%;
  border-collapse: collapse;
}

main .recent-orders table th,
main .recent-orders table td {
  padding: 0.75rem;
  border: 1px solid #dee2e6;
}

main .recent-orders table th {
  background-color: #fff;
  color: black;
}
img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }
  .logo{
    font-family: sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    margin-left: 19px;
    border: 2px solid black;
    padding: 6px;
    margin-top: 7px;
  }
  </style>
</head>
<body>
  <header>
    
    <div class="image-div" style="margin-top: 12px; margin-left: 22px;">
                    <img style="width: 130px;height: auto;border-radius: 5px;" src="image/logo.png">
    </div>
    <div class="logo">Admin Panel</div>
    <nav>
      <ul>
        <li style="color:black;"><a href="adminpanel.php">Dashboard</a></li>
        <li><a href="adminproduct.php">Products</a></li>
        <li><a href="orderdetails.php">Orders</a></li>
        <li><a href="customer.php">Customers</a></li>
        <li><a href="Contactusview.php">Contactusview</a></li>
        <li><a href="addproduct.php">Add Products</a></li>
        <li><a href="adminlogout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <aside>
    <ul>
      <li><a href="adminpanel.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li><a href="adminproduct.php"><i class="fas fa-box"></i> Products</a></li>
      <li><a href="orderdetails.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
      <li><a href="customer.php"><i class="fas fa-users"></i> Customers</a></li>
      <li><a href="Contactusview.php"><i class="fas fa-chart-line"></i> Contactusview</a></li>
      <li><a href="addproduct.php"><i class="fas fa-cogs"></i> Add Products</a></li>
    </ul>
  </aside>
  <main>
    <section class="overview">
      <div class="card">Total Products: 67</div>
      <div class="card">Total Orders: 45</div>
      <div class="card">Total Customers: 5</div>
      <div class="card">Total Sales: $10</div>
    </section>
    <section class="charts">
      <!-- Insert charts here -->
    </section>
    <section class="recent-orders">
      <h2>Recent Orders</h2>
      <table>
        <thead>
            <tr>
                <th>PODUCT ID</th>
                <th>PRODUCT NAME</th>
                <th>PRODUCT IMAGE</th>
                <th>PRICE</th>
                <th>Product Category</th>
                
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
                               
                             </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No products found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
        </thead>
        <tbody>
          <!-- Insert order rows here -->
        </tbody>
      </table>
    </section>
  </main>
  <script src="scripts.js"></script>
</body>
</html>