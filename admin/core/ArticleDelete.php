<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}

$article_id = filter_input(INPUT_GET, 'article_id', FILTER_SANITIZE_NUMBER_INT);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM ".DB_PREFIX."users_extra WHERE user_id = ?"; 
$conn->prepare($sql)->execute([$user_id]);

$sql = "DELETE FROM ".DB_PREFIX."articles WHERE article_id = ? LIMIT 1"; 
$conn->prepare($sql)->execute([$article_id]);

header("Location: ../account.php?page=pro-articles&msg=delete_ok&pagenum=$pagenum");
exit; 