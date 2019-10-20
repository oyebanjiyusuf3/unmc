<script src="<?php echo ADMIN_URL;?>/assets/plugins/select2/js/select2.min.js"></script>
<link href="<?php echo ADMIN_URL;?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>

<script>								
$(document).ready(function() {
    $('.select2').select2();
});
</script>

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Select2 and Tags</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Select2 and tags</li>
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
								<h3><i class="fa fa-hand-pointer-o"></i> Single select boxes</h3>
								Select2 was designed to be a replacement for the standard <i>select</i> box that is displayed by the browser. By default it supports all options and operations that are available in a standard select box, but with added flexibility.
							</div>
								
							<div class="card-body">
																
								<label for="example1">
								Select country: 
								</label>
								<select class="form-control select2" id="example1" name="state">    
									<option value="AR">Argentina</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="BD">Bangladesh</option>
									<option value="BE">Belgium</option>
									<option value="BR">Brazil</option>
									<option value="BG">Bulgaria</option>
									<option value="CA">Canada</option>
									<option value="CN">China</option>
									<option value="CO">Colombia</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CZ">Czech Republic</option>
									<option value="DK">Denmark</option>
									<option value="EG">Egypt</option>
									<option value="FI">Finland</option>
									<option value="FR">France</option>
									<option value="DE">Germany</option>
									<option value="GR">Greece</option>
									<option value="HK">Hong Kong</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IE">Ireland</option>
									<option value="IL">Israel</option>
									<option value="IT">Italy</option>
									<option value="JP">Japan</option>
									<option value="KW">Kuwait</option>
									<option value="MX">Mexico</option>
									<option value="NL">Netherlands</option>
									<option value="NZ">New Zealand</option>
									<option value="NO">Norway</option>
									<option value="PK">Pakistan</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="RO">Romania</option>
									<option value="RU">Russian Federation</option>
									<option value="ES">Spain</option>
									<option value="SE">Sweden</option>
									<option value="TR">Turkey</option>
									<option value="GB">United Kingdom</option>
									<option value="US">United States</option>
								</select>
								
							</div>														
						</div><!-- end card-->					
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Multi-select boxes / Tags</h3>
								Select2 also supports multi-value select boxes. The select below is declared with the <i>multiple</i> attribute. This can be useful when using multiple tags
							</div>
								
							<div class="card-body">
								
								<label for="example2">
								Select countries: 
								</label>								
								<select class="form-control select2" id="example2" name="state][]" multiple="multiple">    
									<option value="AR">Argentina</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="BD">Bangladesh</option>
									<option value="BE">Belgium</option>
									<option value="BR">Brazil</option>
									<option value="BG">Bulgaria</option>
									<option value="CA">Canada</option>
									<option value="CN">China</option>
									<option value="CO">Colombia</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CZ">Czech Republic</option>
									<option value="DK">Denmark</option>
									<option value="EG">Egypt</option>
									<option value="FI">Finland</option>
									<option value="FR">France</option>
									<option value="DE">Germany</option>
									<option value="GR">Greece</option>
									<option value="HK">Hong Kong</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IE">Ireland</option>
									<option value="IL">Israel</option>
									<option value="IT">Italy</option>
									<option value="JP">Japan</option>
									<option value="KW">Kuwait</option>
									<option value="MX">Mexico</option>
									<option value="NL">Netherlands</option>
									<option value="NZ">New Zealand</option>
									<option value="NO">Norway</option>
									<option value="PK">Pakistan</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="RO">Romania</option>
									<option value="RU">Russian Federation</option>
									<option value="ES">Spain</option>
									<option value="SE">Sweden</option>
									<option value="TR">Turkey</option>
									<option value="GB">United Kingdom</option>
									<option value="US">United States</option>
								</select>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Dynamic option creation</h3>
								In addition to a prepopulated menu of options, Select2 can dynamically create new options from text input by the user in the search box.
							</div>
								
							<div class="card-body">
								
								<label for="example3">
								Select countries: 
								</label>								
								<select class="form-control select2" id="example3" name="state[]" multiple="multiple">    
									<option value="AR">Argentina</option>
									<option value="AU" selected="selected">Australia</option>
									<option value="AT">Austria</option>
									<option value="BD">Bangladesh</option>
									<option value="BE">Belgium</option>
									<option value="BR">Brazil</option>
									<option value="BG">Bulgaria</option>
									<option value="CA">Canada</option>
									<option value="CN">China</option>
									<option value="CO">Colombia</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CZ">Czech Republic</option>
									<option value="DK">Denmark</option>
									<option value="EG">Egypt</option>
									<option value="FI">Finland</option>
									<option value="FR" selected="selected">France</option>
									<option value="DE">Germany</option>
									<option value="GR">Greece</option>
									<option value="HK">Hong Kong</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IE">Ireland</option>
									<option value="IL">Israel</option>
									<option value="IT" selected="selected">Italy</option>
									<option value="JP">Japan</option>
									<option value="KW">Kuwait</option>
									<option value="MX">Mexico</option>
									<option value="NL">Netherlands</option>
									<option value="NZ">New Zealand</option>
									<option value="NO">Norway</option>
									<option value="PK">Pakistan</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="RO" selected="selected">Romania</option>
									<option value="RU">Russian Federation</option>
									<option value="ES">Spain</option>
									<option value="SE">Sweden</option>
									<option value="TR">Turkey</option>
									<option value="GB">United Kingdom</option>
									<option value="US">United States</option>
								</select>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Option groups</h3>
								In addition to a prepopulated menu of options, Select2 can dynamically create new options from text input by the user in the search box.
							</div>
								
							<div class="card-body">
								
								<label for="example4">
								Select country: 
								</label>								
								<select class="form-control select2" id="example4">   
									<optgroup label="Europe">	
										<option value="AT">Austria</option>
										<option value="FR">France</option>
										<option value="DE">Germany</option>
										<option value="GR">Greece</option>
										<option value="RO">Romania</option>
										<option value="GB">United Kingdom</option>
									<optgroup>
									
									<optgroup label="Asia / Oceania">	
										<option value="BD">Bangladesh</option>
										<option value="CN">China</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="JP">Japan</option>
										<option value="NZ">New Zealand</option>
									<optgroup>
									
									<optgroup label="Africa">	
										<option value="EG">Egypt</option>
										<option value="SA">South Africa</option>
									<optgroup>
									
									<optgroup label="America">	
										<option value="AR">Argentina</option>
										<option value="BR">Brazil</option>
										<option value="CA">Canada</option>
										<option value="US">United States</option>
									<optgroup>
								</select>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
			</div>


			<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Documentation</h4>
				  <p>You can find examples and documentation about Select2 plugin here: <a target="_blank" href="https://select2.org/">Select2 documentation</a></p>
			</div>