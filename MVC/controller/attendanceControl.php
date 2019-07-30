<?php 
require_once "../../class/DBHelper.php";
$DB = new helper("localhost", "root", "","se1");
// if(isset($_GET["del"]))
// {
    
//         $DB->delete("attendance", $_GET["ID"]);
//         header("location:../../pages/.php");
    
// }

// else if(isset($_GET["updt"]))
// {
//     //echo "edit";
//     $DB->update("attendance",$arrayName = array(),$_GET["permID"]);
//     //var_dump($_POST);
//     header("location:../../pages/.php");
// }
// else if(isset($_GET["add"]))
// {
    
//     $DB->insert("attendance",$arrayName = array());
    
//     header("location:../../pages/.php");
// }

if(isset($_GET["IO"]))
{
    if($_GET["IO"]==0)
    {
    $DB->insert("attendance",$arrayName = array('inOrOut' => '0', 'userID' => $_GET["ID"]));
        header("location:../../pages/attendanceForm.php");
    }

    else if($_GET["IO"]==1)
    {
    $DB->insert("attendance",$arrayName = array('inOrOut' => '1', 'userID' => $_GET["ID"]));
        header("location:../../pages/attendanceForm.php");
    }
}

?>