<!--header-->
<?php require_once 'includes/f_head.php'; ?>

<!--navbar-->

<div class="container">

        <div class="row">

            <div class="col-md-6 mx-auto">
                <div class='card card-body  bg-light mt-5'>

                    <h2>Update Your account Details</h2>
                    <p>
                <?php 
                
                 
                
                    echo getMsg('msg'); 
                
                    //getting errors on form
                    $err = getMsg('errors');
                  

                    
                    
                ?>

                    </p>
                    <form action="<?php echo(URLROOT); ?>/process/p_edit_profile.php" method='POST' enctype="multipart/form-data">
                         <div class="form-group">
                        <label for='name'>Name: <sup>*</sup></label>
                        <input type='name' name="name" value="<?php echo($user->name); ?>" class="form-control form-control-lg <?php echo(isset($err['name_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo($err['name_err']); ?></span>
                    </div>

                    <div class="form-group">
                        <label for='username'>Username: <sup>*</sup></label>
                        <input type='text' name="username" value="<?php echo($user->username); ?>" class="form-control form-control-lg <?php echo(isset($err['username_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['username_err']); ?></span>
                    </div>


                    <div class="form-group">
                        <label for='email'>Email: <sup>*</sup></label>
                        <input type='email' name="email" value="<?php echo($user->email); ?>" class="form-control form-control-lg <?php echo(isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['email_err']); ?></span>
                    </div>

                    <div class="form-group">
                        <label for='url'>Your Website URL: <sup>*</sup></label>
                        <input type='text' name="website" value="<?php echo($user->website); ?>" class="form-control form-control-lg <?php echo(isset($err['website_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['website_err']); ?></span>
                    </div>
                    
                    <div class="form-group w-50" id="imageBox" >
                        <img src="<?= URLROOT.'/images/'.$user->image; ?>" alt="" class="img-responsive w-100">
                        <a href="#" class="" id="uploadNewImage">Click here to upload</a>
                    </div>   
                      
                    <div class="form-group" id='imageUpload'>
                        <label for='url'>Upload Image: <sup>*</sup></label>
                        <input type='file' name="image"  class="form-control form-control-lg <?php echo(isset($err['image_err'])) ? 'is-invalid' : ''; ?>">
                         <span class="invalid-feedback"><?php echo($err['image_err']); ?></span>
                    </div>
                        
                               
      
                        
                        <div class="row">

                            <div class='col'>

                                <input type='submit' name='edit' value='Update Now' class='btn color-set btn-block'>

                            </div>


                            <div class='col'>

                                <a href="<?php echo(URLROOT); ?>/change_password.php" class="btn btn-light btn-block">Wanna Change Password? </a>

                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>


    </div>



<!--footer-->
<?php require_once 'includes/f_footer.html'; ?>