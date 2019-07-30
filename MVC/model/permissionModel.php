<?php
require_once "../class/DBHelper.php";
require_once "../class/CRUDinterface.php";
    class permissionModel implements CRUD
    {
        public function __construct($id)
        {
            
            $this->DB = new helper("localhost", "root", "","se1");
            $object = $this->DB->selectIndexedArray("*", "permission", NULL );
        }

        function create($dataArray)
    {
        $this->DB->insert("permission", $dataArray);
		
	}
    
	function readAllTable(){
		$indexedArray = array();
		$innerJoinSelection = "SELECT permission.ID, permission.userTypeID, permission.linkID, link.friendlyName, usertype.type FROM permission INNER JOIN link ON link.ID=permission.linkID INNER JOIN usertype ON permission.userTypeID=usertype.ID WHERE permission.isDeleted = 0";
		
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
        $output = $this->DB->selectIndexedArray($selection, "permission", NULL);
    }

	function update($ID,$dataArray)
	{
		$this->DB->update("permission", $dataArray, $ID);
		
	}

	function delete($ID)
	{
		$this->DB->delete("permission", $ID);
	
	}

	function getLinks()
	{
		
		$links = $this->DB->selectIndexedArray("*", "link", NULL);
		return $links;
	}
	
	

	function getUserTypes()
	{
		
		$userTypes = $this->DB->selectIndexedArray("*", "usertype", NULL);

		return $userTypes;
	}


 

    }

?>