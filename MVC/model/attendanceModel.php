<?php
require_once "../class/DBHelper.php";
require_once "../class/CRUDinterface.php";
    class attendanceModel implements CRUD
    {
        public function __construct()
        {
            
            $this->DB = new helper("localhost", "root", "","se1");
            
        }

        function create($dataArray)
    {
        $this->DB->insert("attendance", $dataArray);
		
	}
    
    function readAllTable()
    {
		$indexedArray = array();
		$innerJoinSelection = "SELECT attendance.ID, attendance.inOrOut, attendance.userID, attendance.time, user.fName, user.lName, user.userType, usertype.type FROM attendance INNER JOIN user ON attendance.userID=user.ID INNER JOIN usertype ON user.userType = usertype.ID WHERE attendance.isDeleted = 0 AND user.userType != 5";
		
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
        return $this->DB->selectIndexedArray("*", "attendance", NULL);
	}
	
	function readAllIn()
	{
        return $this->DB->selectIndexedArray("*", "attendance", "inOrOut = 0");
    }
    
    function readAllOut()
	{
        return $this->DB->selectIndexedArray("*", "attendance", "inOrOut = 1");
	}

	

    function readInSelect($selection)
    {
        $output = $this->DB->selectIndexedArray($selection, "attendance", NULL);
    }

	function update($ID,$dataArray)
	{
		$this->DB->update("attendance", $dataArray, $ID);
		
	}

	function delete($ID)
	{
		$this->DB->delete("attendance", $ID);
	
    }
    
    function getUserTypes()
    {
        return $this->DB->selectIndexedArray("*", "usertype", NULL);
    }

    function getUsers()
    {
        return $this->DB->selectIndexedArray("*", "user", "user.userType != 5");
    }



 

    }

?>