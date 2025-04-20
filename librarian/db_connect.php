

<?php
$servername = "localhost";
$username = "root";
$password = ""; // or your MySQL password
$database = "eb_lms"; // replace with your actual DB name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
