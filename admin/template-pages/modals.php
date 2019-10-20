<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/esm/popper.js"></script>


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Modals</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Modals</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Documentation</h4>
					  <p>Use Bootstrap's JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content. You can find examples and documentation about Bootstrap Modals here: <a target="_blank" href="http://getbootstrap.com/docs/4.0/components/modal/">Bootstrap Modals</a></p>
			</div>

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-clone"></i> Default modals</h3>
								Toggle a working modal demo by clicking the button below. It will slide down and fade in from the top of the page.
							</div>
								
							<div class="card-body">
								
								<!-- Button trigger modal -->
								<a role="button" href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Launch default modal
								</a>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent molestie suscipit ultricies. Nunc non pulvinar tellus. Nunc varius non ante lobortis venenatis. Aenean enim urna, fermentum eget lectus quis, egestas rutrum dolor. Praesent rutrum eget augue eget maximus. Vivamus vel orci vulputate quam tristique ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam tincidunt bibendum suscipit. </p><p>Nunc molestie felis vitae sem malesuada pulvinar. In condimentum, eros id pellentesque eleifend, sem nibh eleifend neque, ac ultrices nisl nisl vel felis. Phasellus et pellentesque enim, quis tincidunt dui. Suspendisse nisi libero, mollis efficitur commodo in, tempor ut odio. Donec consequat nunc lorem, sit amet pellentesque erat volutpat et.</p>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>
								

								<!-- Large modal -->
								<a role="button" href="#" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</a>

								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title">Large title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
										</div>
										<div class="modal-body">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent molestie suscipit ultricies. Nunc non pulvinar tellus. Nunc varius non ante lobortis venenatis. Aenean enim urna, fermentum eget lectus quis, egestas rutrum dolor. Praesent rutrum eget augue eget maximus. Vivamus vel orci vulputate quam tristique ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam tincidunt bibendum suscipit.
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-primary">Save changes</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									  </div>
									</div>
								  </div>
								</div>

								
								<!-- Small modal -->
								<a role="button" href="#"  class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</a>

								<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
										<h5 class="modal-title">Small title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
										</div>
										<div class="modal-body">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent molestie suscipit ultricies. Nunc non pulvinar tellus. Nunc varius non ante lobortis venenatis. Aenean enim urna, fermentum eget lectus quis, egestas rutrum dolor. Praesent rutrum eget augue eget maximus. Vivamus vel orci vulputate quam tristique ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam tincidunt bibendum suscipit.
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-primary">Save changes</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									  </div>
									</div>
								  </div>
								</div>

								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-clone"></i> Custom modal</h3>
								Custom style for modal dialog.
							</div>
								
							<div class="card-body">
								
								<a href="#custom-modal" class="btn btn-primary m-r-5 m-b-10" data-target="#customModal" data-toggle="modal">Open custom modal</a>
								
								<!-- Modal -->
								<div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent molestie suscipit ultricies. Nunc non pulvinar tellus. Nunc varius non ante lobortis venenatis. Aenean enim urna, fermentum eget lectus quis, egestas rutrum dolor. Praesent rutrum eget augue eget maximus. Vivamus vel orci vulputate quam tristique ultrices. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam tincidunt bibendum suscipit. </p><p>Nunc molestie felis vitae sem malesuada pulvinar. In condimentum, eros id pellentesque eleifend, sem nibh eleifend neque, ac ultrices nisl nisl vel felis. Phasellus et pellentesque enim, quis tincidunt dui. Suspendisse nisi libero, mollis efficitur commodo in, tempor ut odio. Donec consequat nunc lorem, sit amet pellentesque erat volutpat et.</p>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									  </div>
									</div>
								  </div>
								</div>
														
				
								
							</div>							
						</div><!-- end card-->					
                    </div>

			</div>
