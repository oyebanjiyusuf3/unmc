<?php
session_start();
require_once "../config.php";
require_once ABSPATH."/core/PasswordHash.php";
require_once ABSPATH."/core/random_compat/lib/random.php";

$login_email = filter_input(INPUT_POST, 'login_email', FILTER_SANITIZE_EMAIL);
$login_password = filter_input(INPUT_POST, 'login_password');
$redirect = filter_input(INPUT_POST, 'redirect', FILTER_SANITIZE_ENCODED);

if (!filter_var($login_email, FILTER_VALIDATE_EMAIL))
    {
	header("Location: index.php?msg=error&redirect=$redirect");
	exit;
	}

// Passwords should never be longer than 72 characters to prevent DoS attacks
if (strlen($login_password) > 72) { die('Password must be 72 characters or less'); }	

$dbPassword = '*'; // In case the user email is not found

$query = "SELECT password FROM ".DB_PREFIX."users WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $login_email);
$stmt->execute();
$exist_user = $stmt->rowCount();

if($exist_user==1)
{
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbPassword = $row['password'];
    
	$hasher = new PasswordHash(8, false);
	
	if($hasher->CheckPassword($login_password, $dbPassword))
		{
			//paswword OK
			$query = "SELECT user_id, active FROM ".DB_PREFIX."users WHERE email = ? LIMIT 1";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1, $login_email);
			$stmt->execute();		
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$user_id = $row['user_id'];
			$user_active = $row['active'];
			
			if($user_active==0)
				{
				header("Location: ../index.php?msg=error_inactive&redirect=$redirect");
				exit;
				}
				
			session_regenerate_id (); 
			$authenticator = random_bytes(33);
			$user_token = hash('sha256', $authenticator);
			
			$_SESSION['user_token'] = $user_token;	
		
			// remember me
			if(isset($_POST['remember']))
				{				
				setcookie('pike_rememberme', $user_token, time()+60*60*24*120, '/', '', true, true);
				} 
			
			$sql  = "UPDATE ".DB_PREFIX."users SET token = ? WHERE user_id = ? LIMIT 1"; 
			$conn->prepare($sql)->execute([$user_token, $user_id]);
					
			if($redirect!="")
				header("location: ".urldecode($redirect));
			else
				header("location: ../account.php");	
			exit;	
		} // end if
		else
			{
			header("Location: ../index.php?msg=error&redirect=$redirect");
			exit;
			}
} 
else
{
	header("Location: ../index.php?msg=error&redirect=$redirect");
	exit;
}

unset($hasher);
exit;