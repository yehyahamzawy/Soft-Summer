<?php 
include_once '../../class/missionClass.php';
$id=$_GET['ID'];
Mission::deleteMission($id);
header('location:../../pages/missionConfirm.php');	
 ?>