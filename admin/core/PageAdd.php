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

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$meta_title = filter_input(INPUT_POST, 'meta_title', FILTER_SANITIZE_STRING);
$meta_description = filter_input(INPUT_POST, 'meta_description', FILTER_SANITIZE_STRING);
$meta_keywords = filter_input(INPUT_POST, 'meta_keywords', FILTER_SANITIZE_STRING);
$redirect_url = filter_input(INPUT_POST, 'redirect_url', FILTER_SANITIZE_STRING);
$content = filter_input(INPUT_POST, 'content');
$content = Secure($content);
$active = filter_input(INPUT_POST, 'active', FILTER_SANITIZE_NUMBER_INT);

$slug = RewriteUrl($title);

// check for inputs
if($title=="")
	{
	header("Location:../account.php?page=pro-pages-add&msg=error_title");
	exit();
	}

$query = "INSERT INTO ".DB_PREFIX."pages (page_id, title, slug, content, meta_title, meta_description, meta_keywords, redirect_url, active) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $title, PDO::PARAM_STR);
$stmt->bindParam(2, $slug, PDO::PARAM_STR);
$stmt->bindParam(3, $content);
$stmt->bindParam(4, $meta_title, PDO::PARAM_STR);
$stmt->bindParam(5, $meta_description, PDO::PARAM_STR);
$stmt->bindParam(6, $meta_keywords, PDO::PARAM_STR);
$stmt->bindParam(7, $redirect_url, PDO::PARAM_STR);
$stmt->bindParam(8, $active, PDO::PARAM_INT);
$stmt->execute();

// form OK:
header("Location: ../account.php?page=pro-pages&msg=add_ok");	
exit;