<?php 
session_start();
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
  if($count > 0){
    header('location:Students/student_dashboard.php');
  } else{
    header('location:Students/student_login.php?error=failed');
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
  $sql="UPDATE  register SET    `first_name`='$f_name', `last_name`='$l_name', `mobile_no`='$mobile_no', `department`='$department', `year`='$year',`post`='$post',`is_nominee`='nominee' `status`='pending' Where `email`='$email'";
  $result=mysqli_query($conn,$sql);
  if($result){
        header('location:Students/nominees_registration.php?success='.$post);

  } else{
    $error=mysqli_error($conn);
        header('location:Students/nominees_registration.php?error='.$error);

  }
}

?>


