<?php
include('dbcon.php');

// Initialize error messages
$exist = "";
$success = "";
$error = "";

if (isset($_POST['submit'])) {
    // Trim and sanitize user input
    $student_no = mysqli_real_escape_string($conn, trim($_POST['student_no']));
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Step 1: Check if student number already exists in the database
    $query = mysqli_query($conn, "SELECT * FROM students WHERE student_no = '$student_no'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);

    // Step 2: If student number exists, show error message
    if ($count > 0) {
        $exist = "ID Number already registered!";
    } else {
        // Step 3: If passwords match, proceed with inserting new user
        if ($password === $cpassword) {
            // Hash the password before inserting into the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Step 4: Insert new record into the database
            $insert_query = "INSERT INTO students (student_no, password, status) VALUES ('$student_no', '$hashed_password', 'active')";
            if (mysqli_query($conn, $insert_query)) {
                $success = "Registration successful!";
                // Redirect to the success page (optional)
                echo '<script type="text/javascript">window.location = "success.php";</script>';
            } else {
                $error = "Error during registration: " . mysqli_error($conn);
            }
        } else {
            $error = "Passwords do not match!";
        }
    }
}
?>

<!-- Registration Form -->
<form method="post">
    <div class="row">
        <div class="span6">
            <div class="form-horizontal">
                <!-- Student Number -->
                <div class="control-group">
                    <label class="control-label" for="student_no">Student No:</label>
                    <div class="controls">
                        <input type="text" id="student_no" name="student_no" value="<?php if (isset($_POST['submit'])) echo $student_no; ?>" placeholder="Student No" required>
                        <?php if (isset($_POST['submit']) && $exist != "") echo '<span class="label label-important">' . $exist . '</span>'; ?>
                    </div>
                </div>

                <!-- Password -->
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" name="password" value="<?php if (isset($_POST['submit'])) echo $password; ?>" placeholder="Password" required>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="control-group">
                    <label class="control-label" for="cpassword">Confirm Password</label>
                    <div class="controls">
                        <input type="password" name="cpassword" value="<?php if (isset($_POST['submit'])) echo $cpassword; ?>" placeholder="Confirm Password" required>
                        <?php if (isset($_POST['submit']) && $error != "") echo '<span class="label label-important">' . $error . '</span>'; ?>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="control-group">
                    <div class="controls">
                        <button name="submit" type="submit" class="btn btn-success">
                            <i class="icon-check icon-large"></i> Sign Up
                        </button>
                    </div>
                </div>

                <!-- Success Message -->
                <?php if (isset($_POST['submit']) && $success != "") echo '<span class="label label-success">' . $success . '</span>'; ?>

            </div>
        </div>
    </div>
</form>
