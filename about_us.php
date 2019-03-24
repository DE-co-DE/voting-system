<?php 
include_once('database/connection.php');
include_once('common/header.php');
include_once('common/functions.php'); ?>
<section id="tabs">
  <div class="container mt-4">
    <h6 class="section-title text-center display-4">About Us</h6>
    <div class="row">
      <div class="col-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            
            <a class="nav-item nav-link active" id="nav-intro-tab" data-toggle="tab" href="#nav-intro" role="tab" aria-controls="nav-intro" aria-selected="false">Introduction</a>
            <a class="nav-item nav-link" id="nav-mission-tab" data-toggle="tab" href="#nav-mission" role="tab" aria-controls="nav-mission" aria-selected="false">Our Mission</a>
            <a class="nav-item nav-link" id="nav-features-tab" data-toggle="tab" href="#nav-features" role="tab" aria-controls="nav-features" aria-selected="false">Features</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        	     <div class="tab-pane fade show active" id="nav-intro" role="tabpanel" aria-labelledby="nav-intro-tab">
        	<div class="row">
        		<div class="col-sm-6">
				<img src="assets/images/hqdefault (1).jpg" class="mt-3 img-fluid w-100">
        		</div>
        		<div class="col-sm-6">
				<article class="text-muted">
					The word <strong>“Vote”</strong> means to choose from a list, to elect or to determine.
Today voting means – travelling to a booth, standing there in queue for hours, getting hand inked to vote. Right2Vote lets voter vote directly from their mobile, from the comforts of their homes and that also within few seconds.<br><br>
Right2Vote is a online based voting platform for college election that allows you to create and manage your own election.<br><br>
College election is very important part of college student life and considered by many politicians as the training ground for political career. There are more than 35,000 colleges in India and most of the colleges have some kind of election or representative selection. More democratic universities like Delhi University have very involved and celebrated election system and have groomed many top leaders of today.<br><br> Student election includes:<br><br>

College election<br>
Department election<br>
Society / Interest group election<br>
Hostel election<br>
Class representative election<br>
University election
<br><br>
College student elections are held every year in most of the colleges. Many universities also have teacher election like DUTA (Delhi University Teachers Association) election in Delhi University.

				</article>
        		</div>
        	</div>
        </div>
     <div class="tab-pane fade show " id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
        	<div class="row">
        		<div class="col-sm-12">
				<article class="text-muted text-center">
					To achieve excellence providing secure and efficient voting solutions and to create value for the organizations we serve.
				</article>
        	</div>
        </div>
        </div>

     <div class="tab-pane fade show " id="nav-features" role="tabpanel" aria-labelledby="nav-features-tab">
        	<div class="row">
        		<div class="col-sm-6">
				<img src="assets/images/advantages_of_mobile_voting.jpg" class="mt-3 img-fluid w-100">
        		</div>
        		<div class="col-sm-6">
				<article class="text-muted p-4">
					<strong>Remote Voting</strong> - We can vote for any place, no need to physically present at voting booth, which improve efficiency. 
					<br>
					<br>
<strong>Convenience</strong> – A system is convenient if it allows voters to cast their votes quickly, in one session, and with minimal equipment or special skills

				</article>
        		</div>
        	</div>
        </div>

    </div>
</div>
</div>
</section>

	<?php include_once('common/footer.php'); ?>