<?php include_once('../common/header.php'); ?>
<div class="container">
<div class=" row position-relative mt-5">
	<div class=" col-md-6 offset-3 ">

	<div class="card shadow">
  <div class="card-header display-4 text-info text-center"><?php echo @$_GET['nominee']?'Nominees':'Student';?> Login</div>

  <?php 
  if(!empty($_SESSION['forget_pwd'])){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Check your mail .<br>We have sent you an mail with your password.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
unset($_SESSION['forget_pwd']);
  }
if(!empty($_SESSION['change_pwd'])){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>'.$_SESSION['change_pwd'].'.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
unset($_SESSION['change_pwd']);
  }
  if(@$_GET['error']){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!</strong> Incorrect username or password!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }?>
     <?php if(@$_GET['msg']=='registered'){
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
    <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_COOKIE["login_email"])) { echo $_COOKIE["login_email"]; } ?>">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
    <input type="hidden" class="form-control"  name="type" value="<?php echo @$_GET['nominee']?'nominee':'student'?>">
  </div>
  <div class="form-group form-check d-flex justify-content-between">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" <?php if(isset($_COOKIE["login_email"])) { ?> checked <?php } ?> name="remember"> Remember me
    </label>
    <label>
      <a href="../submit.php?forget_pwd=true" class="text-right  mt-3 ">Lost your password?</a>
</label>
  </div>
  <button type="submit" class="btn btn-primary mx-auto d-block col-md-4" name="student_login">Submit</button>
   <?php echo @$_GET['nominee']?'':'  <a href="student_registration.php" class="text-center d-block mt-3 text-capitalize "><span class="text-dark">To Register</span> click here</a>';?>

</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once('../common/footer.php'); ?>