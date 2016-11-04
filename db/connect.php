<?php
   // $host        = "host=localhost";
   // $port        = "port=5432";
   // $dbname      = "dbname=postgres";
   // $credentials = "user=postgres password=pranav#14";

   // $db = pg_connect( "$host $port $dbname $credentials"  );

   $db = pg_connect( "dbname=d4ls44i0sli2c7 host=ec2-54-243-249-176.compute-1.amazonaws.com port=5432 user=efgaitdoublyja password=P2PUo012XqergkYIsMfmMirl-v sslmode=require"  );
   
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }
?>