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
    <title>Patron Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin_dashboard.php">Admin Panel</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="staff.php">Staff</a></li>
      <li class="nav-item"><a class="nav-link active" href="patron.php">Patron</a></li>
      <li class="nav-item"><a class="nav-link" href="library_branch.php">Library Branch</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<!-- Page Content -->
<div class="container mt-4">
    <div class="alert alert-danger">
        <strong><i class="icon-user icon-large"></i>&nbsp;Patron Table</strong>
    </div>

    <p>
        <a href="add_patron.php" class="btn btn-success">+ Add Patron</a>
    </p>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>libraryCardID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Card Expire</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php  
            $user_query = mysqli_query($connection, "SELECT * FROM patron") or die(mysqli_error($connection));
            while($row = mysqli_fetch_array($user_query)) {
                $id = $row['libraryCardID'];
        ?>
            <tr>
                <td><?php echo $row['libraryCardID']; ?></td>
                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                <td><?php echo $row['Password']; ?></td>
                <td><?php echo $row['cardexpire']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['street']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['state']; ?></td>
                <td><?php echo $row['zipcode']; ?></td>
                <td>
                    <a href="edit_member.php?id=<?php echo $id; ?>" class="btn btn-primary btn-sm" title="Edit">
                        Edit
                    </a>

                    <!-- Delete Button triggers modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_student<?php echo $id; ?>">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete_student<?php echo $id; ?>" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete <?php echo $row['firstname'] . " " . $row['lastname']; ?>?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="delete_student.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
