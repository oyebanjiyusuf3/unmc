<?php
$UserDetailsArray = getUserDetailsArray($logged_user_id);
$email = $UserDetailsArray['email'];						
$role_id = $UserDetailsArray['role_id'];
$name = $UserDetailsArray['name'];
$active = $UserDetailsArray['active'];
$email_verified = $UserDetailsArray['email_verified'];
$avatar = $UserDetailsArray['avatar'];
$register_time = $UserDetailsArray['register_time'];
$register_ip = $UserDetailsArray['register_ip'];
$register_host = $UserDetailsArray['register_host'];
$last_activity = $UserDetailsArray['last_activity'];

$skype = getUsersExtraUnique ($logged_user_id, 'skype');
?>

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">My Profile</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<?php  if(DEMO_MODE!=0) { ?>				
			<div class="alert alert-danger" role="alert">
			<h4 class="alert-heading">Important!</h4>
			<p>This section is available in PRO version.</p>
			<p><b>Save over 50 hours of development with our Pro Framework: Registration / Login / Users Management, CMS, Front-End Template (who will load contend added in admin area and saved in MySQL database), Contact Messages Management, manage Website Settings and many more, at an incredible price!</b></p>
			<p>Read more about all PRO features here: <a target="_blank" href="#"><b>Admin PRO features</b></a></p>
			</div>
			<?php } ?>

			
			<?php		
			if ($msg =='error_name')
				echo '<div class="alert alert-danger" role="alert">Error! Input full name</div>';	
			if ($msg =='error_email')
				echo '<div class="alert alert-danger" role="alert">Error! Input valid email</div>';	
			if ($msg =='error_duplicate_email')
				echo '<div class="alert alert-danger" role="alert">Error! There is another user with this email address</div>';	
			if ($msg =='edit_ok')
				echo '<div class="alert alert-success" role="alert">Profile updated</div>';	
			?>
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-user"></i> Profile details</h3>								
							</div>
								
							<div class="card-body">
								
								
								<form action="core/UserProfileChange.php" method="post" enctype="multipart/form-data">
                
								<div class="row">	
								
								<div class="col-lg-9 col-xl-9">
									
									<div class="row">				
										<div class="col-lg-6">
										<div class="form-group">
										<label>Full name (required)</label>
										<input class="form-control" name="name" type="text" value="<?php echo $name;?>" required />
										</div>
										</div>

										<div class="col-lg-6">
										<div class="form-group">
										<label>Valid Email (required)</label>
										<input class="form-control" name="email" type="email" value="<?php echo $email;?>" required />
										</div>
										</div>  
									</div>
									
									<div class="row">				
										<div class="col-lg-6">
										<div class="form-group">
										<label>Password (leave empty not to change)</label>
										<input class="form-control" name="password" type="password" value="" />
										</div>
										</div>              			                                
										
										<div class="col-lg-6">
										<div class="form-group">
										<label>Skype</label>
										<input class="form-control" name="skype" type="text" value="<?php echo $skype;?>" />
										</div>
										</div>   
									</div>
									
									<div class="row">
										<div class="col-lg-12">
										<button type="submit" class="btn btn-primary">Edit profile</button>
										</div>
									</div>
								
								</div>
								
								
								
								<div class="col-lg-3 col-xl-3 border-left">
									<b>Latest activity</b>: <?php echo DateTimeFormat($last_activity);?>
									<br />
									<b>Register date: </b>: <?php echo DateTimeFormat($register_time);?>
									<br />
									<b>Register IP: </b>: <?php echo $register_ip;?>
									
									<div class="m-b-10"></div>
									
									<?php
										if($avatar)
											{
											?>
											<div id="avatar_image">
												<img style="max-width:100px; height:auto;" src="<?php echo ADMIN_URL;?>/uploads/avatars/<?php echo $avatar;?>" />
												<br />
												<i class="fa fa-trash-o fa-fw"></i> <a class="delete_image" href="<?php echo ADMIN_URL;?>/core/UserProfileRemoveAvatar.php">Remove avatar</a>
													<script type="text/javascript">
													$(function(){
														$('.delete_image').click(function(){
															var id = $(this).attr('id');
															
															$.ajax({
																type: "POST",
																url: "<?php echo ADMIN_URL;?>/core/UserProfileRemoveAvatar.php",                                        
								
																success: function() {
																		$('#avatar_image').hide();
																		$("#image_deleted_text").html("Avatar removed").css('color','red');
																	}
															});
															return false;
														});
													});
													</script>  
											</div>  
											<div id="image_deleted_text"></div>                      
											<?php					
											}
											?> 
									
									<div class="m-b-10"></div>
									
									<div class="form-group">
									<label>Change avatar</label> 
									<input type="file" name="image" class="form-control">
									</div>
									
								</div>
								</div>								
								
								</form>		
				
								
			</div>	
			<!-- end card-body -->								
				
		</div>
		<!-- end card -->					

	</div>
	<!-- end col -->	
										
</div>
<!-- end row -->	