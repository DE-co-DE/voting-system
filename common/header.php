<?php 
session_start();
define("app_path","http://localhost/voting system/" ,true); ?>

<!DOCTYPE html>
<html>
<head>
		<title>voting::Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo app_path; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo app_path; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo app_path; ?>assets/font-awesome/css/font-awesome.min.css">

</head>
<body>
<!-- <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
 --><nav class="navbar navbar-light navbar-expand-lg bg-info">
 <a class="navbar-brand" href="<?php echo app_path; ?>">Polling system</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo app_path; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Help</a>
      </li>
      <?php if(isset($_SESSION['user_id'])){?>
  <li class="nav-item">
        <a class="nav-link" href="<?php echo app_path; ?>logout.php">Logout</a>
      </li>
    <?php }?>
    </ul>
  </div>
</nav>
      <?php if(isset($_SESSION['user_id'])){?>

  <button onclick="window.history.back();" class="btn btn-sm btn-outline-info mt-1 ml-3 mb-1"><span class="fa fa-angle-double-left"> </span> Back</button>
  <a href="index.php" class="btn btn-sm btn-outline-info mt-1 ml-3 mb-1"><span class="fa fa-home"> </span> Home</a>
<?php } ?>