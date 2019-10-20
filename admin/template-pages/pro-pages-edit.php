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

<?php
$page_id = filter_input(INPUT_GET, 'page_id', FILTER_SANITIZE_NUMBER_INT);
$stmt = $conn->prepare ("SELECT title, content, meta_title, meta_description, meta_keywords, redirect_url, active FROM ".DB_PREFIX."pages WHERE page_id = ? LIMIT 1");
$stmt->execute([$page_id]);		
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$title = stripslashes($row['title']);
$content = stripslashes($row['content']);
$meta_title = stripslashes($row['meta_title']);
$meta_description = stripslashes($row['meta_description']);
$meta_keywords = stripslashes($row['meta_keywords']);
$redirect_url = stripslashes($row['redirect_url']);
$active = $row['active'];
?>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Edit page</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item">Articles</li>
			<li class="breadcrumb-item active">Edit page</li>
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
		if ($msg =='error_duplicate')
			echo '<div class="alert alert-danger" role="alert">Error! Page already exist</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
						
			<div class="card-body">
				
					<form action="core/PageEdit.php" method="post">
					
					<div class="form-group">
					<label>Page title</label>
					<input class="form-control" name="title" type="text" value="<?php echo $title;?>" required>
					</div>

					<div class="form-group">
					<label>Page content</label>
					<textarea rows="3" class="form-control editor" name="content"><?php echo $content;?></textarea>
					</div>
					
					<div class="form-group">
					<label>Redirect URL</label>
					<input type="text" class="form-control" name="redirect_url" value="<?php echo $redirect_url;?>">    
					</div>
					
					<div class="form-group">
					<label>Meta title</label>
					<input type="text" class="form-control" name="meta_title" value="<?php echo $meta_title;?>">    
					</div>
					
					<div class="form-group">
					<label>Meta description</label>
					<input type="text" class="form-control" name="meta_description" value="<?php echo $meta_description;?>">    
					</div>
					
					<div class="form-group">
					<label>Meta keywords</label>
					<input type="text" class="form-control" name="meta_keywords" value="<?php echo $meta_keywords;?>">    
					</div>
					
					<div class="form-group">
							<label>Page status</label>
							<select name="active" class="form-control">
							<option <?php if($active==1) echo 'selected="selected"';?> value="1">Active (published)</option>
							<option <?php if($active==0) echo 'selected="selected"';?> value="0">Inactive</option>
							</select>
					</div>
				
					<div class="form-group">
					<input type="hidden" name="page_id" value="<?php echo $page_id;?>" />
					<button type="submit" class="btn btn-primary">Edit page</button>
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