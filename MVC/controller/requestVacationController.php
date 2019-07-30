<?php 
include '../../class/daysOffClass.php';
$userID=224;
$date=$_POST['from']." ".$_POST['till'];
$type=$_POST['radio-inline'];
$reason=$_POST['text'];

daysOff::requestDayOff($userID,$date,$type,$reason);
header('location:../../pages/daysOff.php');


 ?>