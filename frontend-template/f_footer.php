	<script src="<?php echo SITE_URL;?>/assets/lib/jquery/jquery.min.js"></script>
	<script src="<?php echo SITE_URL;?>/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo SITE_URL;?>/assets/lib/js/my-login.js"></script>
	<script>
	    $(document).ready(function(){
	      $('.form-check-input').click(function() {
	        $('.form-check-input').not(this).prop('checked', false);
	      });
	  	});
  	</script>
</body>
</html>