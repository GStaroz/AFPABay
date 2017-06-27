<?php session_start();
if(empty($_SESSION['ID'])){ header('Location: BayLogin.php');}
include 'PHP_bits/toumou.php';
$_SESSION['edit_titre'] = $_GET['titre'];
$Details = new Details?>
<!DOCTYPE html>
<html>
    <?php 
        $donnees = $Details->fetch();
    ?>
    <head>
        <title>film details</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylefilm.css"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    </head>                 
    <?php include 'PHP_bits/BayHeader.php'; ?>
    <body>
        <main class=" container-fluid col-xs-8 col-xs-offset-2">
            <div id="entete" class="container-fluid row ">
                <div id='img' class="col-xs-4"><img src="<?php echo $donnees['lienimage'];?>"/></div>
                <div id='titre' class="col-xs-8"><?php echo $donnees['titre'] ?></div>
            </div>
            
            <div id="details" class="row container-fluid">
                
                    <div id="desc" class="col-xs-4">
                        <span>
                        <?php echo $donnees['realisateur'].'<br>';
                          echo $donnees['année'].'<br>';
                          echo $donnees['acteurs'];
                            ?>
                        </span>
                        <div class="col-xs-12" id='lien'>LIEN ALLOCINE</div>
                    </div>
                
                <div id='synopsis' class="col-xs-8">
                Combining AND, OR and NOT

You can also combine the AND, OR and NOT operators.

The following SQL statement selects all fields from "Customers" where country is "Germany" AND city must be "Berlin" OR "München" (use parenthesis to form complex expressioeee eeeeeeeeeee eeeeeeeee eeee eeeeeeeeeeeeeeeee eeeeeeeeee eeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeee eeeeeeeeeee eeeeeeeeeee eeeeeeeee eeeeeeee eeeeeeeeeeens):
                </div>
            </div>
        </main>  
        <div class="row col-xs-12"><a href ="modifFilm.php?titre=<?php echo $_GET['titre'];?>"> Modifier les infos du film</a></div>
        <div class="row col-xs-12"><a href="filmk.php">Cliquez ici pour retourner au menu principal</a></div>
    </body>

    <?php include 'PHP_bits/BayFooter.php'; ?>
</html>

