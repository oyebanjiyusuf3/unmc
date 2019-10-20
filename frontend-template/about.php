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

    <section id="about-us">
      <div class="about-content">
        <h2 class="wow fadeInUp">About <span>Us</span></h2>
        <p class="wow fadeInUp"></p>
      </div>
    </section>

    <main id="main">
      <section id="preview" class="wow fadeInLeft">
        <div class="container">
          <div class="section-header">
            <h2 class="wow fadeInUp">Intro</h2>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et</h3>
          </div>
        </div>
      </section>

      <section class="about wow fadeInUp">
        <div class="container">
          <div class="row">

            <div class="col-lg-6 cont">
              <!-- <div class="mx-auto text-center">
                <img src="images/oceanus-bathroom.jpg" alt="An Oceanus bath – an eye-catching centrepiece of any luxury bathroom" class="img-fluid wow fadeInRight">
              </div> -->
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="col-lg-6 cont">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
            </div>

          </div>
        </div>
      </section>

      <!--==========================
      Our Team Section
      ============================-->
      <section id="team" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Our Team</h2>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="member">
                <div class="pic"><img src="img/team-1.jpg" alt=""></div>
                <div class="details">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="member">
                <div class="pic"><img src="img/team-2.jpg" alt=""></div>
                <div class="details">
                  <h4>Sarah Jhinson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="member">
                <div class="pic"><img src="img/team-3.jpg" alt=""></div>
                <div class="details">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="member">
                <div class="pic"><img src="img/team-4.jpg" alt=""></div>
                <div class="details">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section><!-- #team -->


      <?php include "call.html"; ?>
      
    </main>

  <?php include "footer.php"; ?>
  