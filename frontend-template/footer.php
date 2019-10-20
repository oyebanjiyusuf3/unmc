<!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">

          <img src="<?php echo UPLOADS_DIR.'/images/'.$cfg_logo_image;?>" class="img-fluid" alt="<?php echo $cfg_site_title;?>" style="margin-bottom: 10px;">

          <!-- <h1>UNMC</h1> -->
          <p><?php echo $cfg_footer_content;?></p>
          <!-- <div class="socials">
            <a href="#" class="twitter"><i class="fa fa-twitter fa-lg"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook fa-lg"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram fa-lg"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus fa-lg"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin fa-lg"></i></a>
          </div> -->
        </div>

        <div class="col-md-4">
          <h4>Latest News</h4>
          <div class="links">
            <?php
              // LATEST 4 ARTICLES
              $latest_articles = getLatestArticles('all', 2); 
              // 'all' - all categories; 4 - latest 4 articles    
              foreach($latest_articles as $article){    
            ?>
            <a href="article.php"><?php echo $article['title']; ?></a>
            <?php } ?>
          </div>
        </div>


        <div class="col-md-4">
          <h4>Send Message</h4>
          <div class="footer-form">
            <form>
              <div class="form-group">
                <input type="text" name="" placeholder="Email Address" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" name="" placeholder="Subject" class="form-control">
              </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="Message"></textarea>
              </div>
              <input type="submit" name="" value="Submit" class="btn btn-secondary btn-block">
            </form>
          </div>
        </div>

      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo SITE_URL;?>/assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/easing/easing.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/wow/wow.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/lib/sticky/sticky.js"></script>
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo SITE_URL;?>/assets/contactform/contactform.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/contactform/request.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo SITE_URL;?>/assets/js/main.js"></script>
  <script src="<?php echo SITE_URL;?>/assets/js/url.js"></script>

</body>
</html>