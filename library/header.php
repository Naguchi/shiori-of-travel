<?php 
    session_start();

    $bd = __DIR__.'/../'; // Base Directory
    $bl = $bd . 'library/';
    $bh = $bl . 'header.php';
    $_SESSION['bd'] = $bd;
    $_SESSION['bl'] = $bl;
    $_SESSION['bh'] = $bh;
?>
<html>
<head>
    <title>旅のしおり</title>
    <meta http-equiv="Content-Type"        content="text/html; charset=UTF-8" >
    <meta http-equiv="Content-Style-Type"  content="text/css;  charset=UTF-8" >
    <meta http-equiv="Content-Script-Type" content="text/javascript; charset=UTF-8" />
<link rel="stylesheet" href="/shiori-of-travel/library/css/import.css"  type="text/css" >
</head>
<body>

<?php 
    require_once( $_SESSION['bl'].'sql/mysql.php' );
?>

