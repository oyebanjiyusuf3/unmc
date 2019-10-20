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
$response_id = filter_input(INPUT_GET, 'response_id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM ".DB_PREFIX."contact_messages_rep WHERE id = ?"; 
$conn->prepare($sql)->execute([$response_id]);

header("Location: ../account.php?page=pro-contact-messages-details&message_id=$message_id&msg=reply_delete_ok");
exit; 