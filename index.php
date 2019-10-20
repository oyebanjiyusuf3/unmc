<?php 
require "config.php";
require "core/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

	<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $cfg_site_meta_description;?>">
	<meta name="keywords" content="<?php echo $cfg_site_meta_keywords;?>">    

    <title><?php echo $cfg_site_meta_title;?></title>

	<?php require "global-head.php";?>

	</head>

	<body>

	<?php require "navigation.php";?>
	
	<div class="jumbotron">
		<div class="container">
				
			<div class="row my-4">
					<div class="col-lg-8">
						<?php include "slider.php";?>			  
					</div>
					<!-- /.col-lg-8 -->
        
					<div class="col-lg-4">
						<h1>Latest Articles</h1>
						<?php
						// LATEST 6 ARTICLES
						$latest_articles = getLatestArticles('all', 5); // 'all' - all categories;
						foreach($latest_articles as $article)
							{			
							?>
							<a href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/'.$article['id'].'-'.$article['slug'];?>"><?php echo $article['title'];?></a><br />
							<?php echo DateFormat($article['date_added']);?> in <a href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/';?>"><?php echo $article['categ_title'];?></a>
							<div class="mb-3"></div>
						<?php
						}
						?>
					</div>
					<!-- /.col-md-4 -->
			
			</div>
			<!-- /.row -->
		
		</div>
		<!-- /.container -->
		
	</div>
	<!-- /.jumbotron -->
	
	
    <!-- Page Content -->
    <div class="container">

      

      <!-- Call to Action Well -->
      <div class="card bg-index-info my-4 text-center">
        <div class="card-body">
          <p class="m-0"><?php echo $cfg_homepage_content;?></p>
        </div>
      </div>
		
		<div class="row">
		<?php
		// LATEST 6 ARTICLES
		$latest_articles = getLatestArticles('all', 6); // 'all' - all categories; 6 - latest 6 articles		
		foreach($latest_articles as $article)
			{			
			?>
			<!-- Content Row -->
				<div class="col-md-4 mb-4">
					<div class="card h-100">
						<a title="<?php echo $article['title'];?>" href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/'.$article['id'].'-'.$article['slug'];?>"><img class="card-img-top" src="<?php echo UPLOADS_DIR.'/small/'.$article['image'];?>" alt="<?php echo $article['title']; ?>"></a>
						<div class="card-body">
							<h3 class="article-title"><a href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/'.$article['id'].'-'.$article['slug'];?>"><?php echo $article['title'];?></a></h3>
							<p class="article-text"><?php echo $article['content_short'];?></p>
						</div>
						<div class="card-footer text-muted">
							<?php echo DateFormat($article['date_added']);?> in <a href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/';?>"><?php echo $article['categ_title'];?></a>
						</div>						
					</div>
				</div>
			<!-- /.col-md-4 -->
			<?php
			}
			?>
			</div>


    </div>
    <!-- /.container -->

	<?php require "footer.php";?>

	</body>

</html>
