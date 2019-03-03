<?php 
include_once('common/header.php');
include_once('database/connection.php');
include_once('common/functions.php');
 
 if($_SESSION['user_type']=='student'){

 } else{
    header('location:'.app_path);
  exit();
 }
 
 ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 bg-dark" >
              <div class="fixd position-fixed">
                                <h2 class="text-center text-white display-3 pt-5 mt-5"> Vote</h2>

                                <hr class="bg-white">
                                <h3 class="text-white-50 font-weight-lighter text-center  "> Your vote is valuable before vote think twice. </h3>
                                <p class=" text-danger"> Note : You can vote only one person from each department.</p>

            </div>
            </div>
            <div class="col-md-7">
                <div class="bd-example" data-example-id="">

<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>Chair Person</h3>
            <p>Click on chair person to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
      <div class="card-block">
       <?php $chair_person= get_nominees($conn,'chair person');
      // print_r($nominee);
       if(!empty($chair_person)){
       foreach($chair_person as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';

}
       }
        ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>President</h3>
            <p>Click on President to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
      <div class="card-block">
       <?php $president= get_nominees($conn,'president');
       if(!empty($president)){
       foreach($president as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
       }
     }
        ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>Secretary</h3>
            <p>Click on Secretary to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
      <div class="card-block">
       <?php $secretary= get_nominees($conn,'secretary');
       if(!empty($secretary)){
       foreach($secretary as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
       }
     }
        ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>TPO</h3>
            <p>Click on TPO to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>

    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
      <div class="card-block">
       <?php $TPO= get_nominees($conn,'TPO');
       if(!empty($TPO)){
       foreach($TPO as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
       }
     }
        ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>Cultural</h3>
            <p>Click on Cultural to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
      <div class="card-block">
       <?php $cultural= get_nominees($conn,'cultural');
       if(!empty($cultural)){
       foreach($cultural as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
       }
     }
        ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>Treasurer</h3>
            <p>Click on chair person to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
      <div class="card-block">
       <?php $treasurer= get_nominees($conn,'treasurer');
       if(!empty($treasurer)){
       foreach($treasurer as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
       }
     }
        ?>
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>Publicity head</h3>
            <p>Click on Publicity head to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
      <div class="card-block">
       <?php $publicity_head= get_nominees($conn,'publicity head');
       if(!empty($publicity_head)){
       foreach($publicity_head as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
       }
     }
        ?>
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-id-badge  " aria-hidden="true"></i>
            <h3>Sports</h3>
            <p>Click on Sports to see the nominees for respective department</p>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
      <div class="card-block">
       <?php $sports= get_nominees($conn,'sports');
       if(!empty($sports)){
       foreach($sports as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["email"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
       }
     }
        ?>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
</div>
</div>
<?php include_once('common/footer.php');

 ?>