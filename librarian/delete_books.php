<?php
include('dbcon.php');
$id=$_GET['id'];
mysqlI_query($conn,"update book set status = 'Archive' where book_id='$id'")or die(mysqli_error($conn));
header('location:books.php');
?>