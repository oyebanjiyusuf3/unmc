<?php 
	$title = "Login &mdash; UNMC";
	include_once 'includes/f_head.php';

?>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="<?php echo (URLROOT); ?>"><img src="img/logo.jpg"></a>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<?php 
                    
                    			echo getMsg('msg_notify'); 
                
                    			//getting errors on form
                    			$err = getMsg('errors');
                  
                    			//getting data back which was entered on form
                    			$data = getMsg('form_data');
                    
                    		?>
							<form method="post" action="<?php echo(URLROOT) ?>/process/p_login.php">
							 
								<div class="form-group">
									<label for="email">Username</label>

									<input id="username" type="text" name="username" <?php echo($data['username']); ?>" class="form-control <?php echo(isset($err['username_err'])) ? 'is-invalid' : ''; ?>" autofocus>
									<span class="invalid-feedback"><?php echo($err['username_err']); ?></span>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.php" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" name="password" value="<?php echo($data['password']); ?>" class="form-control <?php echo(isset($err['password_err'])) ? 'is-invalid' : ''; ?>" data-eye>
									<span class="invalid-feedback"><?php echo($err['password_err']); ?></span>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="remember-me"> Remember Me
									</label>
								</div>

								<div class="form-group no-margin">
									<input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
								</div>
								<div class="margin-top20 text-center">
									Don't have an account? <a href="ques.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; UNMC 2018
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include_once 'includes/f_footer.html'; ?>