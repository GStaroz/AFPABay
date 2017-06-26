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
            $infos_films = $bdd->prepare('SELECT * FROM film WHERE titre = ?');
            $infos_films->execute(array($_SESSION['edit_titre']));
            $donnees = $infos_films->fetch();
            $anneefilm = filter_var($donnees['année'], FILTER_SANITIZE_NUMBER_INT);
            echo $donnees['realisateur'];
    ?>
    <head>
        <title>AFPAbay modif film</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylefilm.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'BayHeader.php'; ?>
    <body class="">
        <form method="post" action="modifFilm.php" class="">
            <div class="form-group inline">
                <label class="col-xs-5" for="nom">Titre:</label>
                <input type="text" name="filmname" value='<?php echo $_SESSION['edit_titre'];?>' disabled/>
            </div>
            <div class="form-group">
                <label class="col-xs-5" for="real">Réalisateur:</label>
                <input type="text" name="filmreal" value='<?php echo $donnees['realisateur'] ?>'/>
            </div>
            <div class="form-group">
                <label class="col-xs-5" for="acteurs">Acteurs principaux:</label>
                <input type="text" name="acteurs" value= '<?php echo $donnees['acteurs'] ?>'/>
            </div>
            <div class="form-group">
                <label class="col-xs-5" for="year">Date de sortie:</label>
                <input type="number" name="releaseD" value= '<?php echo $anneefilm;?>'/>
            </div>
            <div class="btn-group col-xs-offset-4 col-xs-8 ">
                <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok-circle"></span></button>
                <a href="filmDetail.php?titre=<?php echo $_SESSION['edit_titre']; ?>" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-remove-circle"></span></a>
            </div>
        </form>
        <?php 
        $filmname = $_SESSION['edit_titre'];
        $filmdate = filter_input(INPUT_POST, 'releaseD',FILTER_SANITIZE_NUMBER_INT);
        $filmreal = filter_input(INPUT_POST, 'filmreal',FILTER_SANITIZE_STRING);       
        $filmactor = filter_input(INPUT_POST, 'acteurs',FILTER_SANITIZE_STRING);
        $filmimage = 'images/'.$filmname.'jpg';
        if (!empty($filmactor) AND !empty($filmdate) AND !empty($filmreal) AND !empty($filmname)){
            $insert = $bdd->prepare('UPDATE film SET realisateur = :realisateur,'
                                    . ' acteurs = :acteurs,'
                                    . 'année = :annee WHERE titre = :titre');  
            $insert->bindValue(':titre', $filmname, PDO::PARAM_STR);
            $insert->bindValue(':realisateur', $filmreal, PDO::PARAM_STR);
            $insert->bindValue(':acteurs', $filmactor, PDO::PARAM_STR);
            $insert->bindValue(':annee', $filmdate, PDO::PARAM_INT);
            
            echo 'boo';
            $insert->execute();
            header('Location: filmk.php');
            }
        ?>
    </body>
    
    <?php include 'BayFooter.php'; ?>
    
</html>

