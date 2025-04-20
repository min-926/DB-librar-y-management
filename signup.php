<?php 
session_start();
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_number = $_POST['id_number'];
    $password = $_POST['password'];

    // 查询 patron 表
    $query = mysqli_query($conn, "SELECT * FROM patron WHERE libraryCardID = '$id_number' AND Password = '$password'") or die(mysqli_error($conn));

    if (mysqli_num_rows($query) > 0) {
        // 登录成功
        header("Location: patron_dashbord.php");
        exit();
    } else {
        // 登录失败
        header("Location: access_denied.php");
        exit();
    }
}
?>

<?php include('header.php'); ?> 
<?php include('navbar.php'); ?>

<div class="container">
    <div class="margin-top">

        <div class="row">
            <?php include('head.php'); ?>
        </div>

        <!-- Sign In -->
        <section class="row" style="margin-top: 40px;">
            <div class="span12">
                <h4 class="text-center">Sign In</h4>
                <div class="well">

                    <!-- 登录表单 -->
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label" for="id_number">ID NUMBER</label>
                            <div class="controls">
                                <input type="text" name="id_number" id="id_number" placeholder="ID Number" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <label class="control-label" for="password">PASSWORD</label>
                            <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-success">
                                <i class="icon-signin icon-large"></i> Sign in
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>

    </div>
</div>

<?php include('footer.php'); ?>
