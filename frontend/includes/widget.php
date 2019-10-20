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
        $heading = array("This is a news heading on the blog" => array(12,17), "Here is another heading here" => array(11,10), "Another one goes here" => array(20,7), "I have another headline" => array(11,12));
        foreach ($heading as $title => $key ) {
      ?>
      
        <div class="item d-flex align-items-center">
          <a href="#">
          <div class="image">
            <img src="img/portfolio/7.jpg" alt="" class="img-fluid">
          </div>
          <div class="title">
            <strong>
              <?php 
                if(strlen($title)>15){
                  $title = substr($title,0,15).'...';
                } 
                  echo htmlentities($title);
              ?>              
            </strong>
          </a>   
     
          <div class="d-flex align-items-center">
            <div class="views"><i class="fa fa-eye"></i> <?php echo $key[0]; ?></div>
            <div class="comments"><i class="fa fa-comments-o"></i><?php echo $key[1]; ?></div>
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
      $execute = array("Fresh News" => 3, "Politics" => 2, "Our Culture" => 5, "Education" => 7);
      foreach ($execute as $cat => $pin ) {
      ?>
      <div class="item d-flex justify-content-between">
        <a href="#"><?php echo $cat; ?></a> <span><?php echo $pin; ?></span>
      </div>
      <?php }?> 
  </div>
