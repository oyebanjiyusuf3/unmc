<?php  
  $title = "News Section - UNMC";
  include_once "includes/head.php";
?>
<body id="body">
	<?php include_once "includes/navbar.php";?>

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
						<div class="post col-xl-6 wow fadeInUp">
							<div class="post-thumbnail">
								<a href="#">
	                    			<img src="img/portfolio/3.jpg" alt="" class="img-fluid post-image">
	                  			</a>
							</div>
						
							<div class="post-details">
								<div class="post-meta d-flex justify-content-between">
									<div class="date meta-last">
										<?php echo date('d-M-Y | h:iA');?>
									</div>
									<div class="category">
	                      				<a><?php echo "Fresh News"; ?></a>
	                    			</div>
								</div>
								<a href="#"><h3>This is a news heading on the blog </h3></a>
								<p class="text-muted">
									<?php 
										$text = "
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										";
										if(strlen($text)>50){
											$text = substr($text,0,50).'&hellip;';
										}

										echo $text;
									?>
								</p>
								<footer class="post-footer d-flex align-items-center">
									<a href="#" class="author d-flex align-items-center flex-wrap">
	                    			<div class="avatar">
	                    				<img src="img/team-4.jpg" class="img-fluid">
	                    			</div>
	                    			<div class="title"><span><?php echo "Admin"; ?></span></div></a>
	                    			<div class="date">
	                      				<i class="fa fa-clock-o"></i>
	                      				<?php echo date('d-M-Y'); ?>
	                    			</div>
	               
	                    			<div class="comments meta-last">
	                      				<i class="fa fa-comments"></i><?php echo 17;?>
	                    			</div>
	                  			</footer>
							</div>
						</div>	

						<div class="post col-xl-6 wow fadeInUp">
							<div class="post-thumbnail">
								<a href="#">
	                    			<img src="img/portfolio/1.jpg" alt="" class="img-fluid post-image">
	                  			</a>
							</div>
						
							<div class="post-details">
								<div class="post-meta d-flex justify-content-between">
									<div class="date meta-last">
										<?php echo date('d-M-Y | h:iA');?>
									</div>
									<div class="category">
	                      				<a><?php echo "Our Culture"; ?></a>
	                    			</div>
								</div>
								<a href="#"><h3>This is a news heading on the blog </h3></a>
								<p class="text-muted">
									<?php 
										$text = "
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										";
										if(strlen($text)>50){
											$text = substr($text,0,50).'&hellip;';
										}

										echo $text;
									?>
								</p>
								<footer class="post-footer d-flex align-items-center">
									<a href="#" class="author d-flex align-items-center flex-wrap">
	                    			<div class="avatar">
	                    				<img src="img/team-4.jpg" class="img-fluid">
	                    			</div>
	                    			<div class="title"><span><?php echo "Admin"; ?></span></div></a>
	                    			<div class="date">
	                      				<i class="fa fa-clock-o"></i>
	                      				<?php echo date('d-M-Y'); ?>
	                    			</div>
	               
	                    			<div class="comments meta-last">
	                      				<i class="fa fa-comments"></i><?php echo 17;?>
	                    			</div>
	                  			</footer>
							</div>
						</div>	
					</div>

					<div class="row">
						<div class="post col-xl-6 wow fadeInUp">
							<div class="post-thumbnail">
								<a href="#">
	                    			<img src="img/portfolio/2.jpg" alt="" class="img-fluid post-image">
	                  			</a>
							</div>
						
							<div class="post-details">
								<div class="post-meta d-flex justify-content-between">
									<div class="date meta-last">
										<?php echo date('d-M-Y | h:iA');?>
									</div>
									<div class="category">
	                      				<a><?php echo "Education"; ?></a>
	                    			</div>
								</div>
								<a href="#"><h3>This is a news heading on the blog </h3></a>
								<p class="text-muted">
									<?php 
										$text = "
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										";
										if(strlen($text)>50){
											$text = substr($text,0,50).'&hellip;';
										}

										echo $text;
									?>
								</p>
								<footer class="post-footer d-flex align-items-center">
									<a href="#" class="author d-flex align-items-center flex-wrap">
	                    			<div class="avatar">
	                    				<img src="img/team-4.jpg" class="img-fluid">
	                    			</div>
	                    			<div class="title"><span><?php echo "Admin"; ?></span></div></a>
	                    			<div class="date">
	                      				<i class="fa fa-clock-o"></i>
	                      				<?php echo date('d-M-Y'); ?>
	                    			</div>
	               
	                    			<div class="comments meta-last">
	                      				<i class="fa fa-comments"></i><?php echo 17;?>
	                    			</div>
	                  			</footer>
							</div>
						</div>	

						<div class="post col-xl-6 wow fadeInUp">
							<div class="post-thumbnail">
								<a href="#">
	                    			<img src="img/portfolio/5.jpg" alt="" class="img-fluid post-image">
	                  			</a>
							</div>
						
							<div class="post-details">
								<div class="post-meta d-flex justify-content-between">
									<div class="date meta-last">
										<?php echo date('d-M-Y | h:iA');?>
									</div>
									<div class="category">
	                      				<a><?php echo "Politics"; ?></a>
	                    			</div>
								</div>
								<a href="#"><h3>This is a news heading on the blog </h3></a>
								<p class="text-muted">
									<?php 
										$text = "
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										";
										if(strlen($text)>50){
											$text = substr($text,0,50).'&hellip;';
										}

										echo $text;
									?>
								</p>
								<footer class="post-footer d-flex align-items-center">
									<a href="#" class="author d-flex align-items-center flex-wrap">
	                    			<div class="avatar">
	                    				<img src="img/team-4.jpg" class="img-fluid">
	                    			</div>
	                    			<div class="title"><span><?php echo "Admin"; ?></span></div></a>
	                    			<div class="date">
	                      				<i class="fa fa-clock-o"></i>
	                      				<?php echo date('d-M-Y'); ?>
	                    			</div>
	               
	                    			<div class="comments meta-last">
	                      				<i class="fa fa-comments"></i><?php echo 17;?>
	                    			</div>
	                  			</footer>
							</div>
						</div>	
					</div>
				</div>	
			</main>

			<aside class="blog-aside col-lg-4">
				<?php include_once "includes/widget.php"; ?>
			</aside>
		</div>
	</div>

	<?php include_once "includes/footer.html"; ?>
