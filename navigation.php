<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-bg-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img class="logo-image" alt="<?php echo $cfg_site_title;?>" src="<?php echo UPLOADS_DIR.'/images/'.$cfg_logo_image;?>" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            
			<li class="nav-item active">
              <a class="nav-link" title="<?php echo $cfg_site_title;?>" href="<?php echo SITE_URL;?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
			<li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
			
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>            			
			
			<li class="list-inline-item dropdown notification-list">
				<a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                Categories <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success" aria-labelledby="Categories">
						<?php
						$stmt_categs = $conn->prepare ("SELECT categ_id, title, slug FROM ".DB_PREFIX."categories WHERE active = 1 ORDER BY title ASC");
						$stmt_categs->execute();	
						while ($row = $stmt_categs->fetch(PDO::FETCH_ASSOC))
						{
						$nav_categ_id = $row['categ_id'];
						$nav_categ_title = stripslashes($row['title']);
						$nav_categ_slug = $row['slug'];
						?>
                        <a title="<?php echo $nav_categ_title;?>" class="dropdown-item" href="<?php echo SITE_URL.'/'.$nav_categ_slug.'/';?>"><?php echo $nav_categ_title;?> </a>						
						<?php
						}
						?>
                </div>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="<?php echo SITE_URL;?>/contact.php">Contact</a>
            </li>
	
          </ul>
		  
		  <div class="custom-search">
			<form class="item-search-form" action="<?php echo SITE_URL;?>/search.php" method="get">
				<div class="form-inner">
				<input type="text" name="search" class="form-control input-product-search" placeholder="Search in articles" value="" autocomplete="off">				
				<button type="submit" class="btn"><i class="fa fa-search"></i></button>
				</div>
			</form>
		  </div>
			
        </div>
      </div>
    </nav>