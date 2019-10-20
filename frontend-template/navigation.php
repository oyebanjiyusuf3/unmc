<!-- ==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:info@website.com"><strong>info@website.com</strong></a>
        <i class="fa fa-phone"></i><strong> +12345678789</strong>

        <i class="fa fa-sign-in"></i> <a href="<?php echo (SITE_URL); ?>/login.php" target="_blank"><strong>Login</strong></a>
  
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="<?php echo (SITE_URL); ?>" class="scrollto">UN<span>MC</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#"><img src="images/logo.png" alt="" title="" /></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="<?php echo (SITE_URL); ?>">Home</a></li>
          <li><a href="<?php echo (SITE_URL); ?>/about.php">About</a></li>
          <li><a href="<?php echo (SITE_URL); ?>/news.php">News</a></li>

          <li class="menu-has-children"><a href="#">MultiMedia</a>
            <ul>
              <li><a href="<?php echo (SITE_URL); ?>/videos.php">Videos</a></li>
              <li><a href="<?php echo (SITE_URL); ?>/photo.php">Picture</a></li>
            </ul>
          </li>

          <li><a href="<?php echo (SITE_URL); ?>/articles.php">Articles</a></li>
          <li><a href="<?php echo (SITE_URL); ?>/contact.php">Contact</a></li>

          <li><a href="<?php echo (SITE_URL); ?>/ques.php" target="_blank">Join Us</a></li>
          <li><a href="<?php echo (SITE_URL); ?>/donation.php" class="don">Donation</a></li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header--> 