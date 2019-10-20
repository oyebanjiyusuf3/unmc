<?php
debug_backtrace() || die ("Direct access not permitted"); 
?>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_edit_slide_<?php echo $slide_id;?>" aria-hidden="true" id="modal_edit_slide_<?php echo $slide_id;?>">
	<div class="modal-dialog">
    	<div class="modal-content">
        	
			<form action="core/SlideEdit.php" method="post" enctype="multipart/form-data">

							
            <div class="modal-header">
          	<h5 class="modal-title">Add new slider image</h5>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>          	
			</div>
				
			<div class="modal-body">                
				                
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Title</label>
					<input class="form-control" name="title" type="text" value="<?php echo $title;?>" />
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="content" rows="4" /><?php echo $content;?></textarea>
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>URL</label>
					<input class="form-control" name="url" type="text" value="<?php echo $url;?>" />
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6">
					<div class="form-group">
					<label>Position</label>
					<input class="form-control" name="position" type="text" value="<?php echo $position;?>" />
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
				<label>Change slide image (optional):</label> <br />
                <input type="file" name="image">
                </div>
				
            </div>             
			
			<div class="modal-footer">
				<input type="hidden" name="slide_id" value="<?php echo $slide_id;?>" />
				<button type="submit" class="btn btn-primary">Edit slider image</button>
			</div>
				
			</form>	
			
        </div>
	</div>
</div>