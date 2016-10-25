<?php
   // $host        = "host=localhost";
   // $port        = "port=5432";
   // $dbname      = "dbname=postgres";
   // $credentials = "user=postgres password=pranav#14";

   // $db = pg_connect( "$host $port $dbname $credentials"  );

   $db = pg_connect( "dbname=ddcdnokrmhd5m4 host=ec2-50-19-222-159.compute-1.amazonaws.com port=5432 user=tkrarhvbsfvfqa password=4Jddi5Tct6BBk8u65arzmUhpNQ sslmode=require"  );
   
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }
?>