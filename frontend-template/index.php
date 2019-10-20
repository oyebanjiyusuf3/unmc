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

  <?php require "navigation.php"; ?>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-content">
      <h2 class="wow fadeInUp">UN<span>MC</span></h2>
      <p class="wow fadeInUp">United Nigeria Movement for Change</p>
      <div>
        <a href="login.php" target="_blank" class="btn-get-started scrollto">Login</a>
        <a href="ques.php" target="_blank" class="btn-projects scrollto">Join Us</a>
      </div>
    </div>

	<!-- <div id="intro-carousel" class="owl-carousel">
  		<div class="item" style="background-image: url('assets/img/1.jpg');"></div>
  		<div class="item" style="background-image: url('assets/img/2.jpg');"></div>
	</div> -->
 
  </section><!-- #intro -->

  <main id="main">
    <!-- <section id="preview" class="wow fadeInLeft">
      <div class="container">
        <div class="section-header">
          <h2>Castello luxury freestanding baths, spas and basins</h2>
          <p>Castello offers contemporary luxury freestanding baths, spas and basins with the look and feel of natural stone. Each bath is finished by hand to create a beautifully smooth and lustrous finish – truly refined luxury.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6">
            <img src="images/fp/gables.jpg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="preview-text">
              <h2 class="wow fadeInUp">About Us</h2>
              <p>We have been designing and supplying luxury baths and basins to homes, 5-star hotels, yachts and lodges for over 10 years. Our products are designed in the UK and manufactured in a state-of-the-art facility in the USA from an advanced eco-friendly composite stone material.<br><br>
              <a href="about.php" class="btn btn-outline-secondary">Read More</a></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <img src="images/fp/3pic.jpg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="preview-text">
              <h2 class="wow fadeInUp">Designs</h2>
              <p>All our freestanding baths, spas and basins combine timeless, contemporary style and design with cutting-edge technology. They are made from a hard-wearing composite material that has the appearance and beauty of natural stone without the excess weight.<br><br>
              <a href="video.php" class="btn btn-outline-secondary">Watch Video</a></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <img src="images/fp/y1.jpg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="preview-text">
              <h2 class="wow fadeInUp">Portfolio</h2>
              <p>We believe that comfort is an important part of the ultimate bathing experience. Our baths are shaped and contoured to provide a comfortable and relaxing soak and the advanced composite material is warm to the touch and non-slip.<br><br>
              <a href="portfolio.php" class="btn btn-outline-secondary">View More</a></p>
            </div>
          </div>

        </div>

      </div>
    </section> -->

  </main>

  <?php include "footer.php"; ?>
