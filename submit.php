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
  $password2=$_POST['password'];
  $password=sha1($_POST['password']);
  $c_password=$_POST['c_password'];
  $otp=rand(1000,9999);

  if($password2!=$c_password){
    header('location:Students/student_registration.php?error=not_matched');
    exit(0);
  }
  $check=check_user_exists($conn,$email);
  if($check == 0){
        header('location:Students/student_registration.php?error_exists=exist');
exit(0);
  }
  $timeIn10Minutes = time() + 10*60; // 10 minutes * 60 seconds/minute
  $now = date('His', $timeIn10Minutes);

 $sql="UPDATE  register SET   `user_type`='student',`password`='$password',`otp`='$otp',`otp_expire`='$now', `first_name`='$f_name', `last_name`='$l_name', `mobile_no`='$mobile_no', `department`='$department', `year`='$year' Where `email`='$email'";

  $result=mysqli_query($conn,$sql);
  if($result){
    $subject="OTP of registeration form";
$message="You have received an OTP from voting system.<br>Use this OTP to proceed your registration proceess<br><br><h1>".$otp."</h1>";
    $sendmail=sendmail($email,$message,$subject);
    if($sendmail=='send'){
      echo     otp_form($email,'Success'); //calling otp function

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
  
  $t = time();
  // will make like: '151720'
  $now = date('His', $t);


  $sql="SELECT * from register where otp='$otp' and email='$email'";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);
  $fetch=mysqli_fetch_array($result);

  // compare strings
$comp=$fetch['otp_expire'];

  if($comp < $now){
  echo "OTP Expired<a href='submit.php?resend=".$email."'>Resend</a>";

exit(0);
 }

  if($count > 0){
     $sql2="UPDATE  register SET `otp_expire`='matched' Where `email`='$email'";
     $result2=mysqli_query($conn,$sql2);
    header('location:Students/student_login.php?msg=registered');
  } else{
echo "OTP is not matched <a href='submit.php?retry=".$email."'>Retry</a>";
  }
}
//resend otp 

if(isset($_GET['resend'])){
  // echo otp_form($_GET['resend'],'resend'); 
   $email=$_GET['resend'];
     $otp2=rand(1000,9999);    
  $timeIn10Minutes2 = time() + 10*60; // 10 minutes * 60 seconds/minute
  $now2 = date('His', $timeIn10Minutes2);
     $sql="UPDATE  register SET `otp`='$otp2',`otp_expire`='$now2' Where `email`='$email'";
     $result2=mysqli_query($conn,$sql);
  if($result2){
    $subject="OTP of registeration form";
$message="You have received an OTP from voting system.<br>Use this OTP to proceed your registration proceess<br><br><h1>".$otp2."</h1>";
    $sendmail=sendmail($email,$message,$subject);
    if($sendmail=='send'){
      echo     otp_form($email,'Resend'); //calling otp function

    } else{
      echo"<h1>Some error occured please try again</h1>";
    }
  } else{
    echo mysqli_error($conn);

  }


}
//retry 
if(isset($_GET['retry'])){
   echo otp_form($_GET['retry'],'Retry'); //calling otp function

}

if(isset($_GET['forget_pwd'])){
   echo forget_pwd(); //calling forget_pwd function

}


//student_login or nominee login
if(isset($_POST['student_login'])){

  $email=$_POST['email'];
   $password=sha1($_POST['password']);
   $type=$_POST['type'];
 
if($type=='student'){
    $sql="SELECT * from register where password='$password' and email='$email' and user_type='student' and `otp_expire`='matched'";
} else{
    $sql="SELECT * from register where password='$password' and email='$email' and user_type='nominee'";
}
    @$remember=$_POST['remember'];
    if(!empty($_POST["remember"])) {
        setcookie ("login_email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
      } else {
        if(isset($_COOKIE["login_email"])) {
          setcookie ("login_email","");
        }
        if(isset($_COOKIE["password"])) {
          setcookie ("password","");
        }
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

  $voting_start=date('Y-m-d'  ,strtotime($_POST['voting_start']));
  $voting_end=date('Y-m-d'  ,strtotime($_POST['voting_end']));
  $voting_result=date('Y-m-d' ,strtotime($_POST['voting_result']));
 
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
 
@$remember=$_POST['remember'];
    if(!empty($_POST["remember"])) {
        setcookie ("admin_email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("admin_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
      } else {
        if(isset($_COOKIE["admin_email"])) {
          setcookie ("admin_email","");
        }
        if(isset($_COOKIE["admin_password"])) {
          setcookie ("admin_password","");
        }
      }
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
  $achievements=$_POST['achievements'];
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
  
  $sql="UPDATE  register SET    `first_name`='$f_name', `last_name`='$l_name', `mobile_no`='$mobile_no', `department`='$department', `year`='$year',`post`='$post',`profile_pic`='$filename',`status`='pending' ,`acheivements`='$achievements' Where `email`='$email'";
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
  $post=$_GET['post'];

  $qry="SELECT voted from voting_details where voter='$by' AND (voted='$to' OR voted_post='$post')";
    $run=mysqli_query($conn,$qry);
    $count=mysqli_num_rows($run);
      
    if($count > 0){
          header('location:nominee_profile.php?vote_status=failed_exists&nominee='.$to);
    }
else
{
 $sql = "INSERT INTO `voting_details` (`voter`, `voted`,`voted_post`) VALUES('$by','$to','$post')";

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
   $message="We are sorry to inform you that your request for nominee has been declined.<br><br>But you can vote to other nominnees from your <h3>Student Section</h3>";
  } else{

  $sql="UPDATE  register SET    `is_nominee`='nominee',`user_type`='nominee',`status`='accepted' Where `email`='$email'"; 
   $message="<h1>Congratulation.</h1><br>We are glad to inform you that your request for nominee has been accepted.<br><br>And Now as you are nominee so you can not login from student section .<br>
   You can see your details by logging in from <h3>Nominee Section</h3>";
  }
  $result=mysqli_query($conn,$sql);
  if($result){
   $subject="Regarding your request for nominee.";
   
    $sendmail=sendmail($email,$message,$subject);
    if($sendmail=='send'){
    } 
        header('location:nominee_profile.php?nominee='.$email.'&tab='.$nominee_request.' & n_status=success&post=request');

  } else{
    $error=mysqli_error($conn);
        header('location:nominee_profile.php?n_status=error');

  }
}
//change pwd

if(isset($_POST['change_pwd_submit'])){
   $password=sha1($_POST['password']);
   $email=$_POST['email'];
     $type=$_POST['type'];

  //exit();
  if($type!='admin'){
      $sql="UPDATE  register SET   `password`='$password' Where `email`='$email' and user_type='$type'"; 

  } else{
          $sql="UPDATE  admin SET   `password`='$password' Where `email`='$email' and user_type='$type'"; 
  }

  
  $result=mysqli_query($conn,$sql);
  if($result){
              $_SESSION['change_pwd']="Your password changed succesfully";

if($type!='admin'){

    header('location:Students/student_login.php?'.$type.'=login');
  }elseif($count['user_type']=='admin'){
    header('location:Admin/login.php');
  } 
  }
}
if(isset($_GET['change_pwd_form'])){
  $email=$_GET['change_pwd_form'];
  $type=$_GET['type'];

echo change_pwd_form($email,$type);
}

//contact page sendmail 

if(isset($_POST['contact_sendmail'])){
  $email=$_POST['email'];
  $name=$_POST['name'];
  $number=$_POST['number'];
  $subject=$_POST['subject'];
  $msg=$_POST['msg'];
  $message="Email id -".$email."<br>Name- ".$name."<br>Number- ".$number."<br>subject- ".$subject."<br>message- ".$msg;
  //$mainmail="deep7rd@gmail.com";
  $sub="You have received a feedback from your website voting system.";
   $sendmail=sendmail("1shindetejashree@gmail.com",$message,$sub);
    if($sendmail=='send'){
          $_SESSION['contact_mail']="Thank You. We have received your message and we will get back to you soon.";
    header('location:contact_us.php');
   
} else{
  echo "error";
}
}
//forgot password

if(isset($_POST['forget_pwd_submit'])){

  $email=$_POST['email'];
 
$count=get_user_by_email($conn,$email);
//print_r($count); //exit();
  if(!empty($count)){
     $subject="Request For Password";
$message="You have received an password from voting system.<br>Use this password to proceed with login.<br><br><a href='".app_path."submit.php?change_pwd_form=".$email."&type=".$count['user_type']."'><i>Click here to change the password</i></a>";
    $sendmail=sendmail($email,$message,$subject);
    if($sendmail=='send'){
          $_SESSION['forget_pwd']="set";
    if($count['user_type']=='student' || $count['user_type']=='nominee'){
    header('location:Students/student_login.php?'.$count['user_type'].'=login');
  }elseif($count['user_type']=='admin'){
    header('location:Admin/login.php');
  } 
} else{
  echo "error";
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


