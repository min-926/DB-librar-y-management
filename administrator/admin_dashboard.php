<?php
session_start();
if (!isset($_SESSION['adminID'])) {
    header("Location: admin_login.php");
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
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
    <h2 class="text-center">Welcome Administrator 👋</h2>
</div>
</body>
</html>
