<?php
session_start();
if(isset($_SESSION['user_token']) or isset($_COOKIE['pike_rememberme']))
	{
	// user is logged
	header("location:account.php");
	exit;
	}
require_once "config.php";

if($cfg_registration_enabled==0)
	{
		echo "Registration disabled";
		exit;
	}

$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register new account</title>

    <!-- Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/css/login.css" rel="stylesheet">

    <!-- Checkboxes style -->
    <link href="assets/css/bootstrap-checkbox.css" rel="stylesheet">
	
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

<div class="login-menu">
      <div class="container">
        <nav class="nav">
          <a class="nav-link" href="<?php echo ADMIN_URL;?>">Home</a>
          <a class="nav-link active" href="<?php echo ADMIN_URL;?>/register.php">Register</a>
        </nav>
      </div>
</div>
	
<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center">
	
		<div class="card">
			<h4 class="card-header">Register new account</h4>
           
			<div class="card-body">
                    	<?php 							
						if ($msg =='error_name') echo '<p class="text-danger">Error! Input your full name.</p>';							
						if ($msg =='error_email') echo '<p class="text-danger">Error! Input valid email.</p>';	
						if ($msg =='error_passw') echo '<p class="text-danger">Error! Input the same password in both fields (minimum 6 characters).</p>';	
						if ($msg =='error_duplicate_email') echo '<p class="text-danger">Error! There is another user with this email.</p>';
						if ($msg =='captcha_error') echo '<p class="text-danger">Error! Wrong antispam code.</p>';			
						?>

                        <form data-toggle="validator" role="form" method="post" action="core/UserRegister.php" onsubmit="return validateCaptcha();">
								
								<div class="row">	
									<div class="col-md-12">
									<div class="form-group">
									<label>Your full name</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
										</div>
										<input type="text" name="name" value="<?php echo $name;?>" class="form-control" id="inputName" required />
									</div>
									<div class="help-block with-errors text-danger"></div>								
									</div>
									</div>
								</div>
                                
								<div class="row">	
									<div class="col-md-12">    
									<div class="form-group">
									<label>Email</label>
									<div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
										</div>
									  <input type="email" class="form-control" name="email" value="<?php echo $email;?>" required>								  
									</div>								
									<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
                                </div>
								
								<div class="row">								
									<div class="col-md-6">
									<div class="form-group">
									<label>Password</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
										</div>
										<input type="password" id="inputPassword" data-minlength="6" name="password" class="form-control" data-error="Password to short" required />
									</div>	
									<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									
									<div class="col-md-6">
									<div class="form-group">	
									<label>Password again</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
										</div>
										<input type="password" id="inputPasswordConfirm" name="password2" class="form-control" data-match="#inputPassword" data-match-error="Password must be the same in both fields" required />
									</div>    	
									<div class="help-block with-errors text-danger"></div>
									</div>    
									</div>
								</div>
								
								<?php if($cfg_google_recaptcha_registration_enabled==1) { ?>
								<div class="g-recaptcha" data-sitekey="<?php echo $cfg_google_recaptcha_site_key;?>"></div>
								<?php } ?>
								
								<div class="mb-3"></div>
								
                                <div class="row">
									<div class="col-md-12">
									<?php if(DEMO_MODE!=0) echo '<p class="text-danger">Warning! Registration is disabled in demo mode</p>';?>
									<input type="submit" class="btn btn-primary btn-lg btn-block" value="Register account" name="submit" />
										<?php if($cfg_google_recaptcha_registration_enabled==1) { ?>
										<p class="help-block with-errors text-danger" id="keycode">Please click on <b>I am not robot</b></p>
										<script type="text/javascript" language="javascript">
										jQuery("#keycode").hide();
										</script> 
										<?php } ?>
									</div>
								</div>
                        </form>

                        <div class="clear"></div> 
						
                        <i class="fa fa-undo fa-fw"></i> Already registered? <a href="index.php">Account login</a>
            
			</div>	
			
		</div>	
		
	</div>	
</div>

<footer class="footer">
	<div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
	
<!-- Core Scripts -->
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>