<?php
// THROW USER TO LOGIN PAGE IF NOT SIGNED IN
// YOU MIGHT WANT TO DO THIS DIFFERENTLY IF PLANNING TO USE PRETTY URL
$_ADMIN = is_array($_SESSION['user']);
if (!$_ADMIN && basename($_SERVER["SCRIPT_FILENAME"], '.php')!="login") {
  header('Location: login.php');
  die();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>OMM: Gestion des logs observateurs</title>
    <meta name="robots" content="noindex">
    <link href="public/admin.css" rel="stylesheet">
    <script src="public/admin.js"></script>
    <script type="text/javascript" src="public/utils.js"></script>
  </head>
  <body>
    <!-- [NOW LOADING SPINNER] -->
    <div id="page-loader">
      <img id="page-loader-spin" src="public/126.svg">
    </div>
    

    <!-- [PAGE WRAPPER] -->
    <div id="page-wrap">
      <?php if ($_ADMIN) { ?>
      <!-- [SIDE BAR] -->
      <nav id="page-sidebar">
        <a href="index.php">
          <img src="./public/OMM_logo.jpg" height="42" width="42"></img>
          OMM
        </a>
        <a href="users.php">
          <span class="ico">&#9856;</span>
          G&#233;rer les acc&#232;s admin
        </a>
        <a href="instruments.php">
          <span class="ico">&#9857;</span>
          G&#233;rer la liste d'instruments
        </a>
        <a href="filters.php">
          <span class="ico">&#9858;</span>
          G&#233;rer la liste de filtres
        </a>
        <a href="#">
          <span class="ico">&#9859;</span>
          G&#233;rer les champs des instruments
        </a>
      </nav>
      <?php } ?>

      <!-- [MAIN CONTENTS] -->
      <div id="page-main">
        <?php if ($_ADMIN) { ?>
        
        <!-- [NAVIGATION BAR] -->
        
        <nav id="page-nav">
          <center><font size="5">Gestion de la page des logs de l'Observatoire du Mont M&#233;gantic</center></font>
        
          <div id="page-button-out" onclick="adm.bye();">&#9747;</div>
        </nav>
        <?php } ?>

        <!-- [PAGE CONTENTS] -->
        <div id="page-contents">
        

