<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('dbcon.php'); ?>

<?php
// 获取并清理搜索字段
$title = isset($_POST['title']) ? mysqli_real_escape_string($conn, trim($_POST['title'])) : '';
$author = isset($_POST['author']) ? mysqli_real_escape_string($conn, trim($_POST['author'])) : '';
$genre = isset($_POST['genre']) ? mysqli_real_escape_string($conn, trim($_POST['genre'])) : '';
$year = isset($_POST['year']) ? mysqli_real_escape_string($conn, trim($_POST['year'])) : '';

// 构造动态 WHERE 子句
$conditions = ["status != 'Archive'"];

if (!empty($title)) $conditions[] = "book_title LIKE '%$title%'";
if (!empty($author)) $conditions[] = "author LIKE '%$author%'";
if (!empty($genre)) $conditions[] = "genre LIKE '%$genre%'";  // 确保 book 表有 genre 字段
if (!empty($year)) $conditions[] = "copyright_year = '$year'";

$where_clause = implode(" AND ", $conditions);

// 执行查询
$query = "SELECT * FROM book WHERE $where_clause";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<div class="container">
    <h3>Search Results</h3>
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
    if (mysqli_num_rows($result) == 0): ?>
        <tr><td colspan="12"><div class="alert alert-info">No books found matching the search criteria.</div></td></tr>
    <?php 
    else:
        while ($row = mysqli_fetch_array($result)) {
            $book_id = $row['book_id'];
            $cat_id = $row['category_id'];

            // 获取分类名
            $cat_query = mysqli_query($conn, "SELECT classname FROM category WHERE category_id = '$cat_id'");
            $cat_row = mysqli_fetch_assoc($cat_query);
    ?>
    <tr>
        <td><?php echo $row['book_id']; ?></td>
        <td><?php echo $row['book_title']; ?></td>
        <td><?php echo $cat_row['classname'] ?? 'N/A'; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['book_copies']; ?></td>
        <td><?php echo $row['book_pub']; ?></td>
        <td><?php echo $row['publisher_name']; ?></td>
        <td><?php echo $row['isbn']; ?></td>
        <td><?php echo $row['copyright_year']; ?></td>
        <td><?php echo $row['date_added']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><!-- 可以加按钮等 --></td>
    </tr>
    <?php } endif; ?>
</tbody>

    </table>
</div>

<?php include('toolttip_edit_delete.php'); ?>
<?php include('footer.php') ?>