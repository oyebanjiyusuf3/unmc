<?php 
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="404 Not Found">
    <meta name="author" content="<?php echo $cfg_site_meta_author;?>">

    <title>Content not found</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo SITE_URL;?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo SITE_URL;?>/assets/css/custom.css" rel="stylesheet">

  </head>

  <body>

    <?php require "navigation.php";?>

    <!-- Page Content -->
    <div class="container">

      <!-- Call to Action Well -->
      <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">Error! Content not found</p>
        </div>
      </div>
	  

    </div>
    <!-- /.container -->

	<?php require "footer.php";?>

  </body>

</html>
