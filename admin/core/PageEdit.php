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

$page_id = filter_input(INPUT_POST, 'page_id', FILTER_SANITIZE_NUMBER_INT);
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
	header("Location:../account.php?page=pro-pages-edit&msg=error_title&page_id=$page_id");
	exit();
	}

// check for duplicate
$stmt = $conn->prepare("SELECT * FROM ".DB_PREFIX."pages WHERE slug = ? AND page_id != ?");
$stmt->execute([$slug, $page_id]);
$exist = $stmt->fetchColumn();

if($exist!=0)
	{
	header("Location: ../account.php?page=pro-pages-edit&msg=error_duplicate&page_id=$page_id");
	exit();
	}

$query = "UPDATE ".DB_PREFIX."pages SET title = ?, slug = ?, content = ?, meta_title = ?, meta_description = ?, meta_keywords = ?, active = ?, redirect_url = ? WHERE page_id = ? LIMIT 1"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $title, PDO::PARAM_STR);
$stmt->bindParam(2, $slug, PDO::PARAM_STR);
$stmt->bindParam(3, $content);
$stmt->bindParam(4, $meta_title, PDO::PARAM_STR);
$stmt->bindParam(5, $meta_description, PDO::PARAM_STR);
$stmt->bindParam(6, $meta_keywords, PDO::PARAM_STR);
$stmt->bindParam(7, $active, PDO::PARAM_INT);
$stmt->bindParam(8, $redirect_url, PDO::PARAM_STR);
$stmt->bindParam(9, $page_id, PDO::PARAM_INT);
$stmt->execute();

// form OK:
header("Location: ../account.php?page=pro-pages&msg=edit_ok");	
exit;