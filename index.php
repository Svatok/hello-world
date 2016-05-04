<?php
# This function reads your DATABASE_URL config var and returns a connection
# string suitable for pg_connect. Put this in your app.
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://ozothppcrrbtpt:QxLJ0IoqGCpetHKE4yJXm1rQXy@ec2-54-228-219-2.eu-west-1.compute.amazonaws.com:5432/d54a0dd3p463b"]));
//  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
  return "user=ozothppcrrbtpt password=QxLJ0IoqGCpetHKE4yJXm1rQXy host=ec2-54-228-219-2.eu-west-1.compute.amazonaws.com dbname=d54a0dd3p463b"; # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = new PDO(pg_connection_string_from_database_url());
//$pg_conn = new PDO('pgsql:user=exampleuser dbname=exampledb password=examplepass');
# Now let's use the connection for something silly just to prove it works:
echo 'tyt';
$sql = "SELECT name FROM projects";
$query=$conn->query($sql);
print "<pre>\n";
$result = $query->fetchAll();
if (count($result)==0) {
  print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
  foreach ($result as $row) {
    echo $row[0]."\n"; 
  }
}

print "\n";
?>
