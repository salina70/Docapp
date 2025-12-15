<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_assoc($query);
        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $email; // set session
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found! Please register first.";
    }
}

?>
