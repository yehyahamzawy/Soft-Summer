<?php 

require_once "../MVC/view/guestView.php";
require_once "../MVC/model/userValueModel.php";


$view = new guestView(array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" ),"Hello","testing page");


$view->header();
$view->Table();
$view->footer();



?>
