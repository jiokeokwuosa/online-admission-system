<?php
require_once'header1.php';

if(! isset($_SESSION['login'])){
   header('location:index.php'); 
}

?>

<h2 class="color center">Manage Students Info</h2>

<div class="row">
    <div class="col-md-12">
   <?php
   $db=new Database('localhost','christ4life','','admission');
   $db->connect();
   $result=$db->select('user_info_table',array('access_level'=>'1'),array('login_id'=>'desc'));
   $numrow=$db->numRow();
   if($numrow==0){
    echo("<h6 class=title>No Existing Record</h6>");
    
   } else{
   
   ?> 
    <table class="table table-striped table-hover">
    <thead style="background-color: #333366; color: white;">
        <tr>
            
            <th>Login Id</th>
            <th>Name</th>            
            <th>Manage Info</th>
            <th>Manage Application</th>
        </tr>    
    </thead>    
    <tbody>
    
        <?php
        while($row=mysqli_fetch_assoc($result)){ 
            extract($row);
        ?>
        <tr>
            <td><?php echo $login_id;?></td>
            <td><?php echo $last_name.' '.$first_name;?></td>            
            <td><?php  echo"<a  href=signup.php?key=$login_id>";?><i class="glyphicon glyphicon-pencil" style="color: black;"></i></a> </td>
            <td><?php  echo"<a  href=check.php?key=$login_id>";?><i class="glyphicon glyphicon-pencil" style="color: black;"></i></a> </td>          
        </tr> 
        <?php
        }
        ?>              
    </tbody> 
    <tfoot style="background-color: #333366; color: white; text-align: center;">
    <tr>
    <td colspan="4">We have <?php echo $numrow;?> Record(s)</td>
    </tr>
    </tfoot>
    
    </table>
    
     <?php 
   }
   
   ?> 
    
    </div>
</div>


<?php
require_once'footer1.php';
?>