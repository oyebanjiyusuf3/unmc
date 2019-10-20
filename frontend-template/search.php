<?php 
require "config.php";
require "core/functions.php";

$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);

$numb_articles = $conn->query("SELECT count(1) FROM ".DB_PREFIX."articles WHERE title LIKE '%$search%' AND status = 'active'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

	<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Search by <?php echo $search;?>">

    <title><?php echo $search;?></title>

	<?php require "global-head.php";?>

	</head>

	<body>

	<?php require "navigation.php";?>
	
    <!-- Page Content -->
    <div class="container">

		<h1><?php echo $search;?> - <?php echo $numb_articles;?> results</h1>
		
		<div class="row">			
			<?php
				// LIST CATEGORY ARTICLES
				if (!(isset($pagenum))) { $pagenum = 1; }
				if ($numb_articles==0) { echo '<div class="col-md-6">No article</div>'; }
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
						$stmt_articles = $conn->prepare ("SELECT article_id, user_id, categ_id, title, slug, content, date_added, image, hits FROM ".DB_PREFIX."articles WHERE title LIKE '%$search%' AND status = 'active' ORDER BY article_id DESC $max");
						$stmt_articles->execute();		
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
									
									$content_short = substr($content, 0, 300);
									
									// category details
									$stmt_categ = $conn->prepare ("SELECT title, slug FROM ".DB_PREFIX."categories WHERE categ_id = ? LIMIT 1");
									$stmt_categ->execute([$categ_id]);	
									$row = $stmt_categ->fetch(PDO::FETCH_ASSOC);
									$categ_title = stripslashes($row['title']);
									$categ_slug = $row['slug'];	
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
													<?php echo DateFormat($date_added);?> in <a href="<?php echo SITE_URL.'/'.$categ_slug.'/';?>"><?php echo $categ_title;?></a>
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
