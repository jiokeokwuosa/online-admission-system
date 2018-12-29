<?php
require_once'header1.php';
?>
 

        
        <br /><br />
    	
    				<h3 class="center color">Application Form</h3>
                   
                <?php
                    if(isset($_SESSION['c'])){
                     $error=$_SESSION['c'];
                     echo("<div class='alert alert-danger center' role='alert'>
                            <strong>Oops!</strong>
                            <br/>$error
                         </div>");
                     unset($_SESSION['c']);
                    }elseif(isset($_SESSION['a'])){
                             echo("<div class='alert alert-danger center' role='alert'>
                                    <strong>Oops!</strong>
                                    <br/>Select file to Upload
                                 </div>");
                             unset($_SESSION['a']);
                            }elseif(isset($_SESSION['b'])){
                                $code=$_SESSION['b'];
                                 echo("<div class='alert alert-success center' role='alert'>
                                        <strong>Congratulation!</strong>
                                        <br/>Application Pending till Payment is confirmed<br>
                                        Pay into GTBank, Account Name:Online Admission<br>Account Number: 00203045464<br>
                                                        Depositor name: $code
                                     </div>");
                                 unset($_SESSION['b']);
                                }elseif(isset($_SESSION['d'])){
                                     echo("<div class='alert alert-danger center' role='alert'>
                                            <strong>Oops!</strong>
                                            <br/>Application not Successful
                                         </div>");
                                     unset($_SESSION['d']);
                                  }                              
                             
                              $first_name='';
                              $middle_name='';
                              $last_name='';
                              $phone_number='';
                              $nextofkin_phone='';
                              $address='';
                              $email='';
                              $date_of_birth='';
                              $gender='';
                              $marital_status='';
                              $place_of_birth='';
                              $home_country='';
                              $programme='';
                              $session='';
                              $button='Save Info';
                              
                              if(isset($_GET['key'])){
                                $button='Modify Info';
                                $db=new Database('localhost','christ4life','','admission');
                                $db->connect();
                                $result=$db->select('application',array('id'=>$_GET['key']));
                                    if($db->numRow()>0){
                                      $row=mysqli_fetch_assoc($result);
                                      extract($row);  
                                    }
                                    
                              }    
                              
                                        
                ?>
              
    		
 <form action="transact.php" method="post" enctype="multipart/form-data">
             <div class="row">
                <div class="col-md-4">
    					<div class="key">
    						<i class="fa fa-user" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter First Name" name="first_name"  required="" value="<?php echo $first_name;?>"/>
    						<div class="clearfix"></div>
    					</div>
                </div>
                
                <div class="col-md-4">                
                    <div class="key">
    						<i class="fa fa-user" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Middle Name" name="middle_name"  required="" value="<?php echo $middle_name;?>"/>
    						<div class="clearfix"></div>
    					</div>
                </div>
                <div class="col-md-4"> 
                     <div class="key">
        						<i class="fa fa-user" aria-hidden="true"></i>
        						<input  type="text" placeholder="Enter last Name" name="last_name"  required="" value="<?php echo $last_name;?>"/>
        						<div class="clearfix"></div>
        			</div>
                </div>          
            </div> 
            
            
            <div class="row">
                <div class="col-md-4">  
                    <div class="key">
    						<i class="fa fa-phone" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Phone Number" name="phone_number" value="<?php echo $phone_number;?>"/>
    						<div class="clearfix"></div>
    				</div>
                
                </div>  
                
                <div class="col-md-4"> 
                     <div class="key">
    						<i class="fa fa-phone" aria-hidden="true"></i>
    						<input  type="text" placeholder="Phone:Next of Kin" name="nextofkin_phone" value="<?php echo $nextofkin_phone;?>"/>
    						<div class="clearfix"></div>
    					</div>
                                 
                
                </div>
                
                
                <div class="col-md-4">  
                 
                  <div class="key">
    						<i class="fa fa-home" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Address" name="address"  required="" value="<?php echo $address;?>"/>
    						<div class="clearfix"></div>
    			 </div>              
                
                </div>            
                      
            
            </div> 
            
            
            <div class="row">
                 <div class="col-md-4"> 
                     <div class="key">
    						<i class="fa fa-envelope" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Email" name="email" value="<?php echo $email;?>"/>
    						<div class="clearfix"></div>
    				 </div>  
                 
                 </div>
                 
                 
                 <div class="col-md-4"> 
                    <div class="key">
    						<i class="fa fa-pencil" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Date of Birth(dd-mm-yyyy)" name="date_of_birth" value="<?php echo $date_of_birth;?>"/>
    						<div class="clearfix"></div>
    				</div>                
                 
                 </div>             
                <div class="col-md-4"> 
                    <div class="key">
                        <select name="gender" required="">
                            <option value="">Select Gender</option>
                            <option value="male" <?php if($gender=='male'){echo"selected=selected";}?>>Male</option>
                            <option value="female" <?php if($gender=='female'){echo"selected=selected";}?>>Female</option>                            
                        </select>                        
                    </div>               
                           
               </div>
            </div>    
               
           <div class="row">
                <div class="col-md-4">
                      <div class="key">
                                <select name="marital_status" required="">
                                    <option value="">Marital Status</option>
                                    <option value="single" <?php if($marital_status=='single'){echo"selected=selected";}?>>Single</option>
                                    <option value="married"<?php if($marital_status=='married'){echo"selected=selected";}?>>Married</option> 
                                     <option value="divorced" <?php if($marital_status=='divorced'){echo"selected=selected";}?>>Divorced</option>                           
                                </select>                        
                      </div>
                
                </div>
               
                <div class="col-md-4">
                     <div class="key">
    						<i class="fa fa-pencil" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Place of Birth" name="place_of_birth" value="<?php echo $place_of_birth;?>"/>
    						<div class="clearfix"></div>
    				 </div>                
                 
                
                </div>
                
                <div class="col-md-4">
                    <div class="key">
    						<i class="fa fa-pencil" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Home Country" name="home_country" value="<?php echo $home_country;?>"/>
    						<div class="clearfix"></div>
    				</div>  
                
                </div>
           
           </div>  
           
           <div class="row">
                <div class="col-md-4">
                      <div class="key">
                                <select name="programme" required="">
                                  <?php
                                    $db=new Database('localhost','christ4life','','admission');
                                    $db->connect();
                                    echo  $db->listProgramme($programme);                                 
                                  ?>
                                  
                                  
                                </select>                        
                      </div>
                
                </div>
               
                <div class="col-md-4">
                    <div class="key">
    						<i class="fa fa-pencil" aria-hidden="true"></i>
    						<input  type="text" placeholder="Enter Session" name="session" value="<?php echo $session;?>"/>
    						<div class="clearfix"></div>
    				</div>  
                
                </div>
                
                
                <div class="col-md-4">
                   <?php if(isset($_GET['key'])){
                    ?>
                    <img src="documents/<?php echo $_GET['key'].'.jpg';?>" height="250" width="230" />
                    
                    <?php
                   }else{
                    ?>
                    <div class="key">
    						<i class="fa fa-unlink (alias)" aria-hidden="true"></i>
    						<input  type="file" placeholder="Upload Document" name="file" required=""/>
    						<div class="clearfix"></div>
    				</div>  
                    <?php
                     }?>
                    
                
                </div>
           
           </div>  
           <input type="hidden" name="login_id" value="<?php echo $_SESSION['login_id'];?>"/>
          
          
          <?php 
          if(! isset($_GET['key'])){
            
         
          ?> 
           <div class="row">
            <div class="col-md-12 center">
                <div class="key1">
                            <input type="submit" name="action" value="<?php echo $button;?>"/>
                            
                  </div>
            </div>
           
           
           </div>                     
                  
          <?php }?>      
                        
    					
    				</form>
    			
    			
    		
    
  
 






<?php
require_once'footer.php';
?>