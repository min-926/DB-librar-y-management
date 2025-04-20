<?php
include('header.php');
include('session.php');
$connection = mysqli_connect("localhost", "root", "", "eb_lms") or die("Connection failed: " . mysqli_connect_error());

// 假设借书请求包含书籍 ID 和借书日期
if (isset($_POST['borrow_books'])) {
    $libraryCardID = mysqli_real_escape_string($connection, $_POST['libraryCardID']);
    $date_borrow = mysqli_real_escape_string($connection, $_POST['date_borrow']);
    $book_ids_raw = $_POST['book_ids'];
    $book_ids = explode(",", $book_ids_raw);

    $success = true;

    foreach ($book_ids as $book_id) {
        $book_id = trim($book_id);
        if ($book_id != "") {
            // 插入 borrow 表的借书记录
            $query = "INSERT INTO borrow (library_card_id, book_id, date_borrow) VALUES ('$libraryCardID', '$book_id', '$date_borrow')";
            if (mysqli_query($connection, $query)) {
                // 更新 book 表的 status 为 'borrow'
                $update_query = "UPDATE book SET status = 'borrow' WHERE book_id = '$book_id'";
                if (!mysqli_query($connection, $update_query)) {
                    $success = false;
                    break;
                }
            } else {
                $success = false;
                break;
            }
        }
    }

    if ($success) {
        echo '<div class="alert alert-success text-center" style="margin: 20px;">
                <strong>Success!</strong> Borrow record has been saved successfully.
              </div>';
    } else {
        echo '<div class="alert alert-danger text-center" style="margin: 20px;">
                <strong>Error!</strong> Failed to save the borrow record.
              </div>';
    }
}
?>

<div class="text-center" style="margin-top: 20px;">
    <a href="borrow.php" class="btn btn-success">Back to Borrow Form</a>
</div>

<?php include('footer.php'); ?>
