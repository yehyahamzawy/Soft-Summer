<?php 

require_once "../MVC/view/receptionView.php";
require_once "../MVC/model/guestModel.php";


$view = new guestView(array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" ),"Hello","testing page");
$model = new guestModel(1);

//$room = $model->roomData(1);
//$allRooms = $model->getRooms();
//$roomRating = $model->roomRating(1);

$view->header();
//$view->table($allRooms);
//$view->reservation($room,$roomRating);
//$view->reviews($reviews);
$view->footer();



?>
