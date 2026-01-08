<?php
include "../server/db.php";

$doctor_id = $_POST['doctor_id'];
$action = $_POST['action'];

if ($action === "approve") {
    $status = "approved";
} elseif ($action === "reject") {
    $status = "rejected";
} else {
    header("Location: doctor-verification.php");
    exit;
}

$stmt = $conn->prepare(
    "UPDATE doctors SET verification_status = ? WHERE id = ?"
);
$stmt->bind_param("si", $status, $doctor_id);
$stmt->execute();

header("Location: doctor-verification.php?updated=1");
exit;
?>
