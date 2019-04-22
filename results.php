<?php include_once('common/header.php'); 
 include_once('database/connection.php'); 
include_once('common/functions.php');
 $announced=check_announced($conn);
                    if($announced==0){
header('location:index.php');  }   ?>
<div class="container-fluid mt-5">
<div class="row">
	<?php $posts=get_posts($conn);
	$i=0;
	$votes1=0;
	$votes2=0;
	$votes3=0;
	$count= count($posts);
	foreach ($posts as $post) {
		$i++;
		?>
 <div class="col-md-4">
          <div class="card">
  <div class="card-header text-uppercase"><?php echo $post['post'] ?></div>
  <?php $nominees=get_nominees($conn,$post['post']); 
//print_r($nominees); 
 
if(!empty($nominees[0])){ ?>
<div class="d-flex justify-content-between">
  <div class="card-body"><?php echo $nominees[0]['first_name'].' '.$nominees[0]['last_name']; ?></div> 
  <div class="card-body">Votes
  	<?php  $votes1=total_vote($conn,$nominees[0]['email']);?>
   <span class="badge badge-pill badge-secondary"><?php echo $votes1==0?'0':$votes1; ?></span>
</div>

</div>
<?php }

if(!empty($nominees[1])){ ?>

<div class="d-flex justify-content-between">
  <div class="card-body"><?php echo $nominees[1]['first_name'].' '.$nominees[1]['last_name']; ?></div> 
  <div class="card-body">Votes
  	<?php  $votes2=total_vote($conn,$nominees[1]['email']);?>
   <span class="badge badge-pill badge-secondary"><?php echo $votes2==0?'0':$votes2; ?></span>
</div>
</div>
<?php }
if(!empty($nominees[2])){ ?>

<div class="d-flex justify-content-between">
  <div class="card-body"><?php echo $nominees[2]['first_name'].' '.$nominees[2]['last_name']; ?></div> 
  <div class="card-body">Votes
  	<?php  $votes3=total_vote($conn,$nominees[2]['email']);?>
   <span class="badge badge-pill badge-secondary"><?php echo $votes3==0?'0':$votes3; ?></span>
</div>
</div>
<?php } 
if($votes1 > $votes2 && $votes1 > $votes3){ ?>
<div class="card-footer text-info">
	The Winner is <strong><?php echo $nominees[0]['first_name'].' '.$nominees[0]['last_name']; ?></strong>
</div>	
<?php }
?>
<?php
if($votes1==$votes2 && $votes1 == $votes3 && $votes1!=0 && $votes2!=0 && $votes3!=0){ ?>
<div class="card-footer text-info">
	This result is tied between all three.
</div>	
<?php }
?>
<?php
if($votes1==$votes2 &&  $votes3==0 && $votes1!=0){ ?>
<div class="card-footer text-info">
	This result is tied between 
	<strong><?php echo $nominees[0]['first_name'].' '.$nominees[0]['last_name']; ?></strong> And 
	<strong><?php echo $nominees[1]['first_name'].' '.$nominees[1]['last_name']; ?></strong>.
</div>	
<?php }
?>
<?php
if($votes2==0 && $votes1 == $votes3 && $votes1!=0){ ?>
<div class="card-footer text-info">
	This result is tied between 
	<strong><?php echo $nominees[0]['first_name'].' '.$nominees[0]['last_name']; ?></strong> And 
	<strong><?php echo $nominees[2]['first_name'].' '.$nominees[2]['last_name']; ?></strong>.
</div>	
<?php }
?>
<?php
if($votes1==0 && $votes2!=0 && $votes2 == $votes3){ ?>
<div class="card-footer text-info">
	This result is tied between 
	<strong><?php echo $nominees[1]['first_name'].' '.$nominees[0]['last_name']; ?></strong> And 
	<strong><?php echo $nominees[2]['first_name'].' '.$nominees[2]['last_name']; ?></strong>.
</div>	
<?php }
?>
<?php
if($votes2 > $votes1 && $votes2 > $votes3){ ?>
<div class="card-footer text-info">
	The Winner is <strong><?php echo $nominees[1]['first_name'].' '.$nominees[1]['last_name']; ?></strong>
</div>	
<?php }
?>
<?php
if($votes3 > $votes1 && $votes3 > $votes2){ ?>
<div class="card-footer text-info">
	The Winner is <strong><?php echo $nominees[1]['first_name'].' '.$nominees[1]['last_name']; ?></strong>
</div>	
<?php }
?>
	
</div>       
 </div>
		<?php
		if($i==3){
			echo "<div class='w-100'></div><br>";
		}
	}
	?>
 
</div>
</div>

 <?php  ?>


<?php include_once('common/footer.php'); ?>