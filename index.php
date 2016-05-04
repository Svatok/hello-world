<?php
  # Here we establish the connection. Yes, that's all.
  $pg_conn = new PDO('pgsql:user=ozothppcrrbtpt dbname=d54a0dd3p463b password=QxLJ0IoqGCpetHKE4yJXm1rQXy host=ec2-54-228-219-2.eu-west-1.compute.amazonaws.com');
  
  $sql = "SELECT name FROM projects";
  $query=$pg_conn->query($sql);
  $result = $query->fetchAll();
  
  print "<pre>\n";
  if (count($result)==0) {
    print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
  } else {
    foreach ($result as $row) {
      echo $row['name']."\n"; 
    }
  }
  print "\n";

?>
