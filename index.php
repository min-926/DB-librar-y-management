<?php include('header.php'); ?>

<?php include('navbar.php'); ?>

<div class="container">
    <div class="margin-top">
        <div class="row">

            <?php include('head.php'); ?>

            <div class="span3"> <!-- ✅ sidebar 占3列 -->
                <div class="life-side-bar" style="background:#f9f9f9; padding:10px; border:1px solid #ccc;">
                    <ul class="nav nav-tabs nav-stacked">
                        
                        <a href="contact.php" target="_blank">Contact Us</a>
                    </ul>
                    <strong>Address</strong>
                    <p>GSU University</p>
                    <p>Telephone No. :</p>
                    <p>123-24567890</p>
                </div>
            </div>

            <div class="span9"> <!-- ✅ 主内容区域 -->
                <p>
                    This library management system promotes library usage through recommendation and review systems.
                    Our system allows patrons to rate and review the books they have borrowed from the library, and that data is then used
                    to provide recommendations based on statistics for similar books. It also allows for basic library functions, such as
                    hiring new staff, signing up for library cards, and borrowing books.
                </p>
            </div>

        </div>
    </div>
</div>

<?php include('footer.php'); ?>
