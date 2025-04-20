<?php 
include('dbcon.php');

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $contact = mysqli_real_escape_string($conn, $_POST['phone']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $staffid = mysqli_real_escape_string($conn, $_POST['staffid']);

    // 注意：此处没有 address 字段！
    $query = "INSERT INTO staff (firstname, lastname, phone, street, city, state, staffid) 
              VALUES ('$firstname', '$lastname',  '$phone', '$street', '$city', '$state','$staffid')";

    if (mysqli_query($conn, $query)) {
        header('location:staff.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
