<?php
	session_start();
	require 'db/connect.php';
    if (isset($_GET['id']) && isset($_SESSION['area'])) {
		//the query string is received from the url and converted top lower case.
		$cid = strtolower($_GET['id']);

		//SQL Commands to search the table for the rows which are to be displayed for the category listing page with query parameters searched through the columns category, site, title and description.

		//lower is used to coinvert all the letters to lower case in-order to get proper matching.

		$sql ="SELECT sid,name,image FROM services JOIN area_map ON area_map.ser_id=services.sid JOIN cat_map ON cat_map.ser_id = services.sid WHERE area_map.area_id=".$_SESSION['area']." AND cat_id=".$cid." GROUP BY sid;";

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
    <title>Service</title>

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

	    <div class="row logo">
	        <div class="col-sm-12">
	            <center><font size="28" color="red">DoorDelivery</font></center>      
	        </div>
	    </div>
    <br>
    	<div class="row title">
    	  <div class="row Logo">
        <div class="col-sm-10 col-md-offset-3 col-md-6">
        	<form action="search.php" method="get">
				<input type="text" class="form-control" name="search" placeholder="Search for Service"> <center> <input class="btn btn-default" type="button" 
				value="Search" ></center>
			</form>
        </div>
    </div>
	        <div class="col-sm-12">
	        
	            <center><h2>Select Service</h2></center>      
	        </div>
	    </div>
    <br>
	    <div class="row padding">
	   <?php
			//Loops throught the fetched data and returns the result in the form of formatted and styled HTML
			//echo $_SESSION['area'];
	        while($row = pg_fetch_assoc($ret)){
	    ?>
	    	<div class="col-sm-2">
		    	<center>
		    		<img src="<?php echo $row['image']; ?>" alt="..." class="img-responsive img-circle">
	    			<a class="btn btn-default" href="servicelisting.php?id=<?php echo $row['sid']; ?>">
	    			<?php echo $row['name']; ?>
	    			</a>
		    	</center>
	    	</div>
	    <?php
	    	}
	    ?>
    </div>
    <center><form action="categories.php" method="post"><button class="btn btn-default">Back</button></form></center>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>