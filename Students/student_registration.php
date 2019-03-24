<?php include_once('../common/header.php'); ?>
<div class="container">
<div class=" row position-relative mt-5">
	<div class=" col-md-6 offset-sm-2  offset-md-3">

	<div class="card shadow">
  <div class="card-header  font-weight-lighter text-info text-center" style="font-size: 2em;">
  	<span class="fa fa-user-circle-o"></span> Student Registeration</div>
  	<?php if(@$_GET['error']){
  		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> Password Does Not Matched.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  	}
     if(@$_GET['error_exists']){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> Student with  email id does not exists!.
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
    <input type="text" class="form-control" id="f_name" name="f_name">
  </div>
  </div>
  	<div class="col-sm-6 col-12">
  <div class="form-group">
    <label for="l_name">Last Name</label>
    <input type="text" class="form-control" id="l_name" name="l_name">
  </div>
  </div>
</div>
<div class="row">
	<div class="col-sm-6 col-12">
  <div class="form-group">
    <label for="department">Department</label>
<select class="form-control" name="department" >
	<option>IT</option>
	<option>BA</option>
	<option>BE</option>
</select>
  </div>
  </div>
  	<div class="col-sm-6 col-12">
  <div class="form-group">
    <label for="year">Select Academic Year</label>
<select class="form-control" name="year" >
	<option value="1st year">1st year</option>
  <option value="2nd year">2nd year</option>
  <option value="3rd yaer">3rd yaer</option>
  <option value="4th year">4th year</option>
  <option value="5th year">5th year</option>
</select>
  </div>
  </div>
</div>
	<div class="row">
	<div class="col-12">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  </div>
  </div>
    <div class="row">
  <div class="col-12">
  <div class="form-group">
    <label for="number">Mobile</label>
    <input type="number" class="form-control" id="number" name="number">
  </div>
  </div>
  </div>
  	<div class="row">
  	<div class=" col-12">
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" name="password" class="form-control" id="pwd">
  </div>
  </div>
</div>
 	<div class="row">
  	<div class="col-12">
  <div class="form-group">
    <label for="c_pwd">Confirm Password</label>
    <input type="password" name="c_password" class="form-control" id="c_pwd">
  </div>
  </div>
</div>


  <button type="submit" class="btn btn-primary mx-auto d-block col-md-4 shadow-sm" name="submit_student_register">Submit</button>
    <a href="student_login.php" class="text-center d-block mt-3 text-capitalize "><span class="text-dark">Back 2</span> Login</a>

</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../common/footer.php'); ?>