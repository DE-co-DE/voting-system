<?php 
$count_a=array();
function otp_form($email){
  return '<div class="container">
<div class=" row position-relative mt-5">
  <div class=" col-md-6 offset-3 ">
<div class="alert alert-success" role="alert">
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

function get_voting_details($conn){
$sql="SELECT * from start_vote";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_fetch_assoc($result);  
  return $count;
}
function get_all_nominees($conn){
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
?>