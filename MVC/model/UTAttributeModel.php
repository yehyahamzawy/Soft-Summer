<?php 
require_once "../class/DBHelper.php";
require_once "../class/CRUDinterface.php";

class UTAttModel implements CRUD
{
	public $ID;
	
	
	public $DB;

	function __construct($ID)
	{
		
		$this->DB = new helper("localhost", "root", "","sumdb");

		$Row=$this->DB->selectIndexedArray("*", "usertypeattributes", NULL );
		
		
		
	}

    function create($dataArray)
    {
        $this->DB->insert("usertypeattributes", $dataArray);
		
	}
    
	function readAllTable(){
		$indexedArray = array();
		$innerJoinSelection = "SELECT usertypeattributes.ID, usertypeattributes.attributeID, usertypeattributes.userTypeID,usertype.type, attribute.attributeName FROM usertypeattributes INNER JOIN usertype ON usertype.ID=usertypeattributes.userTypeID INNER JOIN attribute ON usertypeattributes.attributeID=attribute.ID WHERE usertypeattributes.isDeleted = 0";
		
		//echo $innerJoinSelection;
		
		$result = $this->DB->db_query($innerJoinSelection);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
		
	}

	function readAll()
	{

	}
	
	

    function readInSelect($selection)
    {
        $output = $this->DB->selectIndexedArray($selection, "uservalues", NULL);
    }

	function update($ID,$dataArray)
	{
		$this->DB->update("usertypeattributes", $dataArray, $ID);
		
	}

	function delete($ID)
	{
		$this->DB->delete("usertypeattributes", $ID);
	
	}

	function getAttributes()
	{
		$attributes = $this->DB->selectIndexedArray("*", "attribute", NULL);
		return $attributes;
	}
	
	function getUserTypes()
	{
		$userTypes = $this->DB->selectIndexedArray("*", "usertype", NULL);
		return $userTypes;
	}

	


 

}

?>