<?php
require_once 'includes/config.php';

 if(isUserLoggedIn()){
     
     if(isset($_COOKIE['user'])){
          setcookie('user', '', time() - (86400 * 30), '/');
     }
     
     if(isset($_SESSION['user'])){
         unset($_SESSION['user']);
     }
     setMsg('msg_notify', 'Your account has been successfully logged Out.');
     header('Location:login.php');
 }