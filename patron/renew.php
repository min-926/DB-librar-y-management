<?php
session_start();
include('dbcon.php');

if (!isset($_SESSION['libraryCardID'])) {
    header("Location: signup.php");
    exit();
}

$libraryCardID = $_SESSION['libraryCardID'];
$bookTitle = $_POST['bookTitle'];
$dueDate = $_POST['due_date'];

// 第一步：找到这条借阅记录
$query = mysqli_prepare($conn, "
    SELECT br.book_id, br.due_date, br.renew_count
    FROM borrow br
    JOIN book b ON br.book_id = b.book_id
    WHERE b.book_title = ? AND br.libraryCardID = ?
");
mysqli_stmt_bind_param($query, 'si', $bookTitle, $libraryCardID);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);

if ($row = mysqli_fetch_assoc($result)) {
    $bookId = $row['book_id'];
    $currentDueDate = new DateTime($row['due_date']);
    $renewCount = $row['renew_count'];

    if ($renewCount < 2) {
        // 延长30天
        $newDueDate = $currentDueDate->add(new DateInterval('P30D'))->format('Y-m-d');

        // 更新数据库
        $updateQuery = mysqli_prepare($conn, "
            UPDATE borrow 
            SET due_date = ?, renew_count = renew_count + 1 
            WHERE book_id = ? AND libraryCardID = ?
        ");
        mysqli_stmt_bind_param($updateQuery, 'sii', $newDueDate, $bookId, $libraryCardID);
        if (mysqli_stmt_execute($updateQuery)) {
            $_SESSION['message'] = "Book renewed successfully! New due date: $newDueDate";
        } else {
            $_SESSION['message'] = "Failed to renew the book.";
        }
    } else {
        $_SESSION['message'] = "You have already renewed this book 2 times. Cannot renew again.";
    }
} else {
    $_SESSION['message'] = "Book not found in your borrowed list.";
}

// 返回 dashboard
header("Location: dashboard.php");
exit();
?>
