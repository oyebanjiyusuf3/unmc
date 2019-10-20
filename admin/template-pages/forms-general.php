			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Forms</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Forms</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Forms</h4>
					  <p>Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices. <a target="_blank" href="http://getbootstrap.com/docs/4.0/components/forms/">Bootstrap Forms Documentation</a></p>
			</div>

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Simple form</h3>
								Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g., <i>email</i> for email address or <i>number</i> for numerical information) to take advantage of newer input controls like email verification, number selection, and more.
							</div>
								
							<div class="card-body">
								
								<form>
								  <div class="form-group">
									<label for="exampleInputEmail1">Email address (required)</label>
									<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Your lucky number (required)</label>
									<input type="number" class="form-control" id="exampleInputNumber1" aria-describedby="numberlHelp" placeholder="Enter number" required>
									<small id="numberlHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								  </div>
								  <div class="form-group">
									<label for="exampleInputPassword1">Password (required)</label>
									<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
								  </div>
								  <div class="form-check">
									<label class="form-check-label">
									  <input type="checkbox" class="form-check-input">
									  Check me out
									</label>
								  </div>
								  <button type="submit" class="btn btn-primary">Submit</button>
								</form>
																
							</div>														
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Sizing and Readonly</h3>
								Set heights using classes like <i>.form-control-lg</i> and <i>.form-control-sm</i>. Add the <i>readonly</i> boolean attribute on an input to prevent modification of the input’s value.
							</div>
								
							<div class="card-body">
								
								<div class="form-group">
								<input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
								</div>
								
								<div class="form-group">
								<input class="form-control" type="text" placeholder="Default input">
								</div>
								
								<div class="form-group">
								<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
								</div>
								
								<div class="form-group">
								<select class="form-control form-control-lg">
								  <option>Large select</option>
								</select>
								</div>
								
								<div class="form-group">
								<select class="form-control">
								  <option>Default select</option>
								</select>
								</div>
								
								<div class="form-group">
								<select class="form-control form-control-sm">
								  <option>Small select</option>
								</select>
								</div>
								
								<div class="form-group">
								<input class="form-control" type="text" placeholder="Readonly input here…" readonly>
								</div>
								
							</div>							
						</div><!-- end card-->					
                    </div>

					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Form grid</h3>
								More complex forms can be built using our grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options.
							</div>
								
							<div class="card-body">
								
								<form autocomplete="off" action="#">
								  <div class="form-row">
									<div class="form-group col-md-6">
									  <label for="inputEmail4">Email</label>
									  <input type="email" class="form-control" id="inputEmail4" placeholder="Email" autocomplete="off">
									</div>
									<div class="form-group col-md-6">
									  <label for="inputPassword4">Password</label>
									  <input type="password" class="form-control" id="inputPassword4" placeholder="Password" autocomplete="off">
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputAddress">Address</label>
									<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
								  </div>
								  <div class="form-group">
									<label for="inputAddress2">Address 2</label>
									<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
								  </div>
								  <div class="form-row">
									<div class="form-group col-md-6">
									  <label for="inputCity">City</label>
									  <input type="text" class="form-control" id="inputCity">
									</div>
									<div class="form-group col-md-4">
									  <label for="inputState">State</label>
									  <select id="inputState" class="form-control">
										<option selected>Choose...</option>
										<option>...</option>
									  </select>
									</div>
									<div class="form-group col-md-2">
									  <label for="inputZip">Zip</label>
									  <input type="text" class="form-control" id="inputZip">
									</div>
								  </div>
								  <div class="form-group">
									<div class="form-check">
									  <label class="form-check-label">
										<input class="form-check-input" type="checkbox"> Check me out
									  </label>
									</div>
								  </div>
								  <button type="submit" class="btn btn-primary">Sign in</button>
								</form>
								
							</div>							
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Horizontal form</h3>
								Create horizontal forms with the grid by adding the <i>.row</i> class to form groups and using the <i>.col-*-*</i> classes to specify the width of your labels and controls.
							</div>
								
							<div class="card-body">
								
								<form autocomplete="off" action="#">
								  <div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-10">
									  <input type="email" class="form-control" id="inputEmail3" placeholder="Email" autocomplete="off">
									</div>
								  </div>
								  <div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" autocomplete="off">
									</div>
								  </div>
								  <fieldset class="form-group">
									<div class="row">
									  <legend class="col-form-legend col-sm-2">Radios</legend>
									  <div class="col-sm-10">
										<div class="form-check">
										  <label class="form-check-label">
											<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
											Option one is this and that&mdash;be sure to include why it's great
										  </label>
										</div>
										<div class="form-check">
										  <label class="form-check-label">
											<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
											Option two can be something else and selecting it will deselect option one
										  </label>
										</div>
										<div class="form-check disabled">
										  <label class="form-check-label">
											<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
											Option three is disabled
										  </label>
										</div>
									  </div>
									</div>
								  </fieldset>
								  <div class="form-group row">
									<div class="col-sm-2">Checkbox</div>
									<div class="col-sm-10">
									  <div class="form-check">
										<label class="form-check-label">
										  <input class="form-check-input" type="checkbox"> Check me out
										</label>
									  </div>
									</div>
								  </div>
								  <div class="form-group row">
									<div class="col-sm-10">
									  <button type="submit" class="btn btn-primary">Sign in</button>
									</div>
								  </div>
								</form>
								
							</div>							
						</div><!-- end card-->					
                    </div>
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Inline forms</h3>
								Use the <i>.form-inline</i> class to display a series of labels, form controls, and buttons on a single horizontal row. Form controls within inline forms vary slightly from their default states.
							</div>
								
							<div class="card-body">
								
								<form class="form-inline">								  
								  <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
								  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon">@</div>
									<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
								  </div>

								  <div class="form-check mb-2 mr-sm-2 mb-sm-0">
									<label class="form-check-label">
									  <input class="form-check-input" type="checkbox"> Remember me
									</label>
								  </div>

								  <button type="submit" class="btn btn-primary">Submit</button>
								</form>
								
							</div>							
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Help text</h3>
								Block-level help text in forms can be created using <i>.form-text</i> (previously known as <i>.help-block</i> in v3). Inline help text can be flexibly implemented using any inline HTML element and utility classes like <i>.text-muted</i>.
							</div>
								
							<div class="card-body">
								
								<label for="inputPassword5">Password</label>
								<input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
								<small id="passwordHelpBlock" class="form-text text-muted">
								  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
								</small>
								
								<br /><br />
								
								<form class="form-inline">
								  <div class="form-group">
									<label for="inputPassword6">Password</label>
									<input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
									<small id="passwordHelpInline" class="text-muted">
									  Must be 8-20 characters long.
									</small>
								  </div>
								</form>

								
							</div>							
						</div><!-- end card-->					
                    </div>
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Server side</h3>
								We recommend using client side validation, but in case you require server side, you can indicate invalid and valid form fields with <i>.is-invalid</i> and <i>.is-valid</i>. Note that <i>.invalid-feedback</i> is also supported with these classes.</i>.
							</div>
								
							<div class="card-body">
								
								<form>
								  <div class="row">
									<div class="col-md-6 mb-3">
									  <label for="validationServer01">First name</label>
									  <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
									</div>
									<div class="col-md-6 mb-3">
									  <label for="validationServer02">Last name</label>
									  <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
									</div>
								  </div>
								  <div class="row">
									<div class="col-md-6 mb-3">
									  <label for="validationServer03">City</label>
									  <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
									  <div class="invalid-feedback">
										Please provide a valid city.
									  </div>
									</div>
									<div class="col-md-3 mb-3">
									  <label for="validationServer04">State</label>
									  <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
									  <div class="invalid-feedback">
										Please provide a valid state.
									  </div>
									</div>
									<div class="col-md-3 mb-3">
									  <label for="validationServer05">Zip</label>
									  <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
									  <div class="invalid-feedback">
										Please provide a valid zip.
									  </div>
									</div>
								  </div>

								  <button class="btn btn-primary" type="submit">Submit form</button>
								</form>

								
							</div>							
						</div><!-- end card-->					
                    </div>
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-check-square-o"></i> Supported elements</h3>
								Our example forms show native textual <i>input</i> above, but form validation styles are available for our custom form controls, too.
							</div>
								
							<div class="card-body">
								
								<form class="was-validated">
								  <label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" required>
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Check this custom checkbox</span>
								  </label>

								  <div class="custom-controls-stacked d-block my-3">
									<label class="custom-control custom-radio">
									  <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" required>
									  <span class="custom-control-indicator"></span>
									  <span class="custom-control-description">Toggle this custom radio</span>
									</label>
									<label class="custom-control custom-radio">
									  <input id="radioStacked2" name="radio-stacked" type="radio" class="custom-control-input" required>
									  <span class="custom-control-indicator"></span>
									  <span class="custom-control-description">Or toggle this other custom radio</span>
									</label>
								  </div>

								  <select class="custom-select d-block my-3" required>
									<option value="">Open this select menu</option>
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								  </select>

								  <label class="custom-file">
									<input type="file" id="file" class="custom-file-input" required placeholder="Upload file">
									<span class="custom-file-control"></span>
								  </label>
								</form>
								
							</div>							
						</div><!-- end card-->					
                    </div>
			</div>
