<?php
$servername = "localhost";
$username = "root";   
$password = "700";       
$dbname = "docapp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die(mysqli_connect_error());
}
?>