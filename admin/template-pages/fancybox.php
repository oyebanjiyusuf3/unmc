<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

			
			
			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Fancybox</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Fancybox</li>
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
								Click on image
							</div>
								
							<div class="card-body">
																
								<div class="row">

									<a data-fancybox="gallery" href="https://unsplash.it/1200/768.jpg?image=251" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
									</a>
									
									<a data-fancybox="gallery" href="https://unsplash.it/1200/768.jpg?image=270" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=270" class="img-fluid">
									</a>
									
									<a data-fancybox="gallery" href="https://unsplash.it/1200/768.jpg?image=253" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
									</a>
								
									<a data-fancybox="gallery" href="https://unsplash.it/1200/768.jpg?image=254" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
									</a>
									
									<a data-fancybox="gallery" href="https://unsplash.it/1200/768.jpg?image=255" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
									</a>
									
									<a data-fancybox="gallery" href="https://unsplash.it/1200/768.jpg?image=256" class="col-sm-2">
										<img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
									</a>
								</div>
								
							</div>														
						</div><!-- end card-->					
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Multimedia</h3>
								Supported sites can be used with fancyBox by just providing the page URL. You can mix images or videos content in each gallery.
							</div>
								
							<div class="card-body">
									
								<a data-fancybox class="btn btn-danger" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk&autoplay=1&rel=0&controls=0&showinfo=0" role="button" >YouTube video</a>									
								<a data-fancybox class="btn btn-danger" href="https://vimeo.com/191947042?color=f00" role="button" >Vimeo video</a>
								
								<a data-fancybox class="btn btn-danger" href="https://www.google.lv/maps/place/Googleplex/@37.4220041,-122.0833494,17z/data=!4m5!3m4!1s0x0:0x6c296c66619367e0!8m2!3d37.4219998!4d-122.0840572" role="button" >Google Map</a>
								
								<a data-fancybox class="btn btn-danger" data-caption="&lt;span title=&quot;Edited&quot;&gt;balloon rides at dawn ✨🎈&lt;br&gt;was such a magical experience floating over napa valley as the golden light hit the hills.&lt;br&gt;&lt;a href=&quot;https://www.instagram.com/jamesrelfdyer/&quot;&gt;@jamesrelfdyer&lt;/a&gt;&lt;/span&gt;" href="https://www.instagram.com/p/BNXYW8-goPI/?taken-by=jamesrelfdyer" role="button" >Instagram photo</a>

								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> HTML Content</h3>
								You can mix any HTML content in each gallery.
							</div>
								
							<div class="card-body">
																
										<a data-fancybox="modal" data-src="#modal" class="btn btn-danger" role="button" href="javascript:;">Inline (HTML) Content</a>
										<a data-fancybox="ajax" data-src="assets/plugins/fancybox/ajax.php" data-type="ajax" class="btn btn-danger" role="button" href="javascript:;">Ajax request</a>
										<a data-fancybox="iframe" data-src="assets/plugins/fancybox/iframe.html" data-type="iframe" class="btn btn-danger" role="button" href="javascript:;">Iframed page</a>									
							</div>														
						</div><!-- end card-->					
                    </div>
					
			</div>



			
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Documentation</h4>
					  <p>You can find examples and documentation about Fancybox 3 here: <a target="_blank" href="http://fancyapps.com/fancybox/3/">Fancybox 3</a></p>
			</div>
			
			<div id="modal" style="display: none; padding: 50px 5vw; max-width: 800px;text-align: center;">
                <h3>Login to Join The Community</h3>

                <p>
                    This is a sample login form, but you may put any HTML here. <br />
                    For example, a link to <a href="https://mozilla.github.io/pdf.js/web/viewer.html" data-fancybox data-type="pdf">PDF file</a> (rendering depends on the client environment).

                </p>

                <p>
                    <a data-fancybox-close class="btn btn-danger" role="button" href="#">Log in with twitter</a>

                    <a data-fancybox-close class="btn btn-info" role="button" href="#">Log in with facebook</a>
                </p>

                <p style="color: #aaa; font-size: 90%;">
                    Clicking these buttons would simply close the form.
                </p>

            </div>
