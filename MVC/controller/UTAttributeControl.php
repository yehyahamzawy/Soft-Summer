<?php 
require_once "../../class/DBHelper.php";
$DB = new helper("localhost", "root", "","se1");
if(isset($_GET["del"]))
{
    
        $DB->delete("usertypeattributes", $_GET["ID"]);
        header("location:../../pages/userAttributeTable.php");
    
}

else if(isset($_GET["updt"]))
{
    //echo "edit";
    $DB->update("usertypeattributes",$arrayName = array('userTypeID' => $_POST["userTypeID"], 'attributeID' => $_POST["attributeID"]),$_GET["UTAID"]);
    //var_dump($_POST);
    header("location:../../pages/userAttributeTable.php");
}
else if(isset($_GET["add"]))
{
    
    $DB->insert("usertypeattributes",$arrayName = array('userTypeID' => $_POST["typeId"], 'attributeID' => $_POST["attributeId"]));
    //var_dump($_POST);
    header("location:../../pages/userAttributeTable.php");
}

?>