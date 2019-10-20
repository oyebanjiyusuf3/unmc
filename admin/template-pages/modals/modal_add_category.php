<?php
debug_backtrace() || die ("Direct access not permitted"); 
?>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_category" aria-hidden="true" id="modal_add_category">
	<div class="modal-dialog">
    	<div class="modal-content">
        	
			<form action="core/CategoryAdd.php" method="post">

							
            <div class="modal-header">
          	<h5 class="modal-title" id="modal_add_category">Add new category</h5>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>          	
			</div>
				
			<div class="modal-body">                
				                
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Category title (required)</label>
					<input class="form-control" name="title" type="text" required />
					</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					<div class="form-group">
					<label>Description (optional)</label>
					<textarea class="form-control" name="description" rows="5" /></textarea>
					</div>
					</div>  
				</div>
								
				<div class="row">					                
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
				
            </div>             
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Add category</button>
			</div>
				
			</form>	
			
        </div>
	</div>
</div>