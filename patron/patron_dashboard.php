<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('dbcon.php'); 

if (!isset($_SESSION['libraryCardID'])) {
    header("Location: signup.php");
    exit();
}

$libraryCardID = $_SESSION['libraryCardID'];

// Debug 输出当前 session 中的卡号
// echo "<pre>Session Card ID: " . htmlspecialchars($libraryCardID) . "</pre>";

$query = mysqli_prepare($conn, "
    SELECT 
        b.book_title AS bookTitle, 
        br.date_borrow AS dateBorrowed, 
        br.due_date AS dueDate,
        br.book_id
    FROM borrow br
    JOIN book b ON br.book_id = b.book_id
    WHERE br.libraryCardID = ?
");


mysqli_stmt_bind_param($query, 's', $libraryCardID);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);

include('head.php'); 
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">📚 M & A Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <button type="button" class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#logoutModal">
            Logout
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">View Your Personal Book Recommendations</h5>
                    <a href="recommendations_page.php" class="recommendations-link">Recommendation</a>
                    <style>
                        .recommendations-link {
                            display: inline-block;
                            padding: 10px 15px;
                            background-color: #3498db;
                            color: white;
                            text-decoration: none;
                            border-radius: 4px;
                            margin: 10px 0;
                        }
                        .recommendations-link:hover {
                            background-color: #2980b9;
                        }
                    </style>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="mb-0">📚 Your Borrowed Books</h4>
                </div>
                <div class="card-body">
                    <?php if (mysqli_num_rows($result) == 0): ?>
                        <div class="alert alert-info text-center">You have no borrowed books.</div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>📘 Title</th>
                                        <th>📅 Borrowed</th>
                                        <th>⏰ Due</th>
                                        <th>📌 Status</th>
                                        <th>🔁 Renew</th>
                                        <th>⭐ Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <?php
                                            $dueDate = new DateTime($row['dueDate']);
                                            $today = new DateTime();
                                            $interval = $today->diff($dueDate);
                                            $daysLeft = $dueDate >= $today ? $interval->days : -$interval->days;
                                            $status = $daysLeft >= 0 ? 'Borrowed' : 'Overdue';
                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['bookTitle']); ?></td>
                                            <td><?php echo htmlspecialchars($row['dateBorrowed']); ?></td>
                                            <td><?php echo htmlspecialchars($row['dueDate']); ?></td>
                                            <td>
                                                <?php if ($status === 'Borrowed'): ?>
                                                    <span class="badge badge-success"><?php echo $status; ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger"><?php echo $status; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($status === 'Borrowed'): ?>
                                                    <form method="post" action="renew.php" class="d-inline">
                                                        <input type="hidden" name="due_date" value="<?php echo $row['dueDate']; ?>">
                                                        <input type="hidden" name="bookTitle" value="<?php echo $row['bookTitle']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-outline-primary">Renew</button>
                                                    </form>
                                                <?php else: ?>
                                                    <button class="btn btn-sm btn-secondary" disabled>Renew</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                            <form method="post" action="rate_book.php" class="d-flex align-items-center justify-content-center">
    <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
    <select name="rating" class="form-select form-select-sm w-auto me-2" required>
        <option value="" disabled selected>Rate</option>
        <option value="1">⭐</option>
        <option value="2">⭐⭐</option>
        <option value="3">⭐⭐⭐</option>
        <option value="4">⭐⭐⭐⭐</option>
        <option value="5">⭐⭐⭐⭐⭐</option>
    </select>
    <button type="submit" class="btn btn-success btn-sm">Submit</button>
</form>

                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
