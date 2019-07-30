<?php 
include_once '../../class/financeClass.php';
$id=$_GET['ID'];
finance::deleteFinance($id);
header('location:../../pages/confirmFinancialRequest.php');	
 ?>