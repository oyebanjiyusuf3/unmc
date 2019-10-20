<!-- Javascript and CSS for this page -->
<link href="<?php echo ADMIN_URL;?>/assets/plugins/owlcarousel/owl.carousel.min.css" rel="stylesheet" />
<link href="<?php echo ADMIN_URL;?>/assets/plugins/owlcarousel/owl.theme.default.min.css" rel="stylesheet" />
<script src="<?php echo ADMIN_URL;?>/assets/plugins/owlcarousel/owl.carousel.min.js"></script>

<style>
.owl-carousel .item-video {
    height: 300px;
}
</style>

<script>
$(document).ready(function(){
	$('.owl-1').owlCarousel({
    loop:true,
    margin:10,
    loop:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
	});
	
	$('.owl-2').owlCarousel({
    items:4,
    lazyLoad:true,
    loop:true,
    margin:10
	});
	
	$('.owl-3').owlCarousel({
		items:1,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true,
        responsive:{
            480:{
                items:2
            },
            600:{
                items:4
            }
        }
	});
	
	var owl4 = $('.owl-4');	
	owl4.owlCarousel({
			items:4,
			loop:true,
			margin:10,
			autoplay:true,
			autoplayTimeout:1000,
			autoplayHoverPause:true
	});
	
});
</script>		

<style type="text/css">
.counter {
	font-size: 3.5rem;
}
</style>
  
			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Owl Carousel</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Owl Carousel</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->

            
			<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Documentation</h4>
				  <p>Owl Carousel 2 lets you create a beautiful responsive carousel slider. You can find examples and documentation about Owl Carousel 2 here: <a target="_blank" href="https://owlcarousel2.github.io/OwlCarousel2">Owl Carousel 2</a>.</p>
			</div>

			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Responsive Carousel</h3>								
							</div>
								
							<div class="card-body">
																
								<div class="owl-1 owl-carousel owl-theme">
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-1.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-2.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-3.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-4.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-5.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-6.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-7.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-8.jpg" alt="slide"></div>
								</div>
									 
							</div>														
						</div><!-- end card-->					
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Lazy Load</h3>								
							</div>
								
							<div class="card-body">
																
								<div class="owl-2 owl-carousel owl-theme">
									<img class="owl-lazy" data-src="assets/images/sample-image-1.jpg">
									<img class="owl-lazy" data-src="assets/images/sample-image-2.jpg">
									<img class="owl-lazy" data-src="assets/images/sample-image-3.jpg">
									<img class="owl-lazy" data-src="assets/images/sample-image-4.jpg">
									<img class="owl-lazy" data-src="assets/images/sample-image-5.jpg">
									<img class="owl-lazy" data-src="assets/images/sample-image-6.jpg">
									<img class="owl-lazy" data-src="assets/images/sample-image-7.jpg">
									<img class="owl-lazy" data-src="assets/images/sample-image-8.jpg">
								</div>
									 
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Video</h3>								
								To add video into carousel just add <i>"owl-video"</i> class.
							</div>
								
							<div class="card-body">
																
								<div class="owl-3 owl-carousel owl-theme">
									<div class="item-video" data-merge="3"><a class="owl-video" href="https://vimeo.com/23924346"></a></div>
									<div class="item-video" data-merge="1"><a class="owl-video" href="https://www.youtube.com/watch?v=JpxsRwnRwCQ"></a></div>
									<div class="item-video" data-merge="1"><a class="owl-video" href="https://www.youtube.com/watch?v=oy18DJwy5lI"></a></div>
									<div class="item-video" data-merge="2"><a class="owl-video" href="https://www.youtube.com/watch?v=H3jLkJrhHKQ"></a></div>
									<div class="item-video" data-merge="3"><a class="owl-video" href="https://www.youtube.com/watch?v=g3J4VxWIM6s"></a></div>
									<div class="item-video" data-merge="2"><a class="owl-video" href="https://www.youtube.com/watch?v=EF_kj2ojZaE"></a></div>
								</div>
									 
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-image"></i> Autoplay</h3>								
							</div>
								
							<div class="card-body">
																
								<div class="owl-4 owl-carousel owl-theme">
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-1.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-2.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-3.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-4.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-5.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-6.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-7.jpg" alt="slide"></div>
									<div class="item"><img class="d-block w-100" src="assets/images/sample-image-8.jpg" alt="slide"></div>
								</div> 
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
			</div>
