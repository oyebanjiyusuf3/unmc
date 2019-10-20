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

$cfg_site_title = filter_input(INPUT_POST, 'cfg_site_title', FILTER_SANITIZE_STRING);
$cfg_site_meta_title = filter_input(INPUT_POST, 'cfg_site_meta_title', FILTER_SANITIZE_STRING);
$cfg_site_meta_description = filter_input(INPUT_POST, 'cfg_site_meta_description', FILTER_SANITIZE_STRING);
$cfg_site_meta_keywords = filter_input(INPUT_POST, 'cfg_site_meta_keywords', FILTER_SANITIZE_STRING);
$cfg_site_meta_author = filter_input(INPUT_POST, 'cfg_site_meta_author', FILTER_SANITIZE_STRING);
$cfg_site_email = filter_input(INPUT_POST, 'cfg_site_email', FILTER_SANITIZE_EMAIL);
$cfg_site_email_name = filter_input(INPUT_POST, 'cfg_site_email_name', FILTER_SANITIZE_STRING);
$cfg_homepage_content = filter_input(INPUT_POST, 'cfg_homepage_content');
$cfg_footer_content = filter_input(INPUT_POST, 'cfg_footer_content');
$cfg_analytics_code = filter_input(INPUT_POST, 'cfg_analytics_code');
$cfg_facebook_page = filter_input(INPUT_POST, 'cfg_facebook_page', FILTER_SANITIZE_STRING);
$cfg_twitter_page = filter_input(INPUT_POST, 'cfg_twitter_page', FILTER_SANITIZE_STRING);
$cfg_google_maps_api_key = filter_input(INPUT_POST, 'cfg_google_maps_api_key', FILTER_SANITIZE_STRING);
$cfg_registration_enabled = filter_input(INPUT_POST, 'cfg_registration_enabled', FILTER_SANITIZE_NUMBER_INT);
$cfg_mail_sending_option = filter_input(INPUT_POST, 'cfg_mail_sending_option', FILTER_SANITIZE_STRING);
$cfg_mail_smtp_server = filter_input(INPUT_POST, 'cfg_mail_smtp_server', FILTER_SANITIZE_STRING);
$cfg_mail_smtp_user = filter_input(INPUT_POST, 'cfg_mail_smtp_user', FILTER_SANITIZE_STRING);
$cfg_mail_smtp_password = filter_input(INPUT_POST, 'cfg_mail_smtp_password', FILTER_SANITIZE_STRING);
$cfg_mail_smtp_port = filter_input(INPUT_POST, 'cfg_mail_smtp_port', FILTER_SANITIZE_STRING);
$cfg_mail_smtp_encryption = filter_input(INPUT_POST, 'cfg_mail_smtp_encryption', FILTER_SANITIZE_STRING);
//$cfg_registration_enabled = filter_input(INPUT_POST, 'cfg_registration_enabled', FILTER_SANITIZE_NUMBER_INT);

$cfg_registration_email_verification_enabled = filter_input(INPUT_POST, 'cfg_registration_email_verification_enabled', FILTER_SANITIZE_NUMBER_INT);

$cfg_registration_user_role = filter_input(INPUT_POST, 'cfg_registration_user_role', FILTER_SANITIZE_NUMBER_INT);
$cfg_google_recaptcha_registration_enabled = filter_input(INPUT_POST, 'cfg_google_recaptcha_registration_enabled', FILTER_SANITIZE_NUMBER_INT);
$cfg_google_recaptcha_contact_enabled = filter_input(INPUT_POST, 'cfg_google_recaptcha_contact_enabled', FILTER_SANITIZE_NUMBER_INT);
$cfg_google_recaptcha_site_key = filter_input(INPUT_POST, 'cfg_google_recaptcha_site_key', FILTER_SANITIZE_STRING);
$cfg_google_recaptcha_secret_key = filter_input(INPUT_POST, 'cfg_google_recaptcha_secret_key', FILTER_SANITIZE_STRING);

addSettings ('cfg_site_title', $cfg_site_title);			
addSettings ('cfg_site_meta_title', $cfg_site_meta_title);	
addSettings ('cfg_site_meta_description', $cfg_site_meta_description);		
addSettings ('cfg_site_meta_keywords', $cfg_site_meta_keywords);			
addSettings ('cfg_site_meta_author', $cfg_site_meta_author);
addSettings ('cfg_site_email', $cfg_site_email);			
addSettings ('cfg_site_email_name', $cfg_site_email_name);			
addSettings ('cfg_homepage_content', $cfg_homepage_content);			
addSettings ('cfg_footer_content', $cfg_footer_content);	
addSettings ('cfg_analytics_code', $cfg_analytics_code);	
addSettings ('cfg_facebook_page', $cfg_facebook_page);			
addSettings ('cfg_twitter_page', $cfg_twitter_page);			
addSettings ('cfg_google_maps_api_key', $cfg_google_maps_api_key);			
addSettings ('cfg_registration_enabled', $cfg_registration_enabled);			
addSettings ('cfg_mail_sending_option', $cfg_mail_sending_option);			
addSettings ('cfg_mail_smtp_server', $cfg_mail_smtp_server);			
addSettings ('cfg_mail_smtp_user', $cfg_mail_smtp_user);			
addSettings ('cfg_mail_smtp_password', $cfg_mail_smtp_password);			
addSettings ('cfg_mail_smtp_port', $cfg_mail_smtp_port);			
addSettings ('cfg_mail_smtp_encryption', $cfg_mail_smtp_encryption);			
addSettings ('cfg_registration_enabled', $cfg_registration_enabled);			
addSettings ('cfg_registration_user_role', $cfg_registration_user_role);
addSettings ('cfg_registration_email_verification_enabled', $cfg_registration_email_verification_enabled);			
addSettings ('cfg_google_recaptcha_registration_enabled', $cfg_google_recaptcha_registration_enabled);			
addSettings ('cfg_google_recaptcha_contact_enabled', $cfg_google_recaptcha_contact_enabled);			
addSettings ('cfg_google_recaptcha_site_key', $cfg_google_recaptcha_site_key);				
addSettings ('cfg_google_recaptcha_secret_key', $cfg_google_recaptcha_secret_key);				

// LOGO
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
		move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/images/".$image);
		addSettings ('cfg_logo_image', $image);			
		}
	}

// form OK:
header("Location: ../account.php?page=pro-settings&msg=edit_ok");	
exit;