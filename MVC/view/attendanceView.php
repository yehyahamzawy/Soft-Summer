<?php 
//Template



class attendanceView
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

// function edit()
// {
//   echo '<div class="row">
//   <!-- pop up add/delete window-->
//  <!-- Trigger/Open The Modal -->
//  <div class="container">
      
//       <!-- Trigger the modal with a button -->


// <button type="button"id="addattributebtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Link</button>
    
// <!-- Modal -->
// <div class="modal fade" id="myModal" role="dialog">
// <div class="modal-dialog">

// <!-- Modal content-->
// <div class="modal-content">
// <div class="modal-header">
// <button type="button" class="close" data-dismiss="modal">&times;</button>

// </div>
// <div class="modal-body">
// <form method="POST" action="../MVC/controller/linksControl.php?add">
// <div class="form-group">

// <label for="inputText3" class="col-form-label">Friendly Name:</label>
// <input id="inputText3" type="text" class="form-control" name = "friendlyName">

// <label for="inputText3" class="col-form-label">URL:</label>
// <input id="inputText3" type="text" class="form-control" name = "URL">

// <label for="inputText3" class="col-form-label">Is Local?</label>

// <select class="selectpicker dropup" name = "isLocal" >
//   ';
 
   
//        echo '<option value= "1"> Yes </option>';
//        echo '<option value= "0"> No </option>';
      
   
  
  
//   echo '
//   </select>
//   </div>
// <div class="form-group">

// </div>
// <div class="form-group">



//   </div>
// </div>
// <div class="modal-footer">
// <button type="Submit" class="btn btn-default" >Submit</button>
// </form>
// <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
// </div>
//           </div>
          
//         </div>
//       </div>
      
//     </div>
//     <br><br>';
// }

function attendanceForm($data)
{
 




    echo '
    
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Attendance</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        
                        
                        <th scope="col">In/Out</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($data as $Row)
                {
                echo '<tr>
               
                
                <td>'.$Row["fName"].' '.$Row["lName"].'</td>
                
                <td class="iconrow">
                    <a href="../MVC/controller/attendanceControl.php?ID='.$Row["ID"].'&IO=0"><i class="fas fa-sign-in-alt"></i></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="../MVC/controller/attendanceControl.php?ID='.$Row["ID"].'&IO=1"> <i class="fas fa-sign-out-alt"></i></i></a>
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



function viewAttendance($data)
{
 




    echo '
    
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Attendance List</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">User Type</th>
                        
                        <th scope="col">Time</th>
                        
                        
                        <th scope="col">In/Out</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($data as $Row)
                {
                echo '<tr>
               
                
                <td>'.$Row["fName"].' '.$Row["lName"].'</td>
                <td>'.$Row["type"].'</td>
                <td>'.$Row["time"].'</td>
                <td>';
                if($Row["inOrOut"] == 0)
                {
                    echo "In";
                }
                else if($Row["inOrOut"] == 1)
                {
                    echo "Out";
                }
                echo'</td>
                
                
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





}


?>