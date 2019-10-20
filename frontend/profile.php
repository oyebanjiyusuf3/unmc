<?php 
	$title = "My Profile";
	require_once 'includes/f_head.php'; 
?>

<div class="container">
	<?php echo(getMsg('msg_notify')); ?>

	<div class="col-md-6 mx-auto">

        <div class='card'>


            <div class="card-header color-set">
                Your Profile Data
            </div>
            <div class='card-body '>
             

                <div class="row">

                    <div class="col-md-8">
                        <div class='detail-text'>
                            <label for="name"><strong>Name:</strong></label>
                            <span class='text-data'> <?php echo($user->name); ?></span>
                        </div>

                        <div class='detail-text'>
                            <label for="name"><strong>Email:</strong></label>
                            <span class='text-data'> <?php echo($user->email); ?></span>
                        </div>
                        
                         <div class='detail-text'>
                            <label for="name"><strong>Username:</strong></label>
                            <span class='text-data'> <?php echo($user->username); ?></span>
                        </div>
                         <div class='detail-text'>
                            <label for="name"><strong>Website:</strong></label>
                            <span class='text-data'> <?php echo($user->website); ?></span>
                        </div>

                     

                        <hr/>
                      <div class='detail-text'>
                            <label for="name"><strong>Created at:</strong></label>
                            <span class='text-data'> <?php echo(cTime($user->created_at)); ?></span>
                        </div>

                    </div>
                    <div class="col-md-4 w-50">
                        <?php if(empty($user->image)): ?>
                        <img src="http://via.placeholder.com/150x150">
                        <?php else: ?>
                          <img src="<?= URLROOT.'/includes/images/'.$user->image ?>" class="img-responsive w-100">
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php echo(URLROOT); ?>/logout.php">Logout</a> |
                <a href="<?php echo(URLROOT); ?>">Home</a>
            </div>
            <div class='card-footer'>
                <a href='' data-toggle="modal" data-target="#myModal"><i class="fa fa-power-off"></i></a>
                <a href="<?php echo(URLROOT); ?>/edit_profile.php" class='pull-right'><i class='fa fa-pencil-square-o'></i></a>
            </div>

        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
              
              
                <div class="modal-body text-center pt-4 color-set">
                    <p>Do you really want to deactivate your account?</p>
                </div>
                <div class="modal-footer">
                    <form action="<?= URLROOT.'/process/p_deactivate_account.php' ?>" method='post'>
                          <input type="submit" value='Yes' class="btn btn-danger" name="deactivate">
                    </form>
                  
                    <button type="button" class="btn btn-success " data-dismiss="modal" style='cursor:pointer;'>No</button>
                </div>
            </div>

        </div>
    </div>

</div>

<?php require_once 'includes/f_footer.html'; ?>