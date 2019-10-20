<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}
	
$query = "SELECT avatar FROM ".DB_PREFIX."users WHERE user_id = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $logged_user_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$avatar = $row['avatar'];

@unlink ("../uploads/avatars/".$avatar);

$query = "UPDATE ".DB_PREFIX."users SET avatar = '' WHERE user_id = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $logged_user_id);
$stmt->execute();
