<?php 
require "config.php";
require "core/functions.php";

$categ_slug = filter_input(INPUT_GET, 'categ_slug', FILTER_SANITIZE_STRING);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare ("SELECT categ_id, title, description FROM ".DB_PREFIX."categories WHERE slug = ? AND active = 1 LIMIT 1");
$stmt->execute([$categ_slug]);	
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$categ_id = $row['categ_id'];												
$title = stripslashes($row['title']);
$description = stripslashes($row['description']);

if(!$description) $description = $title;

$numb_articles = $conn->query("SELECT count(1) FROM ".DB_PREFIX."articles WHERE categ_id = '$categ_id' AND status = 'active'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

	<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $description;?>">

    <title><?php echo $title;?></title>

	<?php require "global-head.php";?>

	</head>

	<body>

	<?php require "navigation.php";?>
	
    <!-- Page Content -->
    <div class="container">

		<h1><?php echo $title;?> - latest articles <?php echo $numb_articles;?></h1>
		
		<div class="row">			
			<?php
				// LIST CATEGORY ARTICLES
				if (!(isset($pagenum))) { $pagenum = 1; }
				if ($numb_articles==0) { echo "No article"; }
				else
					{
						$page_rows = 12;
						$last = ceil($numb_articles/$page_rows);

						if ($pagenum < 1)
						{
						$pagenum = 1;
						}
						elseif ($pagenum > $last)
						{
						$pagenum = $last;
						}

						$max = ' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;		
						$stmt_articles = $conn->prepare ("SELECT article_id, user_id, categ_id, title, slug, content, date_added, image, hits, status FROM ".DB_PREFIX."articles WHERE categ_id = ? AND status = 'active' ORDER BY article_id DESC $max");
						$stmt_articles->execute([$categ_id]);		
						while ($row = $stmt_articles->fetch(PDO::FETCH_ASSOC))
								{
									$article_id = $row['article_id'];
									$user_id = $row['user_id'];												
									$categ_id = $row['categ_id'];												
									$title = stripslashes($row['title']);
									$slug = $row['slug'];						
									$content = strip_tags(html_entity_decode(stripslashes($row['content'])));
									$date_added = $row['date_added'];
									$image = $row['image'];
									$hits = $row['hits'];
									$status = $row['status'];
									
									$content_short = substr($content, 0, 300);
									?>
									<!-- Content Row -->
										<div class="col-md-4 mb-4">
											<div class="card h-100">
												<a title="<?php echo $title;?>" href="<?php echo SITE_URL.'/'.$categ_slug.'/'.$article_id.'-'.$slug;?>"><img class="card-img-top" src="<?php echo UPLOADS_DIR.'/small/'.$image?>" alt="<?php echo $title;?>"></a>
												<div class="card-body">
													<h3 class="article-title"><a href="<?php echo SITE_URL.'/'.$categ_slug.'/'.$article_id.'-'.$slug;?>"><?php echo $title;?></a></h3>
													<p class="article-text"><?php echo $content_short;?></p>
												</div>
												<div class="card-footer text-muted">
													<?php echo DateFormat($date_added);?>
												</div>						
											</div>
										</div>
									<!-- /.col-md-4 -->
								<?php
								}
					}
					?>
		</div>


    </div>
    <!-- /.container -->

	<?php require "footer.php";?>

	</body>

</html>
