<?php 
include_once('common/header.php');
include_once('database/connection.php');
include_once('common/functions.php');
?>
	<div class="col-md-4 offset-md-4 mt-3 ">
    		    <div class="card profile-card-2 shadow">
                    <div class="card-img-block">
                        <img class="img-fluid w-100" src="https://randomuser.me/api/portraits/women/81.jpg" alt="Card image cap" />
                        <div class="card-img-overlay">
					    <h4 class="card-text font-weight-lighter"><span class="fa fa-thumbs-up"></span> <span>36</span> votes</h4>
					  </div>
                    </div>
                    <div class="card-body pt-5 position-relative">
                        <img src="https://randomuser.me/api/portraits/women/81.jpg" alt="profile-image" class="profile_nominee_circle rounded-circle"/>
                        <h5 class="card-title pt-2">Shurvir Mori</h5>
                        <p class="card-text">Post - Chair person</p>
                        <p class="card-text">Academic Year - 3rd year</p>
                        <p class="card-text">Department - IT</p>
                    <?php if($_GET['post']=='request') {?>  
                        <a class="btn  btn-outline-success " >ACCEPT <span class="fa fa-thumbs-o-up"></span></a>
                        <a class="btn  btn-outline-danger " >DECLINE <span class="fa fa-thumbs-o-down"></span></a>
                    <?php }  ?>                      
                    </div>
                </div>
    		</div>

<?php include_once('common/footer.php');
