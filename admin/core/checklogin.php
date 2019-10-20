<?php
if(!isset($_SESSION)) session_start();

if (isset($_COOKIE['pike_rememberme']))
	{
		// User is logged (cookie)
		$token = filter_input(INPUT_COOKIE, 'pike_rememberme', FILTER_SANITIZE_ENCODED);
	}
	
else if(isset($_SESSION['user_token']))
	{
		// User is logged (session)
		$token = filter_var($_SESSION['user_token']);
	}

else
	{
		// User not logged
		header("location: ".ADMIN_URL."/index.php?msg=not_logged");
		exit;
	}
	
// User logged	
$stmt = $conn->prepare("SELECT user_id, name, email, role_id, avatar FROM ".DB_PREFIX."users WHERE token = ? AND active = 1 LIMIT 1");
$stmt->bindParam(1, $token);
$stmt->execute();	

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$logged_user_id = $row['user_id'];
$logged_user_name = stripslashes($row['name']);
$logged_user_email = stripslashes($row['email']);
$logged_user_role_id = $row['role_id'];
$logged_user_avatar = $row['avatar'];
if($logged_user_avatar=="") $logged_user_avatar = "no_avatar.png";

if ($row==0 or !$row)
	{
		$_SESSION = array();
		session_destroy();
		setcookie('pike_rememberme', '', time()-60*60*24*130, "/");  // 130 days ago
		header("location: ".ADMIN_URL."/index.php?msg=invalid_user");
		exit;
	}
			
$sql = "SELECT role FROM ".DB_PREFIX."users_roles WHERE role_id = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $logged_user_role_id, PDO::PARAM_INT);
$stmt->execute();	
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$logged_user_role = stripslashes($row['role']);

// update last activity
$now = date("Y-m-d H:i:s");
$sql = "UPDATE ".DB_PREFIX."users SET last_activity = ? WHERE user_id = ? ORDER BY user_id DESC LIMIT 1"; 
$conn->prepare($sql)->execute([$now, $logged_user_id]);