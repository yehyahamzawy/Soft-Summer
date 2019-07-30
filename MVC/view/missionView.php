<?php 
/**
 * 
 */
include_once '../class/missionClass.php';
class missionView
{
	
	function showUnconfirmedMissions($data){
		echo "<table><tr><th>Name</th><th>date</th></tr>";
		foreach ($data as $key) {
			   echo " <tr> <th scope='row'>".$key['id']."</th>
                     <td>".$key['name']."</td>
                     <td>".$key['missionDate']."</td>
                     <td>".$key['Description']."</td>
                     <td class='iconrow'>
                     <a href='../MVC/controller/confirmMissionController.php?ID=".$key['id']."'> Confirm
                     </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='../MVC/controller/deleteMissionController.php?ID=".$key['id']."'> <i class='fas fa-trash'></i></a>
                                                     
                     </td>
                                            </tr>";
		}
	}


	
}
 ?>