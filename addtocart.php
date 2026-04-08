<?php
include("header.php");
$username=$loggedIn ? $_SESSION['username']:'';

?>
<?php

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

    // Fetch user details based on username
$email = '';
$phone = '';

if ($loggedIn) {
    $sql = "SELECT email, phonenumber,address FROM signup WHERE fname = ?"; // Adjust table and columns as needed
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username); // Bind username
        $stmt->execute();
        $stmt->bind_result($email, $phone ,$address); // Bind results to variables
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
// Handle cart item removal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['remove_item'])) {
        $cart_id = $_POST['cart_id'];
        $sql = "DELETE FROM cart WHERE cart_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $cart_id);
        $stmt->execute();
        echo "<script>
                alert('Item removed');
                window.location.href='addtocart.php';
            </script>";
    }

    // Handle cart item quantity update
    if (isset($_POST['update_quantity'])) {
        $cart_id = $_POST['cart_id'];
        $quantity = $_POST['quantity'];
        $sql = "UPDATE cart SET quantity = ? WHERE cart_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $quantity, $cart_id);
        $stmt->execute();
        echo "<script>
               
                window.location.href='addtocart.php';
            </script>";
           // alert('Quantity updated');
    }

    
}



// Prepare the SQL query to join cart and products tables
$session_id = session_id();
$sql = "SELECT cart.cart_id, products.p_name, products.p_price, cart.quantity 
        FROM cart 
        JOIN products ON cart.product_id = products.p_id 
        WHERE cart.session_id = ? AND cart.username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $session_id, $username); // Bind both session_id and username
$stmt->execute();
$result = $stmt->get_result();








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
          /* body1 {
        display: grid;
        height: 100%;
        place-items: center;
        text-align: center;
    }
.container1{
  position: relative;
  width: 400px;
  background: #111;
  padding: 20px 30px;
  border: 1px solid #444;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.container1 .post{
  display: none;
}
.container1 .text{
  font-size: 25px;
  color: #666;
  font-weight: 500;
}
.container1 .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: #666;
  font-weight: 500;
  cursor: pointer;
}
.container1 .edit:hover{
  text-decoration: underline;
}
.container1 .star-widget input{
  display: none;
}
.star-widget label{
  font-size: 40px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color: #fd4;
}
input:checked ~ label{
  color: #fd4;
}
input#rate-5:checked ~ label{
  color: #fe7;
  text-shadow: 0 0 20px #952;
}
#rate-1:checked ~ form header:before{
  content: "I just hate it ";
}
#rate-2:checked ~ form header:before{
  content: "I don't like it ";
}
#rate-3:checked ~ form header:before{
  content: "It is awesome ";
}
#rate-4:checked ~ form header:before{
  content: "I just like it ";
}
#rate-5:checked ~ form header:before{
  content: "I just love it ";
}
.container1 form{
  display: none;
}
input:checked ~ form{
  display: block;
}
form header{
  width: 100%;
  font-size: 25px;
  color: #fe7;
  font-weight: 500;
  margin: 5px 0 20px 0;
  text-align: center;
  transition: all 0.2s ease;
}
form .textarea{
  height: 100px;
  width: 100%;
  overflow: hidden;
}
form .textarea textarea{
  height: 100%;
  width: 100%;
  outline: none;
  color: #eee;
  border: 1px solid #333;
  background: #222;
  padding: 10px;
  font-size: 17px;
  resize: none;
}
.textarea textarea:focus{
  border-color: #444;
}
form .btn{
  height: 45px;
  width: 100%;
  margin: 15px 0;
}
form .btn button{
  height: 100%;
  width: 100%;
  border: 1px solid #444;
  outline: none;
  background: #222;
  color: #999;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
}
form .btn button:hover{
  background: #1b1b1b;
}
.xyz{
position: relative;
}
.xyz img{
position: absolute;
top: 0;
right: 0;
}
table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        } .cart-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        } .update-quantity, .remove-item {
            background-color: #f0c14b;
            border: 1px solid #a88734;
            border-radius: 3px;
            color: #111;
            cursor: pointer;
            padding: 5px 10px;
            font-size: 14px;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }
        .update-quantity:hover, .remove-item:hover {
            background-color: #ddb347;
        }
        .cart-icon {
    position: relative;
    display: inline-block;
}


  
                .firstContainer-heading{
            margin-left: 42%;
            font-size: 34px;
            margin-top: 6%;
            font-family: sans-serif;
            letter-spacing: 5px;
            font-weight: 700;
        }
        #gray-text{
            font-size: 18px;
            color: gray;
            font-weight: 200;
            margin-left: 130px;
        } */
    </style>
</head>
<body>
        <div class="firstContainer-heading">
            <label>ADD TO CART</label><br>
            <!-- <label id="gray-text">EXPERIENCE HIGH PERFORMANCE AND SECURE</label> -->
        </div>

        <div class="container">
       
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                $total_amount = 0;
                while ($row = $result->fetch_assoc()) {
                    $total = $row['p_price'] * $row['quantity'];
                    $total_amount += $total;
                    echo "<tr>
                            <td>{$row['p_name']}</td>
                            <td>₹{$row['p_price']}</td>
                            <td>
                                <form method='POST' action=''>
                                    <input type='number' name='quantity' value='{$row['quantity']}' min='1' style='width: 50px;'>
                                    <input type='hidden' name='cart_id' value='{$row['cart_id']}'>
                                    <button type='submit' name='update_quantity' class='update-quantity'>Update</button>
                                </form>
                            </td>
                            <td>₹{$total}</td>
                            <td>
                                <form method='POST' action=''>
                                    <input type='hidden' name='cart_id' value='{$row['cart_id']}'>
                                    <button type='submit' name='remove_item' class='remove-item'>Remove</button>
                                </form>
                            </td>
                          </tr>";
                }
                echo "<tr>
                        <td colspan='3' style='text-align:right; font-weight:bold;'>Total Amount</td>
                        <td colspan='2'>₹{$total_amount}</td>
                      </tr>";
            } else {
                echo "<tr><td colspan='5' style='text-align:center;'>Your cart is empty</td></tr>";
            }
            ?>
        </table>
        <div class="cart-actions">
            <a href="product1.php" class="update-quantity">Continue Shopping</a>
           
        </div>
    </div>
<!-- <div class="col-lg-9">
  <table class="table">
    <thead class="text-center">
      <tr>
        <th scope="col">Serial No.</th>
        <th scope="col">Item Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody class="text-center">
      <?php
      $sr = 1;
      
      if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
          // Retrieve the quantity from the session if available
         
        

          echo "
          <tr>
            <td>$sr</td>
            <td>$value[item_name]</td>
            <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
            <td>
              <input class='text-center iquantity' onchange='subtotal()' type='number' value='$value[Quantity]' min='1' max='10'>
            </td>
            <td class='itotal'></td>
            <td>
              <form action='manageCart.php' method='post'>
                <button name='remove_item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                <input type='hidden' name='item_name' value='$value[item_name]'>
              </form>
            </td>
          </tr>
          ";
          $sr++;
        }
      }
      ?>
    </tbody>
  </table>
</div>
<br>
 -->





<div class="parent-container" style="display: flex;">
  <div class="col-lg-3" >
    <div class="border bg-light rounded p-4">
      <h2 class="totalh2text">Total</h2>
      <div >
      <h1 class="totalamounttext">₹
      <?php
          // Check if total_amount is defined, if not set it to 0
          if (!isset($total_amount)) {
              $total_amount = 0;
          }
          echo $total_amount;
          $_SESSION["gtotal"] = $total_amount;
          ?>
      </h1>
      <!-- <h1 class="text-center" id="gtotal"></h1> -->
      </div>
      
      <br>
      
     
      <form action="payment.php" method="POST" onsubmit="return addTotalToForm()">
    <div class="form-group">
        <input type="text" placeholder="Enter user name:" name="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>" readonly>
    </div>
    <div class="form-group">
        <input type="email" placeholder="Enter Email:" name="Email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" readonly>
    </div>
    <div class="form-group">
        <input type="phone" placeholder="Enter phone Number:" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" readonly>
    </div>
    <div class="form-group">
        <input type="address" placeholder="Enter address:" name="address" class="form-control" value="<?php echo htmlspecialchars($address); ?>" readonly>
    </div>
    <input type="hidden" name="gtotal" id="hiddenGtotal">
    <button class="btnpurchase" type="submit">Purchase</button>
</form>

<script>
function addTotalToForm() {
    // Example of setting a total quantity value; adjust logic as needed
    var totalQuantity = 10; // Replace with dynamic value as needed
    document.getElementById('hiddenGtotal').value = totalQuantity;
    return true; // Ensure the form submits
}
</script>

     
    </div>
  </div>
</div>




</body>
</html>

<?php
include("footer1.php");
?>