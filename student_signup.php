<?php
// Connect to eb_lms database
$conn = mysqli_connect("localhost", "root", "", "eb_lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_no = mysqli_real_escape_string($conn, $_POST['student_no']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    // Check if student number already exists
    $check_query = mysqli_query($conn, "SELECT * FROM students WHERE student_no = '$student_no'");
    $count = mysqli_num_rows($check_query);

    if ($count > 0) {
        $message = "❌ Student number already exists!";
    } elseif ($password !== $cpassword) {
        $message = "❌ Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $status = 'active';

        $insert_query = "INSERT INTO students (student_no, password, status) 
                         VALUES ('$student_no', '$hashed_password', '$status')";

        if (mysqli_query($conn, $insert_query)) {
            $message = "✅ Sign up successful!";
        } else {
            $message = "❌ Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Student Sign Up</h2>
    <?php if ($message): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label for="student_no">Student No:</label>
            <input type="text" class="form-control" id="student_no" name="student_no" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password:</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
</body>
</html>
