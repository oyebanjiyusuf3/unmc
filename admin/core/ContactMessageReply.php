<?php
require_once "../config.php";
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";
require_once ABSPATH."/core/smtp/PHPMailerAutoload.php";

$message_id = filter_input(INPUT_POST, 'message_id', FILTER_SANITIZE_NUMBER_INT);
$reply = filter_input(INPUT_POST, 'reply', FILTER_SANITIZE_STRING);

if(DEMO_MODE!=0)
	{
	header("Location:../account.php?page=dashboard&msg=demo_mode");
	exit();
	}

if (!$reply)
	{
	header("Location: ../account.php?page=pro-contact-messages-details&message_id=$message_id");
	exit();
	}

$stmt_message = $conn->prepare ("SELECT name, email, subject, message, time FROM ".DB_PREFIX."contact_messages WHERE message_id = ? LIMIT 1");
$stmt_message->execute([$message_id]);		
$row = $stmt_message->fetch(PDO::FETCH_ASSOC);
$name = stripslashes($row['name']);
$email = $row['email'];
$subject = stripslashes($row['subject']);
$message = strip_tags(html_entity_decode(stripslashes($row['message'])));
$time = $row['time'];

$now = date("Y-m-d H:i:s");
	
$query = "INSERT INTO ".DB_PREFIX."contact_messages_rep (id, message_id, sender_user_id, message, time) VALUES (NULL, ?, ?, ?, ?)"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $message_id, PDO::PARAM_INT);
$stmt->bindParam(2, $logged_user_id, PDO::PARAM_INT);
$stmt->bindParam(3, $reply, PDO::PARAM_STR);
$stmt->bindParam(4, $now);
$stmt->execute();


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
		
		$mail->Subject = '[Re:] Contact message reply from '.$cfg_site_title;
		$mail->Body    = '
			<html>
			<head>
			  <title>[Re:] Contact message reply</title>
			</head>
			<body>
			  <div style="font-size:12px;font-family:arial;">
			  <p>'.nl2br(html_entity_decode($reply)).'</p>
			  <br /><hr />
			  <i>Your message</i>:<br />
			  '.nl2br($message).'<br>
			  Sent at: '.DateTimeFormat($time).'<br>
			  </div>
			</body>
			</html>
		';
		$mail->AltBody = '[Re:] Contact message reply from '.$cfg_site_title.'\n '.$reply;
		
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
		$subject = '[Re:] Contact message reply from '.$cfg_site_title;
		$message = '
			<html>
			<head>
			  <title>[Re:] Contact message reply</title>
			</head>
			<body>
			  <div style="font-size:12px;font-family:arial;">
			  <p>'.nl2br(html_entity_decode($reply)).'</p>
			  <br /><hr />
			  <i>Your message</i>:<br />
			  '.nl2br($message).'<br>
			  Sent at: '.DateTimeFormat($time).'<br>
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

header("Location: ../account.php?page=pro-contact-messages-details&message_id=$message_id&msg=add_ok");
exit;
