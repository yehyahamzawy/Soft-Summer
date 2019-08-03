<?php 

require_once "../MVC/view/guestView.php";
require_once "../MVC/model/guestModel.php";


$view = new guestView(array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" ),"Hello","testing page");
$model = new guestModel(1);
$reviews = $model->reviewsData();
$room = $model->roomData($_GET["roomID"]);
//$allRooms = $model->getRooms();
$roomRating = $model->roomRating($_GET["roomID"]);

$view->header();
//$view->table($allRooms);
$view->reservation($room,$roomRating);
$view->reviews($reviews);
$view->footer();



?>
