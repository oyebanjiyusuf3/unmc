<link href="<?php echo ADMIN_URL;?>/assets/plugins/lightbox/ekko-lightbox.css" rel="stylesheet" /> 
<script src="<?php echo ADMIN_URL;?>/assets/plugins/lightbox/ekko-lightbox.min.js"></script>

<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
			
			
			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Lightbox</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Lightbox</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Image Gallery</h3>
								Click on image to show lightbox
							</div>
								
							<div class="card-body">
																
								<div class="row">
									<a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
									</a>
									<a href="https://unsplash.it/1200/768.jpg?image=270" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=270" class="img-fluid">
									</a>
									<a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
									</a>
								
									<a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
									</a>
									<a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
									</a>
									<a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
									</a>
								</div>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Video Gallery</h3>
								Use keyboard arrows (left / right) to switch videos
							</div>
								
							<div class="card-body">
																
								<a href="https://www.youtube.com/watch?v=k6mFF3VmVAs" data-toggle="lightbox" data-gallery="youtubevideos" class="col-sm-4">
									<img src="https://i1.ytimg.com/vi/yP11r5n5RNg/mqdefault.jpg" class="img-fluid">
								</a>
								<a href="https://youtu.be/iQ4D273C7Ac" data-toggle="lightbox" data-gallery="youtubevideos" class="col-sm-4">
									<img src="https://i1.ytimg.com/vi/iQ4D273C7Ac/mqdefault.jpg" class="img-fluid">
								</a>
								<a href="//www.youtube.com/embed/b0jqPvpn3sY" data-toggle="lightbox" data-gallery="youtubevideos" class="col-sm-4">
									<img src="https://i1.ytimg.com/vi/b0jqPvpn3sY/mqdefault.jpg" class="img-fluid">
								</a>
																
							</div>														
						</div><!-- end card-->					
                    </div>
					
			</div>



			
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Documentation</h4>
					  <p>You can find examples and documentation about Bootstrap Lightbox here: <a target="_blank" href="http://ashleydw.github.io/lightbox/">Bootstrap Lightbox</a></p>
			</div>
			