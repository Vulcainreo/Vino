<?php
  $page = (isset($_GET['page'])) ? $_GET['page'] : "";

  include "config.php";
  include "bdd.php";
  include "fonctionAffichage.php";
  include "matriceRangement.php";

  $bdd = new Bdd($host, $dbname, $login, $mdp);
  $fonctionAffichage = new FonctionAffichage();
  $matrice = new MatriceRangement($bdd);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Vino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/css/bootstrap-responsive.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="lib/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="lib/css/design.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    <?php include "header.php" ?>
   
    <div class="container">
      <?php
        switch ($page) 
        {
            case "gestion" : 
              include "gestion.php";
              break;
            case "modification" : 
              include "modification.php";
              break;
            default :
              include "home.php";
              break;
        }
      ?>
    </div> <!-- /container -->

    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/bootstrap.js"></script>
     <script src="lib/js/vino.js"></script>

  </body>
</html>
