<?php
session_start();
if(isset($_SESSION['user_token']) or isset($_COOKIE['pike_rememberme']))
	{
	// user is logged
	header("location:account.php");
	exit;
	}
require_once "config.php";

$redirect = filter_input(INPUT_GET, 'redirect', FILTER_SANITIZE_STRING);
$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/css/login.css" rel="stylesheet">

    <!-- Checkboxes style -->
    <link href="assets/css/bootstrap-checkbox.css" rel="stylesheet">
</head>

<body>

<div class="login-menu">
      <div class="container">
        <nav class="nav">
          <a class="nav-link" href="<?php echo ADMIN_URL;?>">Home</a>
          <a class="nav-link active" href="<?php echo ADMIN_URL;?>">Login</a>
        </nav>
      </div>
</div>

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center">
				
						
		<div class="card">
			<h4 class="card-header">Login</h4>
           
			<div class="card-body">
			
			<div class="alert alert-success" role="alert">
			<h5 class="alert-heading">Login</h5>
			<p>absyinka@gmail.com</p>
			<p>Password: 123456</p>
			</div>
			
                    	<?php	
						if ($msg =='demo_mode')
							echo '<p class="text-danger"><b>Error!</b> This action is disabled in demo mode</p>';
                    	if ($msg =='error')
							echo '<p class="text-danger"><b>Error!</b> Wrong email or password</p>';
						if ($msg =='register_ok') 
							echo '<p class="text-success">You must activate your account. <br />Please check your email (including spam folder)</p>';		
						if ($msg =='user_active')
							echo '<p class="text-info">User activated. Please login</p>';
						if ($msg =='user_already_active')
							echo '<p class="text-info">User is already active. Please login</p>';
						if ($msg =='logout')
							echo '<p class="text-info">You have signed out!</p>';										
						if ($msg =='error_inactive')
							echo '<p class="text-danger"><strong>Error! User is inactive.</strong><br />Please click on activate link in your registration email (don\'t forget to check spam folder too)!</p><i class="fa fa-undo fa-fw"></i> <a href="user-reset-activation.php">Resend activation code</a><hr />';	
						if ($msg =='reset_password_ok')
							echo '<p class="text-info">We have send a new password reset link in your email. Please check your email address to reset your account!</p>';		
						if ($msg =='reset_activation_ok')
							echo '<p class="text-info">We have resend a new activation code. Please check your email address to ACTIVATE your account!</p>';	
						if ($msg =='error_activation_code')
							echo '<p class="text-danger">Error! Wrong activation code.</p>';						
						if ($msg =='not_logged')
							echo '<p class="text-danger">Please login in your account!</p>';			
						?>

                        <form data-toggle="validator" role="form" method="post" action="core/login.php">                                
								
								<div class="row">	
									<div class="col-md-12">    
									<div class="form-group">
									<label>Login Email</label>
									<div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
										</div>
									  <input type="email" class="form-control" name="login_email" data-error="Input valid email" required>								  
									</div>								
									<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
                                </div>
								
								<div class="row">								
									<div class="col-md-12">
									<div class="form-group">
									<label>Password</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
										</div>
										<input type="password" id="inputPassword" data-minlength="6" name="login_password" class="form-control" data-error="Password to short" required />
									</div>	
									<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
								</div>
								
								<div class="row">								
								<div class="checkbox checkbox-primary">
                                <input id="checkbox_remember" type="checkbox" name="remember">
                                <label for="checkbox_remember"> Remember me</label>
                                </div>    
								</div>
								
                                <div class="row">
									<div class="col-md-12">
									<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
									<input type="submit" class="btn btn-primary btn-lg btn-block" value="Login" name="submit" />
									</div>
								</div>
                        </form>

                        <div class="clear"></div> 
						
						<?php
						if($cfg_registration_enabled==1) { ?>
                        <i class="fa fa-user fa-fw"></i> No account yet? <a href="register.php">Register new account</a><br />
                        <?php } ?>
                        <i class="fa fa-undo fa-fw"></i> Forgot password? <a href="reset-password.php">Reset password</a>
            
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
<script src="assets/js/bootstrap.min.js"></script>
	
<!-- Bootstrap validator  -->
<script src="assets/js/validator.min.js"></script>

</body>
</html>