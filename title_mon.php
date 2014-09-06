<div class="title_mon">
<?php
  if( isset( $_GET['travel_id'] ) ){
    $_SESSION['travel_id'] = $_GET['travel_id'];
  } else {
    $_SESSION['travel_id'] = 4;
  }
?>


<?php
  $host = "localhost";
  $user = "naguchi";
  $password = "pass";
  $database = "shiori";
  $conn = mysqli_connect( $host, $user, $password, $database );



  $query = "SELECT *  FROM travel_tbl WHERE id = " . $_SESSION['travel_id'];
  $result = mysqli_query( $conn, $query );
  $row = mysqli_fetch_array( $result );
  print "<h1>". $row['title'] ."</h1>";

?>

</div><!-- class=title_mon -->
