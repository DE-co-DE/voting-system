<?php include_once('../common/header.php'); ?>
<div class="container">
<div class=" row position-relative mt-5">
	<div class=" col-md-6 offset-3 ">

	<div class="card shadow">
  <div class="card-header display-4 text-info text-center">Student Login</div>
  <div class="card-body">
<form action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group form-check d-flex justify-content-between">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
    <label>
      <a href="forgot_password.php" class="text-right  mt-3 ">Lost your password?</a>
</label>
  </div>
  <button type="submit" class="btn btn-primary mx-auto d-block col-md-4">Submit</button>
    <a href="student_registration.php" class="text-center d-block mt-3 text-capitalize "><span class="text-dark">To Register</span> click here</a>

</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../common/footer.php'); ?>