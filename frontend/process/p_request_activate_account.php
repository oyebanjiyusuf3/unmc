<?php
require_once '../config.php';
require_once '../libraries/PHPMailer-master/PHPMailerAutoload.php';

if(isset($_POST['request-activate-account'])){
    
    //Main errors array
    $errors = array();
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    //email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i'; 
    if(!preg_match($reg_email, $email)){
        $errors['email_err'] = 'Entered email is invalid';
    }elseif(!checkUserByEmail($email)){
         $errors['email_err'] = 'Email not found.';
    }
    
    if(!count($errors)){
        
        $code = md5(crypt(rand(), 'aa'));
        
        //Store them into database
        $stmt = $objDB->prepare(
            'UPDATE users SET reset_code=? WHERE email=?'
        );
        
        $stmt->bind_param('ss', $code, $email);
        
         if($stmt->execute()){
            setMsg('msg', 'Please, check your email to verify your account', 'warning');
            
           
            
            $message = "Hi! You requested account verification. You need to click here to <a href='".URLROOT."/process/p_account_verify.php?code=$code'>activate your account.</a>";
             
            send_mail([
                
                'to' => $email,
                'message' => $message,
                'subject' => 'Account Activation Request',
                'from' => 'UNMC',
                
            ]);
        }
        
        
    }else{
        
        $data = [
           
            'email' => $email,
           
        ];
        
        setMsg('form_data', $data);
        setMsg('errors', $errors); 
        
    }
      redirect('request-account-activate.php');
}
