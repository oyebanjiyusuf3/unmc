<?php  
  require 'config.php';
  require 'core/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $cfg_site_meta_title; ?></title>
  <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $cfg_site_meta_description;?>">
  <meta name="keywords" content="<?php echo $cfg_site_meta_keywords;?>">  

  <?php require "global-head.php"; ?>
  
</head> 
<body id="body">
	<?php include "navigation.php";?>

	<div class="container">
		<section id="preview" class="wow fadeInLeft">
			<div class="container">
	        	<div class="section-header">
	        		<h2 class="wow fadeInUp">News</h2>
	        		<h4>Below are some of our latest news</h4>
	          	</div>
	        </div>
	    </section>

	    <div class="row">
			<main id="main" class="blog-main posts-listing col-lg-8">
				<div class="container">
					<div class="row">
						<?php
							// LATEST 4 ARTICLES
							$latest_articles = getLatestArticles('all', 4); 
							// 'all' - all categories; 4 - latest 4 articles		
							foreach($latest_articles as $article){		
						?>
						<div class="post col-xl-6 wow fadeInUp">
							<div class="post-thumbnail">
								<a title="<?php echo $article['title'];?>" href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/'.$article['id'].'-'.$article['slug'];?>">
	                    			<img src="<?php echo UPLOADS_DIR.'/small/'.$article['image'];?>" alt="<?php echo $article['title']; ?>" class="img-fluid">
	                  			</a>
							</div>

							<div class="post-details">
								<div class="post-meta d-flex justify-content-between">
									<div class="date meta-last">
										<?php echo DateFormat($article['date_added']); ?> 
									</div>
									<div class="category">
	                      				<a><?php echo $article['categ_title'];?></a>
	                    			</div>
								</div>
								<a href="<?php echo SITE_URL.'/'.$article['categ_slug'].'/'.$article['id'].'-'.$article['slug'];?>"><h3><?php echo $article['title'];?></h3></a>
								<p class="text-muted">
									<?php echo $article['content_short'];?>
								</p>
								
								<footer class="post-footer d-flex align-items-center">
									<a href="" class="author d-flex align-items-center flex-wrap">
	                    			<div class="avatar">
	                    				<img src="<?php echo UPLOADS_DIR.'/avatars/'.$article['avatar']; ?>" class="img-fluid">
	                    			</div>
	                    			
	                    			<div class="title"><span><?php echo $article['author_name']; ?></span></div></a>
	                    			<div class="date">
	                      				<i class="fa fa-clock-o"></i><?php 
	                      					$date_added = $article['date_added'];
											echo TimeAgo($date_added, date("Y-m-d H:i:s"));?> 
	                    			</div>
	               
	                    			<div class="comments meta-last">
	                      				<i class="fa fa-comments"></i><?php echo 17;?>
	                    			</div>
	                  			</footer>
							</div>
						</div>
						<?php }?>	
					</div>
				</div>	
			</main>

			<aside class="blog-aside col-lg-4">
				<?php include_once "widget.php"; ?>
			</aside>
		</div>
	</div>

	<?php include "footer.php"; ?>
