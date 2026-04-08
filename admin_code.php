<?php
    session_start();
$loggedIn = isset($_SESSION['username']) ? true : false;
$username = $loggedIn ? $_SESSION['username'] : '';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == 'admin' && $password == 'admin@123') {
        $_SESSION['username'] = $username;
        echo "<script>
        window.location.href = 'admin.php';
        </script>";
    } else {
    require_once "database.php";
    $sql = "SELECT * FROM sigup WHERE username = '$username' && password ='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0){
        $_SESSION['username'] = $username;

        echo "<script>alert('Login successful');
        window.location.href = 'index.php';
        </script>";

        }else{
            echo "<script>alert('Try Again');</script>";    }
    
    
}
}