<?php
require_once'database.php';
class Article extends Database{
   protected $save; 
   
   
   public function trim_body($text,$max_length=400,$tail='...'){
        $tail_len=strlen($tail);
    	if(strlen($text)> $max_length){
    		$tmp_text=substr($text,0,$max_length-$tail_len);
    //$max_length-$tail_length becos the $tail contains some characters(...)already that will be included in the main text	
    		if(substr($text, $max_length-$tail_len, 1)== ' '){
    //if an empty space is next after the last truncated character
    
    // note use double space not single space
    			$text = $tmp_text;
    		}
    		else{
    //if not then the truncation happened within a word
    			$pos=strrpos($tmp_text,' ');
    // getting the position of the last space
    			$text=substr($text,0,$pos);		
    		}
    		$text = $text.$tail;		
    	}
    	return $text;
   } 
    
    
   
    
}

?>