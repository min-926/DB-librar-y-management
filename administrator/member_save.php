<?php
include('dbcon.php');

if (isset($_POST['submit'])) {
    $libraryCardID = $_POST['libraryCardID'];
    $password      = $_POST['password'];
    $cardexpire    = $_POST['cardexpire'];
    $firstname     = $_POST['firstname'];
    $lastname      = $_POST['lastname'];
    $phone         = $_POST['phone'];
    $email         = $_POST['email'];
    $street        = $_POST['street'];
    $city          = $_POST['city'];
    $state         = $_POST['state'];
    $zipcode       = $_POST['zipcode'];

    $query = "INSERT INTO patron (libraryCardID, Password, cardexpire, firstname, lastname, phone, email, street, city, state, zipcode)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("issssssssss", $libraryCardID, $password, $cardexpire, $firstname, $lastname, $phone, $email, $street, $city, $state, $zipcode);

    if ($stmt->execute()) {
        header("Location: patron.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
