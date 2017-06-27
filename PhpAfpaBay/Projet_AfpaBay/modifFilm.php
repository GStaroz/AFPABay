<?php session_start();
if(empty($_SESSION['ID'])){ header('Location: BayLogin.php');}
include 'PHP_bits/toumou.php';?>
<!DOCTYPE html>
<html class="col-xs-10 col-xs-offset-2">
    <?php 
            $modif = new Modif;
            $donnees = $modif->selectfromcolonne();
            $anneefilm = filter_var($donnees['année'], FILTER_SANITIZE_NUMBER_INT);
            $modif->selectfromcolonne();
    ?>
    <head>
        <title>AFPAbay modif film</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylefilm.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>
    <?php include 'PHP_bits/BayHeader.php'; ?>
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
                <a id="destroy_film" href="PHP_bits/erasefilm.php?titre=<?php echo $_SESSION['edit_titre']; ?>" class="btn btn-danger btn-lg" role="button" disabled><span class="glyphicon glyphicon-erase"></span></a>
            </div>
        </form>
        <?php 
        $modif->updatefilm();
        ?>
    </body>
    
    <?php include 'PHP_bits/BayFooter.php'; ?>
    
</html>

