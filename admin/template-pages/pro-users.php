<?php
$numb_users = $conn->query("SELECT count(1) FROM ".DB_PREFIX."users")->fetchColumn();
?>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Users</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item active">Users</li>
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
		if ($msg =='error_name')
				echo '<div class="alert alert-danger" role="alert">Error! Input full name</div>';	
		if ($msg =='error_email')
				echo '<div class="alert alert-danger" role="alert">Error! Input valid email</div>';	
		if ($msg =='error_duplicate_email')
				echo '<div class="alert alert-danger" role="alert">Error! There is another user with this email address</div>';	
		if ($msg =='edit_ok')
				echo '<div class="alert alert-success" role="alert">User updated</div>';	
		if ($msg =='add_ok')
				echo '<div class="alert alert-success" role="alert">User added</div>';	
		if ($msg =='delete_ok')
				echo '<div class="alert alert-success" role="alert">User deleted</div>';	
		if ($msg =='error_delete_protected')
				echo '<div class="alert alert-danger" role="alert">Error! This user can not be deleted</div>';	
	?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
		
			<div class="card-header">
			<span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user"><i class="fa fa-user-plus" aria-hidden="true"></i> Add new user</button></span>
			<?php include ("modals/modal_add_user.php");?> 
			<h3><i class="fa fa-user"></i> All users (<?php echo $numb_users;?> users)</h3>								
			</div>
			<!-- end card-header -->	
						
			<div class="card-body">
								
								
				<?php
				if (!(isset($pagenum))) { $pagenum = 1; }
				if ($numb_users==0) { echo "No user"; }
				else
					{
						$page_rows = 10;
						$last = ceil($numb_users/$page_rows);

						if ($pagenum < 1)
						{
						$pagenum = 1;
						}
						elseif ($pagenum > $last)
						{
						$pagenum = $last;
						}

						$max = ' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;		
						$stmt_users = $conn->prepare ("SELECT user_id, email, name, avatar, role_id, active, email_verified FROM ".DB_PREFIX."users ORDER BY user_id DESC $max");
						$stmt_users->execute();		
						?>
		
					<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="50">ID</th>
                        <th>User details</th>
						<th width="130">Role</th>
                        <th width="150">Articles</th>
						<th width="120">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					while ($row = $stmt_users->fetch(PDO::FETCH_ASSOC))
					{
						$user_id = $row['user_id'];
						$email = $row['email'];						
						$role_id = $row['role_id'];
						$name = stripslashes($row['name']);
						$active = $row['active'];
						$email_verified = $row['email_verified'];
						$avatar = $row['avatar'];
						
						$skype = getUsersExtraUnique ($user_id, 'skype');
						
						$stmt = $conn->prepare ("SELECT role, title FROM ".DB_PREFIX."users_roles WHERE role_id = ? LIMIT 1");
						$stmt->execute([$role_id]);
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$role = stripslashes($row['role']);
						$role_title = stripslashes($row['title']);
						
						$numb_articles = $conn->query("SELECT count(1) FROM ".DB_PREFIX."articles WHERE user_id = '$user_id'")->fetchColumn();
						?>
						<tr <?php if($active==0) echo 'class="table-warning"';?>>
							<th>
							<?php echo $user_id;?>
							</th>
							
							<td>
							<?php
							if($avatar)
								{
								?>
								<span style="float: left; margin-right:10px;"><img style="max-width:40px; height:auto;" src="<?php echo ADMIN_URL;?>/uploads/avatars/<?php echo $avatar;?>" /></span>
								<?php					
								}
							echo "<strong>".$name."</strong>";?>
							<br />
							<small><?php echo $email;?></small>
							</td>
							
							<td><?php echo $role_title;?></td>
							
							
							<td><?php echo $numb_articles;?></td>
							
							<td>
								<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user_<?php echo $user_id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<?php include ("modals/modal_edit_user.php");?> 
								<a href="javascript:deleteRecord_<?php echo $user_id;?>('<?php echo $user_id;?>');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<script language="javascript" type="text/javascript">
								function deleteRecord_<?php echo $user_id;?>(RecordId)
								{
									if (confirm('Confirm delete')) {
										window.location.href = 'core/UserDelete.php?user_id=<?php echo $user_id;?>&pagenum=<?php echo $pagenum;?>';
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
							echo '<li class="page-item"> <a class="page-link" href="account.php?page=pro-users&pagenum=1"><strong>First page</strong></a></li>';
							echo ' ';
							$previous = $pagenum-1;
							echo '<li class="page-item"> <a class="page-link" href="account.php?page=pro-users&pagenum='.$previous.'">'.$previous.'</a></li>';
							}

							echo ' ';


						if ($pagenum == $last)
							{			
							}
						else {
							$next = $pagenum+1;
							echo '<li class="page-item"><a class="page-link" href="account.php?page=pro-users&pagenum='.$next.'">'.$next.'</a></li>';
							echo ' ';
							echo '<li class="page-item"><a class="page-link" href="account.php?page=pro-users&pagenum='.$last.'"><strong>Last page</strong></a></li>';
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
