<?php 

require_once "../MVC/view/guestView.php";
require_once "../MVC/model/guestModel.php";
session_start();

$view = new guestView(array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" ),"Hello","testing page");
$model = new guestModel(1);
$reviews = $model->reviewsData($_GET["roomID"]);
$room = $model->roomData($_GET["roomID"]);
//$allRooms = $model->getRooms();
$roomRating = $model->roomRating($_GET["roomID"]);
$reserver = $model->reserverID($_GET["roomID"]);

$view->header();
//$view->table($allRooms);
$view->reservation($room,$roomRating,$reserver);
$view->reviews($reviews);
$view->footer();



?>
