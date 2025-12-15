<?php
session_start();
include("db.php");

// check if user is logged in
if(!isset($_SESSION['user'])){
    $loggedIn = true;
    header("Location: login.php");
    exit();
}else{
    $loggedIn = false;
}

// fetch user info
$email = $_SESSION['user'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($query);

header("Location: ../index.php?login=success");

?>
