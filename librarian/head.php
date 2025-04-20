<!-- head.php -->

<!-- ✅ Bootstrap 2.3.2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@2.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@2.3.2/css/bootstrap-responsive.min.css">

<!-- ✅ jQuery (must come before Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<!-- ✅ Bootstrap 2.3.2 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@2.3.2/js/bootstrap.min.js"></script>

<!-- Optional: your own custom CSS -->
<link rel="stylesheet" href="your-custom-style.css">

<!-- Header content -->
<div class="span12">
    <div class="header">
        <div class="pull-left">
            <img class="stilogo img-rounded" src="LMS/vit.png" alt="M & A Library Logo" style="width:1100px; height:auto;">
        </div>
    </div>

    <div class="alert alert-info">
        Welcome to M & A Library&nbsp;

        <div class="pull-right">
            <i class="icon-calendar icon-small"></i>
            <?php
            date_default_timezone_set('America/New_York');
            echo date('l, F d, Y');
            ?>
        </div>
    </div>
</div>
