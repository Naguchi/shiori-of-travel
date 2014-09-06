<?php require_once( '/var/www/shiori-of-travel/library/header.php' ); ?>

<div class="frame">

<?php
// 確認モニター
  echo $_SESSION['travel_id'];
?>

<div class="front">
	<?php require( $bd.'title_mon.php' ); ?>
</div> <!-- class="frame" -->

<div class="left">
	<?php require( $bd.'menu_mon.php' ); ?>
</div> <!-- class="left" -->

<div class="center">
  <?php
  if( isset( $_GET['detail_mon'] ) ){
    $_SESSION['detail_mon'] = $_GET['detail_mon'];
  } else {
    $_SESSION['detail_mon'] = 'profile_mon';
  }
  echo $_SESSION['detail_mon'];
  ?>
	<?php include( $_SESSION['detail_mon'].'.php' ); ?>
</div> <!-- class="center" -->

<!--
<div class="right"> </div>
-->
<div class="bottom">
	<?php require( $bd.'preference_mon.php' ); ?>
</div> <!-- class="bottom" -->

</div><!-- class="frame" -->

<?php require_once( $bl.'footer.php' ); ?>
