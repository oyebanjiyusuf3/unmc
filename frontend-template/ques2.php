<?php  
$title = "Join Us - UNMC";
include_once "f_head.php";
if (isset($_POST['submit'])) {
	if (isset($_POST['yes'])) {
		$msg = "<script>location.href = 'ques3.php';</script>";
	}elseif (isset($_POST['no'])) {
		$msg = "<script type='text/javascript'>
        swal({
        	title:\"Sorry!\",
        	text:\"This movement is for NIGERIANS who believe in the UNITY of NIGERIA!\", 
        	type:\"error\",
        	timer: 2000,
            showConfirmButton: false });
            setTimeout(function(){
                window.location.href = 'about.php';
        	}, 2000);
    	</script>";	
	} else {
		$msg = "<script type='text/javascript'>
            swal({title:\"Oops!\",text:\"You need to select a response!\", type:\"error\"});
        </script>";	
	} 
}

?>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						
					</div>
					<div class="card fat">
						<div class="card-body">
							<?php if(isset($msg)) {echo $msg;} ?>
							<h3 class="card-title text-center">Do you believe in the UNITY of Nigeria?</h3>
							<form action="" method="post">
								<center>
									<div class="form-group">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" name="yes">
											<label class="form-check-label">Yes</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" name="no">
											<label class="form-check-label">No</label>
										</div>
									</div>
									<input type="submit" name="submit" value="Submit Answer" class="btn btn-primary btn-block">
								</center>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once "f_footer.php"; ?>
