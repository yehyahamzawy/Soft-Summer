<?php 
//Template



class guestView
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
  include_once "../adminPanel/basicGuestHeader.php";
}
function footer()
{
  include_once "../adminPanel/basicPageFooter.php";
}

function Table($data)
{
 




    echo '
    
    
    <div class="card">
        <h5 class="card-header">Rooms</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th scope="col">Image</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Description</th>
                        <th scope="col">Reserve</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($data as $Row)
                {
                echo '<tr>
                
                
                <td><img src="'.$Row["img"].'" alt="" border=3 height=100 width=150></img></td>
                <td>'.$Row["title"].'</td>
                <td>'.$Row["description"].'</td>
                ';
                if($Row["isAvailable"]==0)
                {
                echo '<td><button type="button"id="addattributebtn" class="btn btn-info btn-lg">Reserve</button></td>';
                }
                else {
                    echo "Not Available";
                }   
                
            echo '</tr>';
                }
                   
                    
                echo '</tbody>
            </table>
       
    </div>
</div>
</div>
</div>


';




}
}


?>