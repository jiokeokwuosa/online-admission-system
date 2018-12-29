<?php 
require_once'header.php';
$title='';
if(isset($_SESSION['access_level']) and $_SESSION['access_level']==1){
    $title='Student';
}else{
    $title='Admin';
}
?>
<br />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 user-agileits clearlink" style="color: #333366;">
                    <h2 class="center color"><?php echo $title;?>'s Dashboard</h2><br />
                     <a href="index1.php"><i class="glyphicon glyphicon-home" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a><br />
          <?php if($title=='Student'){?><a href="register.php"><i class="glyphicon glyphicon-book" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Apply For Admission</a><br />
                     <a href="status.php"><i class="glyphicon glyphicon-plus" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Check Admission Status</a><br />
          <?php }?>
                     <a href="forum.php"><i class="glyphicon glyphicon-home" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Enter Chatroom</a><br />
                     <a href="signup.php"><i class="glyphicon glyphicon-user" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Update Profile</a><br />
                     <a href="changepassword.php"><i class="glyphicon glyphicon-lock" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a><br />
          <?php if($title=='Admin'){?><a href="courseupload.php"><i class="glyphicon glyphicon-plus" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add New Program(s)</a><br />
                     <a href="manageuser.php"><i class="glyphicon glyphicon-pencil" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Student Info</a><br />
                     
                     <?php }?>
                    
                    
                    </div>
                    
                    <div class="col-md-9">
                      <h2 class="center color"><?php echo $title;?>'s Dashboard</h4>
                    
                   