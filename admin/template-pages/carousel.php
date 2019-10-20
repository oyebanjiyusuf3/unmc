
			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Carousel</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Carousel</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Documentation</h4>
					  <p>The carousel is a slideshow for cycling through a series of content, built with CSS 3D transforms and a bit of JavaScript. It works with a series of images, text, or custom markup. It also includes support for previous/next controls and indicators. You can find examples and documentation about Bootstrap Carousels here: <a target="_blank" href="http://getbootstrap.com/docs/4.0/components/carousel/">Bootstrap Carousels Documentation</a></p>
			</div>
			

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Carousel with controls</h3>
								Adding in the previous and next controls
							</div>
								
							<div class="card-body">
								
								<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
								  <div class="carousel-inner">
									<div class="carousel-item active">
									  <img class="d-block w-100" src="assets/images/sample-image-3.jpg" alt="First slide">
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="assets/images/sample-image-2.jpg" alt="Second slide">
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="assets/images/sample-image-1.jpg" alt="Third slide">
									</div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Carousel with indicators and captions</h3>
								Add captions to your slides easily with the <i>.carousel-caption</i> element within any <i>.carousel-item</i>. They can be easily hidden on smaller viewports, as shown below, with optional display utilities. We hide them initially with <i>.d-none</i> and bring them back on medium-sized devices with <i>.d-md-block</i>.
							</div>
								
							<div class="card-body">
								
								<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
								  <ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								  </ol>
								  <div class="carousel-inner">
									<div class="carousel-item active">
									  <img class="d-block w-100" src="assets/images/sample-image-3.jpg" alt="First slide">
									  <div class="carousel-caption d-none d-md-block">
										<h3>Item 1 title</h3>
										<p>Item 1 description.</p>
									  </div>
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="assets/images/sample-image-2.jpg" alt="Second slide">
									  <div class="carousel-caption d-none d-md-block">
										<h3>Item 2 title</h3>
										<p>Item 2 description.</p>
									  </div>
									</div>
									<div class="carousel-item">
									  <img class="d-block w-100" src="assets/images/sample-image-1.jpg" alt="Third slide">
									  <div class="carousel-caption d-none d-md-block">
										<h3>Item 3 title</h3>
										<p>Item 3 description.</p>
									  </div>
									</div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
								
							</div>							
						</div><!-- end card-->					
                    </div>

			</div>
	
			