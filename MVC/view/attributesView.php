<?php 

class attributesview{
private $title1;
private $title2;
private $previous;

  public function __construct()
  {
  $this->title1 = "Hello everyone xD";
  $this->title2 = "Attributes testing page";
  $this->previous =  array('editor' => "../pages/editor.php", 'checker' => "../pages/checker.php" );
  }

  public function showheader()
  {
    $title1=$this->title1;
    $title2=$this->title2;
    $previous=$this->previous;
  // $Vdata = file_get_contents('../adminPanel/basicPageHeader.php');
  // echo $Vdata;
  include('../adminPanel/basicPageHeader.php');
  }
  public function showfooter()
  {
    // $Vdata = file_get_contents('adminPanel/basicPageFooter.php');
    // echo $Vdata;
    include ('../adminPanel/basicPageFooter.php');
  }
public function showmodal($Row)

{
  echo ' 
  <button type="button"id="addattributebtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Attribute</button>
                            
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <form method="POST" action="attributeAdd.php">
              <div class="form-group">
                      <label for="inputText3" class="col-form-label">Attribute Name</label>
                      
                      <input id="inputText3" type="text" class="form-control" name = "attributeName"  pattern="[A-Za-z]{3,}" title="Three or more characters with no spaces" required >
                  </div>
              <div class="form-group">
                      <label for="inputText3" class="col-form-label">DataType</label>
                      
                      <select class="selectpicker dropup" name = "attributeDType" >
                      ';
                      foreach ($Row as $key) {
                        echo "<option value=".$key['ID'].">".$key['name']."</option>";
                    }
                      
                      echo '
                      </select>
                      </div>
  </div>
  <div class="modal-footer">
  <button type="Submit" class="btn btn-default">Submit</button>
</form>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>

</div>
  ';
}
public function showtable($data)
{
  echo'
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
  <div class="card">
  <h5 class="card-header">Attribute Table</h5>
  <div class="card-body">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Attribute</th>
                  <th scope="col">DataType</th>
                  <th scope="col">Edit/Delete</th>
              </tr>
          </thead>
  
          ';  

          
          foreach ($data as $Row) 
          {
            echo ' <tr><th scope="row">'.$Row["ID"].'</th>
                    <td>'.$Row["attributeName"].'</td>
                    <td>'; echo $Row['type']; echo '</td>';
              echo ' <td class="iconrow">
                  <a href="../pages/testhazem.php?ID='.$Row["ID"].'"><i class="fas fa-edit"  ></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="../controllers/attributeDelete.php?ID='.$Row["ID"].'"> <i class="fas fa-trash"></i></a>
                </td>
                  </tr>';
          }
           echo '
          <tbody>
          </tbody>
          </table>
      </div>
  </div>
  </div>
  
  </div>
  </div>
  ';
}

public function form($IdToEdit)
    {
        
        $attributes = new Attribute($IdToEdit);
       
        $variable = $attributes->ReadAll();
        
        $IDchoosed=$IdToEdit;
       
        $attribute=new attribute($IDchoosed);
        
        $Row=$attribute->ReadAll();
        
        $attributeTypes = new attributeType(1);
        
        $output = $attributeTypes->ReadAll();
       
        echo '<div class="card">               
            <div class="card-body">
            <form class=".form-control-lg" method = "POST" action ="../../controllers/attributeEdit.php"><br>
                <div class="form-group">
                    <select name=attributeID>';
    
        foreach ($variable as $key) {
            echo "<option value=" . $key['ID'] . ">" . $key['attributeName'] . "</option>";
        }

        echo '</select><br>
            <label for="inputText3" class="col-form-label">New Attribute Name</label>
            <input id="inputText3" value='. $Row[$IDchoosed]["attributeName"] .'        type="text" class="form-control" name = "attributeName">';
        
        echo '</div><br>                                
            <label for="inputText3" value=".form-control-lg" class="col-form-label">type</label>
            <select class="selectpicker dropup" name = "attributeDType" >';
        
        foreach ($output as $i) 
        {
            echo "<option value=" . $i['ID'] . ">" . $i['name'] . "</option>";
           
          echo'  <br>';
        }
        echo '</select><!-- </select> -->';
        echo'
            <div class="col-sm-6 pl-0">
                <p class="text-right">
                    <button type="submit"  class="btn btn-space btn-primary">Submit</button>
                    <button class="btn btn-space btn-secondary">Cancel</button>
                </p>
            </div>
            </form>
            </div>
            </div>';
        


    }

}


































