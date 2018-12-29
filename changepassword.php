<?php
require_once'header1.php';

if(! isset($_SESSION['login'])){
   header('location:index.php'); 
}
?>

<form action="transact.php" method="post" name="password" onsubmit="return checkPassword();">
<div class="row">
<?php 
if(isset($_SESSION['a'])){
  echo("<div class='alert alert-danger center' role='alert'>
        <strong>Oops!</strong>
        <br/>Old password not Correct
       </div>");
  unset($_SESSION['a']);
}elseif(isset($_SESSION['b'])){
      echo("<div class='alert alert-success center' role='alert'>
            <strong>Congratulations!</strong>
            <br/>Password Changed Successfully
           </div>");
      unset($_SESSION['b']);
    }elseif(isset($_SESSION['c'])){
          echo("<div class='alert alert-danger center' role='alert'>
                <strong>Oops!</strong>
                <br/>Error Changing Password
               </div>");
          unset($_SESSION['c']);
        }elseif(isset($_SESSION['d'])){
             $error=$_SESSION['d'];
             echo("<div class='alert alert-danger center' role='alert'>
                    <strong>Oops!</strong>
                    <br/>$error
                 </div>");
             unset($_SESSION['d']);
          }

?>
<h2 class="color center">Change Password</h2>
 <div class="col-md-4"></div>
 
 <div class="col-md-4 user-agileits contact-left cont" style="text-align: center;">
 
        <div class="key">
    		<i class="fa fa-lock" aria-hidden="true"></i>
    		<input  type="password"  name="old_password" required="" placeholder="Old Password"/>
    		<div class="clearfix"></div>
    	</div>
        <div class="key">
    		<i class="fa fa-lock" aria-hidden="true"></i>
    		<input  type="password"  name="new_password" required="" placeholder="New Password"/>
    		<div class="clearfix"></div>
    	</div>
        <div class="key">
    		<i class="fa fa-lock" aria-hidden="true"></i>
    		<input  type="password"  name="new_password1" required="" placeholder="Confirm Password"/>
    		<div class="clearfix"></div>
    	</div>
        
        <div class="key1">
         <input type="submit" name="action" value="Change" id="passwordbutton"/>
        </div>
    
    
     
     
     
 
 </div>
 
 <div class="col-md-4"></div>



</div>

</form>



<?php
require_once'footer1.php';
?>
