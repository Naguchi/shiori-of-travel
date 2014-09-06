<?php

function sql_select( $select, $from ){

  $result = mysqli_query( $conn, $query );
  $row = mysqli_fetch_array( $result );

  return $row['id'];
}

?>
