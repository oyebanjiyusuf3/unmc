<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
$(document).ready(function(){
    
	$('#example1').click(function(){
       swal("Hello world!");
    });
	
	$('#example2').click(function(){
       swal("Here's the title!", "...and here's the text!");
    });
	
	$('#example3').click(function(){
       swal("Good job!", "You clicked the button!", "success");
    });
	
	$('#example4').click(function(){
       swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				swal("Poof! Your imaginary file has been deleted!", {
				  icon: "success",
				});
			  } else {
				swal("Your imaginary file is safe!");
			  }
			});
    });
	
	$('#example5').click(function(){
       swal("Write something here:", {
			  content: "input",
			})
			.then((value) => {
			  swal(`You typed: ${value}`);
			});
    });
	
	$('#example6').click(function(){
       swal({
				text: 'Search for a movie. e.g. "Titanic".',
				  content: "input",
				  button: {
					text: "Search!",
					closeModal: false,
				  },
				})
				.then(name => {
				  if (!name) throw null;
				 
				  return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
				})
				.then(results => {
				  return results.json();
				})
				.then(json => {
				  const movie = json.results[0];
				 
				  if (!movie) {
					return swal("No movie was found!");
				  }
				 
				  const name = movie.trackName;
				  const imageURL = movie.artworkUrl100;
				 
				  swal({
					title: "Top result:",
					text: name,
					icon: imageURL,
				  });
				})
				.catch(err => {
				  if (err) {
					swal("Oh noes!", "The AJAX request failed!", "error");
				  } else {
					swal.stopLoading();
					swal.close();
				  }
				});
    });
	
});
</script>


			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">SweetAlert</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">SweetAlert</li>
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
								<h3><i class="fa fa-hand-pointer-o"></i> Show simple alert</h3>								
							</div>
								
							<div class="card-body">
																
									<a class="btn btn-primary" href="#" role="button" id="example1">Show alert</a>
							</div>														
						</div><!-- end card-->					
                    </div>

					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Alert with title and description</h3>
							</div>
								
							<div class="card-body">
								
								<a class="btn btn-primary" href="#" role="button" id="example2">Show alert</a>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Alert with title, description and icon</h3>
							</div>
								
							<div class="card-body">
								
								<a class="btn btn-danger" href="#" role="button" id="example3">Show alert</a>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Example with multiple options</h3>
							</div>
								
							<div class="card-body">
								
								<a class="btn btn-danger" href="#" role="button" id="example4">Show alert</a>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Example with input</h3>
							</div>
								
							<div class="card-body">
								
								<a class="btn btn-info" href="#" role="button" id="example5">Show alert</a>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> Advanced example with AJAX</h3>
							</div>
								
							<div class="card-body">
								
								<a class="btn btn-info" href="#" role="button" id="example6">Show alert</a>
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
			</div>


			<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Documentation</h4>
				  <p>You can find examples and documentation about SweetAlert plugin here: <a target="_blank" href="https://sweetalert.js.org/">SweetAlert documentation</a></p>
			</div>
			
			