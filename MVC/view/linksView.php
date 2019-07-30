<?php 
//Template



class linksView
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

function addLinkModal()
{
  echo '<div class="row">
  <!-- pop up add/delete window-->
 <!-- Trigger/Open The Modal -->
 <div class="container">
      
      <!-- Trigger the modal with a button -->


<button type="button"id="addattributebtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Link</button>
    
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<div class="modal-body">
<form method="POST" action="../MVC/controller/linksControl.php?add">
<div class="form-group">

<label for="inputText3" class="col-form-label">Friendly Name:</label>
<input id="inputText3" type="text" class="form-control" name = "friendlyName"  pattern="[A-Za-z]{3,}" title="Three or more characters with no spaces" required>

<label for="inputText3" class="col-form-label">URL:</label>
<input id="inputText3" type="text" class="form-control" name = "URL"  
   required>

<label for="inputText3" class="col-form-label">Is Local?</label>

<select class="selectpicker dropup" name = "isLocal" >
  ';
 
   
       echo '<option value= "1"> Yes </option>';
       echo '<option value= "0"> No </option>';
      
   
  
  
  echo '
  </select>
  </div>
<div class="form-group">

</div>
<div class="form-group">



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

function linksTable($data)
{
 




    echo '
    
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Links Table</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">URL</th>
                        <th scope="col">Friendly Name</th>
                        
                        <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($data as $Row)
                {
                echo '<tr>
                <th scope="row">'.$Row["ID"].'</th>
                
                <td>'.$Row["URL"].'</td>
                <td>'.$Row["friendlyName"].'</td>
                <td class="iconrow">
                    <a href="linksEditForm.php?ID='.$Row["ID"].'"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../MVC/controller/linksControl.php?ID='.$Row["ID"].'&del"> <i class="fas fa-trash"></i></a>
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
function showLinksEdit()
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
              <form class=".form-control-lg" method="POST" action="../MVC/controller/linksControl.php?linkID='.$_GET["ID"].'&updt">
                 
               
              <div class="form-group">

              <label for="inputText3" class="col-form-label">Friendly Name:</label>
              <input id="inputText3" type="text" class="form-control" name = "friendlyName">
              
              <label for="inputText3" class="col-form-label">URL:</label>
              <input id="inputText3" type="text" class="form-control" name = "URL">
              
              <label for="inputText3" class="col-form-label">Is Local?</label>
              
              <select class="selectpicker dropup" name = "isLocal" >
                ';
               
                 
                     echo '<option value= "1"> Yes </option>';
                     echo '<option value= "0"> No </option>';
                    
                 
                
                
                echo '
                </select>
              
              </div>
              <br>                                         
               
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