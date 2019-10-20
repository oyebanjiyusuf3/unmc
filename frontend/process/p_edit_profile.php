<?php
require_once '../includes/config.php';

if(isset($_POST['edit'])){
    
    //Main errors array
    $errors = array();
    
    //get values & sanitize them
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); 
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_URL);
    $image = isset($_FILES['image']) ? $_FILES['image'] : '';
  
    $user = $_SESSION['user'];
    
    //name error
     if(strlen($name)>50 || strlen($name)<6){
         $errors['name_err'] = 'Name min limit is 6 & max is 50 characters';
     }
    
     //username
     if(strlen($username)>15 || strlen($username)<5){
         $errors['username_err'] = 'Username min limit is 5 & max is 15 characters';
     }
    
    //email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i'; 
    if(!preg_match($reg_email, $email)){
        $errors['email_err'] = 'Email is invalid';
    }
    
    
    
    //Website
    if(empty($website)){
        $errors['website_err'] = 'Invalid entry';
    }
    
    
    if($image['error']!=4){
        
        //upload file
    
    //create image directory if doesn't exists    
      if(!is_dir(APPROOT.'/images')){
           mkdir(APPROOT.'/images');
      }

      if($image['error']==4){
         $errors['image_err']='Please, upload file';
      }elseif($image['type']!='image/png' && $image['type']!='image/jpeg'){
          $errors['image_err']='Only, png/jpeg image is allowed';
      }
    
      $image_info = pathinfo($image['name']);
      extract($image_info);
      $image_convention = $filename . time() . ".$extension";

      move_uploaded_file($image['tmp_name'], APPROOT . "/images/" .  $image_convention);
        
    }else{
        $image_convention = $user->image;
    }

    
    if(!count($errors)){
     
        
        //Store them into database
        $stmt = $objDB->prepare(
            'UPDATE users SET name = ?, email = ?, username=?, website=?, image=? WHERE id=?'  
           
        );
        
        $stmt->bind_param('sssssi', $name, $email, $username, $website, $image_convention, $user->id);
      

        if($stmt->execute()){
            setMsg('msg_notify', 'Your account has been updated successfully.');
        }
        
        $_SESSION['user'] = getUserById($user->id);
        redirect('profile.php');
        
    } else{
        
        
        setMsg('errors', $errors); 
        redirect('edit_profile.php');
       
    } 
   
     
}