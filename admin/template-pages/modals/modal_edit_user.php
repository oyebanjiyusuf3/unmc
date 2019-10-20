<?php
debug_backtrace() || die ("Direct access not permitted"); 
?>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modal_edit_user_<?php echo $user_id;?>">
	<div class="modal-dialog">
    	<div class="modal-content">
        	
			<form action="core/UserEdit.php" method="post" enctype="multipart/form-data">

							
            <div class="modal-header">
          	<h5 class="modal-title">Edit user</h5>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>          	
			</div>
				
			<div class="modal-body">                
				                
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Full name (required)</label>
					<input class="form-control" name="name" type="text" required value="<?php echo $name;?>" />
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6">
					<div class="form-group">
					<label>Valid Email (required)</label>
					<input class="form-control" name="email" type="email" required value="<?php echo $email;?>" />
					</div>
					</div>  
					
					<div class="col-lg-6">
					<div class="form-group">
					<label>Password (empty not to change)</label>
					<input class="form-control" name="password" type="text" />
					</div>
					</div>  
				</div>
				
				<div class="row">
				
					<div class="col-lg-6">
					<div class="form-group">
					<label>Role</label>
					<select name="role_id" class="form-control" required>
					<option value="">- select -</option>
					<optgroup label="Staff member">
					<?php
					$stmt_user_role = $conn->prepare("SELECT role_id, title FROM ".DB_PREFIX."users_roles WHERE active = 1 AND is_staff = 1 ORDER BY role_id ASC");
					$stmt_user_role->execute();		
					while ($row = $stmt_user_role->fetch(PDO::FETCH_ASSOC))
						{
						$role_id_selected = $row['role_id'];
						$role_title_selected = stripslashes($row['title']);
						?>
						<option <?php if($role_id==$role_id_selected) echo 'selected="selected"';?> value="<?php echo $role_id_selected;?>"><?php echo $role_title_selected;?></option>
						<?php
						}
					?>
					</optgroup>
					
					<optgroup label="Registered member">
					<?php
					$stmt_user_role = $conn->prepare("SELECT role_id, title FROM ".DB_PREFIX."users_roles WHERE active = 1 AND is_staff = 0 ORDER BY role_id ASC");
					$stmt_user_role->execute();		
					while ($row = $stmt_user_role->fetch(PDO::FETCH_ASSOC))
						{
						$role_id_selected = $row['role_id'];
						$role_title_selected = stripslashes($row['title']);
						?>
						<option <?php if($role_id==$role_id_selected) echo 'selected="selected"';?> value="<?php echo $role_id_selected;?>"><?php echo $role_title_selected;?></option>
						<?php
						}
					?>
					</optgroup>
					</select>
					</div>
					</div>					               
                
					<div class="col-lg-6">
					<div class="form-group">
					<label>Skype (optional)</label>
					<input class="form-control" name="skype" type="text" value="<?php echo $skype;?>" />
					</div>
					</div>  				
				</div>
				
				
				<div class="row">
					<div class="col-lg-6">
					<div class="form-group">
					<label>Email verified</label>
					<select name="email_verified" class="form-control">
					<option <?php if($email_verified==1) echo 'selected="selected"';?> value="1">YES</option>
					<option <?php if($email_verified==0) echo 'selected="selected"';?> value="0">NO</option>
					</select>
					</div>
					</div>
                
					<div class="col-lg-6">
					<div class="form-group">
					<label>Active</label>
					<select name="active" class="form-control">
					<option <?php if($active==1) echo 'selected="selected"';?> value="1">YES</option>
					<option <?php if($active==0) echo 'selected="selected"';?> value="0">NO</option>
					</select>
					</div>
					</div>
				
                </div>
                
                <div class="form-group">
				<label>Change avatar (optional):</label> <br />
                <input type="file" name="image">
                </div>
				
            </div>             
			
			<div class="modal-footer">
				<input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
				<button type="submit" class="btn btn-primary">Edit user</button>
			</div>
				
			</form>	
			
        </div>
	</div>
</div>