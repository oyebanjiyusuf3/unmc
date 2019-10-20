<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}

$page_id = filter_input(INPUT_GET, 'page_id', FILTER_SANITIZE_NUMBER_INT);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM ".DB_PREFIX."pages WHERE page_id = ? LIMIT 1"; 
$conn->prepare($sql)->execute([$page_id]);

header("Location: ../account.php?page=pro-pages&msg=delete_ok&pagenum=$pagenum");
exit; 