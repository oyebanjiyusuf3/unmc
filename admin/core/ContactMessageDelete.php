<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}

$message_id = filter_input(INPUT_GET, 'message_id', FILTER_SANITIZE_NUMBER_INT);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM ".DB_PREFIX."contact_messages_rep WHERE message_id = ?"; 
$conn->prepare($sql)->execute([$message_id]);

$sql = "DELETE FROM ".DB_PREFIX."contact_messages WHERE message_id = ? LIMIT 1"; 
$conn->prepare($sql)->execute([$message_id]);

header("Location: ../account.php?page=pro-contact-messages&msg=delete_ok&pagenum=$pagenum");
exit; 