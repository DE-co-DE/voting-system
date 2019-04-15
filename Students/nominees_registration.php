<?php 
include_once('../database/connection.php');
include_once('../common/header.php');
include_once('../common/functions.php');

  	$email=$_SESSION['user_id'];
  	$nominee=get_user_by_email($conn,$email);
  	//print_r($nominee); exit;
    $get_votes=get_vote_dates($conn,'start_vote');
    //print_r($get_votes);
  //$day=1;
$not_started='';
  $day=date('d');
  //$month=3;
  $month=date('m');
   $start_month=$get_votes['s_month'];
   $start_day=$get_votes['s_day'];
   $end_month=$get_votes['e_month'];
   $end_day=$get_votes['e_day'];
 if($end_month!=0){
 if(intval($month)>intval($end_month)){
    echo $not_started= '<p class="alert alert-danger">You can not register now as voting has been closed.</p>';

  }elseif(intval($month) == intval($end_month))
{

if($day>$end_day)
{
echo $not_started= '<p class="alert alert-danger">You can not register now as voting has been closed.</p>';
}
}
}
  	 ?>
<div class="container">
<div class=" row position-relative mt-5">

	<div class=" col-md-3 ">
		<?php if($nominee['post']){
  	$vote=total_vote($conn,$email,$nominee['post']);
			?>

			<h3>Post : <?php echo $nominee['post'];?> </h3>
			<h5>Total Vote : <?php echo $vote;?> </h5>
			<?php }?>
	</div>
	<div class=" col-md-6 ">

	<div class="card shadow">
  <div class="card-header  font-weight-lighter text-info text-center" >
  	 <div style="font-size: 2em;"><span class="fa fa-user-circle-o"></span> Nominee Registeration  </div>	
  	<small>fill the below form to become the nominee</small>
</div>
  	<?php if(@$_GET['error']){
  		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> '.@$_GET['error'].'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  	}
     if(@$_GET['success']){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You have requested for nominees '.@$_GET['success'].' position!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>
  <div class="card-body">
<form action="<?php echo app_path; ?>submit.php" method="post" enctype="multipart/form-data">

	<div class="row">
      <div class="col-sm-4 col-12">
  <div class="form-group">
    <label >Profile Picture </label>
    <img  src="<?php echo $nominee['profile_pic']?app_path.$nominee['profile_pic']:app_path.'uploaded/user.jpg' ?>" class="img-fluid w-100">
    <input type="hidden" name="img" value="<?php echo $nominee['profile_pic']; ?>">
  </div>
  </div>
	<div class="col-sm-4 col-12">
  <div class="form-group">
    <label for="f_name">First Name</label>
    <input type="text" class="form-control" id="f_name" name="f_name"  value="<?php echo $nominee['first_name'] ?>">
  </div>
  </div>
  	<div class="col-sm-4 col-12">
  <div class="form-group">
    <label for="l_name">Last Name</label>
    <input type="text" class="form-control" id="l_name" name="l_name" value="<?php echo $nominee['last_name'] ?>">
  </div>
  </div>
</div>
<div class="row">
	<div class="col-sm-6 col-12">
  <div class="form-group">
    <label for="department">Department</label>
<select class="form-control" name="department" >
	<option value="<?php echo $nominee['department'] ?>"><?php echo $nominee['department'] ?></option>
	<option value="IT">IT</option>
	<option value="BA">BA</option>
	<option value="BE">BE</option>
</select>
  </div>
  </div>
  	<div class="col-sm-6 col-12">
  <div class="form-group">
    <label for="year">Select Academic Year</label>
<select class="form-control" name="year" >
		<option value="<?php echo $nominee['year'] ?>"><?php echo $nominee['year'] ?></option>
	<option value="1st year">1st year</option>
	<option value="2nd year">2nd year</option>
	<option value="3rd yaer">3rd yaer</option>
	<option value="4th year">4th year</option>
</select>
  </div>
  </div>
</div>
	<div class="row">
	<div class="col-12">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" readonly class="form-control" id="email" name="email" value="<?php echo $nominee['email'] ?>">
  </div>
  </div>
  </div>
    <div class="row">
  <div class="col-12">
  <div class="form-group">
    <label for="number">Mobile</label>
    <input type="number" class="form-control" id="number" name="number" value="<?php echo $nominee['mobile_no'] ?>">
  </div>
  </div>
  </div>
   <div class="row">
  <div class="col-12">
  <div class="form-group">
    <label for="number">Achievements</label>
    <input type="text" class="form-control" id="number" name="achievements" value="<?php echo $nominee['acheivements'] ?>">
  </div>
  </div>
  </div>
      <div class="row">
  <div class="col-12">
  <div class="form-group">
  <div class="custom-file">
  <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic">
  <label class="custom-file-label" for="profile_pic">Choose Profile Picture</label>
</div>
  
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-12">
  <div class="form-group">
  <label for="year">Select Post </label>
<select class="form-control" name="post" <?php echo $nominee['post']?'readonly':''?> >
	<option value="<?php echo $nominee['post'] ?>"><?php echo $nominee['post'] ?></option>
	<option value="chair person">chair person</option>
	<option value="president">president</option>
	<option value="secretary">secretary</option>
	<option value="TPO">TPO</option>
	<option value="cultural">cultural</option>
	<option value="treasurer">treasurer</option>
	<option value="publicity head">publicity head</option>
	<option value="sports">sports</option>
	
</select>
<small class="text-black-50 pl-3">you can not change the post later once you will submit this form</small>
  </div>
  </div>
  </div>

<?php if($not_started==''){ ?>
  <button type="submit" class="btn btn-primary mx-auto d-block col-md-4 shadow-sm" name="submit_nominee_register">Submit</button>
 <?php } ?>

</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../common/footer.php'); ?>