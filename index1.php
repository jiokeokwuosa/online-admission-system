<?php
require_once'header1.php';

if(! isset($_SESSION['login'])){
   header('location:index.php'); 
}
?>
<div class="row">
    <div class="statistics-grids clearlink">
        <?php if($title=='Student'){?>
        <div class="col-md-4 statistics-grid">
          <a href="register.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Apply 4 Admission</h5>
				<p>You are one click away from applying for Admission, report any problem through the chatroom.</p>
			</div>
          </a>
        </div><?php }else{?>
                        <div class="col-md-4 statistics-grid">
                          <a href="courseupload.php">
                			<div class="statistic">
                				<h4>80%</h4>
                				<h5>Add Programmes?</h5>
                				<p>You are one click away from adding a new programme, report any problem to ur<br /> the authority.</p>
                			</div>
                          </a>
                        </div>
                   <?php }?>

        <div class="col-md-4 statistics-grid">
          <a href="signup.php">
			<div class="statistic">
				<h4>85%</h4>
				<h5>Update Info.</h5>
				<p>You can update your personal information from here, the likes of ur login ID, firstname and lastname</p>
			</div>
          </a>
      	</div>

        <div class="col-md-4 statistics-grid">
          <a href="changepassword.php">
			<div class="statistic">
				<h4>100%</h4>
				<h5>Change Password</h5>
				<p>Do you know u can change your password? yes you can.<br /> check it out!.</p>
			</div>
          </a>
		</div>
		
		<div class="clearfix"></div>
    </div>

</div>





















<?php
require_once'footer1.php';
?>
