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
else if(isset($_GET["ratedown"]))
{
    
    $DB->update("reviews",$arrayName = array('commentRating' => ($_GET["commentRating"] - 1)),$_GET["ID"]);
    //var_dump($_POST);
    header("location:../../pages/guestPage.php");
}
else if(isset($_GET["rsrv"]))
{
    
    $DB->update("room",$arrayName = array('isAvailable' => 1 ),$_GET["ID"]);
    //var_dump($_POST);
    header("location:../../pages/guestPage.php");
}

?>