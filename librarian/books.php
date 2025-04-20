<?php
include('db_connect.php'); // this defines $conn
?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
<div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">

<table class="table table-bordered" id="example" cellpadding="0" cellspacing="0" border="0">
    <thead>
        <tr>
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Copies</th>
            <th>Book Pub</th>
            <th>Publisher Name</th>
            <th>ISBN</th>
            <th>Copyright Year</th>
            <th>Date Received</th>
            <th>Date Added</th>
            <th>Status</th>
            <th class="action">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM book";
        $result = mysqli_query($conn, $query);


        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['book_id'];
            $cat_id = $row['category_id'];
        
            // Get category name (fixed)
            $cat_query = mysqli_query($conn, "SELECT classname FROM category WHERE category_id = '$cat_id'");
            $cat_row = mysqli_fetch_assoc($cat_query);
            $category_name = $cat_row['classname'] ?? 'Unknown';
        
        
        ?>
            <tr>
                <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                <td><?php echo htmlspecialchars($category_name); ?></td>
                <td><?php echo htmlspecialchars($row['author']); ?></td>
                <td><?php echo htmlspecialchars($row['book_copies']); ?></td>
                <td><?php echo htmlspecialchars($row['book_pub']); ?></td>
                <td><?php echo htmlspecialchars($row['publisher_name']); ?></td>
                <td><?php echo htmlspecialchars($row['isbn']); ?></td>
                <td><?php echo htmlspecialchars($row['copyright_year']); ?></td>
                <td><?php echo htmlspecialchars($row['date_receive']); ?></td>
                <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>

                <td class="action">
                    <div class="btn-group">
                        <a rel="tooltip" title="Delete" id="<?php echo $id; ?>" href="#delete_book<?php echo $id; ?>" data-toggle="modal" class="btn-default">
                            <i class="icon-trash icon-large"></i>
                        </a>
                        <?php include('delete_book_modal.php'); ?>

                        <a rel="tooltip" title="Edit" id="e<?php echo $id; ?>" href="edit_book.php?id=<?php echo $id; ?>" class="btn-default">
                            <i class="icon-pencil icon-large"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
