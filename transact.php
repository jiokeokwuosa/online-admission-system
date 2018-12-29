<?php
    session_start();
    require_once'functions.php';
    
    if(isset($_REQUEST['action'])){
       
       $action=$_REQUEST['action'];
       
        switch($action){
            
        
            case'Create Account':
               
                $validate=new Validator($_POST);
                $validate->validate_signup();
                
                  if($validate->getIsValid()){
                  
                   $db=new Database('localhost','christ4life','','admission');
                   $db->connect();
                   $db->select('user_info_table',array('login_id'=>$_POST['login_id']));
                        if($db->numRow()>0){
                          $_SESSION['d']=true; 
                          header("location:signup.php");  
                        }else{                   
                            $save=$db->insert('user_info_table',$_POST);                   
                            if($save){
                                $_SESSION['a']=true;
                            } else{
                                $_SESSION['b']=true;
                                }                             
                            header("location:signup.php"); 
                         }         
                 }else{
                     $my_error='';
                     $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                      header("location:signup.php");
                   } 
             
            break;
            
            
            case'Login':
            
                $validate=new Validator($_POST);
                $validate->validate_login();
                
                if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','admission');
                    $db->connect();
                    $result=$db->select('user_info_table',array('login_id'=>$_POST['login_id'],'password'=>$_POST['password']));
                        if($db->numRow()==1){
                          $_SESSION['login']=true;
                          $_SESSION['login_id']=$_POST['login_id'];
                          $row=mysqli_fetch_assoc($result);
                          $_SESSION['access_level']=$row['access_level'];                         
                          header('location:index1.php');    
                        }else{
                            $_SESSION['b']=true;
                            header("location:index.php");  
                                  
                          }
                }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:index.php");
                  }
            
            
            break;           
            
            
            case 'logout':
                        
                session_destroy();
                header('location:index.php');
                
            break;
            
            
            
            case'Modify Account':
            
                $validate=new Validator($_POST);
                $validate->validate_modify();
                
                  if($validate->getIsValid()){
                  
                   $db=new Database('localhost','christ4life','','admission');
                   $db->connect();
                   $save=$db->update('user_info_table',$_POST,array('login_id'=>$_SESSION['login_id']));                   
                        if($save){
                            $_SESSION['e']=true;
                        } else{
                            $_SESSION['b']=true;
                            }                             
                    header("location:signup.php"); 
                               
                 }else{
                     $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:signup.php");
                   } 
                       
            
            break;
            
            
            
            case'Change':
            
                $validate=new Validator($_POST);
                $validate->validate_password();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','admission');
                        $db->connect();
                        
                        $db->select('user_info_table',array('password'=>$_POST['old_password'],'login_id'=>$_SESSION['login_id']));
                        $numrow=$db->numRow();
                        if($numrow==1){
                          $status=$db->update('user_info_table',array('password'=>$_POST['new_password']),array('login_id'=>$_SESSION['login_id']));
                          if($status){
                            $_SESSION['b']=true;
                          }else{
                            $_SESSION['c']=true;
                           }
                          
                        }else{
                           $_SESSION['a']=true;
                            
                        }
                      
                       header("location:changepassword.php"); 
                      }else{
                        $error=$validate->getError();
                         foreach($error as $a=>$b){
                               $my_error.=$b;
                               $my_error.="<br>";                   
                         } 
                         $_SESSION['d']=$my_error;   
                         header("location:changepassword.php");
                       }
                    
                      
            
            break;           
            
            
            case'Manage Account':
            
                $validate=new Validator($_POST);
                $validate->validate_modify();
                
                  if($validate->getIsValid()){
                  
                   $db=new Database('localhost','christ4life','','admission');
                   $db->connect();
                   $save=$db->update('user_info_table',$_POST,array('login_id'=>$_SESSION['key']));                   
                        if($save){
                            $_SESSION['e']=true;
                        } else{
                            $_SESSION['b']=true;
                            }                             
                     header("location:signup.php?key=".$_SESSION['key']); 
                               
                 }else{
                     $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:signup.php?key=".$_SESSION['key']);
                   } 
                       
            
            break;          
           
           
            case 'Add Programme':
                        
                $validate=new Validator($_POST);
                $validate->validate_course();
                
                  if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','admission');
                    $db->connect();
                    $db->select('programme',array('programme'=>$_POST['programme']));
                    $result=$db->numRow();
                        if($result>0){
                            $_SESSION['b']=true;
                            header("location:courseupload.php");                            
                        }else{
                            $save=$db->insert('programme',array('programme'=>$_POST['programme']));
                                if($save){
                                    $_SESSION['a']=true;
                                    header("location:courseupload.php");
                                }else{
                                    $_SESSION['d']=true;
                                    header("location:courseupload.php");
                                  }
                           }
                    
                    
                  }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:courseupload.php");
                   }
            
                
            break;
            
            
            case 'Drop View':
                    
                    
                    if(strlen($_POST['article_text'])>24){
                        
                        $db=new Database('localhost','christ4life','','admission');
                        $db->connect();
                        $result=$db->insert('articles',array('login_id'=>$_SESSION['login_id'],'article_text'=>$_POST['article_text']));
                        
                        if($result){
                            $_SESSION['b']=true;
                        }else{
                            $_SESSION['c']=true;
                          }
                                           
                        header('location:forum.php');
                    }else{
                        
                        $_SESSION['a']=true;
                        header('location:forum.php'); 
                      }
                                       
             
             break;
             
             
             
             case 'Drop Comment':
                   
                   if(strlen($_POST['comment_text'])>16){
                            
                            $db=new Database('localhost','christ4life','','admission');
                            $db->connect();
                            $result=$db->insert('comments',array('login_id'=>$_SESSION['login_id'],'comment_text'=>$_POST['comment_text'],'article_id'=>$_SESSION['article_id']));
                            
                            if($result){
                                $_SESSION['b']=true;
                            }else{
                                $_SESSION['c']=true;
                              }
                                               
                            header('location:viewnews.php#status');
                   }else{
                            
                            $_SESSION['a']=true;
                            header('location:viewnews.php#status'); 
                      }
                 
             break;
             
             
             case 'Save Info':
             
                  if(isset($_FILES['file']['size']) and !empty($_FILES['file']['size'])){
                  
                    $db=new Database('localhost','christ4life','','admission');
                    $db->connect();
                    $result=$db->insert('application',$_POST);
                    
                      if($result){
                               $name=$db->insert_id();
                               
                               $validate= new Validator($_FILES);
                               $validate->validate_image();
                               $dir='D:\xampp\htdocs\online admission system\documents\\';
                                
                                if($validate->getIsValid()){
                                    
                                    $upload=new Upload($_FILES,$dir);
                                    $upload->createImage();
                                    
                                    $result=$upload->save($name);
                                    
                                        if($result){
                                            $_SESSION['b']=$name;
                                        }else{
                                            $_SESSION['d']=true;
                                           }
                                        header("location:register.php");  
                                }else{
                                    $error=$validate->getError();
                                     foreach($error as $a=>$b){
                                           $my_error.=$b;
                                           $my_error.="<br>";                   
                                     } 
                                     $_SESSION['c']=$my_error;   
                                     header("location:register.php");
                                 }
                               
                           
                        }
                        
                        
                        
                        
                }else{
                     $_SESSION['a']=true;
                     header("location:register.php");
                  }            
                                       
                                              
                       
            break;          
                        
            
            case 'approvePayment':
                                   
               $id=isset($_GET['code'])? $_GET['code']:'';
               $key=isset($_GET['key'])? $_GET['key']:'';
             
                if(is_numeric($id) and isset($_SESSION['access_level'])){
                                
                    $db=new Database('localhost','christ4life','','admission');
                    $db->connect();
                    $result=$db->update('application', array('payment_status'=>'true'),array('id'=>$id));
                                           
                    header("location:check.php?key=$key");
               }
               
            break;
            
            
            case 'approveAdmission':
                                   
               $id=isset($_GET['code'])? $_GET['code']:'';
               $key=isset($_GET['key'])? $_GET['key']:'';
             
                if(is_numeric($id) and isset($_SESSION['access_level'])){
                                
                    $db=new Database('localhost','christ4life','','admission');
                    $db->connect();
                    $result=$db->update('application', array('admission_status'=>'true'),array('id'=>$id));
                                           
                    header("location:check.php?key=$key");
               }
               
            break;
            
                 
                
            
            
            
         
            
            
            
        }
        
    }






















?>