<?php 
include_once '../../class/financeClass.php';
$id=$_GET['ID'];
finance::confirmFinance($id);
header('location:../../pages/confirmFinancialRequest.php');	
 ?>