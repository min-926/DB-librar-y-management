<?php
session_start();
if (!isset($_SESSION['adminID'])) {
    header("Location: admin_login.php");
    exit();
}
$connection = mysqli_connect("localhost", "root", "", "eb_lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Branch Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- for icons -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin_dashboard.php">Admin Panel</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="staff.php">Staff</a></li>
      <li class="nav-item"><a class="nav-link" href="patron.php">Patron</a></li>
      <li class="nav-item"><a class="nav-link" href="library_branch.php">Library Branch</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
    <div class="alert alert-danger d-flex justify-content-between align-items-center">
        <strong><i class="fa fa-building"></i> Library Branch Table</strong>
        <a href="add_branch.php" class="btn btn-sm btn-outline-light">+ Add Branch</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Branch ID</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    $user_query = mysqli_query($connection, "SELECT * FROM librarybranch") or die(mysqli_error($connection));
                    while ($row = mysqli_fetch_array($user_query)) {
                        $id = $row['branchid'];
                ?>
                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row['branchid']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="#delete_student<?php echo $id; ?>" data-toggle="modal" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="edit_branch.php?id=<?php echo $id; ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                                <?php include('delete_student_modal.php'); ?>
                            </td>
                        </tr>
                <?php 
                    } // ✅ properly closed the while loop
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
