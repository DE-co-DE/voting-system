<?php 
include_once('database/connection.php');
include_once('common/header.php');
include_once('common/functions.php'); ?>
<div class="container mt-5 ">
      <div class="col-sm-12">
                <div class="bd-example" data-example-id="">

<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-question-circle  " aria-hidden="true"></i>
            <h3>	How to register?</h3>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
      <div class="card-block">
       click on student section<br><hr>
 click on register<br><hr>
 fill mandatory fields<br><hr>
 click on submit button

      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-question-circle  " aria-hidden="true"></i>
            <h3>	How to login?</h3>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
      <div class="card-block">
      		click on student section<br><hr>
	Enter valid Username entered while registration<br><hr>
	Enter valid password entered while registration<br><hr>
	Click on submit button

          </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-question-circle  " aria-hidden="true"></i>
            <h3>How to apply for Nominees?</h3>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
      <div class="card-block">
      	Nominee must be registered as a student first<br><hr>
	click on student section<br><hr>
	Enter valid Username entered while registration<br><hr>
	Enter valid password entered while registration<br><hr>
	Click on submit button<br><hr>
	Then click on Nominees Registration field<br><hr>
	Enter all mandatory fields and click on submit button.  

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <div class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i class="fa fa-question-circle  " aria-hidden="true"></i>
            <h3>How to vote?</h3>
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
    </div>
     <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
      <div class="card-block">
      	Student must be registered first<br><hr>
	click on student section<br><hr>
	Enter valid Username entered while registration<br><hr>
	Enter valid password entered while registration<br><hr>
	Click on submit button<br><hr>
	Then click on voting section<br><hr>
	Click on posts and give vote as per your choice.  

      </div>
    </div>
</div>
</div>
</div>
</div>

</div>

	<?php include_once('common/footer.php'); ?>