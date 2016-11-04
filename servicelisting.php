<?php
  session_start();
  require 'db/connect.php';
    if (isset($_GET['id']) && isset($_SESSION['area'])) {
    //the query string is received from the url and converted top lower case.
    $sid = strtolower($_GET['id']);

    //SQL Commands to search the table for the rows which are to be displayed for the category listing page with query parameters searched through the columns category, site, title and description.

    //lower is used to coinvert all the letters to lower case in-order to get proper matching.

    $sql ="SELECT * FROM services WHERE sid=".$sid." LIMIT 1;";

    $ret = pg_query($db, $sql);
    if(!$ret){
      echo pg_last_error($db);
      exit;
    }

  }
  else {
    header('Location: index.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Service Listing</title>

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
    <div class="row Logo">
        <div class="col-sm-10 col-md-12">
           <center><font size="28" color="red">DoorDelivery</font></center>
        </div>
    </div>
     <div class="row Logo">
        <div class="col-sm-10 col-md-offset-3 col-md-6">
          <form action="search.php" method="get">
        <input type="text" class="form-control" name="search" placeholder="Search "> <center> <input class="btn btn-default" type="button" 
        value="Search" ></center>
      </form>
        </div>
    </div>
    <div class="row Service">
    <?php
      //Loops throught the fetched data and returns the result in the form of formatted and styled HTML
      //echo $_SESSION['area'];
        while($row = pg_fetch_assoc($ret)){
    ?>
        <div class="col-md-12">
          
          <center><img src="<?php echo $row['image']; ?>" alt="..." class="img-responsive img-circle" width="40%"><br><b><font size="14"><?php echo $row['name']; ?></font></b></center>
        </div>
    </div>
    <div class="row Details">
        <div class="col-md-12">
        <br><center>
          <b>Description:</b><?php echo $row['dsc']; ?><br>
          <br><b>Contact:<?php echo $row['tel']; ?><br><br>Or<br><br>Visit <a target="_blank" href="<?php echo $row['url']; ?>"><?php echo $row['name']; ?></a></b><br>
          <b>Open Hours : <?php echo $row['open_time']; ?>
        </div>
    </div>
</div>
    <?php
        }
    ?>

    <center><form action="categories.php" method="post"><button class="btn btn-default">Back</button></form></center>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>