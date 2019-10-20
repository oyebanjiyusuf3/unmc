<?php  
$title = "Join Us - UNMC";
include_once "includes/f_head.php";

if (isset($_POST['submit'])) {
	if (isset($_POST['yes'])) {
		$msg = "<script>location.href = 'register.php';</script>";
	}elseif (isset($_POST['no'])) {
		$msg = "<script type=\"text/javascript\">
            swal({
                title:\"Thank You!\", 
                text:\"We hope one day you will partner with us in making NIGERIA a truly great country.\", 
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
						<img src="img/logo.jpg">
					</div>
					<div class="card fat">
						<div class="card-body">
							<?php if(isset($msg)) {echo $msg;} ?>
							<h3 class="card-title text-center">Are you willing to be part of the change agent that will transform Nigeria and position her on the path of true greatness and unity?</h3>
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
	

<?php include_once "includes/f_footer.html"; ?>
