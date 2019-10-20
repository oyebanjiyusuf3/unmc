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
$numb_articles = $conn->query("SELECT count(1) FROM ".DB_PREFIX."articles")->fetchColumn();
?>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Articles</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item active">Articles</li>
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
			echo '<div class="alert alert-success" role="alert">Article updated</div>';	
	if ($msg =='add_ok')
			echo '<div class="alert alert-success" role="alert">Article added</div>';	
	if ($msg =='delete_ok')
			echo '<div class="alert alert-success" role="alert">Article deleted</div>';	
?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
		
			<div class="card-header">
			<span class="pull-right"><a href="account.php?page=pro-articles-add" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add new article</a></span>
			<h3><i class="fa fa-file-text-o"></i> All articles (<?php echo $numb_articles;?> articles)</h3>								
			</div>
			<!-- end card-header -->	
						
			<div class="card-body">
								
				<?php
				if (!(isset($pagenum))) { $pagenum = 1; }
				if ($numb_articles==0) { echo "No article"; }
				else
					{
						$page_rows = 10;
						$last = ceil($numb_articles/$page_rows);

						if ($pagenum < 1)
						{
						$pagenum = 1;
						}
						elseif ($pagenum > $last)
						{
						$pagenum = $last;
						}

						$max = ' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;		
						$stmt_articles = $conn->prepare ("SELECT article_id, user_id, categ_id, title, slug, content, date_added, image, hits, status FROM ".DB_PREFIX."articles ORDER BY article_id DESC $max");
						$stmt_articles->execute();		
						?>
		
					<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Article details</th>
                        <th width="160">Category</th>
						<th width="100">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					while ($row = $stmt_articles->fetch(PDO::FETCH_ASSOC))
					{
						$article_id = $row['article_id'];
				 		$user_id = $row['user_id'];												
						$categ_id = $row['categ_id'];												
						$title = stripslashes($row['title']);
						$slug = $row['slug'];						
						$content = strip_tags(html_entity_decode(stripslashes($row['content'])));
						$date_added = $row['date_added'];
						$image = $row['image'];
						$hits = $row['hits'];
						$status = $row['status'];
						
						$content_short = substr($content, 0, 400);
						
						// category details
						$stmt_categ = $conn->prepare ("SELECT title FROM ".DB_PREFIX."categories WHERE categ_id = ? LIMIT 1");
						$stmt_categ->execute([$categ_id]);
						$row = $stmt_categ->fetch(PDO::FETCH_ASSOC);
						$categ_title = stripslashes($row['title']);
						
						// author details
						$stmt_author = $conn->prepare ("SELECT name FROM ".DB_PREFIX."users WHERE user_id = ? LIMIT 1");
						$stmt_author->execute([$user_id]);
						$row = $stmt_author->fetch(PDO::FETCH_ASSOC);
						$author_name = stripslashes($row['name']);
						?>
						<tr <?php if($status == 'draft') { echo 'class="table-warning"';} else if($status == 'inactive') { echo 'class="table-danger"'; } else { echo '';}?>>							
							<td>
							<?php
								if($image){
							?>
								<span style="float: left; margin-right:10px;"><img style="max-width:140px; height:auto;" src="<?php echo ADMIN_URL;?>/uploads/small/<?php echo $image;?>" /></span>
								<?php					
								}
							echo "<h5>".$title."</h5>";?>
							Posted by <b><?php echo $author_name;?></b> at <?php echo DateFormat($date_added);?><br />
							<small><?php echo $content_short;?>...</small>
							</td>
							
							<td><?php echo $categ_title;?></td>
							
							<td>
								<a href="account.php?page=pro-articles-edit&article_id=<?php echo $article_id;?>" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>								
								<a href="javascript:deleteRecord_<?php echo $article_id;?>('<?php echo $article_id;?>');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<script language="javascript" type="text/javascript">
								function deleteRecord_<?php echo $article_id;?>(RecordId)
								{
									if (confirm('Confirm delete')) {
										window.location.href = 'core/ArticleDelete.php?article_id=<?php echo $article_id;?>&pagenum=<?php echo $pagenum;?>';
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
					
					Page <strong><?php echo $pagenum;?></strong> of <strong><?php echo $last;?></strong>
					<div class="mb-2"></div>
					
					<ul class="pagination">
					<?php					
						if ($pagenum == 1)
						{
						}
						else
							{
							echo '<li class="page-item"> <a class="page-link" href="account.php?page=pro-articles&pagenum=1"><strong>First page</strong></a></li>';
							echo ' ';
							$previous = $pagenum-1;
							echo '<li class="page-item"> <a class="page-link" href="account.php?page=pro-articles&pagenum='.$previous.'">'.$previous.'</a></li>';
							}

							echo ' ';


						if ($pagenum == $last)
							{			
							}
						else {
							$next = $pagenum+1;
							echo '<li class="page-item"><a class="page-link" href="account.php?page=pro-articles&pagenum='.$next.'">'.$next.'</a></li>';
							echo ' ';
							echo '<li class="page-item"><a class="page-link" href="account.php?page=pro-articles&pagenum='.$last.'"><strong>Last page</strong></a></li>';
						} 
						?>	
					</ul>
		
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
