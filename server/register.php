<?php

include("db.php");
$alert = '';
$showWelcome = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $alert = "Email already exists! Please try a different email.";
        echo '<script>alert("email already exist");</script>';
        header('location:../index.php');
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')");
        if ($insert) {
            $showWelcome = true;
            //redirecto page
        } else {
            $alert = "Error: " . mysqli_error($conn);
        }
    }
}

?>
