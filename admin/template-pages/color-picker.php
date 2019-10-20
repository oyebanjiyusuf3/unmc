<script src="<?php echo ADMIN_URL;?>/assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<link href="<?php echo ADMIN_URL;?>/assets/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" /> 


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Color Picker</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Date / Time Picker</li>
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
								<h3><i class="fa fa-calendar"></i> Simple color picker</h3>
								Most simple example, with any options or color information.
							</div>
								
							<div class="card-body">
																
								<input type='text' class="form-control" id="mycp" />								
								
								<script>
									$(function () {
									  $('#mycp').colorpicker();
									});
								</script>
		
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-calendar"></i> Automatic format detection</h3>
								Whenever the <i>format</i> option is false (default), the first parsed color format will be detected and used as default, but when the option equals null or empty string, the format is recalculated every time.
							</div>
								
							<div class="card-body">								
								
								<div id="cp5" class="input-group colorpicker-component" title="Using format option">
								  <input type="text" class="form-control input-lg" value="#305AA2"/>
								  <span class="input-group-addon"><i></i></span>
								</div>
								
								<script>
								  $(function () {
									$('#cp5').colorpicker({
									  format: null
									});
								  });
								</script>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					

			</div>




			<div class="row">
			
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-calendar"></i> Setting the initial color</h3>
								The initial color can be specified in 3 ways: input value, data-color attribute and programmatically with the color constructor option. The used initial color has this precedence order when present and not empty: color option, input value, input <i>data-color</i> attribute, colopicker element <i>data-color</i> attribute.
							</div>
								
							<div class="card-body">
								
								<div id="cp2" class="input-group colorpicker-component" title="Using input value">
								  <input type="text" class="form-control input-lg" value="#DD0F20"/>
								  <span class="input-group-addon"><i></i></span>
								</div>
								
								<div class="mb-3"></div>
								
								<div id="cp3a" class="input-group colorpicker-component" data-color="#F18A31" title="Using data-color attribute in the colorpicker element">
								  <input type="text" class="form-control input-lg"/>
								  <span class="input-group-addon"><i></i></span>
								</div>
								
								<div class="mb-3"></div>
								
								<div id="cp3b" class="input-group colorpicker-component" title="Using data-color attribute in the input">
								  <input type="text" class="form-control input-lg" data-color="#F8EB48"/>
								  <span class="input-group-addon"><i></i></span>
								</div>
								
								<div class="mb-3"></div>
								
								<div id="cp4" class="input-group colorpicker-component" title="Using color option">
								  <input type="text" class="form-control input-lg"/>
								  <span class="input-group-addon"><i></i></span>
								</div>

								<script>
								  $(function () {
									$('#cp2, #cp3a, #cp3b').colorpicker();
									$('#cp4').colorpicker({"color": "#16813D"});
								  });
								</script>

								
							</div>							
						</div><!-- end card-->					
                    </div>
					                    
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-calendar"></i> Force a format</h3>
								If defined, the format option forces an specific format, ignoring the original one.
							</div>
								
							<div class="card-body">
								
								<div id="cp5b" class="input-group colorpicker-component" title="Using format option">
								  <input type="text" class="form-control input-lg" value="#305AA2"/>
								  <span class="input-group-addon"><i></i></span>
								</div>
								<script>
								  $(function () {
									$('#cp5b').colorpicker({
									  format: "rgba"
									});
								  });
								</script>

							</div>							
						</div><!-- end card-->					
                    </div>

			</div>			
			
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Documentation</h4>
					  <p>You can find examples and documentation about Bootstrap color picker here: <a target="_blank" href="https://farbelous.github.io/bootstrap-colorpicker/index.html">Bootstrap color picker</a></p>
			</div>
			