<?php 
  require "config.php";
  $msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
  $subject = filter_input(INPUT_GET, 'subject', FILTER_SANITIZE_STRING);
  $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
  $message = filter_input(INPUT_GET, 'message', FILTER_SANITIZE_STRING);
  $message = urldecode($message);
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Contact us - <?php echo $cfg_site_title;?>">
    <meta name="author" content="<?php echo $cfg_site_meta_author;?>">

    <title>Contact us</title>

    <?php require "global-head.php";?>
  
    <?php if($cfg_google_recaptcha_registration_enabled==1) { ?>
    <script src="assets/js/jquery-1.10.2.min.js"></script>    
    <script src="assets/js/jquery.validate.min.js"></script>  
    <script src='https://www.google.com/recaptcha/api.js'></script> 
    <script type="text/javascript" language="javascript">
      jQuery("#keycode").hide();
      function validateCaptcha(){
        var get_captcha_response = grecaptcha.getResponse();
        if(get_captcha_response.length == 0)
        {
          // Captcha is not Passed
          jQuery("#keycode").show();
          return false; 
        }
        else
        {
          jQuery("#keycode").hide();
          // Captcha is Passed
          return true;
        }
      } 
    </script> 
    <?php } ?>
  </head>  
  <body id="body">

    <?php include_once "navigation.php";?>
    <!--==========================
    Intro Section
    ============================-->
    <section id="reach">
      <div class="reach-content">
        <h2 class="wow fadeInUp">Contact <span>Us</span></h2>
      </div>
    </section>

    <main id="main">
      <!--==========================
        Contact Page
      ============================-->
      <section id="contact" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Contact Us</h2>
            <p>For any other enquiries feel free to reach us using the form below. Thank you</p>
          </div>

          <div class="row contact-info">

            <div class="col-md-4">
              <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Address</h3>
                <address>5 Gernon Walk, Letchworth Garden City, Hertfordshire, SG6 3HW, UK </address>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Phone Number</h3>
                <p><a href="tel:">+1234567890</a></p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:info@website.com">info@website.com</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <!-- Uncomment below if you wan to use dynamic maps -->
          <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
        </div>

        <div class="container">
          <div class="form">
            <?php 
              if($msg== 'error_name') echo '<div id="errormessage" class="alert alert-danger" role="alert">Error! Please input your name</div>'; 
              if($msg== 'error_email') echo '<div class="alert alert-danger" role="alert">Error! Please input your email</div>'; 
              if($msg== 'ok') echo '<div id="sendmessage" class="alert alert-success" role="alert">Message sent</div>'; 
            ?>
            <form action="core/ContactSubmit.php" name="contact-form" method="post" role="form" class="contactForm" onsubmit="return validateCaptcha();">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $name;?>" required />
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email;?>" required />
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php echo $subject;?>" required />
                
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" id="message" placeholder="Message" required><?php echo $message;?></textarea>
              </div>

              <?php if($cfg_google_recaptcha_registration_enabled==1) { ?>
              <div class="g-recaptcha" data-sitekey="<?php echo $cfg_google_recaptcha_site_key;?>"></div>
              
              <?php } ?>
              <div class="mb-3"></div>

              <div class="text-center">
                <button type="submit" name="submit">Send Message</button>

                <?php if($cfg_google_recaptcha_registration_enabled==1) { ?>
                <p class="help-block with-errors text-danger" id="keycode">Please click on <b>I am not robot</b></p>
                <script type="text/javascript" language="javascript">
                  jQuery("#keycode").hide();
                </script> 
                <?php } ?>
              </div>
            </form>
          </div>
        </div>
      </section>

      <?php include_once "call.html"; ?>
      
    </main>

  <?php include "footer.php"; ?>
  