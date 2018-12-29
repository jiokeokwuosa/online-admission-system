<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title>Admission System</title>
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" />  
       
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
    body{width: 100%;background-image: url('image/welcome.jpeg'); background-attachment: fixed;background-size: 100%;} 
    .login{color:#333366; font-weight: bolder; font-family: verdana;}
    .button{font-weight: bolder; color: #333366;}
    .fieldset1{width:20%; color:green ; }
    legend{color: #333366; font-family: tahoma; font-weight: bolder;}
    .error{ color: red; font-family: Candara;text-align: center;}
     a{text-decoration: none; color: #333366;}
    </style>
</head>

<body>
<div class="container">
<fieldset class="fieldset1">
<legend>Login Details</legend>
<form method="post" action="transact.php">

<table class="login">
<tr >
<th colspan="2"><small style="margin-bottom: 8px;">Student/Admin</small></th>
</tr>




<tr>
<td><small>Login Id:</small></td>
<td><input type="text" placeholder="Enter Login Id" size="20" name="login_id" style="margin-bottom: 8px;"/></td>
</tr>


<tr>
<td><small>Password:</small></td>
<td><input type="password" placeholder="Enter Password" size="20"  name="password" style="margin-bottom: 8px;"/> </td>
</tr>

<tr></tr>
<tr></tr>

<tr>
<td></td>
<td><input type="submit" value="Login" class="button" name="action" /> <input type="reset" value="Cancel" class="button" style="margin-bottom: 8px;"/></td>
</tr>

<tr style="text-align: center;">
<td colspan="2"><small><a href="signup.php">Create Account</a></small></td>

</tr>

</table>

</form>
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
            <br/>Invalid Reg.Number/Password
         </div>");
    unset($_SESSION['b']);
 }
?>
</fieldset>
</div>
</body>
</html>