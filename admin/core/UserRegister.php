<?php
session_start();
if(isset($_SESSION['user_token']) or isset($_COOKIE['user_token']) )
	{
	// user is logged
	header("location: ../account.php");
	exit;
	}

require_once "../config.php";
require_once ABSPATH."/core/functions.php";
require_once ABSPATH."/core/PasswordHash.php";
require_once ABSPATH."/core/resize-class.php";
require_once ABSPATH."/core/smtp/PHPMailerAutoload.php";


if(DEMO_MODE!=0)
	{
	header("Location:../index.php?msg=demo_mode");
	exit();
	}
	
$return_page = "../register.php";

if($cfg_registration_enabled==0)
	{
	header("Location: $return_page?msg=error_registration_disabled");
	exit();
	}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$password2 = filter_input(INPUT_POST, 'password2');
$permalink = RewriteUrl($name);

if (strlen($name)==0)
	{
	header("Location: $return_page?msg=error_name&name=$name&email=$email");
	exit();
	}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) or !$email)
	{
	header("Location: $return_page?msg=error_email&name=$name&email=$email");
	exit();
	}

if (strlen($password)<5)
	{
	header("Location: $return_page?msg=error_short_passw&name=$name&email=$email");
	exit();
	}

if ($password!=$password2)
	{
	header("Location: $return_page?msg=error_passw&name=$name&email=$email");
	exit();
	}	

if($cfg_registration_captcha_enabled==1)
	{
	// captcha verification
	
	
	}

// check for duplicate email
$stmt = $conn->prepare("SELECT * FROM ".DB_PREFIX."users WHERE email = ?");
$stmt->execute([$email]);
$exist_email = $stmt->fetchColumn();

if($exist_email!=0)
	{
	header("Location: $return_page?msg=error_duplicate_email&name=$name&email=$email");
	exit();
	}


$now = date("Y-m-d H:i:s");
$ip_reg = $_SERVER['REMOTE_ADDR'];
$host_reg = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$activation_code = md5(random_code());	
$role_id = $cfg_registration_user_role;

$hasher = new PasswordHash(8, false);
$password_db = $hasher->HashPassword($password);
	
$query = "INSERT INTO ".DB_PREFIX."users (user_id, name, email, permalink, password, role_id, active, email_verified, protected) VALUES (NULL, ?, ?, ?, ?, ?, 0, 0, 0)"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $name, PDO::PARAM_STR);
$stmt->bindParam(2, $email, PDO::PARAM_STR);
$stmt->bindParam(3, $permalink, PDO::PARAM_STR);
$stmt->bindParam(4, $password_db, PDO::PARAM_STR);
$stmt->bindParam(5, $role_id, PDO::PARAM_INT);
$stmt->execute();

$user_id = $conn->lastInsertId(); // last inserted ID

addUsersExtraUnique ($user_id, 'register_time', $now);
addUsersExtraUnique ($user_id, 'register_ip', $ip_reg);
addUsersExtraUnique ($user_id, 'register_host', $host_reg);
addUsersExtraUnique ($user_id, 'activation_code', $activation_code);

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
	

// *****************************************************************************************************************************
// SEND MAIL
// *****************************************************************************************************************************
if($cfg_mail_sending_option=="smtp")
	{
		// SMTP MAILER	
		//----------------------------------------------------------------------------------------------------------		
		$mail = new PHPMailer;
		
		$mail->IsSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $cfg_mail_smtp_server;                 // Specify main and backup server
		$mail->Port = $cfg_mail_smtp_port;                                    // Set the SMTP port
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $cfg_mail_smtp_user;                // SMTP username
		$mail->Password = $cfg_mail_smtp_password;                  // SMTP password
		$mail->SMTPSecure = $cfg_mail_smtp_encryption;                            // Enable encryption, 'ssl' also accepted
		
		$mail->setFrom($cfg_site_email, $cfg_site_email_name);
		$mail->addReplyTo($cfg_site_email);
		$mail->AddAddress($email);  
		
		$mail->IsHTML(true);                                  // Set email format to HTML
		
		$mail->Subject = 'Your registration and activation on '.$cfg_site_title;
		$mail->Body    = '
		<html>
		<head>
		  <title>New user registration</title>
		</head>
		<body>
		  <div style="font-size:12px;font-family:arial;">
		  <p>Hello!</p>
		  You have registered on '.$cfg_site_title.'<br><br>
		  <strong>Your Email is: '.$email.'<br>
		  Your password is: '.$password.'</strong><br><br>
		  <strong>YOU MUST ACTIVATE ACCOUNT. </strong><br />
		  Click here to activate your account: <a href="'.ADMIN_URL.'/core/UserActivate.php?activation_code='.$activation_code.'">ACTIVATE ACCOUNT</a><br><br>
		  Thank you!<br><br>
		  </div>
		</body>
		</html>
		';
		$mail->AltBody = 'Your Email is: '.$email.'\n  Your password is: '.$password.'\n\n YOU MUST ACTIVATE ACCOUNT HERE: '.$ADMIN_URL.'/core/UserActivate.php?activation_code='.$activation_code.'';
		
		if(!$mail->Send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
		

	}

else
	{
		// PHP MAILER	
		//----------------------------------------------------------------------------------------------------------
		$to      = '$email';
		$subject = 'Your registration and activation on '.$cfg_site_title;
		$message = '
		<html>
		<head>
		  <title>New user registration</title>
		</head>
		<body>
		  <div style="font-size:12px;font-family:arial;">
		  <p>Hello!</p>
		  You have registered on '.$cfg_site_title.'<br><br>
		  <strong>Your Email is: '.$email.'<br>
		  Your password is: '.$password.'</strong><br><br>
		  <strong>YOU MUST ACTIVATE ACCOUNT. </strong><br />
		  Click here to activate your account: <a href="'.ADMIN_URL.'/core/UserActivate.php?activation_code='.$activation_code.'">ACTIVATE ACCOUNT</a><br><br>
		  Thank you!<br><br>
		  </div>
		</body>
		</html>
		';

		// HTML mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'From: '.$config_site_email."\r\n" .
			'Reply-To: '.$config_site_email."\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($email, $subject, $message, $headers);
		
		//-------------------------------------------------------------------------------------------------------------
	}

header("Location: ../index.php?msg=register_ok");
exit;
