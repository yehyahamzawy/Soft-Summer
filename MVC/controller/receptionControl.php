<?php 
require_once "../../class/DBHelper.php";
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

else if(isset($_GET["chkin"]))
{
    
    $DB->update("reservation",$arrayName = array('checkIn' => 1 ),$_POST["reservationID"]);
    var_dump($_POST);
    header("location:../../pages/checkin.php");
}

else if(isset($_GET["chkout"]))
{
    
    $DB->update("reservation",$arrayName = array('checkout' => 1 ),$_POST["reservationID"]);
    //var_dump($_POST);
    $rserv = $DB->selectFetchArray("*","reservation","ID=".$_POST["reservationID"]);
    $DB->insert("reviews",$arrayName = array('userID' => $rserv["userID"], 'comment' => $_POST["comment"], 'roomID' => $rserv["roomID"], 'rating' => $_POST["rating"] ));
    $DB->update("room",$arrayName = array('isAvailable' => 0 ),$rserv["roomID"]);
    header("location:../../pages/checkout.php");
}

else if(isset($_GET["cmpln"]))
{
    
    $DB->insert("complaint",$arrayName = array('userID' => $_POST["ID"], 'complaint' => $_POST["complaint"] ));
    var_dump($_POST);
    header("location:../../pages/complaint.php");
}

?>