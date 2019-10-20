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
$tags = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
$categ_id = filter_input(INPUT_POST, 'categ_id', FILTER_SANITIZE_NUMBER_INT);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$content = filter_input(INPUT_POST, 'content');
$content = Secure($content);

$slug = RewriteUrl($title);

// check for inputs
if($title=="")
	{
	header("Location:../account.php?page=pro-articles-add&msg=error_title");
	exit();
	}

	
$query = "INSERT INTO ".DB_PREFIX."articles (article_id, user_id, categ_id, title, slug, content, meta_title, meta_description, tags, image, hits, status) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, '', ?, 0, ?)"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $logged_user_id, PDO::PARAM_STR);
$stmt->bindParam(2, $categ_id, PDO::PARAM_INT);
$stmt->bindParam(3, $title, PDO::PARAM_STR);
$stmt->bindParam(4, $slug, PDO::PARAM_STR);
$stmt->bindParam(5, $content);
$stmt->bindParam(6, $meta_title, PDO::PARAM_STR);
$stmt->bindParam(7, $meta_description, PDO::PARAM_STR);
$stmt->bindParam(8, $tags, PDO::PARAM_STR);
$stmt->bindParam(9, $status, PDO::PARAM_STR);
$stmt->execute();

$article_id = $conn->lastInsertId(); // last inserted ID

// IMAGE
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
		move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/temp/".$image);

		// create small image
		$resizeObj = new resize("../uploads/temp/".$image); 
		$resizeObj -> resizeImage(400, 300, 'crop'); // (options: exact, portrait, landscape, auto, crop) 
		$resizeObj -> saveImage("../uploads/small/".$image);
		
		// create big image
		$resizeObj = new resize("../uploads/temp/".$image); 
		$resizeObj -> resizeImage(900, 480, 'crop'); // (options: exact, portrait, landscape, auto, crop) 
		$resizeObj -> saveImage("../uploads/large/".$image);
		
		@unlink ("../uploads/temp/".$image);
		$sql = "UPDATE ".DB_PREFIX."articles SET image = ? WHERE article_id = ? LIMIT 1"; 
		$conn->prepare($sql)->execute([$image, $article_id]);
		}
	}

// form OK:
header("Location: ../account.php?page=pro-articles&msg=add_ok");	
exit;