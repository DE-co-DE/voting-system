<?php include_once('../common/header.php'); ?>
<div class="container">
<div class=" row position-relative mt-5">
	<div class=" col-md-6 offset-3 ">

	<div class="card shadow">
  <div class="card-header display-4 text-info text-center">Student Login</div>
  <?php if(@$_GET['error']){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> Incorrect username or password!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }?>
     <?php if(@$_GET['registered']){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Registration successfull. Login to continue..
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }?>
  <div class="card-body">
<form action="../submit.php" method="post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <div class="form-group form-check d-flex justify-content-between">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
    <label>
      <a href="forgot_password.php" class="text-right  mt-3 ">Lost your password?</a>
</label>
  </div>
  <button type="submit" class="btn btn-primary mx-auto d-block col-md-4" name="student_login">Submit</button>
    <a href="student_registration.php" class="text-center d-block mt-3 text-capitalize "><span class="text-dark">To Register</span> click here</a>

</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../common/footer.php'); ?>