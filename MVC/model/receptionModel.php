<?php 
require_once "../class/DBHelper.php";
require_once "../class/CRUDinterface.php";

class receptionModel implements CRUD
{
	public $ID;
	
	public $relationID;
	public $userID;
	public $value;
	public $DB;
	public $output = array();
    public $updatedAt;
	function __construct($ID)
	{
		
		$this->DB = new helper("localhost", "root", "","sumdb");

		$Row=$this->DB->selectIndexedArray("*", "user", NULL );
		
		
		
	}

    function create($dataArray)
    {
        $this->DB->insert("uservalues", $dataArray);
		
	}
    
	function readAllTable(){
		$indexedArray = array();
		$innerJoinSelection = "SELECT uservalues.ID, uservalues.userTypeAttributeID, uservalues.value, uservalues.userID, usertypeattributes.attributeID, attribute.attributeName,user.fName, user.lName FROM uservalues INNER JOIN usertypeattributes ON uservalues.userTypeAttributeID=usertypeattributes.ID INNER JOIN attribute ON usertypeattributes.attributeID=attribute.ID INNER JOIN user ON uservalues.userID=user.ID WHERE uservalues.isDeleted = 0";
		
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
	
	function readAllModal(){
		$indexedArray = array();
		$innerJoinSelection = "SELECT usertypeattributes.ID, usertypeattributes.userTypeID, usertypeattributes.attributeID, attribute.attributeName, usertype.userType FROM usertypeattributes INNER JOIN usertype ON usertypeattributes.userTypeID=usertype.ID INNER JOIN attribute ON usertypeattributes.attributeID=attribute.ID WHERE usertypeattributes.isDeleted = 0";
		
		//echo $innerJoinSelection;
		
		$result = $this->DB->db_query($innerJoinSelection);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
		
	}

	function readAllModalUsers(){
		$indexedArray = array();
		$innerJoinSelection = "SELECT user.ID,usertypeattributes.userTypeID, usertypeattributes.attributeID, attribute.attributeName, usertype.userType, user.fName, user.lName FROM usertypeattributes INNER JOIN usertype ON usertypeattributes.userTypeID=usertype.ID INNER JOIN attribute ON usertypeattributes.attributeID=attribute.ID INNER JOIN user ON usertypeattributes.userTypeID=user.userTypeID WHERE usertypeattributes.isDeleted = 0";
		
		//echo $innerJoinSelection;
		
		$result = $this->DB->db_query($innerJoinSelection);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
		
	}

    function readInSelect($selection)
    {
        $output = $this->DB->selectIndexedArray($selection, "uservalues", NULL);
    }

	function update($ID,$dataArray)
	{
		$this->DB->update("uservalues", $dataArray, $ID);
		
	}

	function delete($ID)
	{
		$this->DB->delete("uservalues", $ID);
	
	}

	function getAttributeName($userTypeAttributeID)
	{
		$attributeID = $this->DB->selectIndexedArray("attributeID", "usertypeattributes", "ID = $userTypeAttributeID");
		$attributeName = $this->DB->selectIndexedArray("attributeName", "attribute", "ID = ". $attributeID["attributeID"]);
		return $attributeName;
	}
	
	function getUsers()
	{
		$userName = $this->DB->selectIndexedArray("*", "user", NULL);
		return $userName;
	}

	function getUserType($userTypeAttributeID)
	{
		$userTypeID = $this->DB->selectIndexedArray("userTypeID", "usertypeattributes", "ID = $userTypeAttributeID");
		$userTypeName = $this->DB->selectIndexedArray("type", "usertype", "ID = ". $userTypeID["userTypeID"] );

		return $userTypeName;
	}

    function reviewsData($roomID)
    {
        $indexedArray = array();
		$innerJoinSelection = "SELECT reviews.*, user.fName, user.lName FROM reviews INNER JOIN user ON user.ID=reviews.userID WHERE reviews.isDeleted=0 AND reviews.roomID=".$roomID;
		
		//echo $innerJoinSelection;
		
		$result = $this->DB->db_query($innerJoinSelection);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
        
    }
    function roomData($roomID)
    {
        return $this->DB->selectFetchArray("*","room","ID =".$roomID);
    }
    function roomRating($roomID)
    {
         $ratings = $this->DB->selectIndexedArray("rating","reviews","roomID =".$roomID);
         
         $totalRating = 0;
         $i = 0;
         foreach($ratings as $Row)
         {
            $totalRating += $Row["rating"];
            $i++;
            
         }
         if ($i > 0){
         $totalRating = ($totalRating / $i);
         }
         return $totalRating;
    }
    function getRooms()
	{
		$rooms = $this->DB->selectIndexedArray("*", "room", NULL);
		return $rooms;
    }
    
    function getReservedUsers()
	{
		$indexedArray = array();
		$innerJoinSelection = "SELECT user.fName, user.lName, reservation.checkIn, reservation.ID FROM user INNER JOIN reservation ON user.ID=reservation.userID WHERE user.isDeleted = 0 AND reservation.checkIn=0 AND user.userTypeID=2";
		
		//echo $innerJoinSelection;
		
		$result = $this->DB->db_query($innerJoinSelection);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
    }
    
    function getCheckedInUsers()
	{
		$indexedArray = array();
		$innerJoinSelection = "SELECT user.fName, user.lName, reservation.checkIn, reservation.ID FROM user INNER JOIN reservation ON user.ID=reservation.userID WHERE user.isDeleted = 0 AND reservation.checkIn=1 AND user.userTypeID=2";
		
		//echo $innerJoinSelection;
		
		$result = $this->DB->db_query($innerJoinSelection);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
	}


    function getComplaintUsers()
	{
		$indexedArray = array();
		$innerJoinSelection = "SELECT user.*, reservation.checkIn FROM user INNER JOIN reservation ON user.ID=reservation.userID WHERE user.isDeleted = 0 AND reservation.checkIn=1 AND user.userTypeID=2";
		
		//echo $innerJoinSelection;
		
		$result = $this->DB->db_query($innerJoinSelection);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
	}
}

?>