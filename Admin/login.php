<?php include_once('../common/header.php'); ?>
<div class="container">
<div class=" row position-relative mt-5">
	<div class=" col-md-6 offset-3 ">

	<div class="card shadow">
  <div class="card-header display-4 text-info text-center">Admin Login</div>
    <?php if(@$_GET['error']){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> Incorrect email or password!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if(!empty($_SESSION['forget_pwd'])){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Check your mail .<br>We have sent you an mail with your password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
unset($_SESSION['forget_pwd']);
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
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary mx-auto d-block col-md-4" name="admin_login">Submit</button>
      <a href="../submit.php?forget_pwd=true" class="text-right  mt-3 ">Lost your password?</a>
</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../common/footer.php'); ?>