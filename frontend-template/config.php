<?php
/*==============================================
|| ############################################# 
|| Copyright SolveStation - www.solvestationng.com
|| ############################################# 
==============================================*/

define('SITE_URL', 'http://localhost/unmc/frontend-template'); // URL where front end template is inslatted. Without ending slash
define('UPLOADS_DIR', 'http://localhost/unmc/admin/uploads'); // URL for uploads folder. Without ending slash

// DATABASE CONNECT SETTINGS (REQUIRED)
define('DB_HOST', 'localhost'); // Database host ## Datenbank Server
define('DB_PORT', 3306); // Enter the database port for your mysql server
define('DB_USER', 'root'); // Database user ## Datenbank Benutzername
define('DB_PASS', ''); // Database password ## Datenbank Passwort
define('DB_NAME', 'main_base'); // Database name ## Datenbank Name

// OTHER SETTINGS (YOU DON'T NEED TO CHANGE THIS IF YOU ARE NOT SURE)
define('DB_PREFIX', ''); // Database prefix use (a-z) and (_), for example: cms_ 
define('DB_CHARSET', 'utf8'); // Mysql charset
define('DB_COLLATE', 'utf8_general_ci'); // Don't change if you are not sure
define('DEMO_MODE', 0); // This must be 0 for real websites;

if(!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__)); 


/*==============================================
// YOU DON'T NEED DO CHANGE ANYTHING BELOW
==============================================*/
// CONNECT TO DATABASE
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET.";port=".DB_PORT;
$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
		PDO::ATTR_PERSISTENT => true,
];
try {	
	$conn = new PDO($dsn, DB_USER, DB_PASS, $opt);
}
catch (PDOException $e) {
    print "Error! " . $e->getMessage() . "<br/>";
    die();
}

if (!extension_loaded('pdo') )
{
	exit('<strong>FATAL ERROR! This software requires PDO extension (PHP Data Objects).</strong> Please contact your hosting!<br /><br />Read more about <a href="http://php.net/manual/en/book.pdo.php" target="_blank">PHP PDO</a>');
}

// check for PHP version
if (version_compare(phpversion(), '5.5', '<')) {
	// php version isn't high enough
	$php_version = phpversion();		
	exit('Error! Your version of PHP ('.$php_version.') is very old. You need at least PHP 5.5.1 to be installed on your server!');
}

// get settings
$stmt = $conn->prepare("SELECT name, value FROM ".DB_PREFIX."settings");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { $name = $row['name']; $value = $row['value']; $$name = $value;};
$stmt->closeCursor();