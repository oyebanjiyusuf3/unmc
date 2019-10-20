<?php
require_once '../includes/config.php';
require_once '../libraries/PHPMailer-master/PHPMailerAutoload.php';

if(isset($_POST['register'])){
    
    //Main errors array
    $errors = array();
    
    //get values & sanitize them
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); 
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_URL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
    
    
    //name error
     if(strlen($name)>50 || strlen($name)<6){
         $errors['name_err'] = 'Name min limit is 6 & max is 50 characters';
     }
    
     //username
     if(strlen($username)>15 || strlen($username)<5){
         $errors['username_err'] = 'Username min limit is 5 & max is 15 characters';
     }elseif(checkUserByUsername($username)){
         $errors['username_err'] = 'Username already exists';
    }
    
    //email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i'; 
    if(!preg_match($reg_email, $email)){
        $errors['email_err'] = 'Email is invalid';
    }elseif(checkUserByEmail($email)){
         $errors['email_err'] = 'Email already exists';
    }
    
    
    //Website
    if(empty($website)){
        $errors['website_err'] = 'Invalid entry';
    }
    
    
    //password 
     if(strlen($password)>20 || strlen($password)<5){
         $errors['password_err'] = 'Password min limit is 5 & max is 20 characters';
     }
    
     //confirm password
     if($password!=$confirm_password || empty($confirm_password)){
         $errors['confirm_password_err'] = 'Password does not match or empty';
     }
    
    
     
    
    if(!count($errors)){
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        $code = md5(crypt(rand(), 'aa'));
        $time = time();
        
        //Store them into database
        $stmt = $objDB->prepare(
            'INSERT INTO users(name, email, username, password, website, created_at, reset_code) 
            VALUES(?, ?, ?, ?, ?, ?, ?)'
        );
        
        $stmt->bind_param('sssssis', $name, $email, $username, $password, $website, $time, $code);
      

        if($stmt->execute()){
            setMsg('msg', 'Your account has been created successfully.Please, check your email to verify.', 'warning');
            
           
            
            $message = "Hi! You requested an account on our website, in order to use this account. You need to click here to <a href='".URLROOT."/process/p_account_verify.php?code=$code'>Verify</a> it.";
            send_mail([
                
                'to' => $email,
                'message' => $message,
                'subject' => 'Account Verification',
                'from' => 'UNMC',
                
            ]);
        }
        
    } else{
        
        $data = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'website' => $website,
            'password' => $password,
            'confirm_password' => $confirm_password,
        ];
        
        setMsg('form_data', $data);
        setMsg('errors', $errors); 
    } 
   
     redirect('register.php');
}