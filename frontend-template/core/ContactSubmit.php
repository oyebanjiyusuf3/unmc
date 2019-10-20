<?php
/* 
=========================================================================================
Copyright SolveStation - https://www.solvestationng.com
=========================================================================================
*/

require_once '../config.php';

$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$message2 = urlencode($message);

if ($name=="")
	{
	header("Location: ../contact.php?msg=error_name&name=$name&subject=$subject&message=$message2#form");
	exit();
	}

if ($email=="")
	{
	header("Location: ../contact.php?msg=error_email&name=$name&subject=$subject&message=$message2#form");
	exit();
	}

if($cfg_google_recaptcha_contact_enabled==1) 
{	
	// Google Recaptcha2 validation
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$cfg_google_recaptcha_secret_key.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            
			$now = date("Y-m-d H:i:s");
			$ip = $_SERVER['REMOTE_ADDR'];

			$query = "INSERT INTO ".DB_PREFIX."contact_messages (message_id, name, email, subject, message, time, ip, is_read) VALUES (NULL, ?, ?, ?, ?, ?, ?, 0)"; 
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1, $name, PDO::PARAM_STR);
			$stmt->bindParam(2, $email, PDO::PARAM_STR);
			$stmt->bindParam(3, $subject, PDO::PARAM_STR);
			$stmt->bindParam(4, $message, PDO::PARAM_STR);
			$stmt->bindParam(5, $now, PDO::PARAM_STR);
			$stmt->bindParam(6, $ip, PDO::PARAM_STR);
			$stmt->execute();

        else:
            header("Location: ../contact.php?msg=error_captcha&name=$name&email=$email&subject=$subject&message=$message2#form");
			exit();
        endif;
    else:
        header("Location: ../contact.php?msg=error_captcha&name=$name&email=$email&subject=$subject&message=$message2#form");
		exit();
    endif;
}

header("Location: ../contact.php?msg=ok#form");
exit;