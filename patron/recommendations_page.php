<?php
session_start();
include('dbcon.php');

if (!isset($_SESSION['libraryCardID'])) {
    header("Location: signup.php");
    exit();
}

$libraryCardID = $_SESSION['libraryCardID'];

// 查询该用户的评分记录
$query = mysqli_prepare($conn, "
    SELECT r.book_id, r.rating, r.rated_at, b.book_title
    FROM rating r
    JOIN book b ON r.book_id = b.book_id
    WHERE r.libraryCardID = ?
    ORDER BY r.rated_at DESC
");

mysqli_stmt_bind_param($query, 'i', $libraryCardID); // 确保是整数类型
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);

include('head.php');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">📚 M & A Library</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="dashboard.php" class="btn btn-outline-light btn-sm me-2">Back</a>
          <button type="button" class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#logoutModal">
            Logout
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h3 class="mb-4 text-primary text-center">📋 Your Ratings</h3>
    <?php if (mysqli_num_rows($result) == 0): ?>
        <div class="alert alert-info text-center">You haven't rated any books yet.</div>
    <?php else: ?>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>📘 Book Title</th>
                    <th>⭐ Rating</th>
                    <th>🕓 Rated At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                        <td><?php echo str_repeat("⭐", (int)$row['rating']); ?></td>
                        <td><?php echo htmlspecialchars($row['rated_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
