<?php 
include_once '../class/userClass.php';
include_once '../class/userTypeClass.php';
/**
 * 
 */
class userView
{
	private $title;
	function __construct($title){
		$this->title=$title;
	}
	function showTitle($int){
		echo "<h".$int.">".$this->title."</h".$int.">";
	}
	function showDoctorDropDown(){
		$data=User::readType(3);
		echo '<select name="doctor">';
			foreach ($data as $doctor) {
				echo '<option value='.$doctor['ID'].'>'.$doctor['fName'].' '.$doctor['lName'].'</option>';
			}
			echo '</select>';

	}
	function showDriverDropDown(){
		$data=User::readType(1);

		echo '<select name="driver">';
			foreach ($data as $driver) {
				echo '<option value='.$driver['ID'].'>'.$driver['fName'].' '.$driver['lName'].'</option>';
			}
			echo '</select>';

	}
	function showPsychDropDown(){
		$data=User::readType(4);

		echo '<select name="psych">';
			foreach ($data as $psych) {
				echo '<option value='.$psych['ID'].'>'.$psych['fName'].' '.$psych['lName'].'</option>';
			}
			echo '</select>';

}	

	function showAssistantDropDown(){
		$data=User::readType(2);

		echo '<select name="assistant">';
			foreach ($data as $assistant) {
				echo '<option value='.$assistant['ID'].'>'.$assistant['fName'].' '.$assistant['lName'].'</option>';
			}
			echo '</select>';

	}

	function showMissionForm(){
		echo "<div  id='missionForm'><form action='../controllers/createMission.php' method='POST'>";

		echo "<h4>Mission name:</h4>";
		echo "<input type='text'  name='name' pattern='[A-Za-z][A-Za-z ]{2,}' title='Three or more characters' required><br> ";
		echo "<h4>Mission date:</h4>";
		echo "<input type='date'  name='date' min='2019-05-22' max='2030-12-31' required>";
		echo "<h4>Doctor:</h4>";
		$this->showDoctorDropDown();
		echo "<br>";
		echo "<br>";
		echo "<h4>Driver</h4>";
		$this->showDriverDropDown();
		echo "<br>";
		echo "<br>";
		echo "<h4>Psychologist</h4>";
		$this->showPsychDropDown();
		echo "<br>";
		echo "<br>";
		echo "<h4>Assistant</h4>";
		$this->showAssistantDropDown();
		echo "<br>";
		echo "<br>";
		echo "<h4>Description and Location</h4>";	
		
		echo "<input type='text' style='width: 300px; height: 200px' name='info' pattern='[A-Za-z0-9][A-Za-z0-9 ]{2,}' title='Three or more characters' required><br><br>";
		echo "<input type='submit' ></form></div>";
		
	}




	function showReportForm($ID){
		$user=new User(sha1($ID));
		$type=new userType($user->getUserType());
		echo "<h3>".$type->readTypeName()." Report</h3>";
		echo "<form action='../controllers/createReport.php' method='POST'>
				<input type='textarea' name ='report' style='height:200px;width:300px'><br><input type='submit'></form>
				";
	}

	function showChildren(){
		$data=User::readType(5);
			echo '<div style="text-align: center"><table>
                <tr>
                    <th>Child Name</th>

                <th>Age</th>
            </tr>';
                  
              
			foreach ($data as $children) {
					echo "<tr><td>".$children['fName']." ". $children['lName'] ."</td><td>12</td></tr>";

				}
				echo '</table></div>';

	}
	function childForm(){
		$user=new User(0);
		$data=$user->showForm(5);
		foreach ($data as $children) {
					echo $children ;

				}	
	}
	function ReadUsers($var){
		
                                                    foreach ($var as $key) {
                                                    	$type=new userType($key['userType']);
                                                            echo " <tr> <th scope='row'>".$key['ID']."</th>
                                                <td>".$key['fName']."</td>
                                                <td>".$key['lName']."</td>
                                                <td> ".$type->ReadTypeName()."</td>
                                                <td>".$key['isDeleted']."</td>
                                                <td>".$key['createdAt']."</td>
                                                <td>".$key['updatedAt']."</td>
                                                <td class='iconrow'>
                                                <a href='../controllers/editusertable.php?ID=".sha1($key['ID'])."'> 
                                                <i class='fas fa-edit' ></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <a href='../controllers/deleteUser.php?ID=".sha1($key['ID'])."'> <i class='fas fa-trash'></i></a>
                                                     
                                                </td>
                                            </tr>";
	}}
	function editUserForm($ID){


	}
	static function financialRequestForm(){
		echo " <div style='text-align:center'>
                <form method='POST' action='../MVC/controller/makeFinancialRequest.php'>
                Amount: <input type='number' name='amount'><br><br>
                Reason: <input type='textarea' name='reason'><br><br>
                <input type='submit' name=''><br>
                </form>
                </div>";
	}
	function showUnconfirmedFinance($data){
		
		echo "<div style='text-align:center'><table><tr><th>amount</th><th>reason</th><th>Request Maker</th></tr>";
		foreach ($data as $key) {
			$user=new User(sha1($key['userID']));
			   echo " <tr> <th scope='row'>".$key['ID']."</th>
                     <td>".$key['amount']."</td>
                     <td>".$key['reason']."</td>
                     <td>".$user->getFname()."</td>
                     <td class='iconrow'>
                     <a href='../MVC/controller/confirmFinanceController.php?ID=".$key['ID']."'> Confirm
                     </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='../MVC/controller/deleteFinanceController.php?ID=".$key['ID']."'> <i class='fas fa-trash'></i></a>
                                                     
                     </td>
                                            </tr>";
		}
		echo "</table></div>";
	}
	function vacationRequests($data){
		echo "<div style='text-align:center'><table><tr><th>date</th><th>reason</th><th>type</th><th>Person</th></tr>";
		foreach ($data as $key) {
			$user=new User(sha1($key['userID']));
			   echo " <tr> <th scope='row'>".$key['ID']."</th>
                     <td>".$key['date']."</td>
                     <td>".$key['type']."</td>
                     <td>".$key['text']."</td>
                     <td>".$user->getFname()." ".$user->getlName()."</td>
                     <td class='iconrow'>
                     <a href='../MVC/controller/approveVacationController.php?ID=".$key['ID']."'> Confirm
                     </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='../MVC/controller/deleteVacationController.php?ID=".$key['ID']."'> <i class='fas fa-trash'></i></a>
                                                     
                     </td>
                                            </tr>";
		}
		echo "</table></div>";
	}

}


 ?>