<?php 
include_once '../../class/daysOffClass.php';
$id=$_GET['ID'];
daysOff::approve($id);
header('location:../../pages/viewdayOffRequests.php');

 ?>