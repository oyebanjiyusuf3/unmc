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

  <body>

    <?php require "navigation.php";?>

    <!-- Page Content -->
    <div class="container">

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
        </div>
      </div>

			<a name="form"></a>
			<h2>Contact Form</h2>            	
                <?php 
				if($msg== 'error_name') echo '<div class="alert alert-danger" role="alert">Error! Please input your name</div>'; 
				if($msg== 'error_email') echo '<div class="alert alert-danger" role="alert">Error! Please input your email</div>'; 
				if($msg== 'ok') echo '<div class="alert alert-success" role="alert">Message sent</div>'; 
				?>

                <form class="contact-form" name="contact-form" method="post" action="core/ContactSubmit.php" onsubmit="return validateCaptcha();">
						
						<div class="form-group">
                            <label>Subject (required)</label>
                            <input type="text" name="subject" class="form-control" value="<?php echo $subject;?>" required>
                        </div>
                        <div class="form-group">
                            <label>Your name (required)</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>" required>
						</div>	
                        <div class="form-group">
                            <label>Your email (required)</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email;?>" required>
                        </div>                            
                        <div class="form-group">
                            <label>Your message (required)</label>
                            <textarea name="message" id="message" required class="form-control" rows="12"><?php echo $message;?></textarea>
                        </div>          

						<?php if($cfg_google_recaptcha_registration_enabled==1) { ?>
						<div class="g-recaptcha" data-sitekey="<?php echo $cfg_google_recaptcha_site_key;?>"></div>
						<?php } ?>
								
						<div class="mb-3"></div>
								
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Send message</button>
								<?php if($cfg_google_recaptcha_registration_enabled==1) { ?>
								<p class="help-block with-errors text-danger" id="keycode">Please click on <b>I am not robot</b></p>
								<script type="text/javascript" language="javascript">
									jQuery("#keycode").hide();
								</script> 
								<?php } ?>
                        </div>
                    
                </form> 
            
				<div class="clearfix"></div>
	  

    </div>
    <!-- /.container -->

	<?php require "footer.php";?>

  </body>

</html>
