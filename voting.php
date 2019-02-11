<?php 
include_once('common/header.php');
include_once('database/connection.php');
include_once('common/functions.php');

  
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
            <div class="col-md-7 mt-5 pt-2">
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
       <?php $nominee[]= get_nominees($conn,'chair_person');
      // print_r($nominee);
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee_profile.php?nominee='.$nam["first_name"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';

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
       <?php $nominee= get_nominees($conn,'president');
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee.php?nominee='.$nam["username"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
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
       <?php $nominee= get_nominees($conn,'secretary');
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee.php?nominee='.$nam["username"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
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
       <?php $nominee= get_nominees($conn,'TPO');
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee.php?nominee='.$nam["username"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
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
       <?php $nominee= get_nominees($conn,'cultural');
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee.php?nominee='.$nam["username"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
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
       <?php $nominee= get_nominees($conn,'treasurer');
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee.php?nominee='.$nam["username"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
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
       <?php $nominee= get_nominees($conn,'publicity_head');
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee.php?nominee='.$nam["username"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
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
       <?php $nominee= get_nominees($conn,'sports');
       if(!empty($nominee)){
       foreach($nominee as $nam){
        echo '<a href="nominee.php?nominee='.$nam["username"].'&post='.$nam["post"].'" class="list-group-item">'.$nam["first_name"].' ' .$nam["last_name"].'</a>';
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