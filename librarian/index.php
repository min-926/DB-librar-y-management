<?php
session_start();
include('dbcon.php');

// 处理登录表单
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 使用 prepared statements 防注入
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['user_id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $login_error = "Access Denied: Incorrect Username or Password";
    }
}
?>

<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<div class="container">
    <div class="margin-top">
        <div class="row">	
            <div class="span12">
                <div class="sti">
                    <img src="../LMS/vit.png" class="img-rounded">
                </div>
                <div class="login">
                    <div class="log_txt">
                        <p><strong>Please Enter the Details Below..</strong></p>
                    </div>
                    
                    <form class="form-horizontal" method="POST">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Username</label>
                            <div class="controls">
                                <input type="text" name="username" id="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button id="login" name="submit" type="submit" class="btn">
                                    <i class="icon-signin icon-large"></i>&nbsp;Submit
                                </button>
                            </div>
                        </div>
                    </form>

                    <?php if (isset($login_error)): ?>
                        <div class="alert alert-danger"><?php echo $login_error; ?></div>
                    <?php endif; ?>
                </div>
            </div>		
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
