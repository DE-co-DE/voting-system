<?php include_once('common/header.php'); 
 include_once('database/connection.php'); 
include_once('common/functions.php');
if(!empty($_SESSION['user_type'])){
 if($_SESSION['user_type']=='student'){
 header('location:'.app_path.'Students/student_dashboard.php');
 } elseif($_SESSION['user_type']=='nominee'){
    header('location:'.app_path.'Students/student_dashboard.php');
  exit();
 }
 elseif($_SESSION['user_type']=='admin'){
    header('location:'.app_path.'Admin/dashboard.php');
  exit();
 }
}
?>
    <?php $get_details=get_voting_details($conn); ?>

<div class="row col-md-12 position-relative">
	<img src="assets/images/voting-09.jpg" class="img-fluid w-100" style="height: 400px">
<div class="position-absolute banner-content bg-dark-transparent shadow ">
<h1 class="text-white text-center mt-3 border-bottom text-uppercase">Vote!!</h1>
<h1 class="text-white text-center  px-5 py-3 text-uppercase">Each Vote counts</h1>
</div>
</div>

<div class="container-fluid mt-3">
	<div class="row">
	<div class="col-lg-9 col-md-9 col-sm-9 col-12">



<div class="jumbotron">
<div class="row w-100">
        <div class="col-md-4">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-user-circle-o" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Admin</h4></div>
                <div class="text-info text-center mt-2"><h3><a href="Admin/login.php" class="text-info ">Section</a></h3></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-child" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Student</h4></div>
                <div class="text-success text-center mt-2"><h3><a href="Students/student_login.php" class="text-success ">Section</a></h3></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-users" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Nominees</h4></div>
                <div class="text-danger text-center mt-2"><h3><a href="Students/student_login.php?nominee=login" class="text-danger ">Section</a></h3></div>
            </div>
        </div>
        
          <div class="col-md-4 mt-4">
            <div class="card border-secondary mx-sm-1 p-3">
                <div class="card border-secondary shadow text-secondary p-3 my-card" ><span class="fa fa-thumbs-up" aria-hidden="true"></span></div>
                <div class="text-secondary text-center mt-3"><h4>Results</h4></div>
                <div class="text-secondary text-center mt-2"><h3><a href="results.php" class="text-secondary ">
                    <?php $announced=check_announced($conn);
                    if($announced!='0'){
                        echo 'Announced';
                    }
                    ?>

                </a></h3></div>
            </div>
        </div>

     </div>
</div>

   </div>
<div class="col-lg-3 co-md-9 col-sm-9 col-12">
	<h3 class="bg-info p-3 text-white">Notice Board</h3>
	<hr>


	<marquee direction="up">
        <?php if(strtotime($get_details['start_date']) < strtotime(date('Y-m-d'))){ ?>
 <h5 class="alert alert-warning text-capitalize">Students who wants to apply for nominees can register before the start date <?php echo $get_details['start_date']?$get_details['start_date']:''?> of voting</h5>
<?php }else{?>
 <h5 class="alert alert-warning text-capitalize">Nominees Registration has been closed.</h5>
    <?php }?>
     
                           
                            <h4 class="alert alert-secondary">START DATE</h4>
                            <p class="text-secondary"><?php echo $get_details['start_date']?$get_details['start_date']:'Not updated yet'?></p>

                            <h4 class="alert alert-danger mt-3">END DATE</h4>
                            <p class="text-danger"><?php echo $get_details['end_date']?$get_details['end_date']:'Not updated yet'?></p>
                            <h4 class="alert alert-info mt-3">RESULT DATE</h4>
                            <p class="text-info"><?php echo $get_details['result_date']?$get_details['result_date']:'Not updated yet'?></p>
                            
	</marquee>
</div>
<?php include_once('common/footer.php'); ?>