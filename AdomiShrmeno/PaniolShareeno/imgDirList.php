<?php

$TotalImag =dirToArray('/home/da1i56y0bngldesh/public_html/media/imgAll/2019January');

foreach($TotalImag as $img){
    echo $img .'<br/>';
}


function dirToArray($dir) { 
   
   $result = array(); 

   $cdir = scandir($dir); 
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".","..",".htaccess",".thumbs","SM"))) 
      { 
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
         { 
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
         } 
         else 
         { 
            $result[] = $value; 
         } 
      } 
   } 
   
   return $result; 
} 