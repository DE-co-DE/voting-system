<?php 
include_once('database/connection.php');
include_once('common/header.php');
include_once('common/functions.php'); ?>
<div class="container mt-5">
	 <div class="row">

        <!--Grid column-->
        <div class="col-sm-6">
<div class="fusion-column-wrapper"><h2 class="text-title " ><i class="fa fa-envelope"></i> Contact Us</h2>
<h3 class="text-info pt-4">Email :</h3>
<p>1shindetejashree@gmail.com</p>
<h3 class="text-info pt-4">Address :</h3>
<div>Shivajirao S. Jondhale College Of Engineering
Sonarpada, <br> Dombivli(E). Dist – Thane<br>
Pin code – 421204
</div>
<h3 class="text-info pt-4">Contact Number :</h3>
<p>+91 9869936566</p>
<div class="fusion-clearfix"></div></div>
        </div>
        <div class="col-sm-5">
<?php if(!empty($_SESSION['contact_mail'])){
       echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>'.$_SESSION['contact_mail'].'.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
unset($_SESSION['contact_mail']);
  }?>
            <!--Form with header-->
            <div class="card border-info rounded-0">

                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2">
                        <h4> Write to us:</h4>
                        <p class="m-0">We'll love to hear your queries.</p>
                    </div>
                </div>
                <div class="card-body p-3">
				<form action="submit.php" method="post">
                    <!--Body-->
                    <div class="form-group">
                        <label>Your name</label>
                        <div class="input-group">
                            <div class="input-group-addon bg-light"><i class="fa fa-user text-info"></i></div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="name" name="name">
                        </div>
                    </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <div class="input-group">
                            <div class="input-group-addon bg-light"><i class="fa fa-phone text-info"></i></div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Number" name="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Your email</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-envelope text-info"></i></div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-tag prefix text-info"></i></div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username" name="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-pencil text-info"></i></div>
                            <textarea class="form-control" name="msg"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-info btn-block rounded-0 py-2" type="submit" name="contact_sendmail">Submit</button>
                    </div>
</form>
                </div>

            </div>
            <!--Form with header-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
      
       <!--Grid column-->

    </div>

</div>
<?php include_once('common/footer.php'); ?>