<script src="<?php echo ADMIN_URL;?>/assets/plugins/parsleyjs/parsley.min.js"></script>

<script>
  $('#form').parsley();
</script>

<style>
.parsley-error {
    border-color: #ff5d48 !important;
}
.parsley-errors-list.filled {
    display: block;
}
.parsley-errors-list {
    display: none;
    margin: 0;
    padding: 0;
}
.parsley-errors-list > li {
    font-size: 12px;
    list-style: none;
    color: #ff5d48;
    margin-top: 5px;
}
</style>

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Form validation</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Form validation</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			

			<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Parsley JavaScript form validation library</h4>
				  <p>You can find examples and documentation about Parsley form validation library here: <a target="_blank" href="http://parsleyjs.org/">Parsley documentation</a></p>
			</div>

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Form validator</h3>
								A simple demo form that uses most of supported Parsley elements to show how to bind, configure and validate them properly.
							</div>
								
							<div class="card-body">
																
										<form action="#" data-parsley-validate novalidate>
                                                    <div class="form-group">
                                                        <label for="userName">User Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="nick" parsley-trigger="change" required
                                                               placeholder="Enter user name" class="form-control" id="userName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                                        <input type="email" name="email" parsley-trigger="change" required
                                                               placeholder="Enter email" class="form-control" id="emailAddress">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pass1">Password<span class="text-danger">*</span></label>
                                                        <input id="pass1" type="password" placeholder="Password" required
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                                        <input data-parsley-equalto="#pass1" type="password" required
                                                               placeholder="Password" class="form-control" id="passWord2">
                                                    </div>
													<div class="form-group">
                                                        <label>URL</label>
                                                        <div>
                                                            <input parsley-type="url" type="url" class="form-control"
                                                                   required placeholder="URL"/>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label>Number</label>
                                                        <div>
                                                            <input data-parsley-type="number" type="text"
                                                                   class="form-control" required
                                                                   placeholder="Enter only numbers"/>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group">
                                                        <label>Textarea</label>
                                                        <div>
                                                            <textarea required class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <input id="remember-1" type="checkbox">
                                                            <label for="remember-1"> Remember me </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary" type="submit">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>

                                        </form>
										
							</div>														
						</div><!-- end card-->					
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Multi steps form demo</h3>
								Sometimes, you'll need to split long and fastidious forms into multiple parts. See how you could leverage Parsley groups to easily validate such multi step forms, step by step.
							</div>
								
							<div class="card-body">
								
								<style>
								.form-section {
								  padding-left: 15px;
								  border-left: 2px solid #FF851B;
								  display: none;
								}
								.form-section.current {
								  display: inherit;
								}
								</style>

								<form class="demo-form" action="#">
									  <div class="form-section">
										<label for="firstname">First Name:</label>
										<input type="text" class="form-control" name="firstname" required="">

										<label for="lastname">Last Name:</label>
										<input type="text" class="form-control" name="lastname" required="">
									  </div>

									  <div class="form-section">
										<label for="email">Email:</label>
										<input type="email" class="form-control" name="email" required="">
									  </div>

									  <div class="form-section">
										<label for="color">Favorite color:</label>
										<input type="text" class="form-control" name="color" required="">
									  </div>
										
									  <br /><br />
										
									  <div class="form-navigation">
										<button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
										<button type="button" class="next btn btn-info pull-right">Next &gt;</button>
										<input type="submit" class="btn btn-primary pull-right">
										<span class="clearfix"></span>
									  </div>

									</form>
									
									<script >$(function () {
									  var $sections = $('.form-section');

									  function navigateTo(index) {
										// Mark the current section with the class 'current'
										$sections
										  .removeClass('current')
										  .eq(index)
											.addClass('current');
										// Show only the navigation buttons that make sense for the current section:
										$('.form-navigation .previous').toggle(index > 0);
										var atTheEnd = index >= $sections.length - 1;
										$('.form-navigation .next').toggle(!atTheEnd);
										$('.form-navigation [type=submit]').toggle(atTheEnd);
									  }

									  function curIndex() {
										// Return the current index by looking at which section has the class 'current'
										return $sections.index($sections.filter('.current'));
									  }

									  // Previous button is easy, just go back
									  $('.form-navigation .previous').click(function() {
										navigateTo(curIndex() - 1);
									  });

									  // Next button goes forward iff current block validates
									  $('.form-navigation .next').click(function() {
										$('.demo-form').parsley().whenValidate({
										  group: 'block-' + curIndex()
										}).done(function() {
										  navigateTo(curIndex() + 1);
										});
									  });

									  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
									  $sections.each(function(index, section) {
										$(section).find(':input').attr('data-parsley-group', 'block-' + index);
									  });
									  navigateTo(0); // Start at the beginning
									});
									//# sourceURL=pen.js
									</script>

								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
			</div>

