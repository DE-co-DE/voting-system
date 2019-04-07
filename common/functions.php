<?php 
$count_a=array();
function otp_form($email,$type){
  return '<div class="container">
<div class=" row position-relative mt-5">
  <div class=" col-md-6 offset-3 ">
<div class="alert alert-success" role="alert"><strong>'.$type.' ! </strong>
  We have mailed you a otp on your email id '.$email.'!
</div>
  <div class="card shadow">
  <div class="card-header display-4 text-info text-center">One Time Password</div>
  <div class="card-body">
<form action="" method="post">
  <div class="form-group">
    <label for="otp">Enter your otp:</label>
    <input type="number" class="form-control" id="otp" name="otp">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="pwd" name="email" value="'.$email.'">
  </div>
   <button type="submit" class="btn btn-primary mx-auto d-block col-md-4" name="otp_submit">Proceed</button>
</form>
</div>
</div>
</div>
</div>
</div>';
}
function check_user_exists($conn,$email){ 
  $sql="SELECT * from register where  email='$email'";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);  
  return $count;
}
function get_nominees($conn,$post){ 
  $sql="SELECT * from register where  post='$post' and user_type='nominee'";
  $result=mysqli_query($conn,$sql);
   $count_r=mysqli_num_rows($result); 
    if($count_r > 0){ 
  while($row=mysqli_fetch_array($result))
     {
        $count[] = $row;
    
    }
      // print_r($count);

    return $count;
  }
}
function get_user_by_email($conn,$email){
  $sql="SELECT * from register where  email='$email'";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_fetch_assoc($result);  

  return $count;
}
function total_vote($conn,$email){
$sql="SELECT DISTINCT(voter) from voting_details where  voted='$email'";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);  
  return $count;
}
function get_posts($conn){
$sql="SELECT DISTINCT(post) from register where post<>'' and status='accepted'";
  $result=mysqli_query($conn,$sql);
$count_p=mysqli_num_rows($result); 
    if($count_p > 0){ 
  while($row=mysqli_fetch_array($result))
     {
        $countp[] = $row;
    
    }
      // print_r($count);

    return $countp;
  }
}
function get_voting_details($conn){
$sql="SELECT * from start_vote";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_fetch_assoc($result);  
  return $count;
}
function get_all_nominees($conn){
  $count=[];
  $sql="SELECT * from register where  is_nominee!=''";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result))
     {
        $count[] = $row;
    
    }
      // print_r($count);

    return $count;
}

function get_all_nominee_request($conn){
  $sql="SELECT * from register where  is_nominee='' AND status='pending'";
  $result=mysqli_query($conn,$sql);
    $count_r=mysqli_num_rows($result); 
    if($count_r > 0){ 
  while($row=mysqli_fetch_array($result))
     {
        $count[] = $row;
    
    }
      // print_r($count);

    return $count;
  }
}

function check_table($conn,$table){
$sql="SELECT * from $table";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);  
  return $count;
}
function get_vote_dates($conn,$table){
 $sql="SELECT MONTH(start_date) as s_month ,DAY(start_date) as s_day,MONTH(end_date) as e_month ,DAY(end_date) as e_day from $table";
  $result=mysqli_query($conn,$sql);
  $counte=mysqli_fetch_array($result);  
  return $counte;
}

function check_announced($conn){
$sql="SELECT * from announcements where announced='true'";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);  
  return $count;
}

function sendmail($to,$message,$subject){

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <1shindetejashree@gmail.com>' . "\r\n";

if(mail($to,$subject,$message,$headers)){
return "send";
} else{
  return "error";
}
}

function forget_pwd(){
  return '<div class="container">
<div class=" row position-relative mt-5">
  <div class=" col-md-6 offset-3 ">
  <div class="card shadow">
  <div class="card-header display-4 text-info text-center">LOST PASSWORD!</div>
  <div class="card-body">
<form action="" method="post">
  <div class="form-group">
    <label for="otp">  Enter your registered email id</label>
    <input type="email" class="form-control" id="otp" name="email" required>
  </div>
  <div class="form-group">
  </div>
   <button type="submit" class="btn btn-primary mx-auto d-block col-md-4" name="forget_pwd_submit">Proceed</button>
</form>
</div>
</div>
</div>
</div>
</div>';
}
function change_pwd_form($email,$type){
  return '<div class="container">
<div class=" row position-relative mt-5">
  <div class=" col-md-6 offset-3 ">
  <div class="card shadow">
  <div class="card-header display-4 text-info text-center">NEW PASSWORD!</div>
  <div class="card-body">
<form action="" method="post">
  <div class="form-group">
    <label for="otp">  Enter your new password</label>
    <input type="text" class="form-control" id="otp" name="password" required>
    <input type="hidden" class="form-control" id="otp" name="email" value="'.$email.'">
    <input type="hidden" class="form-control" id="otp" name="type" value="'.$type.'">
  </div>
  <div class="form-group">
  </div>
   <button type="submit" class="btn btn-primary mx-auto d-block col-md-4" name="change_pwd_submit">Proceed</button>
</form>
</div>
</div>
</div>
</div>
</div>';
}
?>