<?php 
include_once('common/header.php');
include_once('common/functions.php');
include_once('database/connection.php');
date_default_timezone_set("Asia/kolkata");

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
    $subject="OTP of registeration form";
$message="You have received an OTP from voting system.<br>Use this OTP to proceed your registration proceess<br><br><h1>".$otp."</h1>";
    $sendmail=sendmail($email,$message,$subject);
    if($sendmail=='send'){
      echo     otp_form($email); //calling otp function

    } else{
      echo"<h1>Some error occured please try again</h1>";
    }
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
echo "OTP is not matched <a href='submit.php?resend=".$email."'>Retry</a>";
  }
}
//resend otp 

if(isset($_GET['resend'])){
   echo otp_form($_GET['resend']); //calling otp function

}

if(isset($_GET['forget_pwd'])){
   echo forget_pwd(); //calling forget_pwd function

}


//student_login or nominee login
if(isset($_POST['student_login'])){

  $email=$_POST['email'];
   $password=$_POST['password'];
   $type=$_POST['type'];
 
if($type=='student'){
    $sql="SELECT * from register where password='$password' and email='$email' and user_type='student'";
} else{
    $sql="SELECT * from register where password='$password' and email='$email' and user_type='nominee'";
}
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);
  $row=mysqli_fetch_array($result);
  $_SESSION['user_id']=$row['email'];
  $_SESSION['user_type']=$row['user_type'];
  if($count > 0){
    header('location:Students/student_dashboard.php');
  } else{
    header('location:Students/student_login.php?error=failed&'.$type.'=login');
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
  $img=$_POST['img'];
  $folder="uploaded/";
  $filename=$_FILES['profile_pic']['name'];
  $temp=$_FILES['profile_pic']['tmp_name'];
  if($filename==''){
    $filename=$img;
  } else{
  if(move_uploaded_file($temp, $folder.$filename)){
    $filename=$folder.$filename;
  } else{
    $filename='';
  }
}
  
  $sql="UPDATE  register SET    `first_name`='$f_name', `last_name`='$l_name', `mobile_no`='$mobile_no', `department`='$department', `year`='$year',`post`='$post',`profile_pic`='$filename',`status`='pending' Where `email`='$email'";
  $result=mysqli_query($conn,$sql);
  if($result){
        header('location:Students/nominees_registration.php?success='.$post);

  } else{
    $error=mysqli_error($conn);
        header('location:Students/nominees_registration.php?error='.$error);

  }
}
if(isset($_GET['by'])){ // vote
  $by=$_GET['by'];
  $to=$_GET['to'];

  $qry="SELECT voted from voting_details where voter='$by' AND voted='$to'";
    $run=mysqli_query($conn,$qry);
    $count=mysqli_num_rows($run);
    if($count > 0){
          header('location:nominee_profile.php?vote_status=failed_exists&nominee='.$to);
    }
else{

 $sql = "INSERT INTO `voting_details` (`voter`, `voted`) VALUES('$by','$to')";

  $result=mysqli_query($conn,$sql);
  if($result){
    header('location:nominee_profile.php?vote_status=success&nominee='.$to);
  } else{
    header('location:nominee_profile.php?vote_status=error&nominee='.$to);
  }
}
}


if(isset($_GET['submit_announcement'])){ // announcements
 // $announcement=$_GET['announcement'];
 $date=date('Y-m-d');
 $sql = "INSERT INTO `announcements` (`announced`, `announce_date`) VALUES('true','$date')";

  $result=mysqli_query($conn,$sql);
  if($result){
    header('location:results.php');
  } else{
    header('location:Admin/dashboard.php?announce_status=error');
  }

}
//accept or reject nominee

if(isset($_GET['nominee_request'])){
  echo $nominee_request=$_GET['nominee_request'];
  echo $email=$_GET['nominee'];
  //exit();
  if($nominee_request=='declined'){

  $sql="UPDATE  register SET `is_nominee`='',`user_type`='student', `status`='declined' Where `email`='$email'";
  } else{

  $sql="UPDATE  register SET    `is_nominee`='nominee',`user_type`='nominee',`status`='accepted' Where `email`='$email'"; 
  }
  $result=mysqli_query($conn,$sql);
  if($result){
        header('location:nominee_profile.php?nominee='.$email.'&tab='.$nominee_request.' & n_status=success&post=request');

  } else{
    $error=mysqli_error($conn);
        header('location:nominee_profile.php?n_status=error');

  }
}


//forgot password

if(isset($_POST['forget_pwd_submit'])){

  $email=$_POST['email'];
 
$count=get_user_by_email($conn,$email);
  if(!empty($count)){
     $subject="Request For Password";
$message="You have received an password from voting system.<br>Use this password to proceed with login.<br><br><h1><i>".$count['password']."</i></h1>";
    $sendmail=sendmail($email,$message,$subject);
    if($sendmail=='send'){
          $_SESSION['forget_pwd']="set";
    if($count['user_type']=='student' || $count['user_type']=='nominee'){
    header('location:Students/student_login.php?'.$count['user_type'].'=login');
  }elseif($count['user_type']=='admin'){
    header('location:Admin/login.php');
  } 
}
}else{
echo '
<div class="alert alert-success" role="alert">
  No email Id found with name '.$email.'!
</div>';
echo forget_pwd();
  }
}

?>


