<?php 
//Template



class scheduleView
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

function viewUsers($data)
{
 




    echo '
    
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Schedules List</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        
                        
                        
                        
                        
                        <th scope="col">View Schedule</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($data as $Row)
                {
                echo '<tr>
               
                
                <td>'.$Row["fName"].' '.$Row["lName"].'</td>
                
                <td class="iconrow">
                    <a href="userSchedule.php?ID='.$Row["ID"].'">&nbsp;&nbsp;&nbsp;<i class="fas fa-calendar-alt"></i></a>&nbsp;&nbsp;&nbsp;
                    
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

function viewUserSchedule($user, $shifts, $days)
{
  echo '<div class="row">
		
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">'.$user["fName"].' '.$user["lName"].''."'".'s Schedule</h5>
        <div class="card-body">
            <table class="table table-striped">
          
         
          
  <table class="table table-striped">
      <thead>
          
             
              
             
        
          ';

          foreach($days as $Row) 
          {
              echo '<th scope="col">'.$Row["short"].'</th>';
          }
          echo'
          </tr>
      </thead>
      <tbody>
          <tr>';
          $hasShift = 0;
          foreach($days as $Row1)
          {

              $hasShift = 0;

            foreach($shifts as $Row2)
            {

                
              if($Row2["dayID"]==$Row1["ID"])
              {
                echo "<td>From ".$Row2["shiftStart"]." To ".$Row2["shiftEnd"]."</td>";
                $hasShift = 1;
                break;
              }

            }

            if($hasShift == 0)
            {
                echo "<td>Day Off</td>";
            }

          }
          echo'
              
          </tr>
      </tbody>
  </table>    
</div>
</div>
</div>
</div>';
}


function viewUserSchedule2($user, $shifts, $days)
{
  echo '<div class="row">
		
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">'.$user["fName"].' '.$user["lName"].''."'".'s Schedule</h5>
        <div class="card-body">
            <table class="table table-striped">
          
         
          
  <table class="table table-striped">
      <thead>
          
             
              
             
        
          ';

          foreach($days as $Row) 
          {
              echo '<th scope="col">'.$Row["short"].'</th>';
          }
          echo'
          </tr>
      </thead>
      <tbody>
          <tr>';
          $hasShift = 0;
          foreach($days as $Row1)
          {

              $hasShift = 0;

            foreach($shifts as $Row2)
            {

              if($Row2["dayID"]==$Row1["ID"])
              {
                echo "<td>From ".$Row2["shiftStart"]." To ".$Row2["shiftEnd"]."</td>";
                $hasShift = 1;
                break;
              }

            }

            if($hasShift == 0)
            {
                echo "<td>Day Off</td>";
            }

          }
          echo'
              
          </tr>
      </tbody>
  </table>    
</div>
</div>
</div>
</div>';
}

function valuesTable($data)
{
 




    echo '
    
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Permission Table</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Link</th>
                        <th scope="col">User Type</th>
                        
                        <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($data as $Row)
                {
                echo '<tr>
                <th scope="row">'.$Row["ID"].'</th>
                
                <td>'.$Row["friendlyName"].'</td>
                <td>'.$Row["type"].'</td>
                
                <td class="iconrow">
                    <a href="permissionEditForm.php?ID='.$Row["ID"].'"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../MVC/controller/permissionControl.php?ID='.$Row["ID"].'&del"> <i class="fas fa-trash"></i></a>
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
function showPermEdit($data2,$data)
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
              <form class=".form-control-lg" method="POST" action="../MVC/controller/permissionControl.php?permID='.$_GET["ID"].'&updt">
                 
               
                              <label for="inputText3" value=".form-control-lg" class="col-form-label">Link</label>

                              <select class="selectpicker dropup" value=".form-control-lg" name = "linkID">
                                      ';

                                      foreach($data as $Row)
                                      {
                                        echo "<option value = ".$Row["ID"]." >".$Row['friendlyName']." </option>";
                                      }


                                      echo '
                                      
                                  </select>
                                  <br>
                                  <div class="form-group">
              </div>
              <br>                                         
               <label for="inputText3" value=".form-control-lg" class="col-form-label">User Type</label>

               <select class="selectpicker dropup" value=".form-control-lg" name = "userTypeID" >
                       ';
                       foreach($data2 as $Row)
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