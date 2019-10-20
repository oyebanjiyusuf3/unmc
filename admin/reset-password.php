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
    <title>Password reset</title>

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
          <a class="nav-link active" href="<?php echo ADMIN_URL;?>/reset-password.php">Reset password</a>
        </nav>
      </div>
</div>

<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center">
	
		<div class="card">
			<h4 class="card-header">Password reset</h4>
           
			<div class="card-body">
                    	<?php	
                    	if ($msg =='error')
							echo '<p class="text-danger"><b>Error!</b> Wrong email</p>';
						if ($msg =='invalid_reset_code')
							echo '<p class="text-danger"><b>Error!</b> Invalid reset code</p>';
						?>

                        <form data-toggle="validator" role="form" method="post" action="core/UserResetPasswordSendEmail.php">
                                
								<div class="row">	
									<div class="col-md-12">    
									<div class="form-group">
									<label>Your Email</label>
									<div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
										</div>
									  <input type="email" class="form-control" name="email" data-error="Input valid email" required>								  
									</div>								
									<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
                                </div>
								
                                <div class="row">
									<div class="col-md-12">
									<?php if(DEMO_MODE!=0) echo '<p class="text-danger">Warning! Reset password is disabled in demo mode</p>';?>
									<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
									<input type="submit" class="btn btn-primary btn-lg btn-block" value="Reset password" name="submit" />
									</div>
								</div>
                        </form>

                        <div class="clear"></div> 
						
						<?php
						if($cfg_registration_enabled==1) { ?>
                        <i class="fa fa-user-o fa-fw"></i> No account yet? <a href="register.php">Register new account</a><br />
                        <?php } ?>
                        <i class="fa fa-undo fa-fw"></i> Already have an account? <a href="index.php">Account login</a>
            
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