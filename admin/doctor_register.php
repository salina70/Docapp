<?php
session_start();
include "../config/db.php";

$user_id = $_SESSION['user_id'];
$uploadDir = "../uploads/doctor_docs/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

function uploadFile($file, $prefix) {
    global $uploadDir;
    $allowed = ["pdf","jpg","jpeg","png"];

    $name = time() . "_" . $prefix . "_" . basename($file["name"]);
    $path = $uploadDir . $name;
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Invalid file type");
    }

    move_uploaded_file($file["tmp_name"], $path);
    return $path;
}

/* Required document */
$medicalDoc = uploadFile($_FILES["medical_document"], "medical");

/* Optional experience letter */
$experienceDoc = null;
if (!empty($_FILES["experience_letter"]["name"])) {
    $experienceDoc = uploadFile($_FILES["experience_letter"], "experience");
}

/* Insert */
$stmt = $conn->prepare("
    INSERT INTO doctors
    (user_id, full_name, license_number, registration_year, first_practice_year,
     specialization, current_hospital, medical_document, experience_letter)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "issiiisss",
    $user_id,
    $_POST["full_name"],
    $_POST["license_number"],
    $_POST["registration_year"],
    $_POST["first_practice_year"],
    $_POST["specialization"],
    $_POST["current_hospital"],
    $medicalDoc,
    $experienceDoc
);

$stmt->execute();

header("Location: dashboard.php?doctor_request=submitted");
exit;
?>
