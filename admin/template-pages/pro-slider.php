<?php
$numb_slides = $conn->query("SELECT count(1) FROM ".DB_PREFIX."slider")->fetchColumn();
?>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Slider</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item active">Slider</li>
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
		if ($msg =='error_image')
				echo '<div class="alert alert-danger" role="alert">Error! Upload slide image</div>';	
		if ($msg =='edit_ok')
				echo '<div class="alert alert-success" role="alert">Slide updated</div>';	
		if ($msg =='add_ok')
				echo '<div class="alert alert-success" role="alert">Slide added</div>';	
		if ($msg =='delete_ok')
				echo '<div class="alert alert-success" role="alert">Slide deleted</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
		
			<div class="card-header">
			<span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_slide"><i class="fa fa-plus" aria-hidden="true"></i> Add new slide image</button></span>
			<?php include ("modals/modal_add_slide.php");?> 
			<h3><i class="fa fa-image"></i> Slider (<?php echo $numb_slides;?> images)</h3>								
			</div>
			<!-- end card-header -->	
						
			<div class="card-body">
								
								
				<?php
				if ($numb_slides==0) { echo "No image"; }
				else
					{
					$stmt_users = $conn->prepare ("SELECT id, title, content, image, position, url, active FROM ".DB_PREFIX."slider ORDER BY position ASC");
					$stmt_users->execute();		
					?>
		
					<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="50">Position</th>
						<th width="160">Image</th>
                        <th>Slide details</th>
						<th width="120">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					while ($row = $stmt_users->fetch(PDO::FETCH_ASSOC))
					{
						$slide_id = $row['id'];
						$title = stripslashes($row['title']);
						$content = stripslashes($row['content']);
						$active = $row['active'];
						$image = $row['image'];
						$position = $row['position'];
						$url = $row['url'];												
						?>
						<tr <?php if($active==0) echo 'class="table-warning"';?>>
							<th>
							<?php echo $position;?>
							</th>
							
							<td>
							<?php
							if($image)
								{
								?>
								<span style="float: left; margin-right:10px;"><img style="max-width:160px; height:auto;" src="<?php echo ADMIN_URL;?>/uploads/images/<?php echo $image;?>" /></span>
								<?php					
								}
							?>								
							</td>
							
							<td>
							<h4><?php echo $title;?></h4>
							<small><?php echo $content;?></small><br />
							URl: <a target="_blank" href="<?php echo $url;?>"><?php echo $url;?></a>
							</td>
							
							<td>
								<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_slide_<?php echo $slide_id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<?php include ("modals/modal_edit_slide.php");?> 
								<a href="javascript:deleteRecord_<?php echo $slide_id;?>('<?php echo $slide_id;?>');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<script language="javascript" type="text/javascript">
								function deleteRecord_<?php echo $slide_id;?>(RecordId)
								{
									if (confirm('Confirm delete')) {
										window.location.href = 'core/SlideDelete.php?slide_id=<?php echo $slide_id;?>';
									}
								}
								</script>
							</td>
						</tr>
                    <?php 
					} // end while
					?>
                    </tbody>
					</table>
				  
					<?php
					} // end if
					?>
								
								
			</div>	
			<!-- end card-body -->								
				
		</div>
		<!-- end card -->					

	</div>
	<!-- end col -->	
										
</div>
<!-- end row -->	
