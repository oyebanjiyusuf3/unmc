<link href="<?php echo ADMIN_URL;?>/assets/plugins/star-rating/star-rating.min.css" rel="stylesheet" /> 
<script src="<?php echo ADMIN_URL;?>/assets/plugins/star-rating/star-rating.min.js"></script>

<link href="<?php echo ADMIN_URL;?>/assets/plugins/star-rating/theme.css" rel="stylesheet" /> 
<script src="<?php echo ADMIN_URL;?>/assets/plugins/star-rating/theme.js"></script>


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Star Rating</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Star Rating</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-star"></i> Basic examples</h3>
								Most simple example, with any options or color information.
							</div>
								
							<div class="card-body">
																
								<input id="input-1-ltr-star-xs" name="input-1-ltr-star-xs" class="fa-theme rating-loading" value="1" dir="ltr" data-size="xs" data-step="0.5">
								<br/>
								<input id="input-2-ltr-star-sm" name="input-2-ltr-star-sm" class="fa-theme rating-loading" value="2" dir="ltr" data-size="sm" data-step="0.5">
								<br/>
								<input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="fa-theme rating-loading" value="3" dir="ltr" data-size="md" data-step="0.5">
								<br/>
								<input id="input-4-ltr-star-lg" name="input-4-ltr-star-lg" class="fa-theme rating-loading" value="4" dir="ltr" data-size="lg" data-step="0.5">
								<br/>
								<input id="input-5-ltr-star-xl" name="input-5-ltr-star-xl" class="fa-theme rating-loading" value="5" dir="ltr" data-size="xl" data-step="0.5">								
								
								<script>
								jQuery(function ($) {
									$('.fa-theme').rating({
										theme: 'krajee-fa'
									});
								});
								</script>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-star"></i> Custom captions</h3>
								Custom rating captions with clear button disabled
							</div>
								
							<div class="card-body">								
								
								<label for="input-2" class="control-label">Rate This</label>								
								<input id="input-2" name="input-2" class="fa-theme2 rating-loading" value="1" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="true"><br/>
								<input id="input-2" name="input-2" class="fa-theme2 rating-loading" value="2" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="true"><br/>
								<input id="input-2" name="input-2" class="fa-theme2 rating-loading" value="3" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="true"><br/>
								<input id="input-2" name="input-2" class="fa-theme2 rating-loading" value="4" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="true"><br/>
								<input id="input-2" name="input-2" class="fa-theme2 rating-loading" value="5" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="true">
								
								<script>
								jQuery(function ($) {
									$('.fa-theme2').rating({
										theme: 'krajee-fa',
										step: 1,
										starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
										starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
									});
								});
								</script>
																

							</div>														
						</div><!-- end card-->					
                    </div>

			</div>



			
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Documentation</h4>
					  <p>You can find examples and documentation about Bootstrap star rating here: <a target="_blank" href="http://plugins.krajee.com/star-rating">Bootstrap Star Rating</a></p>
			</div>
			