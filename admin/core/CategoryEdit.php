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
$active = filter_input(INPUT_POST, 'active', FILTER_SANITIZE_NUMBER_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$categ_id = filter_input(INPUT_POST, 'categ_id', FILTER_SANITIZE_NUMBER_INT);

$slug = RewriteUrl($title);

// check for inputs
if($title=="")
	{
	header("Location:../account.php?page=pro-categories&msg=error_title");
	exit();
	}

// check for duplicate
$stmt = $conn->prepare("SELECT * FROM ".DB_PREFIX."categories WHERE slug = ? AND categ_id != ?");
$stmt->execute([$slug, $categ_id]);
$exist = $stmt->fetchColumn();

if($exist!=0)
	{
	header("Location: ../account.php?page=pro-categories&msg=error_duplicate");
	exit();
	}

$query = "UPDATE ".DB_PREFIX."categories SET title = ?, slug = ?, description = ?, active =? WHERE categ_id = ? LIMIT 1"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $title, PDO::PARAM_STR);
$stmt->bindParam(2, $slug, PDO::PARAM_STR);
$stmt->bindParam(3, $description, PDO::PARAM_STR);
$stmt->bindParam(4, $active, PDO::PARAM_INT);
$stmt->bindParam(5, $categ_id, PDO::PARAM_INT);
$stmt->execute();

// form OK:
header("Location: ../account.php?page=pro-categories&msg=edit_ok");	
exit;