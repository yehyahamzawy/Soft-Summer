<?php
require_once "../class/DBHelper.php";
require_once "../class/CRUDinterface.php";
require_once "iScheduleDoc.php";
    class scheduleModel implements CRUD, iScheduleDoc
    {
		public $shifts;
		public $users;
		public $days;
		public $DB;
        public function __construct()
        {
			$this->shifts = array();
			$this->users = array();
			$this->days = array();
            $this->DB = new helper("localhost", "root", "","se1");
            
        }

        function create($dataArray)
    {
        $this->DB->insert("shifts", $dataArray);
		
	}
    
	function readAllTable()
	{
		
	}

	function readAll()
	{

	}
	
	

	

    function readInSelect($selection)
    {
        $output = $this->DB->selectIndexedArray($selection, "shifts", NULL);
    }

	function update($ID,$dataArray)
	{
		$this->DB->update("shifts", $dataArray, $ID);
		
	}

	function delete($ID)
	{
		$this->DB->delete("shifts", $ID);
	
	}

	function getDays()
	{
		
		$this->days = $this->DB->selectIndexedArray("*", "days", NULL);
		//return $days;
	}
	
	

	function getUser($ID)
	{
		
		$user = $this->DB->selectFetchArray("*", "user", "ID = $ID");

		return $user;
	}
	
    function getUsers()
    {
        $this->users = $this->DB->selectIndexedArray("*", "user", NULL);
	}
	
    function getUserShifts($userID)
	{
		
		$this->shifts = $this->DB->selectIndexedArray("*", "shifts", "userID = $userID");

		//return $shifts;
	}




	//////////////////////////////////////////////////////////////////decorator
	public function ramadanTimes()
	{
		
		$arr = array();
		
		
		foreach($this->shifts as $Row2)
            {
			
				$seconds1 = strtotime("+60 minutes" , strtotime( $Row2["shiftStart"] ));
				$Row2["shiftStart"] = date("H:i:s", $seconds1);

				$seconds2 = strtotime("-60 minutes" , strtotime( $Row2["shiftEnd"] ));
				$Row2["shiftEnd"] =  date("H:i:s", $seconds2);


				$arrayName = array('dayID' => $Row2["dayID"] ,'ID' => $Row2["ID"], 'shiftStart' => $Row2["shiftStart"], 'shiftEnd' => $Row2["shiftEnd"], 'isDeleted' => $Row2["isDeleted"] );
				array_push($arr,$arrayName);
				
				

			}
			
			$this->shifts = $arr;
	}

	public function overTime()
	{
		
		$arr = array();
		
		
		foreach($this->shifts as $Row2)
            {
			
				

				$seconds2 = strtotime("+
				60 minutes" , strtotime( $Row2["shiftEnd"] ));
				$Row2["shiftEnd"] =  date("H:i:s", $seconds2);


				$arrayName = array('dayID' => $Row2["dayID"] ,'ID' => $Row2["ID"], 'shiftStart' => $Row2["shiftStart"], 'shiftEnd' => $Row2["shiftEnd"], 'isDeleted' => $Row2["isDeleted"] );
				array_push($arr,$arrayName);
				
				

			}
			
			$this->shifts = $arr;
	}
	



	public function alterDay($dayID,$start,$end)
{
	$arr = array();
		$dayTaken = 0;
		
		foreach($this->shifts as $Row2)
            {
				if($Row2["dayID"] == $dayID)
				{
					$dayTaken = 1;
					$arrayName = array('dayID' => $dayID , 'shiftStart' => $start, 'shiftEnd' => $end, 'isDeleted' => 0 );
				array_push($arr,$arrayName);
				}
				else{
				$arrayName = array('dayID' => $Row2["dayID"] ,'ID' => $Row2["ID"], 'shiftStart' => $Row2["shiftStart"], 'shiftEnd' => $Row2["shiftEnd"], 'isDeleted' => $Row2["isDeleted"] );
				array_push($arr,$arrayName);}

			}
			if($dayTaken == 0)
			{
				$arrayName = array('dayID' => $dayID , 'shiftStart' => $start, 'shiftEnd' => $end, 'isDeleted' => 0 );
				array_push($arr,$arrayName);
			}
			
			$this->shifts = $arr;
}
 

    }

?>