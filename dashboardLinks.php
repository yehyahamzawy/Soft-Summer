<?php
require_once "../class/DBHelper.php";

    
       

      
    
	function getLinks(){
        
        $DB = new helper("localhost", "root", "","se1");
        return $DB->selectIndexedArray("*", "link", NULL);

		
    }
    ?>