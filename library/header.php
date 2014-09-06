<?php 
  session_start();

  $_SESSION['bd'] = '/var/www/shiori-of-travel/'; // Base Directory
  $_SESSION['bl'] = '/var/www/shiori-of-travel/library/';
  $_SESSION['bh'] = '/var/www/shiori-of-travel/library/header.php';
  $bd = $_SESSION['bd'];
  $bl = $_SESSION['bl'];
  $_SESSION['bh'];
?>
<html>
<head>
    <title>旅のしおり</title>
    <meta http-equiv="Content-Type"        content="text/html; charset=UTF-8" >
    <meta http-equiv="Content-Style-Type"  content="text/css;  charset=UTF-8" >
    <meta http-equiv="Content-Script-Type" content="text/javascript; charset=UTF-8" />
<link rel="stylesheet" href="./library/css/import.css"  type="text/css" >
</head>
<!--
<body background="/shiori-of-travel/library/img/satori.jpg">
-->
<body>

<?php 
  require_once( $_SESSION['bl'].'sql/mysql.php' );
?>

