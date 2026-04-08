<?php
session_start();
include('database.php'); // Ensure this includes your database connection

if (isset($_POST['otp']) && isset($_POST['email'])) {
    $otp = $_POST['otp'];
    $email = $_POST['email'];
    $current_time = time();
    $otp_time = $_SESSION['OTP_TIME'];
    $time_difference = $current_time - $otp_time;
    $otp_validity_duration = 300; // 5 minutes in seconds

    if ($time_difference > $otp_validity_duration) {
        echo json_encode(['result' => 'otp_expired']);
    } else if ($otp == $_SESSION['OTP']) {
        // OTP is valid, fetch the username based on email
        $email = mysqli_real_escape_string($conn, $email);
        $user_query = "SELECT username FROM signup WHERE email='$email'";
        $user_result = mysqli_query($conn, $user_query);
        
        if (mysqli_num_rows($user_result) > 0) {
            $user = mysqli_fetch_assoc($user_result);
            $_SESSION['username'] = $user['username'];

            // Set logged in status and username
            $loggedIn = isset($_SESSION['username']) ? true : false;
            $username = $loggedIn ? $_SESSION['username'] : '';
            
            echo json_encode(['result' => 'yes', 'loggedIn' => $loggedIn, 'username' => $username]);
        } else {
            echo json_encode(['result' => 'user_not_found']);
        }
    } else {
        echo json_encode(['result' => 'not_exist']);
    }
}
?>
