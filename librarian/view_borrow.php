<?php
include('header.php');
include('session.php');
include('navbar_borrow.php');

// 连接数据库
$connection = mysqli_connect("localhost", "root", "", "eb_lms") or die("Connection failed: " . mysqli_connect_error());

?>

<div class="container">
    <div class="margin-top">
        <div class="row">    
            <div class="span12">        
                <div class="alert alert-info"><strong>Borrowed Books</strong></div>

                <div class="pull-right">
                    <a href="" onclick="window.print()" class="btn btn-default">Print</a>
                </div>

                <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                    <thead>
                        <tr>
                            <th>Book Title</th>                                 
                            <th>Library Card ID</th>                                 
                            <th>Date Borrow</th>                                 
                            <th>Due Date</th>                                 
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php  
                    // 查询借出的书籍
                    $query = "
                    SELECT 
                        borrow.libraryCardID,
                        borrow.date_borrow,
                        borrow.due_date,
                        borrow.borrow_status,
                        book.book_title AS book_title
                    FROM borrow
                    LEFT JOIN book ON borrow.book_id = book.book_id
                    WHERE borrow.date_return is NULL
                    ORDER BY borrow.libraryCardID DESC
                    ";

                    $user_query = mysqli_query($connection, $query);

                    if (!$user_query) {
                        die("Query Failed: " . mysqli_error($connection));
                    }

                    // 显示数据
                    while ($row = mysqli_fetch_array($user_query)) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['libraryCardID']); ?></td>
                            <td><?php echo htmlspecialchars($row['date_borrow']); ?></td>
                            <td><?php echo htmlspecialchars($row['due_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['borrow_status']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div>        
        </div>
    </div>
</div>

<?php include('footer.php'); ?> 
