<?php 
include_once('common/header.php');
include_once('common/functions.php');
include_once('database/connection.php');

if(isset($_POST['submit_student_register'])){
  $f_name=$_POST['f_name'];
  $l_name=$_POST['l_name'];
  $department=$_POST['department'];
  $year=$_POST['year'];
  $email=$_POST['email'];
  $mobile_no=$_POST['number'];
  $password=$_POST['password'];
  $c_password=$_POST['c_password'];
  $otp=rand(1000,9999);

  if($password!=$c_password){
    header('location:Students/student_registration.php?error=not_matched');
    exit(0);
  }
  $check=check_user_exists($conn,$email);
  if($check > 0){
        header('location:Students/student_registration.php?error_exists=exist');
exit(0);
  }
  $sql="INSERT INTO register ( `user_type`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `department`, `year`, `otp`) VALUES ('student','$f_name','$l_name','$email','$mobile_no','$password','$department','$year','$otp')";
  $result=mysqli_query($conn,$sql);
  if($result){
   echo otp_form($email); //calling otp function
  } else{
    echo mysqli_error($conn);

  }
}

//otp submisssion 
if(isset($_POST['otp_submit'])){

  $email=$_POST['email'];
   $otp=$_POST['otp'];
 

  $sql="SELECT otp from register where otp='$otp' and email='$email'";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);

  if($count > 0){
    header('location:Students/student_login.php?msg=registered');
  } else{
echo "OTP is not matched <a href='submit.php?resend=".$email."'>Resend</a>";
  }
}
//resend otp 

if(isset($_GET['resend'])){
   echo otp_form($_GET['resend']); //calling otp function

}


//otp submisssion 
if(isset($_POST['student_login'])){

  $email=$_POST['email'];
   $password=$_POST['password'];
 

  $sql="SELECT * from register where password='$password' and email='$email' and is_nominee=''";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);
  $row=mysqli_fetch_array($result);
  $_SESSION['user_id']=$row['email'];
  $_SESSION['user_type']=$row['user_type'];
  if($count > 0){
    header('location:Students/student_dashboard.php');
  } else{
    header('location:Students/student_login.php?error=failed');
  }
}


//admin voting date submission 
if(isset($_POST['voting_date_submit'])){

  $voting_start=$_POST['voting_start'];
  $voting_end=$_POST['voting_end'];
  $voting_result=$_POST['voting_result'];
 
 $sql_check=check_table($conn,'start_vote');
if($sql_check>0){
$sql="UPDATE start_vote set start_date='$voting_start' ,end_date='$voting_end',result_date='$voting_result' ";
} else{
  $sql = "INSERT INTO `start_vote` (`start_date`, `end_date`,`result_date`) VALUES('$voting_start','$voting_end','$voting_result')";
}
  $result=mysqli_query($conn,$sql);
  if($result){
    header('location:Admin/dashboard.php?page=home&status=success');
  } else{
    header('location:Admin/dashboard.php?page=home&status=failed');
  }
}

//------------admin login------------
if(isset($_POST['admin_login'])){

  $email=$_POST['email'];
   $password=$_POST['password'];
 

  $sql="SELECT * from admin where password='$password' and email='$email'";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);
  $row=mysqli_fetch_array($result);
  $_SESSION['user_id']=$row['email'];
    $_SESSION['user_type']=$row['user_type'];
  if($count > 0){
    header('location:Admin/dashboard.php');
  } else{
    header('location:Admin/login.php?error=failed');
  }
}
//register nominee

if(isset($_POST['submit_nominee_register'])){
  $f_name=$_POST['f_name'];
  $l_name=$_POST['l_name'];
  $department=$_POST['department'];
  $year=$_POST['year'];
  $post=$_POST['post'];
  $email=$_POST['email'];
  $mobile_no=$_POST['number'];

  
//   $check=check_user_exists($conn,$email);
//   if($check > 0){
//         header('location:Students/student_registration.php?error_exists=exist');
// exit(0);
//   }
  $sql="UPDATE  register SET    `first_name`='$f_name', `last_name`='$l_name', `mobile_no`='$mobile_no', `department`='$department', `year`='$year',`post`='$post',`status`='pending' Where `email`='$email'";
  $result=mysqli_query($conn,$sql);
  if($result){
        header('location:Students/nominees_registration.php?success='.$post);

  } else{
    $error=mysqli_error($conn);
        header('location:Students/nominees_registration.php?error='.$error);

  }
}

?>


