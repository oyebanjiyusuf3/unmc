<!-- Text editor-->
<script src="<?php echo ADMIN_URL;?>/assets/plugins/trumbowyg/trumbowyg.min.js"></script>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/trumbowyg/plugins/upload/trumbowyg.upload.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_URL;?>/assets/plugins/trumbowyg/ui/trumbowyg.min.css">
<script>
$(document).ready(function () {
    'use strict';
	$('.editor').trumbowyg();	
}); 
</script>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Settings</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item active">Settings</li>
            </ol>
            <div class="clearfix"></div>
        </div>
	</div>
</div>
<!-- end row -->

            
	<?php  if(DEMO_MODE!=0) { ?>				
	<div class="alert alert-danger" role="alert">
	<h4 class="alert-heading">Important!</h4>
	<p>This section is available in Pike Admin PRO version.</p>
	<p><b>Save over 50 hours of development with our Pro Framework: Registration / Login / Users Management, CMS, Front-End Template (who will load contend added in admin area and saved in MySQL database), Contact Messages Management, manage Website Settings and many more, at an incredible price!</b></p>
	<p>Read more about all PRO features here: <a target="_blank" href="https://www.pikeadmin.com/pike-admin-pro"><b>Pike Admin PRO features</b></a></p>
	</div>
	<?php } ?>

			
	<?php		
	if ($msg =='edit_ok') echo '<div class="alert alert-success" role="alert">Settings updated</div>';	
	if ($msg =='test_email_ok') echo '<div class="alert alert-success" role="alert">Test email sent. Please check your email address</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						

		<form action="core/SettingsEdit.php" method="post" enctype="multipart/form-data">
					
		<div class="card mb-3">
			
			<div class="card-header">
			<h3><i class="fa fa-file-text-o"></i> General settings</h3>								
			</div>
			<!-- end card-header -->	
			
			<div class="card-body">
					
					<div class="form-group">
					<label>Site Title</label>
					<input class="form-control" name="cfg_site_title" type="text" value="<?php echo $cfg_site_title;?>">
					</div>
					
					<div class="row">
						<div class="form-group col-md-6">
						<label>SEO meta title</label>
						<input type="text" class="form-control" name="cfg_site_meta_title" value="<?php echo $cfg_site_meta_title;?>">    
						</div>

						<div class="form-group col-md-6">
						<label>SEO meta description</label>
						<input type="text" class="form-control" name="cfg_site_meta_description" value="<?php echo $cfg_site_meta_description;?>">    
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-6">
						<label>SEO meta keywords</label>
						<input type="text" class="form-control" name="cfg_site_meta_keywords" value="<?php echo $cfg_site_meta_keywords;?>">    
						</div>
					
						<div class="form-group col-md-6">
						<label>SEO meta author</label>
						<input type="text" class="form-control" name="cfg_site_meta_author" value="<?php echo $cfg_site_meta_author;?>">    
						</div>
					</div>
					
					<div class="form-group">
					<label>Homepage content</label>
					<textarea rows="3" class="form-control editor" name="cfg_homepage_content"><?php echo $cfg_homepage_content;?></textarea>
					</div>
					
					<div class="form-group">
					<label>Footer HTML content</label>
					<textarea rows="3" class="form-control editor" name="cfg_footer_content"><?php echo $cfg_footer_content;?></textarea>
					</div>
					
					<div class="form-group">
					<label>Analytics code</label>
					<textarea rows="4" class="form-control" name="cfg_analytics_code"><?php echo $cfg_analytics_code;?></textarea>
					</div>
					
					<div class="form-row">					
						<div class="form-group col-md-2">
							<label>Facebook page</label>
							<input type="text" class="form-control" name="cfg_facebook_page" value="<?php echo $cfg_facebook_page;?>">
						</div>
						
						<div class="form-group col-md-2">
							<label>Twitter page</label>
							<input type="text" class="form-control" name="cfg_twitter_page" value="<?php echo $cfg_twitter_page;?>">
						</div>
						
						<div class="form-group col-md-2">
							<label>Google Maps API KEY</label>
							<input type="password" class="form-control" name="cfg_google_maps_api_key" value="<?php echo $cfg_google_maps_api_key;?>">
						</div>
						
					</div>
					
					<div class="form-group">
					<label>Change logo image</label><br />
					<input type="file" name="image">
					</div>
				
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Change settings</button>
					</div>
									
			</div>	
			<!-- end card-body -->								
				
		</div>
		<!-- end card -->					
		
		
		
		<div class="card mb-3">
			
			<div class="card-header">
			<h3><i class="fa fa-file-text-o"></i> Registration settings</h3>								
			</div>
			<!-- end card-header -->	
			
			<div class="card-body">
									
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Public registration</label>
							<select name="cfg_registration_enabled" class="form-control">
							<option <?php if($cfg_registration_enabled==0) echo 'selected="selected"';?> value="0">Registration disabled</option>
							<option <?php if($cfg_registration_enabled==1) echo 'selected="selected"';?> value="1">Registration enabled</option>
							</select>
						</div>
						
						<div class="form-group col-md-3">
							<label>User role for registered users</label>
							<select name="cfg_registration_user_role" class="form-control">
							<option value="">- select -</option>
								<optgroup label="Staff member">
								<?php
								$stmt_user_role = $conn->prepare("SELECT role_id, title FROM ".DB_PREFIX."users_roles WHERE active = 1 AND is_staff = 1 ORDER BY role_id ASC");
								$stmt_user_role->execute();		
								while ($row = $stmt_user_role->fetch(PDO::FETCH_ASSOC))
									{
									$role_id_selected = $row['role_id'];
									$role_title_selected = stripslashes($row['title']);
									?>
									<option <?php if($role_id_selected==$cfg_registration_user_role) echo 'selected="selected"';?> value="<?php echo $role_id_selected;?>"><?php echo $role_title_selected;?></option>
									<?php
									}
								?>
								</optgroup>
								
								<optgroup label="Registered member">
								<?php
								$stmt_user_role = $conn->prepare("SELECT role_id, title FROM ".DB_PREFIX."users_roles WHERE active = 1 AND is_staff = 0 ORDER BY role_id ASC");
								$stmt_user_role->execute();		
								while ($row = $stmt_user_role->fetch(PDO::FETCH_ASSOC))
									{
									$role_id_selected = $row['role_id'];
									$role_title_selected = stripslashes($row['title']);
									?>
									<option <?php if($role_id_selected==$cfg_registration_user_role) echo 'selected="selected"';?> value="<?php echo $role_id_selected;?>"><?php echo $role_title_selected;?></option>
									<?php
									}
								?>
								</optgroup>
							</select>
						</div>
						
						<div class="form-group col-md-3">
							<label>Users must confirm email address</label>
							<select name="cfg_registration_email_verification_enabled" class="form-control">
							<option <?php if($cfg_registration_email_verification_enabled==0) echo 'selected="selected"';?> value="0">No</option>
							<option <?php if($cfg_registration_email_verification_enabled==1) echo 'selected="selected"';?> value="1">Yes</option>
							</select>
						</div>
						
					</div>	
										
					
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Change settings</button>
					</div>
									
			</div>	
			<!-- end card-body -->								
				
		</div>
		<!-- end card -->	


		<div class="card mb-3">
			
			<div class="card-header">
			<h3><i class="fa fa-file-text-o"></i> Antispam settings</h3>
			You can get an Google reCAPTCHA Site key and Secret key here: <a target="_blank" href="https://www.google.com/recaptcha/">https://www.google.com/recaptcha/</a>
			</div>
			<!-- end card-header -->	
			
			<div class="card-body">
									
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>reCAPTCHA on register page</label>
							<select name="cfg_google_recaptcha_registration_enabled" class="form-control">
							<option <?php if($cfg_google_recaptcha_registration_enabled==0) echo 'selected="selected"';?> value="0">Disabled</option>
							<option <?php if($cfg_google_recaptcha_registration_enabled==1) echo 'selected="selected"';?> value="1">Enabled</option>
							</select>
						</div>
						
						<div class="form-group col-md-3">
							<label>reCAPTCHA on contact page form</label>
							<select name="cfg_google_recaptcha_contact_enabled" class="form-control">
							<option <?php if($cfg_google_recaptcha_contact_enabled==0) echo 'selected="selected"';?> value="0">Disabled</option>
							<option <?php if($cfg_google_recaptcha_contact_enabled==1) echo 'selected="selected"';?> value="1">Enabled</option>
							</select>
						</div>
																		
						<div class="form-group col-md-3">
						<label>Google reCAPTCHA Site key</label>
						<input type="password" class="form-control" name="cfg_google_recaptcha_site_key" value="<?php echo $cfg_google_recaptcha_site_key;?>">    
						</div>
						
						<div class="form-group col-md-3">
						<label>Google reCAPTCHA Secret key</label>
						<input type="password" class="form-control" name="cfg_google_recaptcha_secret_key" value="<?php echo $cfg_google_recaptcha_secret_key;?>">    
						</div>
						
					</div>	
										
					
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Change settings</button>
					</div>
									
			</div>	
			<!-- end card-body -->								
				
		</div>
		<!-- end card -->	
		
		
		<div class="card mb-3">
			
			<div class="card-header">
			<h3><i class="fa fa-file-text-o"></i> Email settings</h3>								
			</div>
			<!-- end card-header -->	
			
			<div class="card-body">
									
					<div class="form-row">
						<div class="form-group col-md-3">
						<label>Site email address (From: email)</label>
						<input class="form-control" name="cfg_site_email" type="text" value="<?php echo $cfg_site_email;?>">
						</div>
					
						<div class="form-group col-md-3">
						<label>Email name (From: name)</label>
						<input type="text" class="form-control" name="cfg_site_email_name" value="<?php echo $cfg_site_email_name;?>">    
						</div>
					</div>	
										
					
					<div class="form-row">		
						<div class="form-group col-md-2">
							<label>Mail sending option</label>
							<select name="cfg_mail_sending_option" class="form-control">							
							<option <?php if($cfg_mail_sending_option=='php') echo 'selected="selected"';?> value="php">PHP mailer (NOT recomended)</option>
							<option <?php if($cfg_mail_sending_option=='smtp') echo 'selected="selected"';?> value="smtp">SMTP mailer (recomended)</option>
							</select>
						</div>
						
						<div class="form-group col-md-2">
							<label>SMTP server</label>
							<input type="text" class="form-control" name="cfg_mail_smtp_server" value="<?php echo $cfg_mail_smtp_server;?>">
						</div>
						
						<div class="form-group col-md-2">
							<label>SMTP user</label>
							<input type="text" class="form-control" name="cfg_mail_smtp_user" value="<?php echo $cfg_mail_smtp_user;?>">
						</div>
						
						<div class="form-group col-md-2">
							<label>SMTP password</label>
							<input type="password" class="form-control" name="cfg_mail_smtp_password" value="<?php echo $cfg_mail_smtp_password;?>">
						</div>
						
						<div class="form-group col-md-2">
							<label>SMTP port</label>
							<input type="text" class="form-control" name="cfg_mail_smtp_port" value="<?php echo $cfg_mail_smtp_port;?>">
						</div>
						
						<div class="form-group col-md-2">
							<label>SMTP encryption</label>
							<select name="cfg_mail_smtp_encryption" class="form-control">
							<option <?php if($cfg_mail_smtp_encryption=='tls') echo 'selected="selected"';?> value="tls">TLS</option>
							<option <?php if($cfg_mail_smtp_encryption=='ssl') echo 'selected="selected"';?> value="ssl">SSL</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Change settings</button>
					</div>
									
			</div>	
			<!-- end card-body -->								
				
		</div>
		<!-- end card -->	
		
		</form>
		
		
		
		
		<div class="card mb-3">
			<div class="card-header">
			<h3><i class="fa fa-envelope-o"></i> Test email settings</h3>	
			Send a test email using your settings			
			</div>
			<!-- end card-header -->	
			
			<div class="card-body">
					<form action="core/SendTestEmail.php" method="post">
					<div class="form-group form-inline">						
					<input type="text" class="form-control" name="test_email" placeholder="Input email">
					<button type="submit" class="btn btn-primary">Send test email</button>
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


<script>
$(document).ready(function () {
    'use strict';
	
	// ------------------------------------------------------- //
    // Text editor (WYSIWYG)
    // ------------------------------------------------------ //
	$('.editor').trumbowyg({
				removeformatPasted: true,
				autogrow: true,
				btnsDef: {
					// Create a new dropdown
					image: {
						dropdown: ['insertImage', 'upload'],
						ico: 'insertImage'
					}
				}, 
	
				btns: [
						['viewHTML'],
						['undo', 'redo'],
						['formatting'],
						'btnGrp-semantic',
						['superscript', 'subscript'],
						['link'],
						['image'],
						'btnGrp-justify',
						'btnGrp-lists',
						['horizontalRule'],
						['removeformat'],
						['fullscreen']
					],
							
				plugins: {
						upload: {
							serverPath: '<?php echo ADMIN_URL;?>/assets/plugins/trumbowyg/texteditor-upload.php',
							fileFieldName: 'image'
							}
						}				
							
			});	
						
}); 
</script>