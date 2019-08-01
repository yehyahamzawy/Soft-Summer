<?php 

require_once "../MVC/view/userValueView.php";
require_once "../MVC/model/userValueModel.php";

$model = new userValueModel(1);
$view = new userValueView(array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" ),"Hello","testing page");
$data1 = $model->readAllTable();
$data2 = $model->readAllModal();
$data3 = $model->readAllModalUsers();
$data4 = $model->getUsers();

$view->header();
$view->addValueModal($data2,$data3);
$view->valuesTable($data1);
//$view->showValuesEdit($data2,$data4);
$view->footer();



?>