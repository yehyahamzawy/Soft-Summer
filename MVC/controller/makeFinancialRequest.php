<?php 
include_once '../../class/userClass.php';
$amount=$_POST['amount'];
$reason=$_POST['reason'];
$user=new User(sha1(224));
$user->makeFinancialRequest($amount,$reason);

 ?>