<?php 
include_once('common/header.php');
include_once('database/connection.php');
include_once('common/functions.php');
?>
	<div class="col-md-4 offset-md-4 mt-3 ">
            <?php if(@$_GET['vote_status']=='success'){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Thank you!</strong> Your vote is submitted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
     if(@$_GET['vote_status']=='error'){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Failed due to some error please try again!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if(@$_GET['n_status']=='success'){
      echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Info!</strong> '.@$_GET['tab'].' Done.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if(@$_GET['n_status']=='error'){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Failed due to some error please try again!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>          <?php 
                    $email=@$_GET['nominee'];
                    $nominee=get_user_by_email($conn,$email);
                    $count_vote=total_vote($conn,$email) ?>
    		    <div class="card profile-card-2 shadow">
                    <div class="card-img-block">
                        <img class="img-fluid w-100" src="https://randomuser.me/api/portraits/women/81.jpg" alt="Card image cap" />
                        <div class="card-img-overlay">
					    <h4 class="card-text font-weight-lighter"><span class="fa fa-thumbs-up"></span> <span><?php echo $count_vote; ?></span> votes</h4>
					  </div>
                    </div>
                    <div class="card-body pt-5 position-relative">
                        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image" class="profile_nominee_circle rounded-circle"/>
                        <h5 class="card-title pt-2"><?php echo $nominee['first_name'].' '.$nominee['last_name']; ?> </h5>
                        <p class="card-text">Post - <?php echo $nominee['post'] ?></p>
                        <p class="card-text">Academic Year - <?php echo $nominee['year'] ?></p>
                        <p class="card-text">Department - <?php echo $nominee['department'] ?></p>
                    <?php 
                    if(@!$_GET['vote_status']){
                        if(@$_GET['post']=='request') {?>  
                        <a class="btn  btn-outline-success " href="submit.php?nominee=<?php echo $nominee['email']; ?>&nominee_request=declined">ACCEPT<span class="fa fa-thumbs-o-up"></span></a>
                        <a class="btn  btn-outline-danger " href="submit.php?nominee=<?php echo $nominee['email']; ?>&nominee_request=accepted" >DECLINE <span class="fa fa-thumbs-o-down"></span></a>
                    <?php } else{ ?>   
                    <a class="btn  btn-outline-info w-100" href="submit.php?by=<?php echo $_SESSION['user_id'] ?>&to=<?php echo $_GET['nominee'] ?> " >VOTE <span class="fa fa-thumbs-o-up"></span></a>  
                    <?php }
                    } ?>                 
                    </div>
                </div>
    		</div>

<?php include_once('common/footer.php');
