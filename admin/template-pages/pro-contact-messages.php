<?php
$numb_contact_messages = $conn->query("SELECT count(1) FROM ".DB_PREFIX."contact_messages")->fetchColumn();
?>

<div class="row">
	<div class="col-xl-12">
		<div class="breadcrumb-holder">
			<h1 class="main-title float-left">Contact Messages</h1>
            <ol class="breadcrumb float-right">
			<li class="breadcrumb-item">Home</li>
			<li class="breadcrumb-item active">Contact Messages</li>
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
if ($msg =='delete_ok') echo '<div class="alert alert-success" role="alert">Message deleted</div>';	
?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
				
		<div class="card mb-3">
		
			<div class="card-header">
			<h3><i class="fa fa-envelope-o"></i> All contact messages (<?php echo $numb_contact_messages;?> messages)</h3>								
			</div>
			<!-- end card-header -->	
						
			<div class="card-body">
								
								
				<?php
				if (!(isset($pagenum))) { $pagenum = 1; }
				if ($numb_contact_messages==0) { echo "No message"; }
				else
					{
						$page_rows = 20;
						$last = ceil($numb_contact_messages/$page_rows);

						if ($pagenum < 1)
						{
						$pagenum = 1;
						}
						elseif ($pagenum > $last)
						{
						$pagenum = $last;
						}

						$max = ' LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;		
						$stmt_messages = $conn->prepare ("SELECT message_id, name, email, subject, message, time, ip, is_read FROM ".DB_PREFIX."contact_messages ORDER BY message_id DESC $max");
						$stmt_messages->execute();		
						?>
		
					<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Message details</th>
                        <th width="350">Sender details</th>
						<th width="120">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					
					<?php
					while ($row = $stmt_messages->fetch(PDO::FETCH_ASSOC))
					{
						$message_id = $row['message_id'];
						$name = stripslashes($row['name']);
						$email = $row['email'];
						$subject = stripslashes($row['subject']);
						$message = strip_tags(html_entity_decode(stripslashes($row['message'])));
						$time = $row['time'];
						$ip = $row['ip'];
						$is_read = $row['is_read'];
						
						$message_short = substr(strip_tags($message), 0, 300);
						?>
						<tr>
							
							<td>
							<?php 
							if($is_read==0) 
								echo '<b><font color="red">[Unread]</font>: <a href="account.php?page=pro-contact-messages-details&message_id='.$message_id.'">'.$subject.'</a></b> at '.DateTimeFormat($time);
							else 
								echo '<a href="#"><b>'.$subject.'</b></a>';
							echo '<p>'.$message_short.'...</p>';	
							?>
							</td>
							
							<td>
							<?php echo $name;?><br />
							<?php echo $email;?><br />
							IP: <?php echo $ip;?>
							</td>
							
							<td>
								<a href="account.php?page=pro-contact-messages-details&message_id=<?php echo $message_id;?>" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-title="Read message"><i class="fa fa-search" aria-hidden="true"></i></a>
								<a href="javascript:deleteRecord_<?php echo $message_id;?>('<?php echo $message_id;?>');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<script language="javascript" type="text/javascript">
								function deleteRecord_<?php echo $message_id;?>(RecordId)
								{
									if (confirm('Confirm delete')) {
										window.location.href = 'core/ContactMessageDelete.php?message_id=<?php echo $message_id;?>&pagenum=<?php echo $pagenum;?>';
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
