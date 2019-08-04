<?php 
//Template



class receptionView
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
  include_once "../adminPanel/basicReceptionHeader.php";
}
function footer()
{
  include_once "../adminPanel/basicPageFooter.php";
}

function table($data)
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
       
    </div>
</div>
</div>
</div>


';




}

function reservation($data,$ratingTotal)
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
                          <label for="name">
                              When will you see us?</label>
                          <input type="date" class="form-control" id="name" placeholder="Enter name" required="required" />
                      </div>
                      <div class="form-group">
                          </div>
                      <div class="form-group">
                          <label for="subject">
                              How long are you staying?</label>
                          <select id="subject" name="subject" class="form-control" required="required">
                              <option value="na" selected="">1 Night</option>
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
                          <textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required"
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
              </form>
          </div>
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

function checkin($users)
{
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">


    
    <br>  
    <hr>
    
    
    
    
    
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
       
    <form method = "POST" action = "../MVC/controller/receptionControl.php?chkin">
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
         </div>
         <select id="reservationID" name="reservationID" class="form-control" required="required">
         <option value="na" selected="">Select User..</option>
         ';
         foreach($users as $Row)
         {
         echo '<option value="'.$Row["ID"].'">'.$Row["fName"].' '.$Row["lName"].'</option>';
         }
         echo'
             
         </select>
        </div> <!-- form-group// -->
        
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <select class="custom-select" style="max-width: 120px;">
                <option selected="">+20</option>
               
            </select>
            <input name="" class="form-control" placeholder="Phone number" type="text" pattern="[1][0-9]{9}"title="11 numbers starts with 0 and 1"required>
        </div> <!-- form-group// -->
        
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-users"></i> </span>
            </div>
            <select class="custom-select" >
                <option selected="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-money-bill-wave"></i>
                </span>
            </div>
            <select class="form-control">
                <option selected=""> Payment Method..</option>
                <option>Cash</option>
                <option>Credit Card</option>
                
            </select>

            
        </div> <!-- form-group end.// -->
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Check In  </button>
    </div> <!-- form-group// -->                                                   
    </form>
    </article>
    </div> <!-- card.// -->
    
    
   ';
}


function checkout($users)
{
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">


    
    <br>  
    <hr>
    
    
    
    
    
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
       
    <form method = "POST" action = "../MVC/controller/receptionControl.php?chkout">
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
         </div>
         <select id="reservationID" name="reservationID" class="form-control" required="required">
         <option value="na" selected="">Select User..</option>
         ';
         foreach($users as $Row)
         {
         echo '<option value="'.$Row["ID"].'">'.$Row["fName"].' '.$Row["lName"].'</option>';
         }
         echo'
             
         </select>
        </div> <!-- form-group// -->
        
        <div class="form-group">
        <label for="name">
            Review</label>
        <textarea name="comment" id="comment" class="form-control" rows="4" cols="25" required="required"
            placeholder="Type Review"></textarea>
    </div>
        
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-star-half-alt"></i> </span>
            </div>
            <select class="custom-select" name = "rating" >
                <option value = "1" selected="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>

            </select>
            
        </div> <!-- form-group// -->

        
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Check out  </button>
    </div> <!-- form-group// -->                                                   
    </form>
    </article>
    </div> <!-- card.// -->
    
    
   ';
}

function complain($users)
{
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">


    
    <br>  
    <hr>
    
    
    
    
    
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
       
        <form method = "POST" action = "../MVC/controller/receptionControl.php?cmpln">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
             <select id="ID" name="ID" class="form-control" required="required">
             <option value="na" selected="">Select User..</option>
             ';
             foreach($users as $Row)
             {
             echo '<option value="'.$Row["ID"].'">'.$Row["fName"].' '.$Row["lName"].'</option>';
             }
         echo'</select>
        </div> <!-- form-group// -->
        
        <div class="form-group">
        <label for="name">
            Complaint</label>
        <textarea name="complaint" id="complaint" class="form-control" rows="4" cols="25" required="required"
            placeholder="Type Complaint"></textarea>
    </div>
        
        

        
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Record  </button>
    </div> <!-- form-group// -->                                                   
    </form>
    </article>
    </div> <!-- card.// -->
    
    
   ';
}

}


?>