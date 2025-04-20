<?php
include('dbcon.php');

// Sanitize input
$title = isset($_POST['title']) ? mysqli_real_escape_string($conn, $_POST['title']) : '';
$author = isset($_POST['author']) ? mysqli_real_escape_string($conn, $_POST['author']) : '';

// Build dynamic WHERE clause
$conditions = ["status != 'Archive'"];

if (!empty($title)) {
    $conditions[] = "book_title LIKE '%$title%'";
}

if (!empty($author)) {
    $conditions[] = "author LIKE '%$author%'";
}

$where_clause = implode(" AND ", $conditions);

// Final query
$query = "SELECT * FROM book WHERE $where_clause";

// Run query
$user_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>


<!-- HTML layout to show results -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Acc No.</th>                                 
            <th>Book Title</th>                                 
            <th>Category</th>
            <th>Author</th>
            <th>Copies</th>
            <th>Book Pub</th>
            <th>Publisher Name</th>
            <th>ISBN</th>
            <th>Copyright Year</th>
            <th>Date Added</th>
            <th>Status</th>
            <th>Action</th>  
        </tr>
    </thead>
    <tbody>
        <?php 
        if (mysqli_num_rows($user_query) == 0) {
            echo "<tr><td colspan='12'><div class='alert alert-info'>No books found matching the search criteria.</div></td></tr>";
        } else {
            while ($row = mysqli_fetch_array($user_query)) {
                $id = $row['book_id'];  
                $cat_id = $row['category_id'];
                $book_copies = $row['book_copies'];

                // Get pending borrows
                $borrow_details = mysqli_query($conn, "SELECT * FROM borrowdetails WHERE book_id = '$id' AND borrow_status = 'pending'");
                $count = mysqli_num_rows($borrow_details);
                $total = $book_copies - $count;

                // Get category name
                $cat_query = mysqli_query($conn, "SELECT * FROM category WHERE category_id = '$cat_id'");
                $cat_row = mysqli_fetch_array($cat_query);
        ?>
        <tr class="del<?php echo $id; ?>">
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $cat_row['classname']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $row['book_pub']; ?></td>
            <td><?php echo $row['publisher_name']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['copyright_year']; ?></td>
            <td><?php echo $row['date_added']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <?php include('toolttip_edit_delete.php'); ?>
                <a rel="tooltip" title="Delete" id="<?php echo $id; ?>" href="#delete_book<?php echo $id; ?>" data-toggle="modal" class="btn btn-danger">
                    <i class="icon-trash icon-large"></i>
                </a>
                <?php include('delete_book_modal.php'); ?>
                <a rel="tooltip" title="Edit" id="e<?php echo $id; ?>" href="edit_book.php?id=<?php echo $id; ?>" class="btn btn-success">
                    <i class="icon-pencil icon-large"></i>
                </a>
            </td>
        </tr>
        <?php 
            } // end while
        } // end else
        ?>
    </tbody>
</table>
