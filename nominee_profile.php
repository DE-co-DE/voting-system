<?php 
include_once('common/header.php');
include_once('database/connection.php');
include_once('common/functions.php');
$get_votes=get_vote_dates($conn,'start_vote');
  //$day=1;
$not_started='';
  $day=date('d');
  //$month=3;
  $month=date('m');
   $start_month=$get_votes['s_month'];
   $start_day=$get_votes['s_day'];
  $end_month=$get_votes['e_month'];
   $end_day=$get_votes['e_day'];
  //echo intval($day);
 //echo intval($start_day);
    if($end_month!=0){

  if(intval($month)<intval($start_month)){
    echo $not_started= '<p class="alert alert-danger">Voting is not started yet</p>';

  }elseif(intval($month) == intval($start_month))
{

if($day<$start_day)
{
echo $not_started= '<p class="alert alert-danger">Voting is not started yet</p>';
}
}
 if(intval($month)>intval($end_month)){
    echo $not_started= '<p class="alert alert-danger">Voting has been closed.</p>';

  }elseif(intval($month) == intval($end_month))
{

if($day>$end_day)
{
echo $not_started= '<p class="alert alert-danger">Voting has been closed.</p>';
}
}
}
?>

	<div class="col-md-4 offset-md-4 mt-3 ">
            <?php if(@$_GET['vote_status']=='success'){
        echo '<div class="alert alert-success  fade show" role="alert">
  <strong>Thank you!</strong> Your vote is submitted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <br>
  <br>
    <a href="voting.php" class="btn btn-sm btn-outline-danger">Go to the vote page</a>
  <a href="Students/student_dashboard.php" class="btn btn-sm btn-outline-danger">Home</a>

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
    if(@$_GET['vote_status']=='failed_exists'){
      echo '<div class="alert alert-warning  fade show" role="alert">
  <strong>Warning!</strong> It Seems you have already voted for this department!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <a href="voting.php">Go to the vote page</a>
</div>';
    }
    if(@$_GET['n_status']=='success'){
      echo '<div class="alert alert-info  fade show" role="alert">
  <strong>Info!</strong> Request '.@$_GET['tab'].'.
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
                        <img class="img-fluid w-100" src="<?php echo $nominee['profile_pic']?app_path.$nominee['profile_pic']:app_path.'uploaded/user.jpg' ?>" alt="Card image cap" />
                        <div class="card-img-overlay">
					    <h4 class="card-text font-weight-lighter"><span class="fa fa-thumbs-up"></span> <span><?php echo $count_vote; ?></span> votes</h4>
					  </div>
                    </div>
                    <div class="card-body pt-5 position-relative">
                        <img src="<?php echo $nominee['profile_pic']?app_path.$nominee['profile_pic']:app_path.'uploaded/user.jpg' ?>" alt="profile-image" class="profile_nominee_circle rounded-circle"/>
                        <h5 class="card-title pt-2"><?php echo $nominee['first_name'].' '.$nominee['last_name']; ?> </h5>
                        <p class="card-text">Post - <?php echo $nominee['post'] ?></p>
                        <p class="card-text">Academic Year - <?php echo $nominee['year'] ?></p>
                        <p class="card-text">Department - <?php echo $nominee['department'] ?></p>
                        <p class="card-text">Achievements - <?php echo $nominee['acheivements'] ?></p>
                    <?php 
                    if(@!$_GET['vote_status'] ){
                        if(@$_GET['post']=='request') {?>  
                             <a class="btn  btn-outline-secondary " href="Admin/dashboard.php"><span class="fa fa-arrow-left"></span> BACK</a>
                        <a class="btn  btn-outline-success " href="submit.php?nominee=<?php echo $nominee['email']; ?>&nominee_request=accepted">ACCEPT<span class="fa fa-thumbs-o-up"></span></a>
                        <a class="btn  btn-outline-danger " href="submit.php?nominee=<?php echo $nominee['email']; ?>&nominee_request=declined" >DECLINE <span class="fa fa-thumbs-o-down"></span></a>
                    <?php } else{ if($not_started==''){ ?>   
                    <a class="btn  btn-outline-info w-100" href="submit.php?by=<?php echo $_SESSION['user_id'] ?>&to=<?php echo $_GET['nominee'] ?>&post=<?php echo $nominee['post'] ?>" >VOTE <span class="fa fa-thumbs-o-up"></span></a>  
                    <?php }
                  }
                    } ?>                 
                    </div>
                </div>
    		</div>

<?php include_once('common/footer.php');
