<?php
$connection = mysqli_connect('localhost', 'root', '', 'eb_lms');

// check is it work
if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
