<?php
require_once '../config.php';


//grab the code 
//we need to check the code 
//we need to update the code with empty and set the user status to active

if(isset($_GET['reset_code'])){
    
    $code = filter_input(INPUT_GET, 'reset_code', FILTER_SANITIZE_STRING);
    
    if(checkUserByCode($code)){
        $_SESSION['reset_code'] = $code;
        redirect('reset_password.php');
        exit();
        
    }else{
        
        setMsg('msg_notify', 'Invalid Reset Code.', 'warning');
       
    }

}else{
    setMsg('msg_notify', 'Reset password code empty.', 'warning');
    
}

 //common redirection
 redirect('login.php');
 exit();


