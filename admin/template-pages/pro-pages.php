<?php
$numb_pages = $conn->query("SELECT count(1) FROM ".DB_PREFIX."pages")->fetchColumn();
?>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Pages</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item active">Pages</li>
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
		if ($msg =='edit_ok')
				echo '<div class="alert alert-success" role="alert">Page updated</div>';	
		if ($msg =='add_ok')
				echo '<div class="alert alert-success" role="alert">Page added</div>';	
		if ($msg =='delete_ok')
				echo '<div class="alert alert-success" role="alert">Page deleted</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
		
			<div class="card-header">
			<span class="pull-right"><a href="account.php?page=pro-pages-add" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add new page</a></span>
			<h3><i class="fa fa-file-text-o"></i> All pages (<?php echo $numb_pages;?> pages)</h3>								
			</div>
			<!-- end card-header -->	
						
			<div class="card-body">
								
				<?php
				if (!(isset($pagenum))) { $pagenum = 1; }
				if ($numb_pages==0) { echo "No page"; }
				else
					{
						$page_rows = 50;
						$last = ceil($numb_pages/$page_rows);

						if ($pagenum < 1)
						{
						$pagenum = 1;
						}
						elseif ($pagenum > $last)
						{
						$pagenum = $last;
						}

						$max = ' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;		
						$stmt_pages = $conn->prepare ("SELECT page_id, title, slug, content, active, meta_title, meta_description, meta_keywords, redirect_url FROM ".DB_PREFIX."pages ORDER BY title DESC $max");
						$stmt_pages->execute();		
						?>
		
					<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Page details</th>
						<th width="120">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					while ($row = $stmt_pages->fetch(PDO::FETCH_ASSOC))
					{
						$page_id = $row['page_id'];
						$title = stripslashes($row['title']);
						$slug = $row['slug'];						
						$content = strip_tags(html_entity_decode(stripslashes($row['content'])));
						$active = $row['active'];
						$meta_title = stripslashes($row['meta_title']);
						$meta_description = stripslashes($row['meta_description']);
						$meta_keywords = stripslashes($row['meta_keywords']);
						$redirect_url = $row['redirect_url'];
						
						$content_short = substr(strip_tags($content), 0, 500);
						?>
						<tr <?php if($active==0) echo 'class="table-warning"';?>>							
							<td>
							<?php							
							echo '<h5>'.$title.'</h5>';
							if($content_short) echo '<p>'.$content_short.'</p>';
							?>
							<small>
							<?php if($redirect_url) echo 'Redirect URL: <a target="_blank" href='.$redirect_url.'>'.$redirect_url.'</a><br />';?>
							<?php if($meta_title) echo 'Meta title: '.$meta_title.'<br />'; ?>
							<?php if($meta_description) echo 'Meta description: '.$meta_description.'<br />'; ?>
							<?php if($meta_keywords) echo 'Meta keywords: '.$meta_keywords; ?>
							</small>
							</td>
							
							
							<td>
								<a href="account.php?page=pro-pages-edit&page_id=<?php echo $page_id;?>" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>								
								<a href="javascript:deleteRecord_<?php echo $page_id;?>('<?php echo $page_id;?>');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<script language="javascript" type="text/javascript">
								function deleteRecord_<?php echo $page_id;?>(RecordId)
								{
									if (confirm('Confirm delete')) {
										window.location.href = 'core/PageDelete.php?page_id=<?php echo $page_id;?>&pagenum=<?php echo $pagenum;?>';
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
