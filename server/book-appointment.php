<?php
require __DIR__ . '/../google-calendar.php';  // Include calendar functions

// Example: get POST data from form
$patient_name = $_POST['patient_name'];
$patient_email = $_POST['patient_email'];
$appointment_date = $_POST['appointment_date'];

// Save the booking to your database (already in your code)

// Prepare Google Calendar event
$summary = "Appointment with $patient_name";
$description = "Booked via DocApp. Email: $patient_email";

// Set event time (for example: 1-hour appointment at 10 AM local time)
$startDateTime = $appointment_date . "T10:00:00+05:45";
$endDateTime = $appointment_date . "T11:00:00+05:45";

// Add to Google Calendar
addEvent($summary, $description, $startDateTime, $endDateTime);

// Redirect or return success message
header("Location: ../index.php?appointment=success");
exit();
?>