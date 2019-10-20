<!-- Text editor-->
<script src="<?php echo ADMIN_URL;?>/assets/plugins/trumbowyg/trumbowyg.min.js"></script>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/trumbowyg/plugins/upload/trumbowyg.upload.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_URL;?>/assets/plugins/trumbowyg/ui/trumbowyg.min.css">

<script>
$(document).ready(function () {
    'use strict';
	// ------------------------------------------------------- //
    // Text editor (WYSIWYG)
    // ------------------------------------------------------ //
	$('.editor').trumbowyg();	
						
}); 
</script>

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">WYSIWYG text editor</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">WYSIWYG text editor</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->


			
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Trumbowyg - A lightweight WYSIWYG editor</h4>
					  <p>Light, translatable and customisable jQuery plugin. Beautiful design, generates semantic code, comes with a powerful API. <a target="_blank" href="https://alex-d.github.io/Trumbowyg/">Trumbowyg Documentation</a></p>
			</div>

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-file-o"></i> WYSIWYG editor example</h3>
								Editor and generated code are optimized for HTML5 support. Compatible with all recents browsers like IE9+, Chrome, Opera and Firefox.
							</div>
								
							<div class="card-body">
																
										<textarea rows="3" class="form-control editor" name="content"></textarea>
										
							</div>														
						</div><!-- end card-->					
                    </div>
					
			</div>
