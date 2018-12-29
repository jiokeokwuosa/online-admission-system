<?php

class Database{
    protected $host;
    protected $username;
    protected $password;
    protected $database_name;
    public $conn;
    protected $data=array();
    protected $data1=array();
    protected $database_table;
    protected $result;
    protected $insert_id;
    protected $order;
    protected $limit;
        
    
    
    
    public function __construct($host,$username,$password,$database_name){
        if(empty($host) or empty($username) or empty($database_name)){
         die('Missing database Config File');            
        }
      $this->host=$host;
      $this->username=$username;
      $this->password=$password;
      $this->database_name=$database_name;        
    }
   
   
   
    public function connect(){
     $this->conn=new mysqli($this->host,$this->username,$this->password,$this->database_name);   
      if($this->conn->connect_error){
        die('Database Connection couldn\'t be established');
      }  
    }
    
    
    
    public function insert($table,array $params){
       if(empty($params) or !is_array($params) or empty($table)){
        die("Invalid Data");
       } 
      
       $this->database_table=$table;
       $this->data=$params;
       
       $query='REPLACE INTO ';
       $query.=$this->database_table.' (';
       
        foreach($this->data as $field=>$value){
            if($field !='action' and $field !='file' and $field !='password1'){
               $query.='`';
               $query.=$field;
               $query.='`,'; 
             }  
        }
        $query=rtrim($query,',');
        $query.=') VALUES (';
                
        foreach($this->data as $field=>$value){
             if($field !='action' and $field !='file' and $field !='password1'){
               $query.='\'';
               $query.=$value;
               $query.='\','; 
             }
        }
        $query=rtrim($query,',');
        $query.=')';
       return $this->conn->query($query);
        
    }
    
    
    
    public function select($table, array $where=array(),array $order=array(),$limit=''){
     if(!is_array($where) or empty($table) or !is_array($order)){
        die("Invalid Data");
       }
       
       $this->database_table=$table; 
       $this->data=$where;
       $this->order=$order;
       $this->limit=$limit;
       
       
       $query='SELECT * FROM ';
       $query.=$this->database_table;
       
       if(!empty($this->data)){
           $query.=' WHERE ';
           
           foreach($this->data as $field=>$value){
                if($field !='action' and $field !='file'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\''.' AND ';
                }
           }
           $length=strlen($query)-5;
           $query=substr_replace($query,"",$length);
       }
       
       if(!empty($this->order)){
           $query.=' ORDER BY ';
           
           foreach($this->order as $field=>$value){
                
                  $query.='`'.$field.'` '.$value;
                
           }
           
       }
       
       if(!empty($this->limit)){
           $query.=' LIMIT ';
                      
        $query.=$limit;
         
       }
       
       $this->result=$this->conn->query($query);  
       
       return $this->result; 
        
    }
    
    
    public function update($table, array $params, array $where){
       if(empty($params) or !is_array($params) or empty($table) or empty($where) or ! is_array($where)){
        die("Invalid Data");
       } 
        $this->database_table=$table; 
        $this->data=$params;
        $this->data1=$where;
        
        
        $query='UPDATE ';
        $query.=$this->database_table;
        $query.=' SET ';
        
        foreach($this->data as $field=>$value){
                if($field !='action' and $field !='image_id' and $field !='session_id'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\',';
                }
           }
        $query=rtrim($query,',');
        $query.=' WHERE ';
        
        foreach($this->data1 as $field=>$value){
               
                  $query.='`'.$field.'`'.'='.'\''.$value.'\' AND ';
                
           }
        
        $length=strlen($query)-5;
       echo $query=substr_replace($query,"",$length);
        
        $result=$this->conn->query($query);
        return $result;
    
        
    }
    
    
    
    public function delete($table, array $where){
       if(empty($table) or empty($where) or ! is_array($where)){
        die("Invalid Data");
       } 
        
        $this->database_table=$table; 
        $this->data=$where;
        
        
        $query='DELETE FROM ';
        $query.=$this->database_table;
        $query.=' WHERE ';
        
        foreach($this->data as $field=>$value){
                if($field !='action' and $field !='file'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\'AND';
                }                
           }
        $length=strlen($query)-3;
        $query=substr_replace($query,"",$length);   
        
        $result=$this->conn->query($query);
        return $result;
    
        
    }
    
    
      
    public function insert_id(){
        return $this->conn->insert_id;
    }
    
    public function numRow(){
        return $this->conn->affected_rows;
                
    } 
    
    public function sumAll(array $where){
        $query="SELECT SUM(credit_unit) AS total FROM registration WHERE ";
        $this->data=$where;
        
        foreach($this->data as $field=>$value){
                if($field !='action' and $field !='file'){
                  $query.='`'.$field.'`'.'='.'\''.$value.'\'AND';
                }                
           }
        $length=strlen($query)-3;
        $query=substr_replace($query,"",$length);               
        
        return   $this->conn->query($query);
    }
    
    public function getUserName($login_id){ 
        $result=$this->select('user_info_table',array('login_id'=>$login_id));  
        $row=mysqli_fetch_assoc($result);
        extract($row);
        return $last_name.' '.$first_name;       
        
    }    
    
    public function getCommentNo($article_id){ 
        $result=$this->select('comments',array('article_id'=>$article_id));
        $num=$this->numRow();
        return $num;       
        
    }
    
    public function listProgramme($programme1=null){
        $selectTermList='<option value="">Select Programme</option>';
        $result=$this->select('programme');
        if($this->numRow()>0){
          while($row=mysqli_fetch_assoc($result)){            
            extract($row);
            $selected=null;
            if($programme==$programme1){
               $selected="selected=selected"; 
            }
            
          $selectTermList.="<option $selected value=$programme>$programme</option>";
          }  
        }
        return $selectTermList;        
    }
     
  
        
    
}


?>