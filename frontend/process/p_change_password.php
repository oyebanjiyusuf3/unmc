<?php
require_once '../config.php';

if(isset($_POST['change_password'])){
    
    //Main errors array
    $errors = array();
    
    //get values & sanitize them
    $old_password = filter_input(INPUT_POST, 'old_password', FILTER_SANITIZE_STRING); 
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); 
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING); 
    
    $user = $_SESSION['user'];
   
      //old password 
     if(strlen($old_password)>20 || strlen($old_password)<5){
         $errors['old_password_err'] = 'Old Password min limit is 5 & max is 20 characters';
     }elseif(!password_verify($old_password, $user->password)){
         $errors['old_password_err'] = 'Old password incorrect please enter valid password';
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
     
        
        //Store them into database
        $stmt = $objDB->prepare(
            'UPDATE users SET password = ? WHERE id = ?'  
           
        );
        
        $stmt->bind_param('si', password_hash($password, PASSWORD_DEFAULT), $user->id);
      

        if($stmt->execute()){
            setMsg('msg_notify', 'Your account password has been updated successfully.');
            unset($_SESSION['user']);
            redirect('login.php');
            exit();
        }
        
        
        
    } else{
        
        $data = [
            'old_password' => $old_password,
            'password' => $password,
            'confirm_password' => $confirm_password,
        ];
        
        setMsg('form_data', $data);
       
        setMsg('errors', $errors); 
       
    } 
   
     redirect('change_password.php');
}