<?php
session_start();
require_once "../config.php";

$activation_code = filter_input(INPUT_GET, 'activation_code', FILTER_SANITIZE_STRING);

if (!$activation_code)
	{
	header("Location: ../index.php?msg=error_activation_code");
	exit();
	}
	
$query = "SELECT user_id FROM ".DB_PREFIX."users_extra WHERE name = 'activation_code' AND value = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $activation_code);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $row['user_id'];
$exist_code = $stmt->rowCount();

if($exist_code==1)
{	
	// update password
	$query = "UPDATE ".DB_PREFIX."users SET active = 1, email_verified = 1 WHERE user_id = ? LIMIT 1"; 
	$stmt = $conn->prepare($query);
	$stmt->bindParam(1, $user_id, PDO::PARAM_INT);
	$stmt->execute();
	
	// remove activation code
	$query = "DELETE FROM ".DB_PREFIX."users_extra WHERE name = 'activation_code' AND user_id = ?";
	$stmt = $conn->prepare($query);
	$stmt->execute([$user_id]);
	
	header("Location: ../index.php?msg=user_active");
	exit;
} 
else
{
	header("Location: ../index.php?msg=invalid_activation_code");
	exit;
}

exit;