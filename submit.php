<?php 
session_start();
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

?>

<?php include_once('common/footer.php'); ?>

