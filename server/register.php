<?php
session_start();

if($_SERVER['REQUEST_METHOD']==='POST'){
$name = $_POST['name'];
$email = $_POST['email'];
$pw = $_POST['password'];

header("Location: ../doctor/dashboard.php");
}else{
echo 'failed to connect';

}

?>