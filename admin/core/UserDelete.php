<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}

$user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare("SELECT protected FROM ".DB_PREFIX."users WHERE user_id = ?");
$stmt->execute([$user_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$protected = $row['protected'];

if($protected==1)
	{
	header("Location: ../account.php?page=pro-users&msg=error_delete_protected&pagenum=$pagenum");
	exit;
	}

$sql = "DELETE FROM ".DB_PREFIX."users_extra WHERE user_id = ?"; 
$conn->prepare($sql)->execute([$user_id]);

$sql = "DELETE FROM ".DB_PREFIX."users WHERE user_id = ? LIMIT 1"; 
$conn->prepare($sql)->execute([$user_id]);

header("Location: ../account.php?page=pro-users&msg=delete_ok&pagenum=$pagenum");
exit; 