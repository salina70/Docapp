<?php
// 1. Start session and include database connection
session_start();
include 'db_connection.php'; // your DB connection

// 2. Get form values
$doc_name = $_POST['doc_name'];
$nic_number = $_POST['nic_number'];
$gender = $_POST['gender'];
$img_url = $_POST['img_url'];
$user_id = $_POST['user_id'];
$doc_charge = $_POST['doc_charge'];
$contact = $_POST['contact'];

// 3. Validate NIC BEFORE inserting
if (!preg_match('/^(\d{9}[VX]|[0-9]{12})$/', strtoupper($nic_number))) {
    die("Invalid Nepal NIC number. Example: 123456789V or 123456789012");
}

// 4. Proceed to insert into database
$sql = "INSERT INTO doctors (doc_name, nic_number, gender, img_url, user_id, doc_charge, contact) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssisiis", $doc_name, $nic_number, $gender, $img_url, $user_id, $doc_charge, $contact);
mysqli_stmt_execute($stmt);

echo "Doctor added successfully!";
?>
