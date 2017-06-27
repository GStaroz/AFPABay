<?php session_start() ;
if(empty($_SESSION['ID'])){ header('Location: BayLogin.php');}
include 'PHP_bits/toumou.php';
$main = new main;
$reponse = $bdd->query('SELECT * from film');
$filtre = filter_input(INPUT_GET, 'recherche', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>AFPA bays tests</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="stylefilm.css"/>
    </head>
    <?php include 'PHP_bits/BayHeader.php'; ?>
    <body class="">
        <div class="recherche col-xs-12">
            <form>
                <div class="input-group col-xs-4 col-xs-offset-8">
                    <input type="text" class="form-control" placeholder="Recherche" name="recherche" value='<?php echo $filtre ?>'/>
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>        
                  </div>
                </div>
            </form> 
        </div>     
        <div id="main">
            <div id="ul">
                <div class="list-group">
                    <?php
                        $main-> recherche();
                    ?>
                </div>
            </div>
            <div class="col-xs-12"> <a href="ajoutFilm.php">Cliquez ici pour ajouter un film</a></div>
        </div>    
    </body>
    <?php include 'PHP_bits/BayFooter.php'; ?>
</html>
