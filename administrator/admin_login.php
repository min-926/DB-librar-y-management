<?php
session_start();
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['admin_id'];
    $password = $_POST['admin_password'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM administrator WHERE ID = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $id, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['adminID'] = $id;
        header("Location: administrator/admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid ID or password.";
    }
}
?>

<!-- Basic Login Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Administrator Login</h2>
    <form method="POST" class="mt-4" style="max-width:400px;margin:auto;">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="admin_id">ID</label>
            <input type="text" class="form-control" name="admin_id" required>
        </div>
        <div class="form-group">
            <label for="admin_password">Password</label>
            <input type="password" class="form-control" name="admin_password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
</div>
</body>
</html>
