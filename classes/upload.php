<?php

class Upload{
    protected $data;
    protected $tmp;
    protected $directory;
    protected $table;
    protected $image;
    
    
    public function __construct(array $params,$dir){
        if( !is_array($params) or empty($dir)){
            die('invalid data for Upload');
        }
        $this->directory=$dir;
        $this->data=$params;
        foreach($this->data as $a=>$b){
              $this->tmp=$b['tmp_name'];  
             }
      
    }  
    
    
    
    public function createImage(){
        list($width, $height, $type, $attr) = getimagesize($this->tmp);
        $error = "The file you uploaded is not a supported filetype";
        	 switch ($type) {
                case IMAGETYPE_GIF:
                   $image = imagecreatefromgif($this->tmp) or die($error);
                    break;
                case IMAGETYPE_JPEG:
                   $image = imagecreatefromjpeg($this->tmp) or die($error);
                    break;
                case IMAGETYPE_PNG:
                    $image = imagecreatefrompng($this->tmp) or die($error);
                    break;
                default:
                    die($error);
            }
     $this->image=$image;       
    }
    
  
  
    public function save($name){     
    return imagejpeg($this->image, $this->directory.$name. '.jpg');   
    }
    
    public function saveFile($name,$extension){
      return  move_uploaded_file($this->tmp,$this->directory.$name.$extension);        
    }
  
  
  
    
    
}

?>