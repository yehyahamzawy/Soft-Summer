<?php 
//Template



class UTAttView
{
  public $title1;
  public $title2;
  public $previous;

  function __construct($previousArray, $title1, $title2)
  {
    $this->previous = array();
    $this->title1 = $title1;
    $this->title2 = $title2;
    $this->previous = $previousArray;

  }
function header()
{
  $title1 = $this->title1;
  $title2 = $this->title2;
  $previous = $this->previous;
  include_once "../adminPanel/basicPageHeader.php";
}
function footer()
{
  include_once "../adminPanel/basicPageFooter.php";
}

function addUserAttModal($userTypes, $attributes)
{
  echo '<div class="row">
  <!-- pop up add/delete window-->
 <!-- Trigger/Open The Modal -->
 <div class="container">
      
      <!-- Trigger the modal with a button -->
      <button type="button"id="addattributebtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add UserValue Attribute</button>
    
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
            </div>
            <div class="modal-body">
            <form method="POST" action="../MVC/controller/UTAttributeControl.php?add">
                  <div class="form-group">
                          <label for="inputText3" class="col-form-label">Attributes</label>
                          
                          <select class="selectpicker dropup" name = "attributeId" >';

                          
                          foreach($attributes as $Row)
                          {
                              echo '<option value= '.$Row["ID"].'> '.$Row["attributeName"].'  </option>';
                             
                          }
                             echo' </select>
                              </div>
              
                  <div class="form-group">
                          <label for="inputText3" class="col-form-label">user type</label>
                          
                          <select class="selectpicker dropup" name = "typeId" >';
                              
                          foreach($userTypes as $Row)
                          {
                              echo '<option value= '.$Row["ID"].'> '.$Row["type"].'  </option>';
                             
                          }
                                  
                              echo '</select>
                              </div>
            </div>
            <div class="modal-footer">
                  <button type="Submit" class="btn btn-default" >Submit</button>
                  </form>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
    <br><br>';
  

}

function userAttTable($data)
{
 




    echo '
    
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">UserValue Table</h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Attribute</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Edit/Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                       
                                        foreach($data as $Row)
                                        {
                                        echo '<tr>
                                        <th scope="row">'.$Row["ID"].'</th>
                                        
                                        <td>'.$Row["attributeName"].'</td>
                                        <td>'.$Row["type"].'</td>
                                       
                                        <td class="iconrow">
                                        <a href="UTAttributeEditForm.php?ID='.$Row["ID"].'&updt"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="../MVC/controller/UTAttributeControl.php?ID='.$Row["ID"].'&del"> <i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>';
                                        }
                                            
                                        echo'</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
          </div>
          </div>

';




}
function showUTAttEdit($data, $userTypes)
{
  echo'<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="section-block" id="basicform">
          <h3 class="section-title">update user value</h3>
          <!-- ============================================================== -->

<!-- ============================================================== -->
      </div>
      <div class="card">
          
          <div class="card-body">
              <form class=".form-control-lg" method="POST" action="../MVC/controller/UTAttributeControl.php?UTAID='.$_GET["ID"].'&updt">
                 
               
                              <label for="inputText3" value=".form-control-lg" class="col-form-label">Attribute</label>

                              <select class="selectpicker dropup" value=".form-control-lg" name = "attributeID">
                                      ';

                                      foreach($data as $Row)
                                      {
                                        echo "<option value = ".$Row["ID"]." >".$Row['attributeName']."</option>";
                                      }


                                      echo '
                                      
                                  </select>
                                  <br>
                                  
              <br>                                         
               <label for="inputText3" value=".form-control-lg" class="col-form-label">User Type</label>

               <select class="selectpicker dropup" value=".form-control-lg" name = "userTypeID" >
                       ';
                       foreach($userTypes as $Row)
                       {
                         echo "<option value = ".$Row["ID"]." >".$Row['type']."</option>";
                       }
                       
                       
                       echo'
                   </select>
                   <br>




                                  
                      </div>
           
                  <div class="col-sm-6 pl-0">
                      <p class="text-right">
                          <button type="submit" class="btn btn-space btn-primary">Submit</button>
                          <button class="btn btn-space btn-secondary">Cancel</button>
                      </p>
                  </div>
              </form>
          </div>
          </div>
          </div>';
}




}


?>








<?php 
 //include_once "../adminPanel/basicPageHeader.php";
$shet = '

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php
include "../dbheader.html";

?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <?php
include "../dashboard.php";

?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Database Control </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Database Control</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">UserValue Attribute Table</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                    <div class="row">
                        <!-- pop up add/delete window-->
                       <!-- Trigger/Open The Modal -->
                       <div class="container">
                            
                            <!-- Trigger the modal with a button -->
                            <button type="button"id="addattributebtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add UserValue Attribute</button>
                          
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                                  </div>
                                  <div class="modal-body">
                                  <form method="POST" action="uservalueattributeAdd.php">
                                        <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Attributes</label>
                                                
                                                <select class="selectpicker dropup" name = "attributeId" >
                                                   
                                                    </select>
                                                    </div>
                                    
                                        <div class="form-group">
                                                <label for="inputText3" class="col-form-label">type</label>
                                                
                                                <select class="selectpicker dropup" name = "typeId" >
                                                    
                                                   
                                                        
                                                    </select>
                                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                        <button type="Submit" class="btn btn-default" >Submit</button>
                                        </form>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            
                          </div>
                          <br><br>
                        <!--end of popup add/delete window-->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">UserValue Table</h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Attribute</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Edit/Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
          </div>
          </div>
         
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php
include "../dbfooter.html";

?>
            
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>

';

//include_once "../adminPanel/basicPageFooter.php";
?>