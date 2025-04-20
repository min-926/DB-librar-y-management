<?php
session_start();
if (!isset($_SESSION['adminID'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Staff</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin Panel</a>
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
    <h2 class="text-center mb-4">Staff Management</h2>
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <div><i class="fa fa-user"></i> Staff Table</div>
            <a href="add_student.php" class="btn btn-sm btn-light">+ Add Staff</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    $connection = mysqli_connect("localhost", "root", "", "eb_lms") or die("Connection failed: " . mysqli_connect_error());
                    $staff_query = mysqli_query($connection, "SELECT * FROM staff") or die(mysqli_error($connection));

                    while($row = mysqli_fetch_array($staff_query)) {
                        $id = $row['staffid'];
                ?>
                    <tr class="del<?php echo $id ?>">
                        <td><?php echo $row['staffid']; ?></td>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['branch']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['street']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['zipcode']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#delete_staff<?php echo $id; ?>" data-toggle="modal" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                            </div>
                            <?php include('delete_user_modal.php'); ?>
                        </td>
                    </tr>
                <?php } ?>
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
