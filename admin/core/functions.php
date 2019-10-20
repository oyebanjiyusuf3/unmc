<?php
//=========================================================================================
//GENERAL FUNCTIONS
//=========================================================================================

function MakeValidURL($url) 
	{
	if($url)
		{	
		if(substr($url, 0, 7)!="http://" and substr($url, 0, 8)!="https://") $url = "http://".$url;		
		return $url;
		}
	else
		return "";	
}


function random_code()
	{
	$cod1 = md5(uniqid(rand(), true));
	$cod2 = substr($cod1, 0, 8);
	return $cod2;
	}


function random_code_captcha()
	{
	$length = 6;	
	$i = 0;
	$rand_string = '';
	$possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
	while ($i < $length) 
		{ 
	    $rand_string .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
	    $i++;
		}
	return $rand_string	;
	}


function RewriteUrl ($string){
	$diacritics_table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c', 'ć'=>'c', 'Ć'=>'C',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'ą'=>'a', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ę'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'Ł'=>'L', 'ł'=>'l', 
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ě'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'Ó'=>'O', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r', 'č'=>'c', 'ť'=>'t', 'Č'=>'C', 'ö'=>'o', 'ş'=>'s', 'ı'=>'i', 'ń'=>'n', 
		'ğ'=>'g', 'ü'=>'u', 'ș'=>'s', 'ț'=>'t', 'ă'=>'a', 'Ă'=>'A', 'Ș'=>'S', 'Ț'=>'T', 'Ğ'=>'G', 'İ'=>'I', 
		'Ş'=>'s', 'İ'=>'I', 'İ'=>'I', 'İ'=>'I', 'İ'=>'I', 'İ'=>'I', 'İ'=>'I', 'İ'=>'I', 'İ'=>'I', 'İ'=>'I', 'Ż'=>'Z', 'ż'=>'z'
    );
	
	$string = str_replace("\'", "", $string);
	$string2 = strtr($string, $diacritics_table);
    $return = strtolower(trim(preg_replace("/[^0-9a-zA-Z]+/", "-", $string2),"-"));
	if($return=="") $return = random_code();
	return $return;
} 


function Secure ($string){
	$string = addslashes(htmlspecialchars($string, ENT_QUOTES));
	$string = strip_tags($string);
	return trim($string);
}


function RewriteFile ($string){
    return strtolower(trim(preg_replace("/[^0-9a-zA-Z.]+/", "-", $string),"-"));
}


function getActiveContentStatusID()
{
	global $conn;
	$sql = "SELECT id FROM ".DB_PREFIX."content_status WHERE status = 'active' LIMIT 1";
	$rs = $conn->query($sql);
	$row = $rs->fetch_assoc();
	$activeContentStatusID = $row['id'];
	return $activeContentStatusID;
}


function getPendingContentStatusID()
{
	global $conn;
	$sql = "SELECT id FROM ".DB_PREFIX."content_status WHERE status = 'pending' LIMIT 1";
	$rs = $conn->query($sql);
	$row = $rs->fetch_assoc();
	$pendingContentStatusID = $row['id'];
	return $pendingContentStatusID;
}


function getDraftContentStatusID()
{
	global $conn;
	$sql = "SELECT id FROM ".DB_PREFIX."content_status WHERE status = 'draft' LIMIT 1";
	$rs = $conn->query($sql);
	$row = $rs->fetch_assoc();
	$draftContentStatusID = $row['id'];
	return $draftContentStatusID;
}


	
function getAdminRoleId (){
	global $conn;	
	$stmt = $conn->prepare ("SELECT role_id FROM ".DB_PREFIX."users_roles WHERE role = 'admin' LIMIT 1");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$admin_role_id = $row['role_id'];
	return (int)$admin_role_id;
	$stmt->closeCursor();	
}

function getUserRoleId (){
	global $conn;
	$stmt = $conn->prepare ("SELECT role_id FROM ".DB_PREFIX."users_roles WHERE role = 'user' LIMIT 1");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$user_role_id = $row['role_id'];
	return (int)$user_role_id;
	$stmt->closeCursor();
}



function checkIfValueInList($value, $list) {
	$list_items = explode(',',$list);
	if (in_array($value, $list_items)) {
	  return 1;
	} else {
	  return 0;
	}
}



// *******************************************************************************
// DATE and TIME functions
// *******************************************************************************

function Now()
	{
	$now = date("Y-m-d H:i:s");
	return $now;
	}

function DateFormat_form($date)
	{
	$date = new DateTime($date);
	return $date->format('m/d/Y');
	}


function DateFormat($date)
	{
	$date_format = "M d Y";

	if($date=='0000-00-00')
		return "-";
	else
		{			
	    date_default_timezone_set('Europe/London');
		$datetime = date_create($date);
		return $datetime->format($date_format);		
		}
	}


function DateTimeFormat($date)
	{
	$date_format = "M d Y";
	if($date=='0000-00-00 00:00:00')
		return "-";
	else
		{		
	    date_default_timezone_set('Europe/London');
		$datetime = date_create($date);
		return $datetime->format($date_format.', H:i');		
		}
	}


function TimeFormat($date)
	{
    date_default_timezone_set('Europe/London');
	$datetime = date_create($date);
	return $datetime->format('H:i');		
	}
	

function xDaysAgo($days)
{
	return date("Y-m-d", strtotime("-$days day"));	
}


//=========================================================================================
//DATABASE FUNCTIONS
//=========================================================================================
function addSettings ($name, $value)
{
	global $conn;
	$stmt = $conn->prepare("SELECT id FROM ".DB_PREFIX."settings WHERE name = ? LIMIT 1");
	$stmt->execute([$name]);
	$exist = $stmt->fetchColumn();

	if($exist==0 and $value)
		{
			// insert
			$stmt = $conn->prepare("INSERT INTO ".DB_PREFIX."settings (id, name, value) VALUES (NULL, ?, ?)");
			$stmt->execute([$name, $value]);
		}
	else
		{
			// update	
			$stmt = $conn->prepare("UPDATE ".DB_PREFIX."settings SET value = ? WHERE name = ? LIMIT 1");
			$stmt->execute([$value, $name]);
		}
}



function addSettingsNotUnique ($name, $value)
{
	global $conn;
	// insert
	$stmt = $conn->prepare("INSERT INTO ".DB_PREFIX."settings (id, name, value) VALUES (NULL, ?, ?)");
	$stmt->execute([$name, $value]);
}

function addUsersExtraUnique ($user_id, $name, $value)
{
	global $conn;		
	$stmt = $conn->prepare("SELECT id FROM ".DB_PREFIX."users_extra WHERE name = ? AND user_id = ? LIMIT 1");
	$stmt->execute([$name, $user_id]);
	$exist = $stmt->fetchColumn();
	
	if($value!="")
	{
		if($exist==0)
			{
				$stmt = $conn->prepare("INSERT INTO ".DB_PREFIX."users_extra (id, user_id, name, value) VALUES (NULL, ?, ?, ?)");
				$stmt->execute([$user_id, $name, $value]);
			}
		else
			{
				$stmt = $conn->prepare("UPDATE ".DB_PREFIX."users_extra SET value = ? WHERE name = ? AND user_id = ? LIMIT 1");
				$stmt->execute([$value, $name, $user_id]);
			}
	}
}


function getUsersExtraUnique ($user_id, $name)
{
	global $conn;	
	$stmt = $conn->prepare("SELECT value FROM ".DB_PREFIX."users_extra WHERE name = ? AND user_id = ? LIMIT 1");
	$stmt->execute([$name, $user_id]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$value = stripslashes($row['value']);
	
	return $value;
}


function addTags ($content_id, $tags)
{
	global $conn;	
	// delete all content tags
	$sql = "DELETE FROM ".DB_PREFIX."tags WHERE content_id = '$content_id'";
	$rs = $conn->query($sql);
			
	// insert new tags		
	$tags = explode(",", $tags);
	for ($i = 0; $i < count($tags); ++$i)
	{
		$tag = trim($tags[$i]);
		$tag = addslashes($tag);
		$tag_permalink = RewriteUrl($tag);
	
		$query = "INSERT INTO ".DB_PREFIX."tags (id, content_id, tag, permalink) VALUES (NULL, '$content_id', '$tag', '$tag_permalink')"; 
		if($conn->query($query) === false) { trigger_error('Error: '.$conn->error, E_USER_ERROR); } 
		else { $last_inserted_id = $conn->insert_id; $affected_rows = $conn->affected_rows;	}
	} // end for
}




function getUserDetailsArray($user_id)
{
	global $conn;
	$UserDetailsArray = array();
	
	$stmt = $conn->prepare ("SELECT email, name, permalink, avatar, role_id, active, email_verified, last_activity FROM ".DB_PREFIX."users WHERE user_id = ? LIMIT 1");
	$stmt->execute([$user_id]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$email = $row['email'];
	$name = stripslashes($row['name']);
	$permalink = $row['permalink'];
	$avatar = $row['avatar'];
	$role_id = $row['role_id'];
	$active = $row['active'];
	$email_verified = $row['email_verified'];
	$last_activity = $row['last_activity'];
	
	if(!$avatar) $user_avatar = "no_avatar.png";
	
	$stmt = $conn->prepare ("SELECT role, title FROM ".DB_PREFIX."users_roles WHERE role_id = ? LIMIT 1");
	$stmt->execute([$role_id]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
   	$role = stripslashes($row['role']);
	$role_title = stripslashes($row['title']);
	
	$stmt = $conn->prepare ("SELECT value FROM ".DB_PREFIX."users_extra WHERE user_id = ? AND name = ? LIMIT 1");
	
	$stmt->execute([$user_id, 'bio']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
   	$bio = stripslashes($row['value']);
	
	$stmt->execute([$user_id, 'register_ip']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
   	$register_ip = stripslashes($row['value']);
	
	$stmt->execute([$user_id, 'register_time']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
   	$register_time = stripslashes($row['value']);
	
	$stmt->execute([$user_id, 'register_host']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
   	$register_host = stripslashes($row['value']);
	
	$UserDetailsArray = array("email" => $email, "name" => $name, "permalink" => $permalink, "avatar" => $avatar, "role_id" => $role_id, "active" => $active, "email_verified" => $email_verified, "last_activity" => $last_activity, "role" => $role, "role_title" => $role_title, "bio" => $bio, "register_ip" => $register_ip, "register_time" => $register_time, "register_host" => $register_host);
		
	$stmt->closeCursor();		
	return $UserDetailsArray;		
}


function getCategDetailsArray($categ_id)
{
	global $conn;
	$CategDetailsArray = array();

	$sql_db = "SELECT title, permalink FROM ".DB_PREFIX."categories WHERE id = '$categ_id' LIMIT 1";
	$rs_db = $conn->query($sql_db);
	if($conn->query($sql_db) === false) {trigger_error('Error: '.$conn->error, E_USER_ERROR);} 
	$row = $rs_db->fetch_assoc();
	
	$categ_title = stripslashes($row['title']);
	$categ_permalink = stripslashes($row['permalink']);
						
	$CategDetailsArray = array("title" => $categ_title, "permalink" => $categ_permalink);
		
	return $CategDetailsArray;		
}




//**************************************************************************************************
// TIME DIFFERENCE IN HOURS AND MINUTES
function timeFromLastOrder($time)
{
	$now = date("Y-m-d H:i:s");
	$datetime1 = new DateTime($time);
	$datetime2 = new DateTime($now);
	$interval = $datetime1->diff($datetime2);
	return $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
} 