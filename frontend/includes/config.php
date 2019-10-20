<?php
session_start();

//Database Credentials 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'unmc');


//URL
define('URLROOT', 'http://localhost/mockup');


//APP URL
define('APPROOT', dirname(__FILE__));


require_once 'functions.php';


//make database connection
$objDB = objDB();



$restricted_pages = [
    
    '/mockup/profile.php',
    '/mockup/change_password.php',
    '/mockup/edit_profile.php',
    '/mockup/logout.php',
     
];



$public_pages = [
    '/mockup/login.php',
    '/mockup/ques.php',
    '/mockup/ques2.php',
    '/mockup/ques3.php',
    '/mockup/ques4.php',
    '/mockup/ques5.php',
    '/mockup/register.php',
    '/mockup/forget.php',
];


 

if(!isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $restricted_pages, true)){
    setMsg('msg_notify', 'You need to login before accessing this page', 'warning');
    redirect('login.php');
    exit();
}


if(isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $public_pages, true)){
    setMsg('msg_notify', 'You need to logout before accessing this page', 'warning');
    redirect('profile.php');
    exit();
}



if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
    $user = isset($_COOKIE['user']) ? unserialize($_COOKIE['user']) : $_SESSION['user'];
}else{
    $user = '';
}

