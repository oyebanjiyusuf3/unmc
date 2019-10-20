<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie("pike_rememberme", "", time()-60*60*24*120, "/");  // 120 days ago
header("location:index.php?msg=logout");
exit;