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

function DateFormat($date)
{
	$date_format = "M d, Y";

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
	$date_format = "M d, Y";
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

function TimeAgo ($oldTime, $newTime) {
    $timeCalc = strtotime($newTime) - strtotime($oldTime);
    if ($timeCalc >= (60*60*24*30*12*2)){
        $timeCalc = intval($timeCalc/60/60/24/30/12) . " years ago";
        }else if ($timeCalc >= (60*60*24*30*12)){
            $timeCalc = intval($timeCalc/60/60/24/30/12) . " year ago";
        }else if ($timeCalc >= (60*60*24*30*2)){
            $timeCalc = intval($timeCalc/60/60/24/30) . " months ago";
        }else if ($timeCalc >= (60*60*24*30)){
            $timeCalc = intval($timeCalc/60/60/24/30) . " month ago";
        }else if ($timeCalc >= (60*60*24*2)){
            $timeCalc = intval($timeCalc/60/60/24) . " days ago";
        }else if ($timeCalc >= (60*60*24)){
            $timeCalc = " Yesterday";
        }else if ($timeCalc >= (60*60*2)){
            $timeCalc = intval($timeCalc/60/60) . " hours ago";
        }else if ($timeCalc >= (60*60)){
            $timeCalc = intval($timeCalc/60/60) . " hour ago";
        }else if ($timeCalc >= 60*2){
            $timeCalc = intval($timeCalc/60) . " minutes ago";
        }else if ($timeCalc >= 60){
            $timeCalc = intval($timeCalc/60) . " minute ago";
        }else if ($timeCalc > 0){
            $timeCalc .= " seconds ago";
        }
    return $timeCalc;
}


// DATABASE FUNCTIONS
function getLatestArticles($categ_id, $limit) 
	// $categ_id - ID of the category or 'all' for all categories
	// $limit - get latest $limit articles. 
{	
	global $conn;
	$LatestArticlesArray = array();
	
	if($categ_id=='all') $categ_condition = "";
	else $categ_condition = "AND categ_id = '$categ_id'";
	
	if (!$limit or $limit == 0) $limit = 100;
	
	$stmt_articles = $conn->prepare ("SELECT article_id, user_id, title, content, slug, image, date_added, categ_id, meta_title, meta_description, tags FROM ".DB_PREFIX."articles WHERE status = 'active' $categ_condition ORDER BY article_id DESC LIMIT $limit");
	$stmt_articles->execute();		
	while ($row = $stmt_articles->fetch(PDO::FETCH_ASSOC))
			{
			$article_id = $row['article_id'];
			$author_user_id = $row['user_id'];
			$article_title = stripslashes($row['title']);
			$article_content = strip_tags(html_entity_decode(stripslashes($row['content'])));
			$article_slug = $row['slug'];						
			$article_image = $row['image'];
			$article_date_added = $row['date_added'];
			$article_categ_id = $row['categ_id'];
			$article_meta_title = stripslashes($row['meta_title']);
			$article_meta_description = stripslashes($row['meta_description']);
			$article_tags = stripslashes($row['tags']);
			
			$article_content_short = strip_tags($article_content);
			$article_content_short = substr($article_content_short, 0, 250);
			
			// category details
			$stmt_categ = $conn->prepare ("SELECT title, slug FROM ".DB_PREFIX."categories WHERE categ_id = ? LIMIT 1");
			$stmt_categ->execute([$article_categ_id]);
			$row = $stmt_categ->fetch(PDO::FETCH_ASSOC);
			$article_categ_title = stripslashes($row['title']);
			$article_categ_slug = $row['slug'];

			//author details
			$stmt_author = $conn->prepare ("SELECT name, avatar FROM ".DB_PREFIX."users WHERE user_id = ? LIMIT 1");
			$stmt_author->execute([$author_user_id]);
			$row = $stmt_author->fetch(PDO::FETCH_ASSOC);
			$author_name = stripslashes($row['name']);
			$author_avatar = $row['avatar'];
	
			$LatestArticlesArray[] = array("id" => $article_id, "user_id" => $author_user_id, "avatar" => $author_avatar, "author_name" => $author_name, "title" => $article_title, "slug" => $article_slug, "content_short" => $article_content_short, "image" => $article_image, "date_added" => $article_date_added, "categ_id" => $article_categ_id, "categ_title" => $article_categ_title, "categ_slug" => $article_categ_slug, "meta_title" => $article_meta_title, "meta_description" => $article_meta_description, "tags" => $article_tags);
			}
	$stmt_articles->closeCursor();		
	return $LatestArticlesArray;		
}


function getSliderItems() 
{	
	global $conn;
	$SliderItems = array();
	
	$stmt_slider= $conn->prepare ("SELECT id, title, content, url, image FROM ".DB_PREFIX."slider WHERE active = 1 ORDER BY position ASC");
	$stmt_slider->execute();		
	while ($row = $stmt_slider->fetch(PDO::FETCH_ASSOC))
			{
			$slide_id = $row['id'];
			$slide_title = stripslashes($row['title']);
			$slide_content = strip_tags(html_entity_decode(stripslashes($row['content'])));
			$slide_url = $row['url'];						
			$slide_image = $row['image'];						
			
			$SliderItems[] = array("id" => $slide_id, "title" => $slide_title, "content" => $slide_content, "url" => $slide_url, "image" => $slide_image);
			}
	$stmt_slider->closeCursor();		
	return $SliderItems;		
}

