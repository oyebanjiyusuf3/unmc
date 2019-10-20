<?php
$numb_categ = $conn->query("SELECT count(1) FROM ".DB_PREFIX."categories")->fetchColumn();
?>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Categories</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item active">Categories</li>
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
				echo '<div class="alert alert-danger" role="alert">Error! Input category title</div>';	
		if ($msg =='error_duplicate')
				echo '<div class="alert alert-danger" role="alert">Error! There is another category with this title</div>';	
		if ($msg =='edit_ok')
				echo '<div class="alert alert-success" role="alert">Category updated</div>';	
		if ($msg =='add_ok')
				echo '<div class="alert alert-success" role="alert">Category added</div>';	
		if ($msg =='delete_ok')
				echo '<div class="alert alert-success" role="alert">Category deleted</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
		
			<div class="card-header">
			<span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-plus" aria-hidden="true"></i> Add new category</button></span>
			<?php include ("modals/modal_add_category.php");?> 
			<h3><i class="fa fa-sitemap"></i> All categories (<?php echo $numb_categ;?> categories)</h3>								
			</div>
			<!-- end card-header -->	
						
			<div class="card-body">
								
								
				<?php
				if (!(isset($pagenum))) { $pagenum = 1; }
				if ($numb_categ==0) { echo "No category"; }
				else
					{
						$page_rows = 50;
						$last = ceil($numb_categ/$page_rows);

						if ($pagenum < 1)
						{
						$pagenum = 1;
						}
						elseif ($pagenum > $last)
						{
						$pagenum = $last;
						}

						$max = ' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;		
						$stmt_users = $conn->prepare ("SELECT categ_id, title, slug, description, active FROM ".DB_PREFIX."categories ORDER BY title ASC $max");
						$stmt_users->execute();		
						?>
		
					<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Category details</th>
                        <th width="150">Articles</th>
						<th width="120">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					while ($row = $stmt_users->fetch(PDO::FETCH_ASSOC))
					{
						$categ_id = $row['categ_id'];
						$title = stripslashes($row['title']);
						$slug = $row['slug'];
						$description = stripslashes($row['description']);
						$active = $row['active'];
						
						$numb_articles = $conn->query("SELECT count(1) FROM ".DB_PREFIX."articles WHERE categ_id = '$categ_id'")->fetchColumn();
						?>
						<tr <?php if($active==0) echo 'class="table-warning"';?>>
							
							<td>
							<?php							
							echo "<strong>".$title."</strong>";?>
							<br />
							<small><?php echo $description;?></small>
							</td>
							
							<td><?php echo $numb_articles;?></td>
							
							<td>
								<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_category_<?php echo $categ_id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<?php include ("modals/modal_edit_category.php");?> 
								<a href="javascript:deleteRecord_<?php echo $categ_id;?>('<?php echo $categ_id;?>');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<script language="javascript" type="text/javascript">
								function deleteRecord_<?php echo $categ_id;?>(RecordId)
								{
									if (confirm('Confirm delete')) {
										window.location.href = 'core/CategoryDelete.php?categ_id=<?php echo $categ_id;?>&pagenum=<?php echo $pagenum;?>';
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
