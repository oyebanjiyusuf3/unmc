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

if(DEMO_MODE!=0)
	{
	header("Location:../index.php?msg=demo_mode");
	exit();
	}
	
$return_page = "../reset-password.php";

$redirect = filter_input(INPUT_POST, 'redirect', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL) or !$email)
	{
	header("Location: $return_page?msg=error_email");
	exit();
	}

$query = "SELECT user_id FROM ".$database_table_prefix."users WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $email);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $row['user_id'];
$exist_user = $stmt->rowCount();

if($exist_user==1)
{
	// generate a new code
	$code = md5(random_code());	
    addUsersExtraUnique ($user_id, 'reset_password_code', $code);
	

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
				
				$mail->Subject = 'Password reset - '.$cfg_site_title;
				$mail->Body    = '
				<html>
				<head>
				  <title>Password reset</title>
				</head>
				<body>
				  <div style="font-size:12px;font-family:arial;">
				  <p>Hello!</p>
				  You choose to reset your password on '.$cfg_site_title.'<br><br>
				  <strong>To reset password, please click on this link: <a href="'.ADMIN_URL.'/core/UserUpdatePassword.php?code='.$code.'">Reset password</a>.</strong><br><br>
				  Thank you!<br><br>
				  </div>
				</body>
				</html>
				';
				$mail->AltBody = 'To reset password, please click on this link: <a href="'.ADMIN_URL.'/core/UserUpdatePassword.php?code='.$code.'">Reset password</a>';
				
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
				$subject = 'Password reset - '.$cfg_site_title;
				$message = '
				<html>
				<head>
				  <title>Password reset</title>
				</head>
				<body>
				  <div style="font-size:12px;font-family:arial;">
				  <p>Hello!</p>
				  You choose to reset your password on '.$cfg_site_title.'<br><br>
				  <strong>To reset password, please click on this link: <a href="'.ADMIN_URL.'/core/UserUpdatePassword.php?code='.$code.'">Reset password</a>.</strong><br><br>
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
	header("Location: ../reset-password.php?msg=error_email");
	exit;
}

header("Location: ../index.php?msg=reset_password_ok");
exit;
