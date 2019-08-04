<?php 
require_once "../../class/DBHelper.php";
session_start();
$DB = new helper("localhost", "root", "","sumdb");
if(isset($_GET["del"]))
{
    
        $DB->delete("uservalues", $_GET["ID"]);
        header("location:../../pages/valuesTable.php");
    
}

else if(isset($_GET["updt"]))
{
    //echo "edit";
    $DB->update("uservalues",$arrayName = array('value' => $_POST["value"], 'userID' => $_POST["userID"], 'userTypeOptionID' => $_POST["userTypeAttributeID"]),$_GET["valID"]);
    //var_dump($_POST);
    header("location:../../pages/valuesTable.php");
}
else if(isset($_GET["add"]))
{
    
    $DB->insert("uservalues",$arrayName = array('value' => $_POST["value"], 'userID' => $_POST["userID"], 'userTypeOptionID' => $_POST["userTypeAttributeID"]));
    //var_dump($_POST);
    header("location:../../pages/valuesTable.php");
}

else if(isset($_GET["rateup"]))
{
    
    $DB->update("reviews",$arrayName = array('commentRating' => ($_GET["commentRating"] + 1)),$_GET["ID"]);
    //var_dump($_POST);
    header("location:../../pages/guestPage.php");
}
else if(isset($_GET["ratedown"]))
{
    
    $DB->update("reviews",$arrayName = array('commentRating' => ($_GET["commentRating"] - 1)),$_GET["ID"]);
    //var_dump($_POST);
    header("location:../../pages/guestPage.php");
}
else if(isset($_GET["rsrv"]))
{
    
    $DB->update("room",$arrayName = array('isAvailable' => 1 ),$_GET["ID"]);
    $DB->insert("reservation",$arrayName = array('userID' => $_SESSION["userID"], 'roomID' => $_GET["ID"] , 'appointment' => $_POST["date"], 'staying' => $_POST["staying"] ));
    var_dump($_POST);
    header("location:../../pages/hotelInfo.php?roomID=".$_GET["ID"]);
}
else if(isset($_GET["cncl"]))
{
    
    $DB->update("room",$arrayName = array('isAvailable' => 0 ),$_GET["ID"]);
    $reserv = $DB->selectFetchArray("ID","reservation","reservation.roomID = ".$_GET["ID"]." AND reservation.checkIn = 0 AND reservation.checkOut = 0");
    $DB->delete("reservation",$reserv["ID"]);
    var_dump($_POST);
    header("location:../../pages/hotelInfo.php?roomID=".$_GET["ID"]);
}

?>