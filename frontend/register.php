<?php
	
	$title = 'Registration &mdash; UNMC';
	include_once 'includes/f_head.php';

?>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<!-- <div class="brand">
						<img src="img/logo.jpg">
					</div> -->
					<div class="card fat-reg">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<?php 
                    			echo getMsg('msg'); 
                
			                    //getting errors on form
			                    $err = getMsg('errors');
			                  
			                    //getting data back which was entered on form
			                    $data = getMsg('form_data');
                			?>
							<form method="post" action="<?php echo(URLROOT) ?>/process/p_register.php">
							 
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" name="name" value="<?php echo($data['name']); ?>" class="form-control <?php echo(isset($err['name_err'])) ? 'is-invalid' : ''; ?>" autofocus>
									<span class="invalid-feedback"><?php echo($err['name_err']); ?></span>
								</div>

								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" name="username" value="<?php echo($data['username']); ?>" class="form-control <?php echo(isset($err['username_err'])) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo($err['username_err']); ?></span>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" name="email" value="<?php echo($data['email']); ?>" class="form-control <?php echo(isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo($err['email_err']); ?></span>
								</div>

								<div class="form-group">
									<label for="website">Your Website URL</label>
									<input id="website" type="url" name="website" value="<?php echo($data['website']); ?>" class="form-control <?php echo(isset($err['website_err'])) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo($err['website_err']); ?></span>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" name="password" value="<?php echo($data['password']); ?>" class="form-control <?php echo(isset($err['password_err'])) ? 'is-invalid' : ''; ?>" data-eye>
									<span class="invalid-feedback"><?php echo($err['password_err']); ?></span>
								</div>

								<div class="form-group">
									<label for="confirm_password">Confirm Password</label>
									<input id="confirm_password" type="password" name="confirm_password" value="<?php echo($data['confirm_password']); ?>" class="form-control <?php echo(isset($err['confirm_password_err'])) ? 'is-invalid' : ''; ?>" data-eye>
									<span class="invalid-feedback"><?php echo($err['confirm_password_err']); ?></span>
								</div>

								<!-- <div class="form-group">
									<label>
										<input type="checkbox" name="aggree" value="1"> I agree to the Terms and Conditions
									</label>
								</div> -->

								<div class="form-group no-margin">
									<input type="submit" name="register" value="Register" class="btn btn-primary btn-block">
								</div>
								<div class="margin-top20 text-center">
									Already have an account? <a href="<?php echo (URLROOT); ?>/login.php">Login</a>
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