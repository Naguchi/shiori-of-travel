<?php

function sql_select( $select, $from )
{
// sql_select
echo "sql_select";

  sql_connect();

  $result = mysqli_query( $conn, $query );
  $row = mysqli_fetch_array( $result );

  return $row['id'];

}

function sql_connect()
{
// sql_connect
echo "sql_connect";

  global $hostname, $user, $password, $database, $conn;

  $host = "localhost";
  $user = "naguchi";
  $password = "pass"; 
  $database = "shiori";

  $conn = mysqli_connect( $host, $user, $password, $database );
  mysql_set_charset( "utf8" );

}


?>
