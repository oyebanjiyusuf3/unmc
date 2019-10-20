<?php 
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require ABSPATH."/core/smtp/PHPMailerAutoload.php";

$test_email = filter_input(INPUT_POST, 'test_email', FILTER_SANITIZE_EMAIL);

if($test_email=="")
	{
	header("Location: ../account.php?page=pro-settings");
	exit;
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
		$mail->AddAddress($test_email);  
				
		$mail->IsHTML(true);                                  // Set email format to HTML
		
		$mail->Subject = 'Test email from '.ADMIN_URL;
		$mail->Body    = '
		<html>
		<head>
		  <title>Test email</title>
		</head>
		<body>
		  <div style="font-size:12px;font-family:arial;">
		  <p>This is a test email from '.ADMIN_URL.'. Congratulations! Your email settings works fine.</p>
		  </div>
		</body>
		</html>
		';
		$mail->AltBody = 'This is a test email from '.ADMIN_URL.'. Congratulations! Your email settings works fine.';
		
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
		$to      = '$test_email';
		$subject = 'Test email from '.ADMIN_URL;
		$message = '
		<html>
		<head>
		  <title>Test email</title>
		</head>
		<body>
		  <div style="font-size:12px;font-family:arial;">
		  <p>This is a test email from '.ADMIN_URL.'. Congratulations! Your email settings works fine.</p>
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
		mail($test_email, $subject, $message, $headers);
		
		//-------------------------------------------------------------------------------------------------------------
	}

	
header("Location: ../account.php?page=pro-settings&msg=test_email_ok");
exit;
	