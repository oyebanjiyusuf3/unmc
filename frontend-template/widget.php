<!-- Widget [Search Bar Widget]-->
  <div class="widget search">
    <header>
      <h3 class="h6">Search news</h3>
    </header>
    <form action="./" class="search-form">
      <div class="form-group">
        <input type="search" name="search" placeholder="What are you looking for?">
        <button type="submit" name="SearchButton" class="submit"><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div>
  <!-- Widget [Latest Posts Widget]-->
  <div class="widget latest-posts">
    <header>
      <h3 class="h6">Latest News</h3>
    </header>
    <div class="blog-posts">
      <?php
        // LATEST 4 ARTICLES
        $latest_articles = getLatestArticles('all', 4); 
        // 'all' - all categories; 4 - latest 4 articles    
        foreach($latest_articles as $article){    
      ?>
      
        <div class="item d-flex align-items-center">
          <a href="#">
          <div class="image">
            <img src="<?php echo UPLOADS_DIR.'/small/'.$article['image'];?>" alt="<?php echo $article['title']; ?>" class="img-fluid">
          </div>
          <div class="title">
            <strong>
              <?php echo $article['title']; ?>              
            </strong>
          </a>   
     
          <div class="d-flex align-items-center">
            <div class="views"><i class="fa fa-eye"></i> <?php echo 2; ?></div>
            <div class="comments"><i class="fa fa-comments-o"></i><?php echo 3; ?></div>
          </div>
        </div>
      </div>
      <?php } ?>  
    </div><!-- Blog Posts -->
  </div><!-- Latest Posts -->


  <!-- Widget [Categories Widget]-->
  <div class="widget categories">
    <header>
      <h3 class="h6">Categories</h3>
    </header>
      <?php
        // LATEST 4 ARTICLES
        $latest_articles = getLatestArticles('all', 4); 
        // 'all' - all categories; 4 - latest 4 articles    
        foreach($latest_articles as $article){    
      ?>
      <div class="item d-flex justify-content-between">
        <a href="#"><?php echo $article['categ_title'];?></a> <span><?php echo 3; ?></span>
      </div>
      <?php }?> 
  </div>
