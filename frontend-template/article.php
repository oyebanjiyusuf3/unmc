<?php 
require "config.php";
require "core/functions.php";
$article_slug = filter_input(INPUT_GET, 'article_slug', FILTER_SANITIZE_STRING);
$article_id = filter_input(INPUT_GET, 'article_id', FILTER_SANITIZE_NUMBER_INT);
$categ_slug = filter_input(INPUT_GET, 'categ_slug', FILTER_SANITIZE_STRING);

$stmt = $conn->prepare ("SELECT user_id, title, categ_id, content, meta_title, meta_description, tags, image FROM ".DB_PREFIX."articles WHERE article_id = ? AND slug = ? AND status = 'active' LIMIT 1");
$stmt->execute([$article_id, $article_slug]);	
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $row['user_id'];												
$title = stripslashes($row['title']);
$content = stripslashes($row['content']);
$categ_id = $row['categ_id'];
$meta_title = stripslashes($row['meta_title']);
$meta_description = stripslashes($row['meta_description']);
$tags = stripslashes($row['tags']);
$image = $row['image'];


$content_short = substr(strip_tags(html_entity_decode(stripslashes($row['content']))), 0, 500);
if(!$meta_title) $meta_title = $title;
if(!$meta_description) $meta_description = $content_short;

// category details
$stmt = $conn->prepare ("SELECT title, slug FROM ".DB_PREFIX."categories WHERE categ_id = ? LIMIT 1");
$stmt->execute([$categ_id]);	
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$categ_title = stripslashes($row['title']);
$categ_slug_db = $row['slug'];					

if(!$row or ($categ_slug!=$categ_slug_db))
	{	
	header("Location: ".SITE_URL."/404.php");
	exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $meta_description;?>">
	<meta name="keywords" content="<?php echo $tags;?>">    

    <title><?php echo $meta_title;?></title>

	<?php require "global-head.php";?>

	</head>

	<body>

	<?php require "navigation.php";?>
	
    <!-- Page Content -->
    <div class="container">

      <!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-8 col-xs-12">
          
		  
		  <?php if($image) { ?>
		  <img class="img-fluid" src="<?php echo UPLOADS_DIR.'/large/'.$image;?>" alt="<?php echo $title;?>">
		  <?php } ?>
		  <h1><?php echo $title;?></h1>
		  <?php echo DateFormat($date_added);?> in <a title=<?php echo $categ_title;?> href="<?php echo SITE_URL.'/'.$categ_slug.'/';?>"><?php echo $categ_title;?></a>
		  <div class="mb-2"></div>
		  <?php echo html_entity_decode($content);?>
		  
        </div>
        <!-- /.col-lg-8 -->
        
		<div class="col-lg-4 col-xs-12">
				<h1>Latest Articles</h1>
				<?php
				// LATEST 10 ARTICLES
				$latest_articles = getLatestArticles('all', 10); // 'all' - all categories;
				foreach($latest_articles as $article)
					{			
					?>
					<a href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/'.$article['id'].'-'.$article['slug'];?>"><?php echo $article['title'];?></a><br />
					<?php echo DateFormat($article['date_added']);?> in <?php echo $article['categ_title'];?>
					<div class="m-b-10"></div>
				<?php
				}
				?>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->

      
		

    </div>
    <!-- /.container -->

	<?php require "footer.php";?>

	</body>

</html>
