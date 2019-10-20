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
require_once ABSPATH."/core/smtp/PHPMailerAutoload.php";
require_once ABSPATH."/core/PasswordHash.php";

if(DEMO_MODE!=0)
	{
	header("Location:../index.php?msg=demo_mode");
	exit();
	}
	
$return_page = "../reset-password.php";

$code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);

if (!$code)
	{
	header("Location: index.php?msg=error_reset_code");
	exit();
	}
	
$new_password = random_code_captcha();	

// Passwords should never be longer than 72 characters to prevent DoS attacks
if (strlen($new_password) > 72 or strlen($new_password) < 4) { die('Password must be 4 to 72 characters'); }	

$query = "SELECT user_id FROM ".$database_table_prefix."users_extra WHERE name = 'reset_password_code' AND value = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $code);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $row['user_id'];
$exist_code = $stmt->rowCount();	
	
	
	
if($exist_code==1)
{
		$hasher = new PasswordHash(8, false);
		$password_db = $hasher->HashPassword($new_password);
		
		if (strlen($password_db) < 20) 
			{
			// something went wrong
			header("Location: index.php?msg=sometging_wrong");
			exit();
			} 
		
		// update password
		$query = "UPDATE ".$database_table_prefix."users SET password = ? WHERE user_id = ? LIMIT 1"; 
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1, $password_db, PDO::PARAM_STR);
		$stmt->bindParam(2, $user_id, PDO::PARAM_INT);
		$stmt->execute();
		
		// remove activation code
		$query = "DELETE FROM ".$database_table_prefix."users_extra WHERE name = 'activation_code' AND user_id = ?";
		$stmt = $conn->prepare($query);
		$stmt->execute([$user_id]);
		
		// user email
		$query = "SELECT email FROM ".$database_table_prefix."users WHERE user_id = ? LIMIT 1";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1, $user_id, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$email = $row['email'];
		

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
				
				$mail->Subject = 'New password for '.$cfg_site_title;
				$mail->Body    = '
				<html>
				<head>
				  <title>New password</title>
				</head>
				<body>
				  <div style="font-size:12px;font-family:arial;">
				  <p>Hello!</p>
				  You choose to reset your password on '.$cfg_site_title.'<br>
				  Your NEW password is: <strong>'.$new_password.'</strong><br><br>You can change password in your profile page.<br /><br />
				  Login in your account here: <a href="'.ADMIN_URL.'/index.php">Login</a>.<br><br>
				  Thank you!<br><br>
				  </div>
				</body>
				</html>
				';
				$mail->AltBody = 'Your NEW password is: <strong>'.$new_password.'</strong><br><br>You can change password in your profile page.';
				
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
				$subject = 'New password for '.$cfg_site_title;
				$message = '
				<html>
				<head>
				  <title>New password</title>
				</head>
				<body>
				  <div style="font-size:12px;font-family:arial;">
				  <p>Hello!</p>
				  You choose to reset your password on '.$cfg_site_title.'<br>
				  Your NEW password is: <strong>'.$new_password.'</strong><br><br>You can change password in your profile page.<br /><br />
				  Login in your account here: <a href="'.ADMIN_URL.'/index.php">Login</a>.<br><br>
				  Thank you!<br><br>
				  </div>
				</body>
				</html>
				';

				// HTML mail
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				$headers .= 'From: '.$cfg_site_email."\r\n" .
					'Reply-To: '.$cfg_site_email."\r\n" .
					'X-Mailer: PHP/' . phpversion();
				mail($email, $subject, $message, $headers);
				
				//-------------------------------------------------------------------------------------------------------------
			}
}

else
{
	header("Location: ../reset-password.php?msg=invalid_reset_code");
	exit;
}

$query = "DELETE FROM ".$database_table_prefix."users_extra WHERE name = 'reset_password_code' AND user_id = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $user_id);
$stmt->execute();

unset($hasher);
header("Location: ../index.php");
exit;
