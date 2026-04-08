<?php
include("header.php");

    if(isset($_POST['submit'])){

    $email=$_POST["email"];
    $name=$_POST["name"];
    $address=$_POST["address"];
    $message=$_POST["message"];
    
    // echo "$email,$name,$address,$message";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phone.com";
  
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 $sql = "INSERT INTO contactus (email, name, address,message)
 VALUES ('$email', '$name', '$address','$message')";
 
 if ($conn->query($sql) === TRUE) {
   echo "<script> alert('New record created successfully') </script>";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="contact.css"> -->
    <link rel="stylesheet" href="style.css">
    <style>
        
        .contact-inputDiv{
            width: 96%;
        }
    </style>
    <script src=""></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    
        <div class="graydiv">
        <div class="pictureDiv">
            
        </div>

        <form action="contact.php" method="POST">
            <div class="contact-inputDiv">
                <h3 id="contacth1">Contact  Us</h3><br><br>
            <div class="emailnameDiv">
                <label id="emailstyle">Email</label><br>
                <input id="emailinput2" type="text" placeholder="Email " name="email">

                <label id="namestyle">Name</label><br>
                <input id="emailinput22" type="text" placeholder="Name" name="name">
            </div>
            <div class="addressDiv">
                <label id="emailstyle">Address</label><br>
                <input id="emailinput3" type="text" placeholder="Enter Your Address" name="address">
            </div>
            <div class="messageDiv">
                <label id="emailstyle">Message</label><br>
                <input id="meaasageinput3" type="text" placeholder="Enter Your Message" name="message">
            </div>
            <button id="contact-button" type="submit" name="submit">SUBMIT</button>
            </div>
        </form>

        </div>
    </div>
    
    
</body>
</html>

<?php
include("footer1.php");
?>