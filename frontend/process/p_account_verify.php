<?php
require_once '../config.php';


//grab the code 
//we need to check the code 
//we need to update the code with empty and set the user status to active

if(isset($_GET['code'])){
    
    $code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);
    
    if(checkUserByCode($code)){
      
        verifyUserAccount($code);
        setMsg('msg_notify', 'Your account has been activated, you can login your account.');
        redirect('login.php');
        exit();
        
    }else{
        
        setMsg('msg', 'Invalid activation code', 'warning');
       
    }

}else{
    setMsg('msg', 'Activation code not exists', 'warning');
    
}

 //common redirection
 redirect('register.php');
 exit();
