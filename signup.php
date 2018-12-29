<?php 
require_once'header.php';
?>
<div class="container">
  
  <div class="col-md-12">
    <br /><br />
		<div class="main-agileits">
			<h2 class="center color">Create Account</h2>
             <?php
                 if(isset($_SESSION['a'])){
                    echo('<div class="alert alert-success center" role="alert">
                            <strong>Congratulations!</strong>
                            <br/>Account was created successfully.
                         </div>');
                    unset($_SESSION['a']);
                 }elseif(isset($_SESSION['b'])){
                      echo('<div class="alert alert-danger center" role="alert">
                            <strong>Oops!</strong>
                            <br/>Error Occured.
                         </div>');
                      unset($_SESSION['b']);
                    }elseif(isset($_SESSION['c'])){
                         $error=$_SESSION['c'];
                      echo("<div class='alert alert-danger center' role='alert'>
                                <strong>Oops!</strong>
                                <br/>$error
                             </div>");
                         unset($_SESSION['c']);
                        }elseif(isset($_SESSION['d'])){
                                    echo("<div class='alert alert-danger center' role='alert'>
                                        <strong>Oops!</strong>
                                        <br/>Login Id Already Exist
                                        </div>");
                                    unset($_SESSION['d']);
                             }elseif(isset($_SESSION['e'])){
                                    echo("<div class='alert alert-success center' role='alert'>
                                        <strong>Congratulations!</strong>
                                        <br/>Account Updated Successfully.
                                        </div>");
                                    unset($_SESSION['e']);
                                }
                                
                                $login_id='';
                                $first_name='';
                                $last_name='';
                                $button='Create Account';
                                
                                if(isset($_SESSION['login'])){
                                   
                                  $db=new Database('localhost','christ4life','','admission');
                                  $db->connect();
                                    if(isset($_GET['key'])){
                                        $button='Manage Account';
                                        $result=$db->select('user_info_table',array('login_id'=>$_GET['key']));
                                        $_SESSION['key']=$_GET['key'];
                                    }else{
                                        $button='Modify Account';
                                        $result=$db->select('user_info_table',array('login_id'=>$_SESSION['login_id']));
                                      }                                  
                                  $row=mysqli_fetch_assoc($result);
                                  extract($row);
                                  echo"<a href=index1.php>Back to Dashboard</a>";
                                }
                        
                             
                ?>
				<form action="transact.php" method="post">
					<div class="key">
						<i class="fa fa-pencil" aria-hidden="true"></i>
						<input  type="text" placeholder="Enter Login Id" name="login_id"  required="" value="<?php echo $login_id;?>"/>
						<div class="clearfix"></div>
					</div>
                    <?php if(! isset($_SESSION['login'])){?>
					<div class="key">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input  type="password"  name="password" required="" placeholder="Enter Password"/>
						<div class="clearfix"></div>
					</div>
                    <div class="key">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input  type="password"  name="password1" required="" placeholder="Confirm Password"/>
						<div class="clearfix"></div>
					</div>
                    
                    <?php }?>
                    <div class="key">
						<i class="fa fa-male" aria-hidden="true"></i>
						<input  type="text" placeholder="Enter First Name" name="first_name"  required="" value="<?php echo $first_name;?>"/>
						<div class="clearfix"></div>
					</div>
                    <div class="key">
						<i class="fa fa-female" aria-hidden="true"></i>
						<input  type="text" placeholder="Enter Last Name" name="last_name"  required="" value="<?php echo $last_name;?>"/>
						<div class="clearfix"></div>
					</div>
                   
                    <div class="key1">
                        <input type="submit" name="action" value="<?php echo $button;?>"/>
                        
                    </div>
					
				</form>
			
			
		</div>

  </div>
  
 

</div>



<?php 
require_once'footer.php';
?>