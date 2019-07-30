<?php 
include_once '../../class/missionClass.php';
$id=$_GET['ID'];
Mission::confirmMission($id);
header('location:../../pages/missionConfirm.php');	
 ?>