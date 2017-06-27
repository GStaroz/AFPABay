<?php session_start();
if(empty($_SESSION['ID'])){ header('Location: BayLogin.php');}
include 'PHP_bits/toumou.php';
$Ajout = new Ajout;?>
<!DOCTYPE html>
<html class="col-xs-10 col-xs-offset-2">
    <?php
        include_once 'PHP_bits/connectDB.php';
            
    ?>
    <head>
        <title>AFPA bays tests</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylefilm.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'PHP_bits/BayHeader.php'; ?>
    <body class="">
        <form method="post" action="ajoutFilm.php" class="">
            <div class="form-group inline">
                <label class="col-xs-5" for="nom">Nom:</label>
                <input type="text" name="filmname" class=""/>
            </div>
            <div class="form-group">
                <label class="col-xs-5" for="real">Réalisateur:</label>
                <input type="text" name="filmreal"/>
            </div>
            <div class="form-group">
                <label class="col-xs-5" for="acteurs">Acteurs principaux:</label>
                <input type="text" name="acteurs"/>
            </div>
            <div class="form-group">
                <label class="col-xs-5" for="year">Date de sortie:</label>
                <input type="number" name="releaseD"/>
            </div>
            <div class="btn-group col-xs-offset-4 col-xs-8 ">
                <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok-circle"></span></button>
                <a href="filmk.php" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>
            </div>
        </form>
        <?php 
        $Ajout->ajouter_film();
        ?>
    </body>
    <?php include 'PHP_bits/BayFooter.php'; ?>
</html>





