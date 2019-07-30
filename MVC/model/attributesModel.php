<?php 
require_once "../class/DBHelper.php";
require_once "../class/CRUDinterface.php";

class attributes implements CRUD
{
	public $ID;
	
	public $attributeName;
	public $type;
	public $DB ;
	public $output = array();
	public $updatedAt;
	public $Row=array();
	function __construct($ID)
	{
		
	
		$this->DB = new helper("localhost", "root", "" ,"newdb");
		$this->Row=$this->DB->selectIndexedArray("*", "attribute", " ID = $ID" );
		
		
	}

    function create($dataArray)
    {
        $this->DB->insert("attribute", $dataArray);
		
	}
    
	function readAll(){
		$output = $this->DB->selectIndexedArray("*", "attribute", NULL);
		return $output;
	}
    function readInSelect($selection)
    {
        $output = $this->DB->selectIndexedArray($selection, "attribute", NULL);
    }


	function update($ID,$dataArray){
		$this->DB->update("attribute", $dataArray, $ID);
		
	}
	function delete($ID){
		$this->DB->delete("attribute", $ID);
	}
}