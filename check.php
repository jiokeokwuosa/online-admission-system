<?php
require_once'header1.php';

if(! isset($_SESSION['login'])){
   header('location:index.php'); 
}

if(isset($_GET['key'])){
    $_SESSION['key']=$_GET['key'];
}

?>

<h2 class="color center">Approve Payment/Admission</h2>

<div class="row">
    <div class="col-md-12">
   <?php
   $db=new Database('localhost','christ4life','','admission');
   $db->connect();
   $result=$db->select('application',array('login_id'=>$_SESSION['key']), array('id'=>'DESC'));
   $numrow=$db->numRow();
   if($numrow==0){
    echo("<h3 class=center color>No Existing Record</h3>");
    
   } else{
   
   ?> 
    <table class="table table-striped table-hover">
    <thead style="background-color: #333366; color: white;">
        <tr>
            
            <th>Application Date</th>
            <th>Depositor Name</th>            
            <th>Programme</th>
            <th>Approve Payment</th>
            <th>Approve Admission</th>
            <th>View Application</th>
            
        </tr>    
    </thead>    
    <tbody>
    
        <?php
        while($row=mysqli_fetch_assoc($result)){ 
            extract($row);
        ?>
        <tr>
            <td><?php echo date('d-m-y',strtotime($date_of_application));?></td>
            <td><?php echo $id;?></td> 
            <td><?php echo $programme;?></td>             
            <td><?php             
            if($payment_status=='false'){
              echo"<a title='Approve' href=transact.php?key=$login_id&code=$id&action=approvePayment><i class='glyphicon glyphicon-check' style='color: black;'></i></a>";  
            }else{echo('Approved');} ?> </td>  
           <td><?php             
            if($admission_status=='false'){
              echo"<a title='Approve' href=transact.php?key=$login_id&code=$id&action=approveAdmission><i class='glyphicon glyphicon-check' style='color: black;'></i></a>";  
            }else{echo('Approved');} ?> </td> 
        <td><?php  echo"<a title='View' href=register.php?key=$id>";?><i class="glyphicon glyphicon-pencil" style="color: black;"></i></a> </td>        
        </tr> 
        <?php
        }
        ?>              
    </tbody> 
    <tfoot style="background-color: #333366; color: white; text-align: center;">
    <tr>
    <td colspan="6">We have <?php echo $numrow;?> Record(s)</td>
    </tr>
    </tfoot>
    
    </table>
    
     <?php 
   }
   
   ?> 
    
    </div>
</div>


<?php
require_once'footer.php';
?>