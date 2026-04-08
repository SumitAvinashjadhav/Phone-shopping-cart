<?php
include("header.php");

    if(isset($_POST['submit'])){

    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $phonenumber=$_POST["phonenumber"];
    $address=$_POST["address"];
    $passwordd=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    
    
    echo "$fname,$lname,$email,$phonenumber,$address,$passwordd,$confirmpassword";
    include('smtp/PHPMailerAutoload.php');
    
    $servername = "localhost";
    $username1 = "root";
    $password = "";
    $dbname = "phone.com";
  
    // Create connection
    $conn = new mysqli($servername, $username1, $password, $dbname);
    // Check connection
    if ($conn->connect_error)
     {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM signup WHERE email='$email'";
    
    $result=mysqli_query($conn, $sql);
    
    if ($result->num_rows>0)
     {
        echo "<script> alert('Please Enter new Email Id') </script>";
    } 
    else
     {
    
        $sql = "INSERT INTO signup (fname, lname, email, phonenumber,address, password, confirmpassword)
        VALUES ('$fname', '$lname', '$email','$phonenumber','$address','$passwordd','$confirmpassword')";

        
         $subject = "Signup Successfully";
         $msg = "Dear customer $fname ,Your password is $passwordd <br>
         thanks for registration.
         ";
         $result1 = smtp_mailer($email, $subject, $msg);
        
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('New record created successfully') </script>";
            echo "<script> window.location.href='login.php' </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

       
    

    }
 $conn->close();
}
function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "shreeramelectronics003@gmail.com";
    $mail->Password = "pwvi qfyu dsra ilgs";
    $mail->SetFrom("shreeramelectronics003@gmail.com");
    $mail->Subject = $subject;
    // $mail->Username = "sumitjadhav0476@gmail.com";
    // $mail->Password = "zlxl lelj ildg rvjf";
    // $mail->SetFrom("sumitjadhav0476@gmail.com");
    // $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if(!$mail->Send()){
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
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
    background-color: #f0f0f0;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.signup-form {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
    margin-top: 86px;
    margin-left: 36%;
}

#signuph1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

.terms {
    text-align: left;
    margin-bottom: 20px;
}

.terms input {
    margin-right: 10px;
}

.terms a {
    color: #007bff;
    text-decoration: none;
}

#signupbutton {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

#signupbutton:hover {
    background-color: #0056b3;
}

.member {
    margin-top: 20px;
}

.member a {
    color: #007bff;
    text-decoration: none;
}

.member a:hover {
    text-decoration: underline;
}

        /* body{
            background-color: ;
        }
        .wrapper{
            width: 333px;
            padding: 2rem 1rem;
            margin: 50px auto;
            background-color: white;
            border-radius: 10px;
            text-align: center;
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;

        }
        h1{
            font-size: 2rem;
            color: black;
            margin-bottom: 1.2rem;
        }
        form input{
            width: 92%;
            outline: none;
            border: 1px solid white;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 20px;
            background: white;
        }
        #signupbuttton{
            font-size: 1rem;
            margin-top: 1.8rem;
            padding: 10px 0;
            border-radius: 20px;
            outline: none;
            border: none;
            width: 90%;
            color: white;
            /* cursor: pointer; */
            background: rgb(17, 107, 143);
        }
        
        #signupbuttton:hover{
            background: rgba(17, 107, 143, 0.877);
        }
        input:focus{
            border: 1px solid rgb(192, 192, 192);
        }
        .terms{
            margin-top: 0.2px;

        }
        .terms input{
            height: 1em;
            width: 1em;
            vertical-align: middle;
            cursor: pointer;
        }
        .terms label{
            font-size: 0.7rem;
        }
        .terms a{
            color: rgb(17, 107, 143);
            text-decoration: none;

        }
        .member{
            font-size: 0.8rem;
            margin-top: 1.4rem;
            color: #636363;
        }
        .member a{
            color: rgb(17, 107, 143);
            text-decoration: none;
        } */
    </style>
</head>
<body>
    <!-- <div class="wrapper">
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST">
            <input type="text" placeholder="firstname" name="fname">
            <input type="text" placeholder="lastname" name="lname">
            <input type="email" placeholder="Email" name="email">
            <input type="number" placeholder="phoneNumber" name="phonenumber">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Re-Enter password" name="confirmpassword">
        
        <div class="terms">
            <input type="checkbox" id="chechbox">
            <label for="checkbox">I agree to these<a href="#">Terms & Conditions</a></label>
        </div>
        <button id="signupbuttton" type="submit" name="submit">Sign Up</button>
        <div class="member">
            Already a member?<a href="./login1.html">Login Here</a>
        </div>
        </form>
    </div> -->
    <form action="signup.php" method="POST" class="signup-form">
        <h3 id="signuph1">Sign Up</h3>
        <input type="text" placeholder="First Name" name="fname" class="form-input">
        <input type="text" placeholder="Last Name" name="lname" class="form-input">
        <input type="text" placeholder="Email" name="email" class="form-input">
        <input type="number" placeholder="Phone Number" name="phonenumber" class="form-input">
        <input type="text" placeholder="Address" name="address" class="form-input">
        <input type="password" placeholder="Password" name="password" class="form-input">
        <input type="password" placeholder="Re-Enter Password" name="confirmpassword" class="form-input">
        <div class="terms">
            <input type="checkbox" id="checkbox" name="terms">
            <label for="checkbox">I agree to these <a href="#">Terms & Conditions</a></label>
        </div>
        <button id="signupbutton" type="submit" name="submit">Sign Up</button>
        <div class="member">
            Already a member? <a href="./login.php">Login Here</a>
        </div>
    </form>
</body>
</html>

<?php
include("footer1.php");
?>