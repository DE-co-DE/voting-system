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
	$count= count($posts);
	foreach ($posts as $post) {
		$i++;
		?>
 <div class="col-md-4">
          <div class="card">
  <div class="card-header text-uppercase"><?php echo $post['post'] ?></div>

	<?php $nominees=get_nominees($conn,$post['post']);
	$j=0;
	foreach ($nominees as $nominee) { 
		$j++;
		?>
		<div class="d-flex justify-content-between">
  <div class="card-body"><?php echo $nominee['first_name'].' '.$nominee['last_name']; ?></div> 
  <div class="card-body">Votes
  	<?php  $votes=total_vote($conn,$nominee['email']);?>
   <span class="badge badge-pill badge-secondary"><?php echo $votes==0?'0':$votes; ?></span>
  	<?php if($votes!=0){ echo $j==1?'<span class="badge badge-pill badge-success">Winner</span>':''; }?>

</div> 

		</div>

<?php } ?>
</div>       
 </div>
		<?php
		if($i==3){
			echo "<div class='w-100'></div>";
		}
	}
	?>
 
</div>
</div>

 <?php  ?>


<?php include_once('common/footer.php'); ?>