<?php
include_once '..\MVC\view\attributesView.php';
include_once '..\MVC\model\attributesModel.php';
include_once '..\MVC\view\editAttributeView.php';

//include_once "../class/attributeTypeClass.php";

$modelobj=new attributes(1);
$viewobj=new attributesview();
$editattributeviewobj=new editattributes();



$viewobj->showmodal($modelobj->readAll());
$viewobj->showtable($modelobj->Row);

if (strpos($_SERVER['REQUEST_URI'], 'editAttributeView?ID=') !== FALSE ) {
    
    $editattributeviewobj->form($_GET['ID']);
    
}

 include_once '..\adminPanel\basicPageFooter.php';




?>