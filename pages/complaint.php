<?php 

require_once "../MVC/view/receptionView.php";
require_once "../MVC/model/receptionModel.php";


$view = new receptionView(array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" ),"Hello","testing page");
$model = new receptionModel(1);
$users = $model->getComplaintUsers();


$view->header();
$view->complain($users);
$view->footer();



?>
