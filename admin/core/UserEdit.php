<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";
require_once ABSPATH."/core/PasswordHash.php";
require_once ABSPATH."/core/resize-class.php";

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}

$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);	
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$role_id = filter_input(INPUT_POST, 'role_id', FILTER_SANITIZE_NUMBER_INT);
$active = filter_input(INPUT_POST, 'active', FILTER_SANITIZE_NUMBER_INT);
$email_verified = filter_input(INPUT_POST, 'email_verified', FILTER_SANITIZE_NUMBER_INT);
$skype = filter_input(INPUT_POST, 'skype', FILTER_SANITIZE_STRING);

$permalink = RewriteUrl($name);

// check for inputs
if($name=="")
	{
	header("Location:../account.php?page=pro-users&msg=error_name");
	exit();
	}
if(!filter_var($email, FILTER_VALIDATE_EMAIL) or !$email)
	{
	header("Location:../account.php?page=pro-users&msg=error_email");
	exit();
	}

// check for duplicate email
$stmt = $conn->prepare("SELECT * FROM ".DB_PREFIX."users WHERE email = ? AND user_id != ?");
$stmt->execute([$email, $user_id]);
$exist_email = $stmt->fetchColumn();

if($exist_email!=0)
	{
	header("Location: ../account.php?page=pro-users&msg=error_duplicate_email");
	exit();
	}

if($password)
	{
	$hasher = new PasswordHash(8, false);
	$password_db = $hasher->HashPassword($password);
	
	$query = "UPDATE ".DB_PREFIX."users SET password = ? WHERE user_id = ? LIMIT 1"; 	
	$stmt = $conn->prepare($query);
	$stmt->bindParam(1, $password_db, PDO::PARAM_STR);
	$stmt->bindParam(2, $user_id, PDO::PARAM_INT);
	$stmt->execute();
	} 
	
$query = "UPDATE ".DB_PREFIX."users SET email = ?, name = ?, permalink = ?, role_id = ?, active = ?, email_verified = ? WHERE user_id = ? LIMIT 1"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $email, PDO::PARAM_STR);
$stmt->bindParam(2, $name, PDO::PARAM_STR);
$stmt->bindParam(3, $permalink, PDO::PARAM_STR);
$stmt->bindParam(4, $role_id, PDO::PARAM_INT);
$stmt->bindParam(5, $active, PDO::PARAM_INT);
$stmt->bindParam(6, $email_verified, PDO::PARAM_INT);
$stmt->bindParam(7, $user_id, PDO::PARAM_INT);
$stmt->execute();

if ($skype) addUsersExtraUnique ($user_id, 'skype', $skype);	

// AVATAR
if($_FILES['image']['name'])
	{
	$f = $_FILES['image']['name'];
	$ext = strtolower(substr(strrchr($f, '.'), 1));
	if (($ext!= "jpg") && ($ext != "jpeg") && ($ext != "gif") && ($ext != "png")) 
		{
		}

	else
		{
		$image_code = random_code();
		$image = $image_code."-".$_FILES['image']['name'];
		$image = RewriteFile($image);
		move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/temp/".$image);

		// create avatar image
		$resizeObj = new resize("../uploads/temp/".$image); 
		$resizeObj -> resizeImage(200, 200, 'crop'); // (options: exact, portrait, landscape, auto, crop) 
		$resizeObj -> saveImage("../uploads/avatars/".$image);
		
		@unlink ("../uploads/temp/".$image);
		$sql = "UPDATE ".DB_PREFIX."users SET avatar = ? WHERE user_id = ? LIMIT 1"; 
		$conn->prepare($sql)->execute([$image, $user_id]);
		}
	}

// form OK:
header("Location: ../account.php?page=pro-users&msg=edit_ok");	
exit;