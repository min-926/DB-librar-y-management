<?php
$host = "localhost";     // XAMPP uses localhost
$user = "root";          // Default XAMPP user
$password = "";          // Leave blank (unless you set a password in MySQL)
$database = "eb_lms";    // Match your imported DB name

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
