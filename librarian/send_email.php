<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "eb_lms");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert into DB
$stmt = $conn->prepare("INSERT INTO messages (fname, lname, email, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fname, $lname, $email, $message);
$stmt->execute();

// Send email to admin
$to = "contact@example.com"; // Your email
$subject = "New Contact Message from $fname $lname";
$body = "You have received a new message from $fname $lname ($email):\n\n$message";
$headers = "From: $email";

mail($to, $subject, $body, $headers);

// Redirect back with success (or show success page)
header("Location: contact.php?sent=1");
exit;
?>
