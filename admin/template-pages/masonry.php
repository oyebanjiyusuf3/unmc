<script src="<?php echo ADMIN_URL;?>/assets/plugins/masonry/masonry.pkgd.min.js"></script>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/masonry/imagesloaded.pkgd.min.js"></script>

<style>
/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .grid-item ---- */
.grid-sizer,
.grid-item {
  width: 33.333%;
}

.grid-item {
  float: left;
}

.grid-item img {
  display: block;
  max-width: 100%;
}
</style>




			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Masonry</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Masonry</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			
			<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">What is Masonry?</h4>
				  <p>Masonry is a JavaScript grid layout library. It works by placing elements in optimal position based on available vertical space, sort of like a mason fitting stones in a wall. You’ve probably seen it in use all over the Internet. You can find examples and documentation about Masonry here: <a target="_blank" href="https://masonry.desandro.com/">Masonry documentation</a></p>
			</div>
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Example box</h3>								
							</div>
								
							<div class="card-body">
																
									 <div class="grid">
										  <div class="grid-sizer"></div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/contrail.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
										  </div>
										  <div class="grid-item">
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/flight-formation.jpg" />
										  </div>
								    </div>
							
									<script >
										// init Masonry
										var grid = document.querySelector('.grid');

										var msnry = new Masonry( grid, {
										  itemSelector: '.grid-item',
										  columnWidth: '.grid-sizer',
										  percentPosition: true
										});

										imagesLoaded( grid ).on( 'progress', function() {
										  // layout Masonry after each image loads
										  msnry.layout();
										});
									</script>
									
							</div>														
						</div><!-- end card-->					
                    </div>
					
			</div>
			