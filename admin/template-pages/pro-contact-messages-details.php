<?php
$message_id = filter_input(INPUT_GET, 'message_id', FILTER_SANITIZE_NUMBER_INT);

$query = "UPDATE ".DB_PREFIX."contact_messages SET is_read = 1 WHERE message_id = ? LIMIT 1"; 
$stmt = $conn->prepare($query);
$stmt->execute([$message_id]);

$stmt_messages = $conn->prepare ("SELECT name, email, subject, message, time, ip, is_read FROM ".DB_PREFIX."contact_messages WHERE message_id = ? LIMIT 1");
$stmt_messages->execute([$message_id]);		
$row = $stmt_messages->fetch(PDO::FETCH_ASSOC);
$name = stripslashes($row['name']);
$email = $row['email'];
$subject = stripslashes($row['subject']);
$message = strip_tags(html_entity_decode(stripslashes($row['message'])));
$time = $row['time'];
$ip = $row['ip'];
?>

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Contact Message Details</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Contact Message Details</li>
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
			if ($msg =='add_ok')
				echo '<div class="alert alert-success" role="alert">Message rely sent</div>';	
			if ($msg =='reply_delete_ok')
				echo '<div class="alert alert-info" role="alert">Reply message deleted</div>';	
			?>
			
<div class="row">
			
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
	
		<div class="card mb-3">
			
			<div class="card-header">
				<h3><i class="fa fa-user"></i> Message details</h3>								
			</div>
								
			<div class="card-body">
								
					<div class="row">	
						<div class="col-lg-9 col-xl-9">
								<h4><?php echo $subject;?></h4>
								<div class="lead"><?php echo nl2br($message);?></div>
								<hr />
								<b>Replies:</b>
								<div class="mb-3"></div>
								<?php 
								$stmt_responses = $conn->prepare ("SELECT id, message, time, sender_user_id FROM ".DB_PREFIX."contact_messages_rep WHERE message_id = ? ORDER BY id DESC");
								$stmt_responses->execute([$message_id]);	
								while ($row = $stmt_responses->fetch(PDO::FETCH_ASSOC))
									{
										$response_id = $row['id'];
										$message = strip_tags(stripslashes($row['message']));
										$response_time = $row['time'];
										$sender_user_id = $row['sender_user_id'];
										
										$ResponseUserDetailsArray = getUserDetailsArray($sender_user_id);
										$response_user_name = $ResponseUserDetailsArray['name'];
										$response_user_avatar = $ResponseUserDetailsArray['avatar'];
										?>
										
										<?php echo nl2br($message);?><br />						
										<small><b><?php echo $response_user_name;?></b> at: <?php echo DateTimeFormat($response_time);?> - <a href="core/ContactMessageReplyDelete.php?response_id=<?php echo $response_id;?>&message_id=<?php echo $message_id;?>">Delete response</a></small>
										<hr />
									<?php 
									}
								?>			
				
								<form action="core/ContactMessageReply.php" method="post">
								<div class="row">	
									<div class="col-lg-12">
									<div class="form-group">
									<label>Send Reply</label>
									<textarea class="form-control" name="reply" rows="10" required></textarea>
									</div>
									</div>
											
									<div class="col-lg-12">
									<input type="hidden" name="message_id" value="<?php echo $message_id;?>" />
									<button type="submit" class="btn btn-primary">Send reply</button>
									</div>
								</div>	
								</form>
						</div>
								
                								
						<div class="col-lg-3 col-xl-3 border-left">
									<b>Sender name</b>: <?php echo $name;?>
									<br />
									<b>Sender email</b>: <?php echo $email;?>									
									<br />
									<b>Sent at: </b>: <?php echo DateTimeFormat($time);?>
									<br />
									<b>Sender IP: </b>: <?php echo $ip;?>
						</div>
					</div>								
								
			</div>	
			<!-- end card-body -->								
				
		</div>
		<!-- end card -->					

	</div>
	<!-- end col -->	
										
</div>
<!-- end row -->	