<?php
debug_backtrace() || die ("Direct access not permitted"); 
?>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_slide" aria-hidden="true" id="modal_add_slide">
	<div class="modal-dialog">
    	<div class="modal-content">
        	
			<form action="core/SlideAdd.php" method="post" enctype="multipart/form-data">

							
            <div class="modal-header">
          	<h5 class="modal-title">Add new slider image</h5>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>          	
			</div>
				
			<div class="modal-body">                
				                
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Title</label>
					<input class="form-control" name="title" type="text" />
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="content" rows="4" /></textarea>
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>URL</label>
					<input class="form-control" name="url" type="text" />
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6">
					<div class="form-group">
					<label>Position</label>
					<input class="form-control" name="position" type="text" />
					</div>
					</div>
                
					<div class="col-lg-6">
					<div class="form-group">
					<label>Active</label>
					<select name="active" class="form-control">
					<option value="1">YES</option>
					<option value="0">NO</option>
					</select>
					</div>
					</div>
				
                </div>
                
                <div class="form-group">
				<label>Slide image (required):</label> <br />
                <input type="file" name="image" required>
                </div>
				
            </div>             
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Add slider image</button>
			</div>
				
			</form>	
			
        </div>
	</div>
</div>