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

function table($data)
{
 




    echo '
    <script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin = "Anonymous"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity = "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin = "Anonymous"></script>
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity = "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin = "Anonymous"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    
    <div class="card">
        <h5 class="card-header">Rooms</h5>
        <div class="card-body">
            <table class="table table-striped" id = "tabla">
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
                
                
                  echo '<td> 
                    
                    <a href="hotelInfo.php?roomID='.$Row["ID"].'"><i class="fa fa-eye" aria-hidden="true"></i>
                    View</a>';
                    if($Row["isAvailable"]==1)
                {
                    echo "</br>Reserved";
                } 
                    echo'</td>
                  ';
                
                
            echo '</tr>';
                }
                   
                    
                echo '</tbody>
            </table>
            <script>
            $("#tabla").DataTable();
        </script>
    </div>
</div>
</div>
</div>


';




}

function reservation($data,$ratingTotal,$reserver)
{
  echo '
  <style>
  .jumbotron {
    background: #358CCE;
    color: #FFF;
    border-radius: 0px;
    }
    .jumbotron-sm { padding-top: 24px;
    padding-bottom: 24px; }
    .jumbotron small {
    color: #FFF;
    }
    .h1 small {
    font-size: 24px;
    }
  </style>
  
  
  <div class="jumbotron jumbotron-sm">
   <div class="card-body"><div class="container">
 
      <div class="row">
          <div class="col-sm-12 col-lg-12">
              <h1 class="h1">
                  Hotel Info <small> Rating: '.$ratingTotal.'</small></h1>
          </div>
      </div>
  </div>
</div>
<div class="container">
  <div class="row">
      <div class="col-md-8">
          <div class="well well-sm">
              <form method = "POST" action = "../MVC/controller/guestControl.php?ID='.$data["ID"].'&rsrv">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="date">
                              When will you see us?</label>
                          <input type="date" class="form-control" id="date" name="date"  min="2019-08-04" max="2020-08-04" title = "Bad date" required = "Required">
                      </div>
                      <div class="form-group">
                          </div>
                      <div class="form-group">
                          <label for="subject">
                              How long are you staying?</label>
                          <select id="staying" name="staying" class="form-control" required="required">
                              <option value="1" selected="1">1 Night</option>
                              ';
                              $i = 2;
                              while($i < 30)
                              {
                              echo '<option value="'.$i.'" >'.$i.' Nights</option>';
                              $i++;
                              }
                              
                              echo'
                          </select>
                          <address>
                          <strong>
                          </br> <img src="'.$data["img"].'" alt="" border=3 height=280 width=340></img></strong><br>
                          
                      </address>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">
                              Special request?</label>
                          <textarea name="request" id="request" class="form-control" rows="4" cols="25" 
                              placeholder="Type Request"></textarea>
                      </div>
                  </div>
                  <div class="col-md-12">
                  ';
                if($data["isAvailable"]==0)
                {
                    echo '<button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                    Reserve</button>';
                }
                
                else {
                  echo "room not available";
                } 

               
            
                   
                    
                echo '
                      
                  </div>
              </div>
              </form>';
              if(!empty($_SESSION))
              { 
              if($_SESSION["userID"]==$reserver)
              {
                  echo '<form method = "POST" action = "../MVC/controller/guestControl.php?ID='.$data["ID"].'&cncl">
                  <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                  Cancel Reservation</button>
                  </form>';
              }
              }
         echo' </div>
      </div>
      <div class="col-md-4">
          <form>
          <legend><span class="glyphicon glyphicon-globe"></span>'.$data["title"].'</legend>
          <legend><span class="glyphicon glyphicon-globe"></span></br>Description</legend>
          <address>
              <strong></strong><br>
              '.$data["description"].'
          </address>
         
          </form>
      
          </div></div>
  </div>
</div>';
}

function reviews($reviews)
{
  echo '
    
    
    <div class="card">
        <h5 class="card-header">Reviews</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th scope="col">Reviewer</th>
                <th scope="col">Comment</th>
                <th scope="col">Rating</th>
                <th scope="col">Review Helpful?</th>
                </thead>
                <tbody>';

                foreach($reviews as $Row)
                {
                echo '<tr>
                
                
                <td>'.$Row["fName"].' '.$Row["lName"].'</td>
                <td>'.$Row["comment"].'</td>
                <td>'.$Row["rating"].'</td>
                ';
                
                echo '
                <form method="POST" action="../MVC/controller/guestControl.php?rateup&ID='.$Row["ID"].'&commentRating='.$Row["commentRating"].'">
                <td><button type="submit"id="addattributebtn" class="btn btn-info btn-lg" ><i class="fas fa-thumbs-up"> </i>
                </form>

                <form method="POST" action="../MVC/controller/guestControl.php?ratedown&ID='.$Row["ID"].'&commentRating='.$Row["commentRating"].'">
                </button><button type="submit"id="addattributebtn" class="btn btn-info btn-lg"><i class="fas fa-thumbs-down"></i></button>'.$Row["commentRating"].'</td>
                </form>
                ';
                
                
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