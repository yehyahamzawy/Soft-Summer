<?php 
include_once '../../class/daysOffClass.php';
$id=$_GET['ID'];
daysOff::delete($id);
header('location:../../pages/viewdayOffRequests.php');

 ?>