<?php session_start(); ?>
<!DOCTYPE html>
<html class="col-xs-10 col-xs-offset-2">
    <?php
        try
            {
            $bdd = new PDO('mysql:host=localhost;dbname=filmbay;charset=utf8', 'root', 'mvb94');
            $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }catch (Exception $e)
            {
             die('Erreur : ' . $e->getMessage());}
            
    ?>
    <head>
        <title>AFPA bays tests</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylefilm.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'BayHeader.php'; ?>
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
        $filmname = filter_input(INPUT_POST, 'filmname',FILTER_SANITIZE_STRING);
        $filmdate = filter_input(INPUT_POST, 'releaseD',FILTER_SANITIZE_NUMBER_INT);
        $filmreal = filter_input(INPUT_POST, 'filmreal',FILTER_SANITIZE_STRING);       
        $filmactor = filter_input(INPUT_POST, 'acteurs',FILTER_SANITIZE_STRING);
        $filmimage = 'images/'.$filmname.'jpg';
        if (!empty($filmactor) AND !empty($filmdate) AND !empty($filmreal) AND !empty($filmname)){
            $insert = $bdd->prepare('INSERT INTO film (titre, realisateur, acteurs, année, lienimage) VALUES (:titre, :realisateur, :acteurs, :annee, :image)');
            $insert->bindValue(':titre', $filmname, PDO::PARAM_STR);
            $insert->bindValue(':realisateur', $filmreal, PDO::PARAM_STR);
            $insert->bindValue(':acteurs', $filmactor, PDO::PARAM_STR);
            $insert->bindValue(':annee', $filmdate, PDO::PARAM_INT);
            $insert->bindValue(':image', $filmimage, PDO::PARAM_STR);
            $insert->execute();
            header('Location: filmk.php');}
        ?>
    </body>
    <div id="footer" class="col-xs-12">
    <?php include 'BayFooter.php'; ?>
    </div>
</html>





