<?php
include('smtp/PHPMailerAutoload.php');

// Database connection
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "sighup_table";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
    
    // Check if email exists in the database
    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $otp = rand(100000, 999999);
        $otp_time = time();
        // Store OTP in session
        session_start();
        $_SESSION['EMAIL'] = $email;
        $_SESSION['OTP'] = $otp;
        $_SESSION['OTP_TIME'] = $otp_time;
        
        // Send OTP email
        $subject = "Your OTP Code";
        $msg = "Your OTP code is $otp";
        $result = smtp_mailer($email, $subject, $msg);
        
        if($result == 'Sent'){
            // $expiry_time = 300;
            // echo json_encode([ 'expiry_time' => $expiry_time]);
            // echo 'yes';

            $expiry_time = 60; // 5 minutes in seconds
            echo json_encode(['status' => 'yes', 'expiry_time' => $expiry_time]);
        } else {
            echo 'not_exist';
        }
    } else {
        echo 'email_not_found';
    }
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

$conn->close();
?>
