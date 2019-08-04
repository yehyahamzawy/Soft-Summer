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
    
    $DB->insert("user",$arrayName = array('fName' => $_POST["fName"], 'lName' => $_POST["lName"], 'email' => $_POST["email"], 'password' => $_POST["password"], 'userTypeID' => 2));
    var_dump($_POST);
    //header("location:../../pages/login.php");
}

else if(isset($_GET["login"]))
{
    $test = $DB->selectFetchArray("*","user","email = '".$_POST["email"]."' AND password = '".$_POST["password"]."'");
    if(empty($test))
    {
        header("location:../../pages/login.php");
    }
    else
    {
        session_start();
        $_SESSION["userID"] = $test["ID"];
        if($test["userTypeID"]==2)
        {
            header("location:../../pages/guestpage.php");
        }
        if($test["userTypeID"]==3)
        {
            header("location:../../pages/checkin.php");
        }
    }
    var_dump($_POST);
    //header("location:../../pages/login.php");
}



?>