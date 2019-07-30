<?php 
include_once '../../class/notificationClass.php';
$id=$_GET['ID'];
$loc=$_GET['prev'];
notification::setIsRead($id);
header("location:".$loc);

 ?>