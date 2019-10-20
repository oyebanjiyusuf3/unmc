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

<!-- Tags -->
<script src="<?php echo ADMIN_URL;?>/assets/plugins/jquery-tagsinput/jquery.tagsinput.min.js"></script>
<link href="<?php echo ADMIN_URL;?>/assets/plugins/jquery-tagsinput/jquery.tagsinput.min.css" rel="stylesheet" type="text/css"/>

<script>
$(document).ready(function() {
	$('#tags').tagsInput({'width':'auto','height':'75px'});
});
</script>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Add new article</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item">Articles</li>
			<li class="breadcrumb-item active">Add article</li>
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
			echo '<div class="alert alert-danger" role="alert">Error! Input article title</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
						
			<div class="card-body">
				
					<form action="core/ArticleAdd.php" method="post" enctype="multipart/form-data">					
					<div class="row">
					
							<div class="form-group col-xl-9 col-md-8 col-sm-12">
								<div class="form-group">
								<label>Article title</label>
								<input class="form-control" name="title" type="text" required>
								</div>
								
								<div class="form-group">
								<label>Article content</label>
								<textarea rows="3" class="form-control editor" name="content"></textarea>
								</div>
								
								<div class="form-group">
								<label>Thumbnail image</label><br />
								<input type="file" name="image">
								</div>
								
								<div class="form-group">
								<button type="submit" class="btn btn-primary">Add article</button>
								</div>
							</div>
							
							<div class="form-group col-xl-3 col-md-4 col-sm-12 border-left">
								<div class="form-group">
								<label>Meta title</label>
								<input type="text" class="form-control" name="meta_title">    
								</div>

								<div class="form-group">
								<label>Meta description</label>
								<input type="text" class="form-control" name="meta_description">    
								</div>
								
								<div class="form-group">
								<label>Tags</label>
								<input type="text" class="form-control" name="tags" id="tags" value="">    
								</div>
								
								<div class="form-group">
									<label>Article status</label>
									<select name="status" class="form-control">
									<option value="active">Active (published)</option>
									<option value="draft">Save draft</option>
									<option value="inactive">Inactive</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Select category</label>
									<select name="categ_id" class="form-control" required>
									<option value="">- select -</option>
									<?php
									$stmt_user_role = $conn->prepare("SELECT categ_id, title FROM ".DB_PREFIX."categories WHERE active = 1 ORDER BY title ASC");
									$stmt_user_role->execute();		
									while ($row = $stmt_user_role->fetch(PDO::FETCH_ASSOC))
										{
										$categ_id_selected = $row['categ_id'];
										$categ_title_selected = stripslashes($row['title']);
										?>
										<option value="<?php echo $categ_id_selected;?>"><?php echo $categ_title_selected;?></option>
										<?php
										}
									?>
									</select>
								</div>
								
							</div>
					
					</div><!-- end row -->	
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