<?php
    // Start the session
    session_start();
    if (isset($_SESSION['area']))
        header('Location: categories.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DoorDelivery</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    <br>
    <div class="row Logo">
        <div class="col-sm-12">
            <center><font size="28" color="red">DoorDelivery</font></center>      
        </div>
    </div>
    <br>
    <form action="categories.php" method="post">
    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">      
              <div class="form-group">            
                <input type="text" class="form-control" id="area" name="area" placeholder="Enter Area or Pincode">
              </div>
            
        </div>

        <div class="col-md-2"></div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <center>
                <button type="submit" class="btn btn-default">Select Location</button>
            </center>
        </div>
    </div>
    </form>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include sindividual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
    //session_destroy();
?>