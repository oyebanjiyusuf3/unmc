<?php  
  require 'config.php';
  require 'core/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $cfg_site_meta_title; ?></title>
  <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $cfg_site_meta_description;?>">
  <meta name="keywords" content="<?php echo $cfg_site_meta_keywords;?>">  

  <?php require "global-head.php"; ?>
  
</head> 
<body id="body">
	<?php include "navigation.php";?>

	<div class="container">
		<main>
			<?php echo "<h1 style='padding:250px;' class='text-center'>To load article page soon</h1>"; ?>
		</main>
	</div>

	<?php include "footer.php"; ?>
