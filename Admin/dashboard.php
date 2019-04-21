<?php include_once('../common/header.php'); 
 include_once('../database/connection.php'); 
include_once('../common/functions.php');
?>
<section id="tabs">
  <div class="container">
    <h6 class="section-title text-center display-4">Admin Dashboard</h6>
    <div class="row">
      <div class="col-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link  <?php echo @$_GET['announce_status']?'':'active'; ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Nominess</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Nominee Requests</a>
            <a class="nav-item nav-link  <?php echo @$_GET['announce_status']?' active':''; ?>"" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Anouncements</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show <?php echo @$_GET['announce_status']?'':'active'; ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          	<div class="container-fluid mt-5 w-100">
          		<div class="row">
          				<div class=" col-md-3  ">
          					<?php $get_details=get_voting_details($conn); ?>
          					
          					<h4 class="alert alert-secondary">START DATE</h4>
          					<p class="text-secondary"><?php echo $get_details['start_date']?$get_details['start_date']:'not updated'?></p>

          					<h4 class="alert alert-danger mt-3">END DATE</h4>
          					<p class="text-danger"><?php echo $get_details['end_date']?$get_details['end_date']:'not updated'?></p>
          					<h4 class="alert alert-info mt-3">RESULT DATE</h4>
          					<p class="text-info"><?php echo $get_details['result_date']?$get_details['result_date']:'not updated'?></p>
          					
          				</div>
          				<div class=" col-md-6  ">
          					<?php if(@$_GET['status']=='failed'){
					  		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>ERROR!</strong> Some error ocuured try again.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
					  	}
					     else if(@$_GET['status']=='success'){
					      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> Dates are set.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
					    }
					    ?>
          	<form action="../submit.php" method="post" >
          		<div class="form-group">
          	<label class="text-secondary">Select the Start date of vote</label>
          	<input type="text" name="voting_start" value="<?php echo @$get_details['start_date']?@$get_details['start_date']:''?>" class="form-control datepick">
          </div>
          <div class="form-group">
          	<label class="text-secondary">Select the End date of vote</label>
          	<input type="text" name="voting_end" value="<?php echo @$get_details['end_date']?@$get_details['end_date']:''?>" class="form-control datepick">
          </div>
          <div class="form-group">
          	<label class="text-secondary">Select the Result date of vote</label>
          	<input type="text" name="voting_result"value="<?php echo @$get_details['result_date']?@$get_details['result_date']:''?>" class="form-control datepick">
          </div>
          	<br>
            <button class="btn btn-info btn-block" type="submit" name="voting_date_submit">Submit the date of voting</button>
          	</form>
          </div>
          </div>
          </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<div class="container-fluid mt-5 w-100">
          		<div class="row">
          	   <?php $nominees_all= get_all_nominees($conn);

	       if(!empty($nominees_all)){
	       foreach($nominees_all as $nam){ ?>
	  			<div class=" col-sm-4 col-12  ">          	
	            <div class="card shadow-sm">
	  			<div class="card p-2 text-info"><?php
	  			echo '<a href="../nominee_profile.php?nominee='.$nam["email"].'&post=nominee" class="text-primary">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
	  			echo '<span>'.$nam["post"].'</span>';
	  			?>
	  			</div>
		          </div>
		          </div>
		      <?php }} ?>
		          </div>
		          </div>
		          </div>

          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="container-fluid mt-5 w-100">
          		<div class="row">
          	   <?php $nominees_request= get_all_nominee_request($conn);

	       if(!empty($nominees_request)){
	       foreach($nominees_request as $nam){ ?>
	  			<div class=" col-sm-4 col-12  ">          	
	            <div class="card shadow-sm">
	  			<div class="card p-2 text-info"><?php
	  			echo '<a href="../nominee_profile.php?nominee='.$nam["email"].'&post=request" class="text-primary">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
	  			echo '<span>'.$nam["post"].'</span>';
	  			?>
	  			</div>
		          </div>
		          </div>
		      <?php }} ?>
		          </div>
		          </div>
          </div>
          <div class="tab-pane fade  <?php echo @$_GET['announce_status']?'show active':''; ?>" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
           <div class="d-block mt-5">
            <div class="col-md-4 mx-auto">
            <?php	
  if(@$_GET['announce_status']){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> Some error occured try again!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }?>

            <a href="../submit.php?submit_announcement=true" class="btn btn-outline-dark btn-block p-3 ">Announce Result</a>
          </div>
        </div>
        </div>
      
      </div>
    </div>
  </div>
</section>
<!-- ./Tabs -->
<?php include_once('../common/footer.php'); ?>