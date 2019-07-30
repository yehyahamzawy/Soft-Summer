<?php 
require_once "../../class/DBHelper.php";
$DB = new helper("localhost", "root", "","se1");
if(isset($_GET["del"]))
{
    
        $DB->delete("permission", $_GET["ID"]);
        header("location:../../pages/permissionTable.php");
    
}

else if(isset($_GET["updt"]))
{
    //echo "edit";
    $DB->update("permission",$arrayName = array('linkID' => $_POST["linkID"], 'userTypeID' => $_POST["userTypeID"]),$_GET["permID"]);
    //var_dump($_POST);
    header("location:../../pages/permissionTable.php");
}
else if(isset($_GET["add"]))
{
    
    $DB->insert("permission",$arrayName = array('linkID' => $_POST["linkID"], 'userTypeID' => $_POST["userTypeID"]));
    
    header("location:../../pages/permissionTable.php");
}

?>