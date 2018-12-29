<?php 
require_once'header1.php';
$level='';
$department='';
$semester='';
$button='Add Programme';
?>



<h2 class="color center">Add New Programme</h2>

<?php  
    if(isset($_SESSION['c'])){
      $error=$_SESSION['c'];
      echo("<div class='alert alert-danger center' role='alert'>
            <strong>Oops!</strong>
            <br/>$error
         </div>");
     unset($_SESSION['c']);
    }elseif(isset($_SESSION['b'])){
          echo("<div class='alert alert-danger center' role='alert'>
                <strong>Oops!</strong>
                <br/>The Data already Exists
               </div>");
          unset($_SESSION['b']);
        }elseif(isset($_SESSION['a'])){
              echo("<div class='alert alert-success center' role='alert'>
                    <strong>Congratulations</strong>
                    <br/>Data Inserted Successfully
                   </div>");
              unset($_SESSION['a']);
           }elseif(isset($_SESSION['d'])){
                echo("<div class='alert alert-danger center' role='alert'>
                        <strong>Cops!</strong>
                        <br/>Error Inserting Data
                       </div>");
                unset($_SESSION['d']);
              }                        
            
                       
    
?>
<form action="transact.php" method="post">
<div class="row">
    <div class="col-md-3">    
    
    </div>
    
    <div class="col-md-6">
        
        <div class="key">
    		<i class="fa fa-text-height" aria-hidden="true"></i>
    		<input  type="text"  name="programme" required="" placeholder="Enter Programme"/>
    		<div class="clearfix"></div>
    	</div>
    
    </div>
    
    <div class="col-md-3">
        
      
    </div>


</div>



<div class="row">
    <div class="col-md-5">   </div>
    <div class="col-md-4">
      
        <div class="key1">
            <input type="submit" name="action" value="<?php echo $button;?>"/>            
        </div>
    
    </div>
    <div class="col-md-3">   </div>

</div>

</form> 




















<?php 
require_once'footer1.php';
?>