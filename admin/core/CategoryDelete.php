<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}

$categ_id = filter_input(INPUT_GET, 'categ_id', FILTER_SANITIZE_NUMBER_INT);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE ".DB_PREFIX."articles SET categ_id = 0 WHERE categ_id = ?"; 
$conn->prepare($sql)->execute([$categ_id]);

$sql = "DELETE FROM ".DB_PREFIX."categories WHERE categ_id = ? LIMIT 1"; 
$conn->prepare($sql)->execute([$categ_id]);

header("Location: ../account.php?page=pro-categories&msg=delete_ok&pagenum=$pagenum");
exit; 