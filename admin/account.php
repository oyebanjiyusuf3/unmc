<?php
/*==============================================
|| ############################################# 
|| 					SolveStation 
|| ############################################# 
==============================================*/
session_start();
require("config.php");
require_once ABSPATH."/core/checklogin.php";
require_once ABSPATH."/core/functions.php";
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
if(!$page) $page = 'dashboard';
$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Area</title>
<meta name="description" content="">
<meta name="keywords" content="">
<?php include ("global-head.php");?>
</head>

<body class="adminbody">

<div id="main">

	<?php include ("navigation.php");?>
 
	<?php include ("sidebar.php");?>

    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

				<?php 
				// ADMIN pages
				switch ($page)
					{       

						case $page:
							include ("template-pages/".$page.".php");
							break;					
													
						default:
							include ("template-pages/dashboard.php");
							break;						
					}
				?>

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
	<?php include ("footer.php");?>

</div>
<!-- END main -->

<?php include ("global-footer.php");?>

</body>
</html>