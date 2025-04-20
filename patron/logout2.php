<?php
session_start();
session_unset();  // 清除所有session变量
session_destroy();  // 销毁session

header("index.php");  // 回到首页
exit();
?>
