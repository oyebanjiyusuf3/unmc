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
			<h1 class="main-title float-left">Add new page</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item">Articles</li>
			<li class="breadcrumb-item active">Add page</li>
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
		if ($msg =='error_title')
				echo '<div class="alert alert-danger" role="alert">Error! Input page title</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
						
			<div class="card-body">
				
					<form action="core/PageAdd.php" method="post">
					
					<div class="form-group">
					<label>Page title</label>
					<input class="form-control" name="title" type="text" required>
					</div>

					<div class="form-group">
					<label>Page content</label>
					<textarea rows="3" class="form-control editor" name="content"></textarea>
					</div>
					
					<div class="form-group">
					<label>Redirect URL</label>
					<input type="text" class="form-control" name="redirect_url">    
					</div>
					
					<div class="form-group">
					<label>Meta title</label>
					<input type="text" class="form-control" name="meta_title">    
					</div>
					
					<div class="form-group">
					<label>Meta description</label>
					<input type="text" class="form-control" name="meta_description">    
					</div>
					
					<div class="form-group">
					<label>Meta keywords</label>
					<input type="text" class="form-control" name="meta_keywords">    
					</div>
					
					<div class="form-group">
							<label>Page status</label>
							<select name="active" class="form-control">
							<option value="1">Active (published)</option>
							<option value="0">Inactive</option>
							</select>
					</div>
				
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Add page</button>
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