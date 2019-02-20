<?php 
include_once('../database/connection.php');
include_once('../common/header.php');
include_once('../common/functions.php');

  	$email=$_SESSION['user_id'];
  	$nominee=get_user_by_email($conn,$email);
  	//print_r($nominee); exit;
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
<form action="<?php echo app_path; ?>submit.php" method="post">

	<div class="row">
	<div class="col-sm-6 col-12">
  <div class="form-group">
    <label for="f_name">First Name</label>
    <input type="text" class="form-control" id="f_name" name="f_name"  value="<?php echo $nominee['first_name'] ?>">
  </div>
  </div>
  	<div class="col-sm-6 col-12">
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
	<option value="2015">2015</option>
	<option value="2016">2016</option>
	<option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
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
  <label for="year">Select Post </label>
<select class="form-control" name="post" <?php echo $nominee['post']?'disabled':''?> >
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


  <button type="submit" class="btn btn-primary mx-auto d-block col-md-4 shadow-sm" name="submit_nominee_register">Submit</button>

</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../common/footer.php'); ?>