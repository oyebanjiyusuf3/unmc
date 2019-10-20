<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover()
})
</script>

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Tooltips and Popovers</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Tooltips and Popovers</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Tooltips</h4>
					  <p>Documentation and examples for adding custom Bootstrap tooltips with CSS and JavaScript using CSS3 for animations and data-attributes for local title storage.: <a target="_blank" href="http://getbootstrap.com/docs/4.0/components/tooltips/">Bootstrap Tooltips</a></p>
					  
					  <h4 class="alert-heading">Popovers</h4>
					  <p>Documentation and examples for adding custom Bootstrap tooltips with CSS and JavaScript using CSS3 for animations and data-attributes for local title storage.: <a target="_blank" href="http://getbootstrap.com/docs/4.0/components/popovers/">Bootstrap Popovers</a></p>
			</div>

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-comment-o"></i> Tooltips</h3>
								Hover over the buttons below to see their tooltips.
							</div>
								
							<div class="card-body">
								
								<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
								  Tooltip on top
								</button>
								<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
								  Tooltip on right
								</button>
								<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
								  Tooltip on bottom
								</button>
								<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
								  Tooltip on left
								</button>
								<div class="mb-2"></div>
								<a href="#" role="button" class="btn btn-info" data-toggle="tooltip" data-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
								  Tooltip with HTML
								</a>
																
							</div>														
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-comment-o"></i> Popovers</h3>
								Four options are available: top, right, bottom, and left aligned.
							</div>
								
							<div class="card-body">
								
								<a role="button" href="#" class="btn btn-danger" data-toggle="popover" data-trigger="focus" data-placement="top" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</a>
								
							</div>							
						</div><!-- end card-->					
                    </div>

			</div>
