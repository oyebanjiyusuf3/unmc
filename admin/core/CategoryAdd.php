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


$slug = RewriteUrl($title);

// check for inputs
if($title=="")
	{
	header("Location:../account.php?page=pro-categories&msg=error_title");
	exit();
	}

// check for duplicate
$stmt = $conn->prepare("SELECT * FROM ".DB_PREFIX."categories WHERE slug = ?");
$stmt->execute([$slug]);
$exist = $stmt->fetchColumn();

if($exist!=0)
	{
	header("Location: ../account.php?page=pro-categories&msg=error_duplicate");
	exit();
	}

$query = "INSERT INTO ".DB_PREFIX."categories (categ_id, title, slug, description, active) VALUES (NULL, ?, ?, ?, ?)"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $title, PDO::PARAM_STR);
$stmt->bindParam(2, $slug, PDO::PARAM_STR);
$stmt->bindParam(3, $description, PDO::PARAM_STR);
$stmt->bindParam(4, $active, PDO::PARAM_INT);
$stmt->execute();

// form OK:
header("Location: ../account.php?page=pro-categories&msg=add_ok");	
exit;