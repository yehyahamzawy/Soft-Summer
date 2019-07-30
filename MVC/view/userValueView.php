<?php 
//Template



class userValueView
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

function addValueModal($data1, $data2)
{
  echo '<div class="row">
  <!-- pop up add/delete window-->
 <!-- Trigger/Open The Modal -->
 <div class="container">
      
      <!-- Trigger the modal with a button -->


<button type="button"id="addattributebtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add User Value</button>
    
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<div class="modal-body">
<form method="POST" action="../MVC/controller/userValueControl.php?add">
<div class="form-group">
<label for="inputText3" class="col-form-label">Attributes</label>

<select class="selectpicker dropup" name = "userTypeAttributeID" >
  ';
 
   foreach($data1 as $Row)
   {
       echo '<option value= '.$Row["ID"].'> '.$Row["attributeName"].' ('.$Row["type"].') </option>';
      
   }
  //echo '<option value= '.$data["ID"].'>'.$data["value"].' ('.$func.'('.$data["userTypeAttributeID"].')'.')</option>';
  
  echo '
  </select>
  </div>
<div class="form-group">
<label for="inputText3" class="col-form-label">Value</label>
<input id="inputText3" type="text" class="form-control" name = "value"  pattern="[A-Za-z]{3,}" title="Three or more characters with no spaces" required>
</div>
<div class="form-group">
<label for="inputText3" class="col-form-label">User</label>

<select class="selectpicker dropup" name = "userID" >';
  
foreach($data2 as $Row)
{
    echo '<option value= '.$Row["ID"].'> '.$Row["fName"].' '.$Row["lName"].' ('.$Row["type"].')</option>';
   
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

function valuesTable($data)
{
 




    echo '
    
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">UserValue Table</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Attribute</th>
                        <th scope="col">Value</th>
                        <th scope="col">User Full Name</th>
                        <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($data as $Row)
                {
                echo '<tr>
                <th scope="row">'.$Row["ID"].'</th>
                
                <td>'.$Row["attributeName"].'</td>
                <td>'.$Row["value"].'</td>
                <td>'.$Row["fName"].' '.$Row["lName"].'</td>
                <td class="iconrow">
                    <a href="valueEditForm.php?ID='.$Row["ID"].'&attID='.$Row["attributeID"].'"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../MVC/controller/userValueControl.php?ID='.$Row["ID"].'&del"> <i class="fas fa-trash"></i></a>
                </td>
            </tr>';
                }
                   
                    
                echo '</tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
';




}
function showValuesEdit($data, $users)
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
              <form class=".form-control-lg" method="POST" action="../MVC/controller/userValueControl.php?valID='.$_GET["ID"].'&updt">
                 
               
                              <label for="inputText3" value=".form-control-lg" class="col-form-label">attributes</label>

                              <select class="selectpicker dropup" value=".form-control-lg" name = "userTypeAttributeID">
                                      ';

                                      foreach($data as $Row)
                                      {
                                        echo "<option value = ".$Row["ID"]." >".$Row['attributeName']." (".$Row['type'].")</option>";
                                      }


                                      echo '
                                      
                                  </select>
                                  <br>
                                  <div class="form-group">
                  <label for="inputText3" class="col-form-label">value</label>
                  <input id="inputText3" type="text" class="form-control" name = "value"  pattern="[A-Za-z]{3,}" title="Three or more characters with no spaces" required>
              </div>
              <br>                                         
               <label for="inputText3" value=".form-control-lg" class="col-form-label">users</label>

               <select class="selectpicker dropup" value=".form-control-lg" name = "userID" >
                       ';
                       foreach($users as $Row)
                       {
                         echo "<option value = ".$Row["ID"]." >".$Row['fName']." ".$Row['lName']."</option>";
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