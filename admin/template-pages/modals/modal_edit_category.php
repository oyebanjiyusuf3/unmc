<?php
debug_backtrace() || die ("Direct access not permitted"); 
?>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_edit_category" aria-hidden="true" id="modal_edit_category_<?php echo $categ_id;?>">
	<div class="modal-dialog">
    	<div class="modal-content">
        	
			<form action="core/CategoryEdit.php" method="post">

							
            <div class="modal-header">
          	<h5 class="modal-title">Edit category</h5>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>          	
			</div>
				
			<div class="modal-body">                
				                
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Category title (required)</label>
					<input class="form-control" name="title" type="text" value="<?php echo $title;?>" required />
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Description (optional)</label>
					<textarea class="form-control" name="description" rows="5" /><?php echo $description;?></textarea>
					</div>
					</div>  
				</div>
								
				<div class="row">					                
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
				
            </div>             
			
			<div class="modal-footer">
				<input type="hidden" name="categ_id" value="<?php echo $categ_id;?>" />
				<button type="submit" class="btn btn-primary">Edit category</button>
			</div>
				
			</form>	
			
        </div>
	</div>
</div>