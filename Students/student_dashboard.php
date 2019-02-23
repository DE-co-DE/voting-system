<?php 
include_once('../database/connection.php');
include_once('../common/header.php');
include_once('../common/functions.php');
  	$email=$_SESSION['user_id'];
  	  	$nominee=get_user_by_email($conn,$email);

 ?>
<div class="container">
<div class=" row position-relative mt-5">
	<div class=" col-md-8 offset-2 ">

	<div class="card shadow">
  <div class="card-header display-4 text-info text-center"><?php echo $nominee['post']?"Welcome ".$nominee['first_name']:"Dashboard" ?></div>
  
  <div class="card-body">
  		<?php if(empty($nominee['post'])){
?>
<div class="row">
	<div class="col-md-6">
		<div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-hand-o-up" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Voting</h4></div>
                <div class="text-info text-center mt-2"><h3><a href="../voting.php" class="text-info ">Section</a></h3></div>
            </div>
	</div>
	<div class="col-md-6">
		<div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-user-circle-o" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Nominee</h4></div>
                <div class="text-info text-center mt-2"><h3><a href="nominees_registration.php" class="text-info ">Registration</a></h3></div>
            </div>
	</div>
	<div class="w-100"></div>
<br>
</div>

	</div>
<?php } ?>
	<div class="row ">
		<div class="col-md-4 ">

	<?php if($nominee['post']){

  	$vote=total_vote($conn,$email,$nominee['post']);
			?>
 <img  src="<?php echo $nominee['profile_pic']?app_path.$nominee['profile_pic']:app_path.'uploaded/user.jpg' ?>" class="img-fluid w-100">
</div>
<div class="col-sm-8">
			<h4 class="d-inline">Post : <?php echo $nominee['post'];?> </h4><span class="text-danger"><?php echo $nominee['status'];?></span>
			<hr>
			<h5>Total Vote : <?php echo $nominee['status']=='pending'?"<span class='text-danger'>".$nominee['status']."</span>":$vote;?> </h5>
			
			<hr>
			 <h5 class="card-title pt-2">Full name : <?php echo $nominee['first_name'].' '.$nominee['last_name']; ?> </h5>
                      
                        <p class="card-text">Academic Year - <?php echo $nominee['year'] ?></p>
                        <p class="card-text">Department - <?php echo $nominee['department'] ?></p>
</div>
</div>
	</div>
	<?php if($nominee['status']=='declined'){?>
		<div class="alert alert-danger" role="alert">
 <strong>Sorry !</strong> Your request for nominee has benn rejected.<br>
 But you can still vote as student  <br>

 To vote click on the Vote button <a href="<?php echo app_path.'voting.php'; ?>" class="btn btn-info btn-sm">Vote</a> 
</div>
<?php }  }?>
	</div>
	</div>
	</div>


<?php include_once('../common/footer.php'); ?>