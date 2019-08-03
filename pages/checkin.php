<?php 

require_once "../MVC/view/receptionView.php";
require_once "../MVC/model/guestModel.php";


$view = new guestView(array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" ),"Hello","testing page");
$model = new guestModel(1);



$view->header();
$view->complain();
$view->footer();



?>
