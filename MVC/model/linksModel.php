<?php
require_once "../class/DBHelper.php";
require_once "../class/CRUDinterface.php";
    class linksModel implements CRUD
    {
        public function __construct($id)
        {
            
            $this->DB = new helper("localhost", "root", "","se1");
            $object = $this->DB->selectIndexedArray("*", "link", NULL );
        }

        function create($dataArray)
    {
        $this->DB->insert("links", $dataArray);
		
	}
    
	function readAllTable(){
		
        return $this->DB->selectIndexedArray("*", "link", NULL);

		
	}

	function readAll()
	{

	}
	
	

	

    function readInSelect($selection)
    {
        $output = $this->DB->selectIndexedArray($selection, "link", NULL);
    }

	function update($ID,$dataArray)
	{
		$this->DB->update("link", $dataArray, $ID);
		
	}

	function delete($ID)
	{
		$this->DB->delete("link", $ID);
	
	}



 

    }

?>