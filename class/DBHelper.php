<?php
class helper
{
  public $connect;
  public $lastID;
 		
 	function __construct($host, $name, $password, $database)
	{
		$this->db_connect($host, $name, $password, $database);
		
	}
	
  function db_connect($host, $name, $password, $database)
   {
 		  $this->connect = new mysqli($host, $name, $password, $database);
      

        return $this->connect;
  }

  function db_query($query)
  {

    $result = mysqli_query($this->connect, $query);
    
        
    
  return $result;
  }


  function selectFetchArray($selection , $table, $condition)
  {
   
    $sql = "SELECT ".$selection." FROM ".$table." WHERE ".$table.".isDeleted = 0";
    if ($condition != NULL)
    {
      $sql = $sql." AND ".$condition;
    }
    $result = $this->db_query($sql);
    
    
	
  return mysqli_fetch_array($result);
  }

  function selectIndexedArray($selection , $table, $condition)
  {
    $indexedArray = array();
    $sql = "SELECT ".$selection." FROM ".$table." WHERE ".$table.".isDeleted = 0";
    if ($condition != NULL)
    {
      $sql = $sql." AND ".$condition;
    }
    $result = $this->db_query($sql);
    
    
    while($Row = mysqli_fetch_array($result))
    {
      array_push($indexedArray, $Row);
  
    }
    return $indexedArray;
  }

   function insert($table, $data)
  {
    // ----Example:---- $object->insert("user", array("fName" => "new", "lName" => "guy", "userTypeID" => "1");  

      $colms = array_keys($data);
      $values = array_values($data);

      $sql ="INSERT INTO $table(`".join("`,`",$colms)."`) VALUES('".join("','", $values)."')";
      $this->db_query($sql);
      $this->lastID = mysqli_insert_id($this->connect);
      
      
      
     //foreach ($colms as $key => $val) 
      //{
         // $sql = $sql.$val."', '";
      //}
      //$sql = $sql.")";

    //var_dump($sql);
    
    //echo $sql;
    
     
     $sql = "SELECT MAX(ID) AS ID FROM $table WHERE ";

     foreach($data as $key => $val)
     {
         $sql = $sql.$key." = '".$val."' AND ";
     }
     $sql = $sql.array_pop($colms)." = '".array_pop($values)."'";
     
     $result = mysqli_query($this->connect, $sql);
     $Row = mysqli_fetch_array($result);
     $this->logIt("insert",$Row["ID"], $table);
      
      
  }

  function delete($table, $id)
  {
    $sql="UPDATE $table SET  isDeleted='1' WHERE ID=".$id;
    $this->db_query($sql);
    $this->logIt("delete",$id,$table);
  }

  function restore($table, $id)
  {
    $sql="UPDATE $table SET  isDeleted='0' WHERE ID=".$id;
    $this->db_query($sql);
    $this->logIt("restore",$id,$table);
  }

  function update($table, $data, $id)
  {
    $updates = array();

    foreach ($data as $key => $value) 
    {
      array_push($updates," `$key` = '$value' ");
    }
  
    $sql ="UPDATE $table SET ".join(", ",$updates)." WHERE ID = $id";
    //echo $sql;

    $this->db_query($sql);
    
    $this->logIt("update",$id,$table);

  }

  function logIt($action,$rowID,$table)
  {
    $result = $this->selectIndexedArray("*", $table, "ID = $rowID");
    $hashedRow = sha1(json_encode($result));
   
    $sql = "INSERT INTO log (`action`,`hashedRow`,`rowID`,`tableName`) VALUES ('$action','$hashedRow','$rowID','$table')";
    $this->db_query($sql);
    //echo $sql;
  }

  function logValidate($table,$rowID)
  {
    $result = $this->selectIndexedArray("*", $table, "ID = $rowID");
    $currentRowHashed = sha1(json_encode($result));
    
    $sql =  "SELECT MAX(ID) AS ID FROM log WHERE tableName = '$table' AND rowID = '$rowID'";
    //echo $sql;
    $lastUpDateID = mysqli_fetch_array($this->db_query($sql));
    //var_dump($lastUpDateID);

    $sql =  "SELECT hashedRow FROM log WHERE ID =".$lastUpDateID["ID"];
    //echo $sql;
    $lastHashedRow = mysqli_fetch_array($this->db_query($sql));

    if($currentRowHashed == $lastHashedRow["hashedRow"])
    {
      echo "good";
      return TRUE;
    }
    else
    { 
      echo "bad";
      return FALSE;
    }
  }

}
?>