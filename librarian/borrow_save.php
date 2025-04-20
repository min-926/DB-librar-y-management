<?php
include('header.php');
include('session.php');

// Database connection
$connection = mysqli_connect("localhost", "root", "", "eb_lms") or die("Connection failed: " . mysqli_connect_error());

// Handle form submission
if (isset($_POST['borrow_books'])) {
    $libraryCardID = mysqli_real_escape_string($connection, $_POST['libraryCardID']);
    $date_borrow = mysqli_real_escape_string($connection, $_POST['date_borrow']);
    $book_ids_raw = $_POST['book_ids'];
    $book_ids = explode(",", $book_ids_raw);

    $success = true;

    foreach ($book_ids as $book_id) {
        $book_id = trim($book_id);
        if ($book_id != "") {
            $query = "INSERT INTO borrow (librarycardid, book_id, date_borrow) VALUES ('$libraryCardID', '$book_id', '$date_borrow')";
            if (!mysqli_query($connection, $query)) {
                $success = false;
                break;
            }
        }
    }

    // Show success or error message
    if ($success) {
        ?>
        <div class="alert alert-success text-center" style="margin: 20px;">
            <strong>Success!</strong> Borrow record has been saved successfully.
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger text-center" style="margin: 20px;">
            <strong>Error!</strong> Failed to save the borrow record.
        </div>
        <?php
    }
}
?>

<div class="text-center" style="margin-top: 20px;">
    <a href="borrow.php" class="btn btn-success">Back to Borrow Form</a>
</div>

<?php include('footer.php'); ?>
