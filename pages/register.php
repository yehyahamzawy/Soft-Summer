<?php
echo '
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">


    
    <br>  
    <hr>
    
    
    
    
    
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
       
    <form method = "POST" action = "../MVC/controller/logging.php?add">
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
         </div>
         <input name="fName" class="form-control" placeholder="First Name" type="text" pattern="[A-Za-z]{1,32}" style="max-width: 120px;">
         
        
     
     <input name="lName" class="form-control" placeholder="Last Name" type="text" pattern="[A-Za-z]{1,32}" title="No special characters"required>
        </div> <!-- form-group// -->
        
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            
            <input name="email" class="form-control" placeholder="Email" type="email" required>
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            
            <input name="password" class="form-control" placeholder="Password" type="password" required>
        </div> <!-- form-group// -->
        
        
        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->                                                   
    </form>
    </article>
    </div> <!-- card.// -->


';
?>